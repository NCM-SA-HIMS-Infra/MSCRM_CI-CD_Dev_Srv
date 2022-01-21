<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class HelpDesk_Detail_View extends Vtiger_Detail_View {
	
	function __construct() {
		parent::__construct();
		$this->exposeMethod('showRelatedRecords');
	}

	/**
	 * Function to get activities
	 * @param Vtiger_Request $request
	 * @return <List of activity models>
	 */
	public function getActivities(Vtiger_Request $request) {
		$moduleName = 'Calendar';
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if($currentUserPriviligesModel->hasModulePermission($moduleModel->getId())) {
			$moduleName = $request->getModule();
			$recordId = $request->get('record');

			$pageNumber = $request->get('page');
			if(empty ($pageNumber)) {
				$pageNumber = 1;
			}
			$pagingModel = new Vtiger_Paging_Model();
			$pagingModel->set('page', $pageNumber);
			$pagingModel->set('limit', 10);

			if(!$this->record) {
				$this->record = Vtiger_DetailView_Model::getInstance($moduleName, $recordId);
			}
			$recordModel = $this->record->getRecord();
			$moduleModel = $recordModel->getModule();

			$relatedActivities = $moduleModel->getCalendarActivities('', $pagingModel, 'all', $recordId);

			$viewer = $this->getViewer($request);
			$viewer->assign('RECORD', $recordModel);
			$viewer->assign('MODULE_NAME', $moduleName);
			$viewer->assign('PAGING_MODEL', $pagingModel);
			$viewer->assign('PAGE_NUMBER', $pageNumber);
			$viewer->assign('ACTIVITIES', $relatedActivities);

			return $viewer->view('RelatedActivities.tpl', $moduleName, true);
		}
	}

	/*2020-10-01 Thet Phyo Wai Completed Activity MSCRM Ver 1.0 Start*/
	public function getCompletedActivities(Vtiger_Request $request) {
		$moduleName = 'Calendar';
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if($currentUserPriviligesModel->hasModulePermission($moduleModel->getId())) {
			$moduleName = $request->getModule();
			$recordId = $request->get('record');

			$pageNumber = $request->get('page');
			if(empty ($pageNumber)) {
				$pageNumber = 1;
			}
			$pagingModel = new Vtiger_Paging_Model();
			$pagingModel->set('page', $pageNumber);
			$pagingModel->set('limit', 10);

			if(!$this->record) {
				$this->record = Vtiger_DetailView_Model::getInstance($moduleName, $recordId);
			}
			$recordModel = $this->record->getRecord();
			$moduleModel = $recordModel->getModule();

			$relatedActivities = $moduleModel->getCalendarActivities('completed', $pagingModel, 'all', $recordId);

			$viewer = $this->getViewer($request);
			$viewer->assign('RECORD', $recordModel);
			$viewer->assign('MODULE_NAME', $moduleName);
			$viewer->assign('PAGING_MODEL', $pagingModel);
			$viewer->assign('PAGE_NUMBER', $pageNumber);
			$viewer->assign('ACTIVITIES', $relatedActivities);

			return $viewer->view('CompletedActivities.tpl', $moduleName, true);
		}
	}
	/*2020-10-01 Thet Phyo Wai Completed Activity MSCRM Ver 1.0 End*/

	/*2020/09/17 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*/
	function showRelatedList(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$relatedModuleName = $request->get('relatedModule');
		$parentId = $request->get('record');
		$label = $request->get('tab_label');

		$requestedPage = $request->get('page');
		if(empty ($requestedPage)) {
			$requestedPage = 1;
		}

		if($relatedModuleName != "Products"  &&  $relatedModuleName != "Services") {
			return parent::showRelatedList($request);
		}

		$pagingModel = new Vtiger_Paging_Model();
		$pagingModel->set('page',$requestedPage);

		$parentRecordModel = Vtiger_Record_Model::getInstanceById($parentId, $moduleName);
		$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName, $label);
		$orderBy = $request->get('orderby');
		$sortOrder = $request->get('sortorder');
		if($sortOrder == "ASC") {
			$nextSortOrder = "DESC";
			$sortImage = "icon-chevron-down";
		} else {
			$nextSortOrder = "ASC";
			$sortImage = "icon-chevron-up";
		}
		if(!empty($orderBy)) {
			$relationListView->set('orderby', $orderBy);
			$relationListView->set('sortorder',$sortOrder);
		}

		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM Start*/
		$searchParams = $request->get('search_params');

		if (empty($searchParams)) {
			$searchParams = array();
		}

		$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModuleName);
		$moduleFields = $relatedModuleModel->getFields();
		$whereCondition = array();

		foreach ($searchParams as $fieldListGroup) {
			foreach ($fieldListGroup as $fieldSearchInfo) {
				$fieldModel = $moduleFields[$fieldSearchInfo[0]];
				$tableName = $fieldModel->get('table');
				$column = $fieldModel->get('column');
				$whereCondition[$fieldSearchInfo[0]] = array($tableName.'.'.$column, $fieldSearchInfo[1], $fieldSearchInfo[2]);

				$fieldSearchInfoTemp = array();
				$fieldSearchInfoTemp['searchValue'] = $fieldSearchInfo[2];
				$fieldSearchInfoTemp['fieldName'] = $fieldName = $fieldSearchInfo[0];
				$fieldSearchInfoTemp['comparator'] = $fieldSearchInfo[1];
				$searchParams[$fieldName] = $fieldSearchInfoTemp;
			}
		}

		if (!empty($whereCondition))
			$relationListView->set('whereCondition', $whereCondition);
		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM End*/

		$models = $relationListView->getEntries($pagingModel);
		$links = $relationListView->getLinks();
		$header = $relationListView->getHeaders();
		$noOfEntries = count($models);
		
		//$parentRecordCurrencyId = $parentRecordModel->get('currency_id');
		/*$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$parentRecordCurrencyId = $currentUserModel->get('currency_id');*/

		/*if ($parentRecordCurrencyId) {*/
		$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModuleName);

		foreach ($models as $recordId => $recorModel) {
			$productIdsList[$recordId] = $recordId;
		}
			/*$unitPricesList = $relatedModuleModel->getPricesForProducts($parentRecordCurrencyId, $productIdsList);
			foreach ($models as $recordId => $recorModel) {
				$recorModel->set('unit_price', $unitPricesList[$recordId]);
			}*/

		//}
			/*$parentRecordCurrencyDetails = getCurrencySymbolandCRate($parentRecordCurrencyId);*/
		
		$moduleFields = $relatedModuleModel->getFields();
		$fieldsInfo = array();
		foreach($moduleFields as $fieldName => $fieldModel){
			$fieldsInfo[$fieldName] = $fieldModel->getFieldInfo();
		}

		$relationModel = $relationListView->getRelationModel();
		$relationField = $relationModel->getRelationField();
		$viewer = $this->getViewer($request);
		$viewer->assign('RELATED_FIELDS_INFO', json_encode($fieldsInfo));
		$viewer->assign('RELATED_RECORDS' , $models);
		$viewer->assign('PARENT_RECORD', $parentRecordModel);
		$viewer->assign('RELATED_LIST_LINKS', $links);
		$viewer->assign('RELATED_HEADERS', $header);
		$viewer->assign('RELATED_MODULE', $relationModel->getRelationModuleModel());
		$viewer->assign('RELATED_ENTIRES_COUNT', $noOfEntries);
		$viewer->assign('RELATION_FIELD', $relationField);
		
		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM Start*/
		$viewer->assign('SEARCH_DETAILS', $searchParams);
		/*2020-12-11 Thet Phyo Wai Ticket Related Product Cannot Search MSCRM End*/

		/*if ($parentRecordCurrencyDetails) {
			$viewer->assign('PARENT_RECORD_CURRENCY_SYMBOL', $parentRecordCurrencyDetails['symbol']);
		}*/

		if (PerformancePrefs::getBoolean('LISTVIEW_COMPUTE_PAGE_COUNT', false)) {
			$totalCount = $relationListView->getRelatedEntriesCount();
			$pageLimit = $pagingModel->getPageLimit();
			$pageCount = ceil((int) $totalCount / (int) $pageLimit);

			if($pageCount == 0){
				$pageCount = 1;
			}
			$viewer->assign('PAGE_COUNT', $pageCount);
			$viewer->assign('TOTAL_ENTRIES', $totalCount);
			$viewer->assign('PERFORMANCE', true);
		}

		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('PAGING', $pagingModel);
		$viewer->assign('ORDER_BY',$orderBy);
		$viewer->assign('SORT_ORDER',$sortOrder);
		$viewer->assign('NEXT_SORT_ORDER',$nextSortOrder);
		$viewer->assign('SORT_IMAGE',$sortImage);
		$viewer->assign('COLUMN_NAME',$orderBy);
		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
		$viewer->assign('TAB_LABEL', $request->get('tab_label'));
		
		return $viewer->view('RelatedList.tpl', $moduleName, 'true');
	}
	/*2020/09/17 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*/
}
