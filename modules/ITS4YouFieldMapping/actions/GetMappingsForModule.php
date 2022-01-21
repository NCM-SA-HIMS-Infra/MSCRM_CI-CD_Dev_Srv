<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class ITS4YouFieldMapping_GetMappingsForModule_Action extends Vtiger_Action_Controller
{

    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    public function process(Vtiger_Request $request)
    {
        $db = PearDatabase::getInstance();
        $return = 0;
        $forModule = $request->get('forModule');
        $forModuleId = getTabid($forModule);
        $forField = $request->get('forField');
        $moduleModel = Vtiger_Module_Model::getInstance($forModule);
        $fieldModel = Vtiger_Field_Model::getInstance($forField, $moduleModel);
        $refModules = $fieldModel->getReferenceList();

        foreach ($refModules as $refModule) {
            $refModuleId = getTabid($refModule);
            if ($fieldModel) {
                $res = $db->pquery("SELECT fieldmappingid FROM its4you_fieldmapping WHERE module_to=? AND module_from=?", [$forModuleId, $refModuleId]);
                while ($row = $db->fetchByAssoc($res)) {
                    $mapRes = $db->pquery("SELECT * FROM its4you_fieldmapping_mapping WHERE fieldmappingid=?", [$row['fieldmappingid']]);
                    if (0 < $db->num_rows($mapRes)) {
                        $return = $row['fieldmappingid'];
                        break;
                    }
                }
            }
        }


        $response = new Vtiger_Response();
        $response->setResult($return);
        $response->emit();
    }
}
