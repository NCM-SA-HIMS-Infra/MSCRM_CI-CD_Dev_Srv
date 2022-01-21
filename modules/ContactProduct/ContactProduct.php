<?php

// 2020-09-04 Myo Min Kyaw  Create new Contact Product Module CRM Ver 1.0 add start

/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class ContactProduct extends CRMEntity {
	var $db, $log; // Used in class functions of CRMEntity

	var $table_name = 'vtiger_contactproduct';
	var $table_index= 'contactproduct_id';

	var $customFieldTable = Array('vtiger_contactproductcf','contactproduct_id');

	var $tab_name = Array('vtiger_crmentity','vtiger_contactproduct','vtiger_contactproductcf');


	var $tab_name_index = Array(
			'vtiger_crmentity'=>'crmid',
			'vtiger_contactproduct'=>'contactproduct_id',
			'vtiger_contactproductcf'=>'contactproduct_id'
		);

	var $list_fields = Array (
		'Organization Name'=>Array('vtiger_contactproduct'=>'organization_name'),
		'Contact Id'=>Array('vtiger_contactproduct'=>'contact_id'),
		'Product Name'=>Array('vtiger_contactproduct'=>'product_name'),
		'Machine Serial No'=>Array('vtiger_contactproduct'=>'machine_serial_no'),
		'Customer Active'=>Array('vtiger_contactproduct'=>'customer_active')
	);


	var $list_fields_name = Array (
		'Organization Name'=>'organization_name',
		'Contact Id'=>'contact_id',
		'Product Name'=>'product_name',
		'Machine Serial No'=>'machine_serial_no',
		'Customer Active'=>'customer_active'
	);

	var $list_link_field= 'organization_name';

	var $def_basicsearch_col = 'organization_name';

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'organization_name';
	var $default_sort_order = 'ASC';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('organization_name', 'assigned_user_id');
	 // Josh added for importing and exporting -added in patch2
	// var $unit_price;


	function __construct() {
		global $log;
		$this->column_fields = getColumnFields(get_class($this));
		$this->db = PearDatabase::getInstance();
		$this->log = $log;
	}

	function save_module($module) {

	}



}

// 2020-09-07 Myo Min Kyaw  Create new Contact Product Module CRM Ver 1.0 add end