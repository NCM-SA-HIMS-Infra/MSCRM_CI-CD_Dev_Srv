<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
 
class ContactProduct_CurrencyInfo_Action extends Vtiger_Action_Controller {

	function process(Vtiger_Request $request) {

		global $adb;
		$result = $adb->query('SELECT * FROM vtiger_currency_info');

		$ary  = [];
		for ($i = 0; $i < $adb->num_rows($result); $i++) {
			$currency_id = $adb->query_result($result, $i, 'id');
			$currency_symbol = $adb->query_result($result, $i, 'currency_symbol');
			$currency_rate = $adb->query_result($result, $i, 'conversion_rate');
			$ary[$currency_id]['symbol'] = $currency_symbol;
			$ary[$currency_id]['rate'] = $currency_rate;
		}

		$response = new Vtiger_Response();
		$response->setResult($ary);
		$response->emit();
	}
}
