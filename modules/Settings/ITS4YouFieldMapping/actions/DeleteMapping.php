<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_DeleteMapping_Action extends Settings_Vtiger_Index_Action
{

    public function process(Vtiger_Request $request)
    {

        $mapping_id = $request->get('mappingId');
        $record_id = $request->get('recordId');
        $qualifiedModule = $request->getModule(false);

        $adb = PearDatabase::getInstance();

        $query = "delete from its4you_fieldmapping_mapping where fieldmapping_mappingid=? and fieldmappingid=?";
        $adb->pquery($query, array($mapping_id, $record_id));

        $result = array("result" => true, 'message' => vtranslate('LBL_DELETEMAPPING_SUCCESS', $qualifiedModule));

        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
        //header("Location:index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditMapping&recordId=$record_id");
    }
}