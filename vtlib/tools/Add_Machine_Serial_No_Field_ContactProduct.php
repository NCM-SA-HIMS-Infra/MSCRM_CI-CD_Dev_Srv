<?php

// 2020-10-05 Myo Min Kyaw Update Machnie Serial No in Customer Product Link CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'ContactProduct';

$log->debug("[START] Update Machnie Serial No in Customer Product Link");

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);


$field = new Vtiger_Field();
$field->name = 'machine_serial_no';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(225)';
$field->uitype = 1;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_MACHINE_SERIAL_NO';
$blockInstance->addField($field);

echo "End of Add New Field";

// 2020-10-05 Myo Min Kyaw Update Machnie Serial No in Customer Product Link CRM Ver 1.0 add end