<!-- 2020/11/01 Thet Phyo Wai Add RES in Purchase Order MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Purchase Order Module Add Field");

$module_name = 'PurchaseOrder';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_PO_INFORMATION', $module);

/* Lead Name */
$field = new Vtiger_Field();
$field->name = 'ref';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->typeofdata = 'V~O';
$field->label = "LBL_REF";
$blockInstance->addField($field);
echo "\n";

$log->debug("[END] Purchase Order Module Add Field");
?>
<!-- 2020/11/01 Thet Phyo Wai Add RES in Purchase Order MSCRM Ver 1.0 End-->