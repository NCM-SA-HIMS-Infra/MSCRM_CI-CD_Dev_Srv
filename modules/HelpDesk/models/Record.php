<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class HelpDesk_Record_Model extends Vtiger_Record_Model {

	/**
	 * Function to get the Display Name for the record
	 * @return <String> - Entity Display Name for the record
	 */
	public function getDisplayName() {
		return Vtiger_Util_Helper::getRecordName($this->getId());
	}

	/**
	 * Function to get URL for Convert FAQ
	 * @return <String>
	 */
	public function getConvertFAQUrl() {
		return "index.php?module=".$this->getModuleName()."&action=ConvertFAQ&record=".$this->getId();
	}

	/**
	 * Function to get Comments List of this Record
	 * @return <String>
	 */
	public function getCommentsList() {
		$db = PearDatabase::getInstance();
		$commentsList = array();

		$result = $db->pquery("SELECT commentcontent AS comments FROM vtiger_modcomments WHERE related_to = ?", array($this->getId()));
		$numOfRows = $db->num_rows($result);

		for ($i=0; $i<$numOfRows; $i++) {
			array_push($commentsList, $db->query_result($result, $i, 'comments'));
		}

		return $commentsList;
	}

	/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add Start*/
	function getProductListPriceURL() {
		$url = 'module=HelpDesk&action=ProductListPrice&record=' . $this->getId();
		$rawData = $this->getRawData();
		$src_record = $rawData['src_record'];
		if (!empty($src_record)) {
			$url .= '&itemId=' . $src_record;
		}
		return $url;
	}
	function getProductsListPrice($relatedRecordId) {
		$db = PearDatabase::getInstance();

		$result = $db->pquery('SELECT listprice FROM vtiger_ticketsproductrel WHERE ticketid = ? AND productid = ?',
				array($this->getId(), $relatedRecordId));

		if($db->num_rows($result)) {
			 return $db->query_result($result, 0, 'listprice');
		}
		return false;
	}

	function updateListPrice($relatedRecordId, $price, $qty=1) {
		$db = PearDatabase::getInstance();
		if( $qty<1 ) $qty=1;
		$result = $db->pquery('SELECT * FROM vtiger_ticketsproductrel WHERE ticketid = ? AND productid = ?',
				array($this->getId(), $relatedRecordId));

		$currentUser = Users_Record_Model::getCurrentUserModel();
		$currencyId = $currentUser->get('currency_id');
		$productResult = $db->pquery('SELECT currency_id FROM vtiger_products WHERE productid = ?',
				array($relatedRecordId));
		if($db->num_rows($productResult)){
			$currencyId = $db->query_result($productResult, 0, 'currency_id');
		}else{
			$serviceResult = $db->pquery('SELECT currency_id FROM vtiger_service WHERE serviceid = ?', array($relatedRecordId));
			$currencyId = $db->query_result($serviceResult, 0, 'currency_id');
		}

		if($db->num_rows($result)) {
			 $db->pquery('UPDATE vtiger_ticketsproductrel SET listprice = ?, qty = ?,usedcurrency =? WHERE ticketid = ? AND productid = ?',
					 array($price, $qty, $currencyId, $this->getId(), $relatedRecordId));
			 $db->pquery('INSERT INTO testing (col_1,col_2,col_3) values(?,?,?)', 
			array($price,$qty,'wrongplace'));
		} else {

			$db->pquery('INSERT INTO vtiger_ticketsproductrel (ticketid,productid,listprice,qty,usedcurrency) values(?,?,?,?,?)',
					array($this->getId(), $relatedRecordId, $price, $qty, $currencyId));
		}
	}

	function deleteListPrice($relatedRecordId) {
		$db = PearDatabase::getInstance();
		$db->pquery('DELETE FROM vtiger_ticketsproductrel WHERE ticketid = ? AND productid = ?',
					array($this->getId(), $relatedRecordId));
	}
	/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add End*/
}