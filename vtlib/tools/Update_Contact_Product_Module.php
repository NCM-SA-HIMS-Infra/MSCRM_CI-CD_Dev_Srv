<?php
// 2020-10-30 Su Latt  Update field Contact Product Module CRM Ver 1.0 add start

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


$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);

/* created time */
$field = new Vtiger_Field();
$field->name = 'createdtime';
$field->table = 'vtiger_crmentity';
$field->column = $field->name;
$field->columntype = 'createdtime';
$field->uitype = 70;
$field->typeofdata = 'DT~O';
$field->masseditable = 0;
$field->quickcreate = 3;
$field->summaryfield = 0;
$field->displaytype = 2;
$field->label = 'Created Time';
$blockInstance->addField($field);

/* modified time */
$field = new Vtiger_Field();
$field->name = 'modifiedtime';
$field->table = 'vtiger_crmentity';
$field->column = $field->name;
$field->columntype = 'modifiedtime';
$field->uitype = 70;
$field->typeofdata = 'DT~O';
$field->masseditable = 0;
$field->quickcreate = 3;
$field->summaryfield = 0;
$field->displaytype = 2;
$field->label = 'Modified Time';
$blockInstance->addField($field);

// 2020-10-30 Su Latt  Update field Contact Product Module CRM Ver 1.0 add start