<?php

// 2020-10-05 Myo Min Kyaw Add New Field in Customer Product Link CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'ContactProduct';

$log->debug("[START] Add Positions Field in Contact Product");

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);


$field = new Vtiger_Field();
$field->name = 'customer_active';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 15;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_CUSTOMER_ACTIVE';
$array = array("Yes", "No");
$field->setPicklistValues($array);
$blockInstance->addField($field);





echo "End of Add New Field";

// 2020-10-05 Myo Min Kyaw Add New Field in Customer Product Link CRM Ver 1.0 add end