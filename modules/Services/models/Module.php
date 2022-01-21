<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Services_Module_Model extends Products_Module_Model {
	
	/**
	 * Function to get list view query for popup window
	 * @param <String> $sourceModule Parent module
	 * @param <String> $field parent fieldname
	 * @param <Integer> $record parent id
	 * @param <String> $listQuery
	 * @return <String> Listview Query
	 */
	public function getQueryByModuleField($sourceModule, $field, $record, $listQuery) {
		$supportedModulesList = array('Leads', 'Accounts', 'HelpDesk', 'Potentials');
		/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Start*/
		/*if (($sourceModule == 'PriceBooks' && $field == 'priceBookRelatedList')
				|| in_array($sourceModule, $supportedModulesList)
				|| in_array($sourceModule, getInventoryModules())) {*/
		if (($sourceModule == 'PriceBooks' && $field == 'priceBookRelatedList')
				|| ($sourceModule == 'HelpDesk' && $field == 'ticketRelatedList')
				|| in_array($sourceModule, $supportedModulesList)
				|| in_array($sourceModule, getInventoryModules())) {
		/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 End*/
			$condition = " vtiger_service.discontinued = 1 ";

            		$db = PearDatabase::getInstance();
            		$params = array();
			if ($sourceModule == 'PriceBooks' && $field == 'priceBookRelatedList') {
				$condition .= " AND vtiger_service.serviceid NOT IN (SELECT productid FROM vtiger_pricebookproductrel WHERE pricebookid = ?) ";
                		$params = array($record);
			}
			/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Start*/
			elseif ($sourceModule === 'HelpDesk') {
				$condition .= " AND vtiger_service.serviceid NOT IN (SELECT productid FROM vtiger_ticketsproductrel WHERE ticketid = ?) ";
				$params = array($record);
			} 
			/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 End*/
			elseif (in_array($sourceModule, $supportedModulesList)) {
				$condition .= " AND vtiger_service.serviceid NOT IN (SELECT relcrmid FROM vtiger_crmentityrel WHERE crmid = ? UNION SELECT crmid FROM vtiger_crmentityrel WHERE relcrmid = ?) ";
                		$params = array($record, $record);
			}
            		$condition = $db->convert2Sql($condition, $params);

			$pos = stripos($listQuery, 'where');
			if ($pos) {
				$split = preg_split('/where/i', $listQuery);
				$overRideQuery = $split[0] . ' WHERE ' . $split[1] . ' AND ' . $condition;
			} else {
				$overRideQuery = $listQuery . ' WHERE ' . $condition;
			}
			return $overRideQuery;
		}
	}
	
	/**
	 * Function returns query for Services-PriceBooks Relationship
	 * @param <Vtiger_Record_Model> $recordModel
	 * @param <Vtiger_Record_Model> $relatedModuleModel
	 * @return <String>
	 */
	function get_service_pricebooks($recordModel, $relatedModuleModel) {
		$query = 'SELECT vtiger_pricebook.pricebookid, vtiger_pricebook.bookname, vtiger_pricebook.active, vtiger_crmentity.crmid, 
						vtiger_crmentity.smownerid, vtiger_pricebookproductrel.listprice, vtiger_service.unit_price
					FROM vtiger_pricebook
					INNER JOIN vtiger_pricebookproductrel ON vtiger_pricebook.pricebookid = vtiger_pricebookproductrel.pricebookid
					INNER JOIN vtiger_crmentity on vtiger_crmentity.crmid = vtiger_pricebook.pricebookid
					INNER JOIN vtiger_service on vtiger_service.serviceid = vtiger_pricebookproductrel.productid
					INNER JOIN vtiger_pricebookcf on vtiger_pricebookcf.pricebookid = vtiger_pricebook.pricebookid
					LEFT JOIN vtiger_users ON vtiger_users.id=vtiger_crmentity.smownerid
					LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid '
					. Users_Privileges_Model::getNonAdminAccessControlQuery($relatedModuleModel->getName()) .'
					WHERE vtiger_service.serviceid = '.$recordModel->getId().' and vtiger_crmentity.deleted = 0';
		
		return $query;
	}
    
    /*
     * Function to get supported utility actions for a module
     */
    function getUtilityActionsNames() {
        return array('Import', 'Export', 'DuplicatesHandling');
    }

    /*2020-10-19 Thet Phyo Wai Update Relation Ticket MSCRM var 1.0 Add Start*/
	function get_service_tickets($recordModel, $relatedModuleModel) {
		$query = 'SELECT vtiger_troubletickets.ticketid, vtiger_troubletickets.ticket_no, vtiger_troubletickets.title, vtiger_troubletickets.priority, vtiger_crmentity.crmid, vtiger_crmentity.smownerid,
						vtiger_ticketsproductrel.qty, vtiger_ticketsproductrel.listprice
			FROM vtiger_troubletickets
			INNER JOIN vtiger_ticketsproductrel on vtiger_troubletickets.ticketid = vtiger_ticketsproductrel.ticketid
			INNER JOIN vtiger_crmentity on vtiger_crmentity.crmid = vtiger_troubletickets.ticketid
			INNER JOIN vtiger_service on vtiger_service.serviceid = vtiger_ticketsproductrel.productid
			LEFT JOIN vtiger_users ON vtiger_users.id=vtiger_crmentity.smownerid
			LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid '
			. Users_Privileges_Model::getNonAdminAccessControlQuery($relatedModuleModel->getName()) .'
			WHERE vtiger_service.serviceid = '.$recordModel->getId().' and vtiger_crmentity.deleted = 0';
		return $query;
	}
    /*2020-10-19 Thet Phyo Wai Update Relation Ticket MSCRM var 1.0 Add End*/
}
