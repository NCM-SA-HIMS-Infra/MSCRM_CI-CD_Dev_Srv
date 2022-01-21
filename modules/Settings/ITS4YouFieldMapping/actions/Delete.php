<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_Delete_Action extends Settings_Vtiger_Index_Action
{

    public function process(Vtiger_Request $request)
    {
        $recordId = $request->get('record');
        $qualifiedModule = $request->getModule(false);
        $moduleModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $links = $moduleModel->getCreatedLinks($recordId);
        $adb = PearDatabase::getInstance();
        $query1 = "select module_from, module_to, label from  its4you_fieldmapping where fieldmappingid = ?";
        $result1 = $adb->pquery($query1, array($recordId));


        while ($row = $adb->fetchByAssoc($result1)) {
            $source_module_id = $row['module_from'];
            $target_module_id = $row['module_to'];
            $label = $row['label'];
        }

        if ($source_module_id && $target_module_id) {
            include_once 'vtlib/Vtiger/Module.php';
            //Delete Link from vtiger_links

            foreach ($links as $linkid => $link) {
                Vtiger_Link::deleteLink($source_module_id, $link['linktype'], $link['linklabel']);
            }

            //Delete Related List from vtiger_relatedlists
            $sourceModuleName = getTabModuleName($source_module_id);
            $targetModuleName = getTabModuleName($target_module_id);
            $relationLabel = vtranslate(getTabModuleName($targetModuleName));

            $moduleInstance = Vtiger_Module::getInstance($sourceModuleName);
            $target_Module = Vtiger_Module::getInstance($targetModuleName);
            $moduleInstance->unsetRelatedList($target_Module, $relationLabel);

            // get field id from vtiger_field
            $fieldlabel = vtranslate(getTabModuleName($source_module_id));
            $columnname = "imp_" . strtolower("$fieldlabel") . "id";
            $query2 = 'select fieldid from vtiger_field where tabid = ? and columnname = ? and fieldlabel = ?';
            $result2 = $adb->pquery($query2, array($target_module_id, $columnname, $fieldlabel));
            while ($row = $adb->fetchByAssoc($result2)) {
                $fieldid = $row['fieldid'];
            }

            $query3 = 'DELETE FROM vtiger_fieldmodulerel WHERE fieldid=? AND module=? AND relmodule = ?';
            $adb->pquery($query3, array($fieldid, getTabModuleName($target_module_id), getTabModuleName($source_module_id)));

            $query4 = 'delete from vtiger_field where fieldid=? AND tabid=?';
            $adb->pquery($query4, array($fieldid, $target_module_id));

            $query = 'delete from  its4you_fieldmapping where fieldmappingid = ?';
            $adb->pquery($query, array($recordId));

            $query5 = 'delete from  its4you_fieldmapping_mapping where fieldmappingid=?';
            $adb->pquery($query5, array($recordId));

            $result = array('success' => true, 'message' => vtranslate('LBL_DELETE_SUCCESS', $qualifiedModule));
        } else {
            $result = array('success' => false);
        }

        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
        //header("Location:index.php?module=ITS4YouFieldMapping&parent=Settings&view=List");
    }
}
