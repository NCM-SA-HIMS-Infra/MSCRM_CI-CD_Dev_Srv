<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class ITS4YouFieldMapping_GetFieldMappingId_Action extends Vtiger_Action_Controller
{
    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    public function process(Vtiger_Request $request)
    {
        $return = 0;
        $db = PearDatabase::getInstance();
        $sourceId = getTabid($request->get('sourceModule'));
        $targetId = getTabid($request->get('forModule'));
        $res = $db->pquery("SELECT fieldmappingid FROM  its4you_fieldmapping WHERE module_from=? AND module_to=? AND isactive=1", array($sourceId, $targetId));
        if ($db->num_rows($res) > 0) {
            $row = $db->fetchByAssoc($res);
            $return = $row['fieldmappingid'];
        }
        $response = new Vtiger_Response();
        $response->setResult($return);
        $response->emit();
    }
}