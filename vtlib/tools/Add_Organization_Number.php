<!-- 2020/09/21 Thet Phyo Wai Add Organization Numer Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $adb, $log;

$log->debug("[START] Add Organization Numer");

$module_name = 'Accounts';
$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_ACCOUNT_INFORMATION', $module);

/* Organization Number  */
$field = new Vtiger_Field();
$field->name = 'account_number';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 2;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 3;
$field->summaryfield = 0;
$field->label = 'LBL_ACCOUNT_NUMBER';
$blockInstance->addField($field);
echo "\n";

$log->debug("[END] Add Organization Numer");
?>
<!-- 2020/09/21 Thet Phyo Wai Add Organization Numer Ver 1.0 End-->