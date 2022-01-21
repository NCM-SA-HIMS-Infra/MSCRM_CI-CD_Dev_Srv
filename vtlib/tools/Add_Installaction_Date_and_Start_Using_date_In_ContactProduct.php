<?php

// 2020-10-05 Myo Min Kyaw Update Installation data in Customer Product Link CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;
$module_name = 'ContactProduct';

$log->debug("[START]  Update Installation data in Customer Product Link");

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);



/*Installation Date*/
$field = new Vtiger_Field();
$field->name = 'startdate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->summaryfield = 1;
$field->typeofdata = 'D~M';
$field->label = "LBL_INSTALLATION_DATE";
$blockInstance->addField($field);



/*Start Use Date */
$field = new Vtiger_Field();
$field->name = 'enddate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->summaryfield = 1;
$field->typeofdata = 'D~M~OTH~GE~startdate';
$field->label = "LBL_START_USE_DATE";
$blockInstance->addField($field);




echo "End of Add New Field";

// 2020-10-05 Myo Min Kyaw Update Installation data in Customer Product Link CRM Ver 1.0 add end
