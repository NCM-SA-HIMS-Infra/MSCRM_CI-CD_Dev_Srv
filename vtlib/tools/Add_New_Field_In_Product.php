<?php

// 2020-09-09 Myo Min Kyaw Add New Field in Products CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'Products';

$log->debug("[START] Add Positions Field in Inventory Modules");

$db->query('DROP TABLE IF EXISTS vtiger_product_part');

$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('product_part'));

$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('product_available_status'));



$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $module);


$field = new Vtiger_Field();
$field->name = 'product_part';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(200)';
$field->uitype = 15;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PRODUCT_PART';
$array = array("Product", "Part");
$field->setPicklistValues($array);
$blockInstance->addField($field);



$field = new Vtiger_Field();
$field->name = 'product_available_status';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 15;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PRODUCT_AVAILABLE_STATUS';
$array = array("Living", "Last By", "Stock");
$field->setPicklistValues($array);
$blockInstance->addField($field);


$field = new Vtiger_Field();
$field->name = 'product_number';
$field->table = $module->basetable;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = "LBL_PRODUCT_NUMBER";
$blockInstance ->addField($field);


$blockInstance= Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $module);


$field = new Vtiger_Field();
$field->name = 'min_or_qty';
$field->table = $module->basetable;
$field->columntype = 'Int(10)';
$field->uitype = 7;
$field->typeofdata = 'NN~O~10,0';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = "LBL_MIN_OR_QTY";
$blockInstance ->addField($field);





echo "End of Add New Field";


// 2020-09-09 Myo Min Kyaw Add New Field in Products CRM Ver 1.0 add start