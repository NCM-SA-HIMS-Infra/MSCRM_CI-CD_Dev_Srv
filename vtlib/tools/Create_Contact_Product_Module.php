<?php
// 2020-09-07 Myo Min Kyaw  Create new Contact Product Module CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Create Module");

/* モジュールの作成 */
$module_name = 'ContactProduct';
$table_name = 'vtiger_contactproduct';
$main_name = "ContactProduct";
$main_id = "contactproduct_id";


$db->query('DROP TABLE IF EXISTS '.$table_name);

$module = new Vtiger_Module();
$module->name = $module_name;
$module->parent = "Support";
$module->save();
$module->initTables($table_name, $main_id);


$blockInstance = new Vtiger_Block();
$blockInstance->label = 'LBL_CONTACT_PRODUCT';
$module->addBlock($blockInstance);


/*ContactProduct Id*/
$field = new Vtiger_Field();
$field->name = 'contactproduct_no';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 4;
$field->summaryfield = 1;
$field->typeofdata = 'V~O';
$field->label = "LBL_CONTACT_PRODUCT_NO";
$blockInstance->addField($field);
$module->setEntityIdentifier($field);

$db->query("INSERT INTO vtiger_modentity_num(num_id, semodule, prefix, start_id, cur_id, active)
SELECT max(num_id) + 1, 'ContactProduct', '', 1, 1, 1 FROM vtiger_modentity_num LIMIT 1");


/*Organization Name*/
$field = new Vtiger_Field();
$field->name = 'organization_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'V~O';
$field->label = "LBL_ORGANIZATION_NAME";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Accounts'));


/*Customer Active*/
$field = new Vtiger_Field();
$field->name = 'customer_active';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(3)';
$field->uitype = 56;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 0;
$field->summaryfield = 1;
$field->label = 'LBL_CUSTOMER_ACTIVE';
$blockInstance->addField($field);


/*Contact Name*/
$field = new Vtiger_Field();
$field->name = 'contact_id';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~M';
$field->label = "LBL_CONTACT_ID";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Contacts'));


/*Machine Serial no*/
$field = new Vtiger_Field();
$field->name = 'machine_serial_no';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->summaryfield = 1;
$field->typeofdata = 'I~M';
$field->label = "LBL_MACHINE_SERIAL_NO";
$blockInstance->addField($field);


/*Product Model*/
$field = new Vtiger_Field();
$field->name = 'product_model';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->summaryfield = 1;
$field->typeofdata = 'V~O~LE~100';
$field->label = "LBL_PRODUCT_MODEL";
$blockInstance->addField($field);


/*Software Version*/
$field = new Vtiger_Field();
$field->name = 'software_version';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->summaryfield = 1;
$field->typeofdata = 'V~O~LE~100';
$field->label = "LBL_SOFTWARE_VERSION";
$blockInstance->addField($field);


/*Product Name*/
$field= new Vtiger_Field();
$field->name = 'product_name';
$field->tabdle = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~M';
$field->label = "LBL_PRODUCT_NAME";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Products'));


/*Lot Id*/
$field = new Vtiger_Field();
$field->name = 'lot_id';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(10)';
$field->uitype =7;
$field->summaryfield = 1;
$field->typeofdata = 'NN~M~10,0';
$field->label = "LBL_LOT_ID";
$blockInstance->addField($field);


/*Contract Date*/
$field = new Vtiger_Field();
$field->name = 'contract_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 23;
$field->summaryfield = 1;
$field->typeofdata = 'D~M';
$field->label = "LBL_CONTACT_DATE";
$blockInstance->addField($field);


/*Contract Price*/
$field = new Vtiger_Field();
$field->name = 'contract_price';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'decimal(25,2) ';
$field->uitype = 71;
$field->summaryfield = 1;
$field->typeofdata = 'N~M~10,0';
$field->label = "LBL_CONTACT_PRICE";
$blockInstance->addField($field);


/*Installation Date*/
$field = new Vtiger_Field();
$field->name = 'installation_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 23;
$field->summaryfield = 1;
$field->typeofdata = 'D~M';
$field->label = "LBL_INSTALLATION_DATE";
$blockInstance->addField($field);



/*Start Use Date */
$field = new Vtiger_Field();
$field->name = 'start_use_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->summaryfield = 1;
$field->typeofdata = 'D~M';
$field->label = "LBL_START_USE_DATE";
$blockInstance->addField($field);


//New Contact Product Information
$blockInstance = new Vtiger_Block();
$blockInstance->label = 'Description Details';
$module->addBlock($blockInstance);


/*Description */
$field = new Vtiger_Field();
$field->name = 'description';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 19;
$field->summaryfield = 1;
$field->typeofdata = 'V~O';
$field->label = "LBL_DESCRIPTION";
$blockInstance->addField($field);




$sql = "ALTER TABLE $table_name ADD PRIMARY KEY (`$main_id`)";
$adb->query($sql);
$sql = "ALTER TABLE ${table_name}cf ADD PRIMARY KEY(`$main_id`)";
$adb->query($sql);


$module->initWebservice();
$module->setDefaultSharing('Public_ReadWriteDelete');


//ModTrackerに追跡
ModTracker::enableTrackingForModule($module->id);

$filter = new Vtiger_Filter();
$filter->deleteForModule($module);

$filter = new Vtiger_Filter();
$filter->name = 'All';
$filter->isdefault = true;
$filter->save($module);


$filter_columns = array(
'organization_name',
'contact_id',
'product_name',
'machine_serial_no',
'customer_active'
 );


$field_list = array();
foreach($filter_columns as $columnname) {
        $field_list[] = Vtiger_Field::getInstance($columnname, $module);
}

$cnt = 0;
foreach($field_list as $index => $column){
		$filter->addField($column, $cnt);
		$cnt++;
}



// To appear Menu
// Get tabid from vtiger_tab table
$RelatedQuery = "SELECT tabid FROM vtiger_tab WHERE name = ?";
$Result = $db->pquery($RelatedQuery, array($module_name));
$tabId = $db->query_result($Result,0, 'tabid');
$db->pquery("DELETE FROM vtiger_app2tab WHERE tabid = ?",array($tabId));
$db->pquery("INSERT INTO vtiger_app2tab (tabid,appname,sequence,visible) VALUES(?,?,?,?)", array($tabId, "SUPPORT", 12, 1));


$log->debug("[END] Create Module");

echo "End of the Module";

// 2020-09-07 Myo Min Kyaw  Create new Contact Product Module CRM Ver 1.0 add end