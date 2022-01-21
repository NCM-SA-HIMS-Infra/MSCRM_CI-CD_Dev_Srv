<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ***********************************************************************************/

class Contacts_RelationAjax_Action extends Vtiger_RelationAjax_Action {

	function getParentRecordInfo($request) {
		$moduleName = $request->get('module');
		$recordModel = Vtiger_Record_Model::getInstanceById($request->get('id'), $moduleName);
		$moduleModel = $recordModel->getModule();
		$autoFillData = $moduleModel->getAutoFillModuleAndField($moduleName);
		if ($autoFillData) {
			foreach ($autoFillData as $data) {
				$autoFillModule = $data['module'];
				$autoFillFieldName = $data['fieldname'];
				$autofillRecordId = $recordModel->get($autoFillFieldName);

				$autoFillNameArray = getEntityName($autoFillModule, $autofillRecordId);
				$autoFillName = $autoFillNameArray[$autofillRecordId];

				$resultData[] = array('id' => $request->get('id'),
					'name' => decode_html($recordModel->getName()),
					'parent_id' => array('name' => decode_html($autoFillName),
										'id' => $autofillRecordId,
										'module' => $autoFillModule));
			}

			$resultData['name'] = decode_html($recordModel->getName());
			$result[$request->get('id')] = $resultData;
		} else {
			$resultData = array('id' => $request->get('id'),
				'name' => decode_html($recordModel->getName()),
				'info' => $recordModel->getRawData());
			/*2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*/
			// 2020-09-14 Myo Min Kyaw Contact Product Select Contact auto fill Organization Ver 1.0 add start
			if($request->get('parentModule') == "ContactProduct" || $request->get('parentModule') == "HelpDesk" || $request->get('parentModule') == "Invoice"){
				$accountData = Vtiger_Module_Model::getAccountName($request->get('id'));
				$resultData["account_info"] = $accountData;
			}
			// 2020-09-14 Myo Min Kyaw Contact Product Select Contact auto fill Organization Ver 1.0 add end
			/*2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 End*/
			$result[$request->get('id')] = $resultData;
		}

		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}
}
?>
