<!-- 2020/11/24 Pyae Phyo Mon Add TransfertoWD Filed in Product HIMS Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Product Module");

$module_name = 'Products';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $module);

/* transfer to WD */
$field = new Vtiger_Field();
$field->name = 'transfer_to_wd';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(3)';
$field->uitype = 56;
$field->typeofdata = 'C~O';
$field->masseditable = 0;
$field->quickcreate = 0;
$field->summaryfield = 0;
$field->label = 'LBL_TRANSFER_TO_WD';
$blockInstance->addField($field);

$log->debug("[END] Update Module");
?>

<!-- 2020/11/24 Pyae Phyo Mon Add TransfertoWD Filed in Product HIMS Ver 1.0 End-->