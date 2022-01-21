<?php

// 2020-09-14 Myo Min Kyaw Add New Field in Products Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'Contacts';

$log->debug("[START] Add Positions Field in Inventory Modules");



$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_INFORMATION', $module);


$field = new Vtiger_Field();
$field->name = 'contact_number';
$field->table = $module->basetable;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = "LBL_CONTACT_NUMBER";
$blockInstance ->addField($field);





echo "End of Add New Field";


// 2020-09-14 Myo Min Kyaw Add New Field in Products CRM Ver 1.0 add start