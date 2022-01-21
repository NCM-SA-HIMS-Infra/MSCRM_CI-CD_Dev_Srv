<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class HelpDesk_RelationListView_Model extends Vtiger_RelationListView_Model {

	public function getCreateViewUrl() {
		$createViewUrl = parent::getCreateViewUrl();
		$parentRecordModule = $this->getParentRecordModel();
		$parentModule = $parentRecordModule->getModule();
		$createViewUrl .= '&relationOperation=true&contact_id='.$parentRecordModule->get('contact_id').'&account_id='.$parentRecordModule->get('parent_id').'&sourceRecord='.$parentRecordModule->getId().'&sourceModule='.$parentModule->getName();
		return $createViewUrl;
	}

	/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add Start*/
	public function getHeaders() {
		$headerFields = parent::getHeaders();
		$relationModuleName = $this->getRelationModel()->getRelationModuleModel()->get('name');

		if($relationModuleName == 'Products' || $relationModuleName == 'Services' ){
			//Added to support List Price
			$field = new Vtiger_Field_Model();
			$field->set('name', 'qty');
			$field->set('column', 'qty');
			$field->set('label', 'Used Qty');
			$headerFields['qty'] = $field;

			//Added to support List Price
			$field = new Vtiger_Field_Model();
			$field->set('name', 'listprice');
			$field->set('column', 'listprice');
			$field->set('label', 'List Price');
			$headerFields['listprice'] = $field;
		}

		return $headerFields;
	}

	public function getEntries($pagingModel) {
		$db = PearDatabase::getInstance();
		$parentModule = $this->getParentRecordModel()->getModule();
		$relationModule = $this->getRelationModel()->getRelationModuleModel();
		$relatedColumnFieldMapping = $relationModule->getConfigureRelatedListFields();
		if(count($relatedColumnFieldMapping) <= 0){
			$relatedColumnFieldMapping = $relationModule->getRelatedListFields();
		}
		$query = $this->getRelationQuery();

		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM Start*/
		$relationModule = $this->getRelationModel()->getRelationModuleModel();
		$relationModuleName = $relationModule->get('name');

		if ($this->get('whereCondition') && is_array($this->get('whereCondition'))) {
			$currentUser = Users_Record_Model::getCurrentUserModel();
			$queryGenerator = new QueryGenerator($relationModuleName, $currentUser);
			$queryGenerator->setFields(array_values($relatedColumnFields));
			$whereCondition = $this->get('whereCondition');
			foreach ($whereCondition as $fieldName => $fieldValue) {
				if (is_array($fieldValue)) {
					$comparator = $fieldValue[1];
					$searchValue = $fieldValue[2];
					if(($relationModuleName == 'Products' || $relationModuleName == 'Services') && $fieldName == 'purchase_cost'){
						$purchaseCurrency = getCurrencySymbolandCRate($currentUser->get('currency_id'));
						$purchaseCost = (float)$searchValue * (float)$purchaseCurrency['rate'];
						$searchValue = $purchaseCost;
					}
					$type = $fieldValue[3];
					if ($type == 'time') {
						$searchValue = Vtiger_Time_UIType::getTimeValueWithSeconds($searchValue);
					}
					$queryGenerator->addCondition($fieldName, $searchValue, $comparator, "AND");
				}
			}
			$whereQuerySplit = split("WHERE", $queryGenerator->getWhereClause());
			$query.=" AND " . $whereQuerySplit[1];
		}
		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM Start*/

		$startIndex = $pagingModel->getStartIndex();
		$pageLimit = $pagingModel->getPageLimit();

		$orderBy = $this->getForSql('orderby');
		$sortOrder = $this->getForSql('sortorder');
		if($orderBy) {
			$query = "$query ORDER BY $orderBy $sortOrder";
		}

		$limitQuery = $query .' LIMIT '.$startIndex.','.$pageLimit;
		$result = $db->pquery($limitQuery, array());
		$relatedRecordList = array();

		if($relationModule->get('name') == 'Products' || $relationModule->get('name') == 'Services' ){
			$relatedColumnFieldMapping['qty']= 'qty';
			$relatedColumnFieldMapping['usedcurrency']= 'usedcurrency';
		}

		for($i=0; $i< $db->num_rows($result); $i++ ) {
			$row = $db->fetch_row($result,$i);
			$newRow = array();
			foreach($row as $col=>$val){
				if(array_key_exists($col,$relatedColumnFieldMapping))
					$newRow[$relatedColumnFieldMapping[$col]] = $val;
			}
			$recordId = $row['crmid'];
			$newRow['id'] = $recordId;
			//Added to support List Price
			$newRow['listprice'] = CurrencyField::convertToUserFormat($row['listprice'], null, true);

			$record = Vtiger_Record_Model::getCleanInstance($relationModule->get('name'));
			$relatedRecordList[$recordId] = $record->setData($newRow)->setModuleFromInstance($relationModule);
		}
		$pagingModel->calculatePageRange($relatedRecordList);

		$nextLimitQuery = $query. ' LIMIT '.($startIndex+$pageLimit).' , 1';
		$nextPageLimitResult = $db->pquery($nextLimitQuery, array());
		if($db->num_rows($nextPageLimitResult) > 0){
			$pagingModel->set('nextPageExists', true);
		}else{
			$pagingModel->set('nextPageExists', false);
		}
		return $relatedRecordList;
	}
	/*2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add End*/

}

?>
