<?php

// 2020-10-26 Myo Min Kyaw Add New Field Remark in Products Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'Invoice';

$log->debug("[START] Add Positions Field in Inventory Modules");



$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_TERMS_INFORMATION', $module);

$field = new Vtiger_Field();
$field->name = 'remark';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 19;
$field->typeofdata = 'V~O';
$field->summaryfield = 1;
$field->label = "LBL_REMARK";
$blockInstance->addField($field);






echo "End of Add New Field";
// 2020-10-26 Myo Min Kyaw Add New Field Remark in Products Ver 1.0 add end