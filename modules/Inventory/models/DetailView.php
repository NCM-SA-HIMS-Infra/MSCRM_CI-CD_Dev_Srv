<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Inventory_DetailView_Model extends Vtiger_DetailView_Model {

	/**
	 * Function to get the detail view links (links and widgets)
	 * @param <array> $linkParams - parameters which will be used to calicaulate the params
	 * @return <array> - array of link models in the format as below
	 *					 array('linktype'=>list of link models);
	 */
	public function getDetailViewLinks($linkParams) {
		$linkModelList = parent::getDetailViewLinks($linkParams);
		$recordModel = $this->getRecord();
		$moduleName = $recordModel->getmoduleName();
		// 2020-09-11 Pyae Phyo Mon PDF Permission by approve Ver 1.0 add Start 
		$approve = $recordModel->get('approve');
		// 2020-09-11 Pyae Phyo Mon PDF Permission by approve Ver 1.0 add End 
		if(Users_Privileges_Model::isPermitted($moduleName, 'DetailView', $recordModel->getId())) {		
			// 2020-09-11 Pyae Phyo Mon PDF Permission by approve Ver 1.0 add Start 
			if($moduleName='PurchaseOrder')
			{
				if($approve)
				{
					$detailViewLinks = array(
					'linklabel' => vtranslate('LBL_EXPORT_TO_PDF', $moduleName),
					'linkurl' => $recordModel->getExportPDFURL(),
					'linkicon' => ''
						);
					$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLinks);

					$sendEmailLink = array(
		                'linklabel' => vtranslate('LBL_SEND_MAIL_PDF', $moduleName),
		                'linkurl' => 'javascript:Inventory_Detail_Js.sendEmailPDFClickHandler(\''.$recordModel->getSendEmailPDFUrl().'\')',
		                'linkicon' => ''
		            );

		            $linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($sendEmailLink);
				}
			}	
			// 2020-09-11 Pyae Phyo Mon PDF Permission by approve Ver 1.0 add End 
			else {
				$detailViewLinks = array(
					'linklabel' => vtranslate('LBL_EXPORT_TO_PDF', $moduleName),
					'linkurl' => $recordModel->getExportPDFURL(),
					'linkicon' => ''
						);
				$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLinks);

				$sendEmailLink = array(
	                'linklabel' => vtranslate('LBL_SEND_MAIL_PDF', $moduleName),
	                'linkurl' => 'javascript:Inventory_Detail_Js.sendEmailPDFClickHandler(\''.$recordModel->getSendEmailPDFUrl().'\')',
	                'linkicon' => ''
	            );

	            $linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($sendEmailLink);

			}
			
		}

		return $linkModelList;
	}

}
