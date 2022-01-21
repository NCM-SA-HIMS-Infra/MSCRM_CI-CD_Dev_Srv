<!-- 2020-09-22 Thet Phyo Wai Add Fields Invoice Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $adb, $log;

$log->debug("[START] Invoice Module Add Fields");

$module_name = 'Invoice';
$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_INVOICE_INFORMATION', $module);

/*Ticket Number*/
$field = new Vtiger_Field();
$field->name = 'ticket_number';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 2;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 3;
$field->summaryfield = 0;
$field->label = 'LBL_TICKET_NUMBER';
$blockInstance->addField($field);
echo "\n";

/*Product Name*/
$field = new Vtiger_Field();
$field->name = 'product_id';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_PRODUCT_NAME";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Products'));

/* Machine Serial No. */
$field = new Vtiger_Field();
$field->name = 'machine_serial_no';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_MACHINE_SERIAL_NO";
$blockInstance->addField($field);
$field->setRelatedModules(Array('ContactProduct'));
echo "\n";

$log->debug("[END] Invoice Module Add Fields");
?>
<!-- 2020-09-22 Thet Phyo Wai Add Fields Invoice Ver 1.0 Start-->
