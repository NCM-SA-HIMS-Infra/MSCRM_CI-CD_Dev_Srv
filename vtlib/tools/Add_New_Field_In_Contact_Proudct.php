<?php

// 2020-09-14 Myo Min Kyaw Add New Field in Contact mscrm Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'ContactProduct';

$log->debug("[START] Add Positions Field in Inventory Modules");



$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);


/*location*/
$field = new Vtiger_Field();
$field->name = 'location';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 19;
$field->summaryfield = 1;
$field->typeofdata = 'V~O';
$field->label = "LBL_LOCATION";
$blockInstance->addField($field);






echo "End of Add New Field";


// 2020-09-14 Myo Min Kyaw Add New Field in Contact mscrm Ver 1.0 add end