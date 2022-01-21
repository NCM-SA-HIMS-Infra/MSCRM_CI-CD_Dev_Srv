<!-- 2020/10/19 Thet Phyo Wai Add Currency Contact Product Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $adb, $log;

$log->debug("[START] Add Currency Contact Product");

$module_name = 'ContactProduct';
$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_PRODUCT', $module);

/* Currency */
$field = new Vtiger_Field();
$field->name = 'currency';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 117;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_CURRENCY";
$blockInstance->addField($field);
echo "\n";

$log->debug("[END] Add Currency Contact Product");
?>
<!-- 2020/10/19 Thet Phyo Wai Add Currency Contact Product Ver 1.0 Start-->