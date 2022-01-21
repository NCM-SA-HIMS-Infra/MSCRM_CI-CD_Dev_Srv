<!-- 2020/10/19 Pyae Phyo Mon add Column Delivery Place  MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$log->debug("[START] Add delivery_place in PurchaseOrder");

$module_name = 'PurchaseOrder';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_PO_INFORMATION', $module);

/* Delivery Place */
$field = new Vtiger_Field();
$field->name = 'delivery_place';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(200)';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_DELIVERY_PLACE';
$blockInstance->addField($field);

echo "End of Add New Field";
?>
<!-- 2020/10/19 Pyae Phyo Mon add Column Delivery Place  MSCRM Ver 1.0 End-->