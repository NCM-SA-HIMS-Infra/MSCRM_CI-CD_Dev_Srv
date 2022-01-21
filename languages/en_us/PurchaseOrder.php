<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
$languageStrings = array(
    'PurchaseOrder' => 'Purchase Orders',
	//DetailView Actions
	'SINGLE_PurchaseOrder' => 'Purchase Order',
	'LBL_EXPORT_TO_PDF' => 'Export to PDF',
    'LBL_SEND_MAIL_PDF' => 'Send Email with PDF',

	//Basic strings
	'LBL_ADD_RECORD' => 'Add Purchase Order',
	'LBL_RECORDS_LIST' => 'Purchase Order List',
	'LBL_COPY_SHIPPING_ADDRESS' => 'Copy Shipping Address',
	'LBL_COPY_BILLING_ADDRESS' => 'Copy Billing Address',

	// Blocks
	'LBL_PO_INFORMATION' => 'Purchase Order Details',
	// 2020-09-11 Pyae Phyo Mon Vendor field label MSCRM Ver 1.0 add start 
	'LBL_VENDOR_INFORMATION' => 'Vendor Information',
	'LBL_PRINT_INFORMATION' => 'Created By',
	// 2020-09-11 Pyae Phyo Mon Vendor field label MSCRM Ver 1.0 add End 

	//Field Labels
	'PurchaseOrder No' => 'Purchase Order Number',
	'Requisition No' => 'Requisition Number',
	'Tracking Number' => 'Tracking Number',
	'Sales Commission' => 'Sales Commission',
    'LBL_PAID' => 'Paid',
    'LBL_BALANCE' => 'Balance',
	// 2020-09-11 Pyae Phyo Mon Purchase Order field label MSCRM Ver 1.0 add Start 
    'LBL_ORDER_DATE' => 'Order Date',
    'LBL_ORDER_ISSUE_PERSON' => 'Order Issue Person',
    'LBL_SHIPMENT' => 'Shipment',
    'LBL_LOADING_PORT' => 'Loading Port',
    'LBL_APPROVE' => 'Approve',
	'LBL_ATTENTION_NAME' => 'Attention Name',
	'LBL_POSITION' => 'Position',
	'LBL_VENDOR_PHONE_NO' => 'Phone No',
	'LBL_VENDOR_EMAIL' => 'Email',
	'LBL_ADDRESS' => 'Address',
	'LBL_ESTIMATE_ARRIVAL_DATE' => 'Estimate Arrival Date',
	'LBL_VENDOR_INCOTERMS' => 'Incoterms',
	'LBL_PAYMENT_TERM' => 'Payment Term',
	'LBL_PRINT_NAME' => 'Name',
	'LBL_PRINT_POSITION' => 'Position',
	'LBL_PRINT_COMPANY_NAME' => 'Company Name',
	'LBL_PLACE_PORT_OF_DISCHARGE' => 'Place/Port of Discharge', 
	//2020-10-26 Myo Min Kyaw change the name due date to arrival date mscrm ver 1.0 start
	'Due Date' => "Arrival Date",
	//2020-10-26 Myo Min Kyaw change the name due date to arrival date mscrm ver 1.0 end
	// 2020-10-26 Myo Min Kyaw add new remark file in purchase order mscrm ver 1.0 start
	/*2020-11-19 Pyae Phyo Mon Change Remark to Remarks MSCRM ver 1.0 start*/
	//'LBL_REMARK' => 'Remark',
	'LBL_REMARK' => 'Remarks',
	/*2020-11-19 Pyae Phyo Mon Change Remark to Remarks MSCRM ver 1.0 End*/
	// 2020-10-26 Myo Min Kyaw add new remark file in purchase order mscrm ver 1.0 end

	// 2020-09-11 Pyae Phyo Mon Purchase Order field label MSCRM Ver 1.0 add End 
	// 2020/10/19 Pyae Phyo Mon add Column Delivery Place  MSCRM Ver 1.0 Start 
	'LBL_DELIVERY_PLACE' => 'Delivery Place', 
	// 2020/10/19 Pyae Phyo Mon add Column Delivery Place  MSCRM Ver 1.0 Start
	//Added for existing Picklist Entries

	'Received Shipment'=>'Received Shipment',
	
	//Translation for product not found
	'LBL_THIS' => 'This',
	'LBL_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_OR_REPLACE_THIS_ITEM' => 'is deleted from the system.please remove or replace this item',
	'LBL_THIS_LINE_ITEM_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_THIS_LINE_ITEM' => 'This line item is deleted from the system,please remove this line items',
        'LBL_LIST_PRICE'               => 'List Price',
        'List Price'                   => 'List Price',
    
    'LBL_COPY_COMPANY_ADDRESS' => 'Copy Company Address',
    'LBL_COPY_ACCOUNT_ADDRESS' => 'Copy Organization Address',
	'LBL_SELECT_ADDRESS_OPTION' => 'Select Address to copy',
	'LBL_BILLING_ADDRESS' => 'Billing Address',
	'LBL_COMPANY_ADDRESS' => 'Company Address',
	'LBL_ACCOUNT_ADDRESS' => 'Organization Address',
	'LBL_VENDOR_ADDRESS' => 'Vendor Address',
	'LBL_CONTACT_ADDRESS' => 'Contact Address',
	/*2020-11-01 Thet Phyo Wai Add RES Field MSCRM Ver 1.0 Start*/
	'LBL_REF' => 'Reference',
	/*2020-11-01 Thet Phyo Wai Add RES Field MSCRM Ver 1.0 End*/
);

$jsLanguageStrings = array(
	'JS_PLEASE_REMOVE_LINE_ITEM_THAT_IS_DELETED' => 'Please remove line item that is deleted',
    'JS_ORGANIZATION_NOT_FOUND'=> 'Organization empty!',
    'JS_ORGANIZATION_NOT_FOUND_MESSAGE'=> 'Please select an organization before you copy address',
	'JS_ACCOUNT_NOT_FOUND' => 'Organization empty!',
	'JS_ACCOUNT_NOT_FOUND_MESSAGE' =>  'Please select an organization before you copy address',
	'JS_VENDOR_NOT_FOUND' => 'Vendor Empty', 
	'JS_VENDOR_NOT_FOUND_MESSAGE' => 'Please select an vendor before you copy address',
	'JS_CONTACT_NOT_FOUND' => 'Contact Empty', 
	'JS_CONTACT_NOT_FOUND_MESSAGE' =>  'Please select an contact before you copy address',
);
