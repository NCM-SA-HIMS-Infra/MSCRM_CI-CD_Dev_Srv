<?php
/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add Start*/
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class HelpDesk_Relation_Model extends Vtiger_Relation_Model{

	/**
	 * Function returns the Query for the relationhips
	 * @param <Vtiger_Record_Model> $recordModel
	 * @param type $actions
	 * @return <String>
	 */
	public function getQuery($recordModel, $actions=false){
		$parentModuleModel = $this->getParentModuleModel();
		$relatedModuleModel = $this->getRelationModuleModel();
		$relatedModuleName = $relatedModuleModel->get('name');
		$parentModuleName = $parentModuleModel->get('name');
		$functionName = $this->get('name');
		$focus = CRMEntity::getInstance($parentModuleName);
		$focus->id = $recordModel->getId();
		if(method_exists($parentModuleModel, $functionName)) {
			$query = $parentModuleModel->$functionName($recordModel, $relatedModuleModel);
		} else {
			$result = $focus->$functionName($recordModel->getId(), $parentModuleModel->getId(),
											$relatedModuleModel->getId(), $actions);
			$query = $result['query'];
		}

		//modify query if any module has summary fields, those fields we are displayed in related list of that module
		$relatedListFields = $relatedModuleModel->getConfigureRelatedListFields();
		if(count($relatedListFields) > 0) {
			$currentUser = Users_Record_Model::getCurrentUserModel();
			$queryGenerator = new QueryGenerator($relatedModuleName, $currentUser);
			$queryGenerator->setFields($relatedListFields);
			$selectColumnSql = $queryGenerator->getSelectClauseColumnSQL();
			$newQuery = preg_split('/FROM/i', $query);
			$selectColumnSql = 'SELECT DISTINCT vtiger_crmentity.crmid,'.$selectColumnSql;
		}
		if(($functionName == 'get_ticket_products') || ($functionName ==  'get_ticket_services')){
			$selectColumnSql = $selectColumnSql.', vtiger_ticketsproductrel.qty, vtiger_ticketsproductrel.listprice, vtiger_ticketsproductrel.usedcurrency';
		}
		if(!empty($selectColumnSql)) {
			$query = $selectColumnSql.' FROM '.$newQuery[1];
		}

		if($relatedModuleName == 'Calendar') {
			$nonAdminQuery = Users_Privileges_Model::getNonAdminAccessControlQuery($relatedModuleName);

			if (trim($nonAdminQuery)) {
				$query = appendFromClauseToQuery($query, $nonAdminQuery);

				$moduleFocus = CRMEntity::getInstance('Calendar');
				$condition = $moduleFocus->buildWhereClauseConditionForCalendar();
				if($condition) {
					$query .= ' AND '.$condition;
				}
			}
		}
		return $query;
	}

	/**
	 * Function to add Ticket-Products/Services Relation
	 * @param <Integer> $sourceRecordId
	 * @param <Integer> $destinationRecordId
	 * @param <Integer> $listPrice
	 */
	public function addListPrice($sourceRecordId, $destinationRecordId, $listPrice, $qty) {
		$sourceModuleName = $this->getParentModuleModel()->get('name');

		$ticketModel = Vtiger_Record_Model::getInstanceById($sourceRecordId, $sourceModuleName);
		$ticketModel->updateListPrice($destinationRecordId, $listPrice, $qty);
	}

	/**
	 * Function that deletes Ticket related records information
	 * @param <Integer> $sourceRecordId - Ticket Id
	 * @param <Integer> $relatedRecordId - Related Record Id
	 */
	public function deleteRelation($sourceRecordId, $relatedRecordId){
		$sourceModuleName = $this->getParentModuleModel()->get('name');
		$destinationModuleName = $this->getRelationModuleModel()->get('name');
		if($sourceModuleName == 'HelpDesk' && ($destinationModuleName == 'Products' || $destinationModuleName == 'Services')) {
			$priceBookModel = Vtiger_Record_Model::getInstanceById($sourceRecordId, $sourceModuleName);
			$priceBookModel->deleteListPrice($relatedRecordId);
		} else {
			parent::deleteRelation($sourceRecordId, $relatedRecordId);
		}
	}
}
/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add End*/