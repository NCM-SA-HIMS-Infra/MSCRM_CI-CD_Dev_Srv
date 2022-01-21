<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class ITS4YouFieldMapping_CheckPermitedRecord_Action extends Vtiger_Action_Controller
{
    /**
     * @param Vtiger_Request $request
     */
    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    /**
     * @param Vtiger_Request $request
     */
    public function process(Vtiger_Request $request)
    {
        $response = new Vtiger_Response();
        $module = $request->getModule();
        $forModuleName = $request->get('forModuleName');
        $SelectedIds = explode(',', $request->get('selectedIds'));
        $moduleName = '';
        if ($request->has('moduleName')) {
            $moduleName = $request->get('moduleName');
        }
        $allIsPermited = true;
        foreach ($SelectedIds AS $key => $recordId) {
            if ('' == $moduleName) {
                $moduleName = getSalesEntityType($recordId);
            }
            $recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
            if (method_exists($recordModel, 'getPermisionLink')) {
                if (!$recordModel->getPermisionLink($forModuleName)) {
                    unset($SelectedIds[$key]);
                    //$allIsPermited = false;
                }
            }
        }
        if ('' == $moduleName) {
            $moduleName = $request->get('moduleName');
        }
        $clearRecordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
        if (method_exists($clearRecordModel, 'checkRecordForSameData')) {
            if (!$clearRecordModel->checkRecordForSameData($forModuleName, $SelectedIds)) {
                unset($SelectedIds);
                $allIsPermited = false;
            }
        }
        $permitedIds = implode(',', $SelectedIds);
        $message = '';
        if (0 == count($SelectedIds)) {
            if (!$allIsPermited) {
                $message = 'LBL_ACTION_CAN_NOT_BE_PERFORMED_ACCOUNTS_OR_WAREHOUSES_ARE_NOT_THE_SAME';
            } else {
                $message = 'LBL_ACTION_CAN_NOT_BE_PERFORMED_FOR_RECORD';
            }
            $response->setError(vtranslate($message, $module));
        } else {
            if (!$allIsPermited) {
                $message = vtranslate('LBL_ACTION_CAN_NOT_BE_PERFORMED_FOR_ONE_OR_MORE_RECORDS', $module);
            }
            $response->setResult(array('data' => $permitedIds, "message" => $message));
        }
        $response->emit();
    }
}
