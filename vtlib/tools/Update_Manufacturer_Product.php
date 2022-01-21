<!--2020-10-20 Thet Phyo Wai Update Manufacturer of Porduct MSCRM Ver 1.0 start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $adb, $log;

$log->debug("[START] Update Manufacturer of Product");

$module_name = 'Products';

$module = Vtiger_Module::getInstance ( $module_name );

$field_delete = 'manufacturer';

$fieldInstance = Vtiger_Field::getInstance ( $field_delete, $module );

if ($fieldInstance) {
	$fieldInstance->delete (); echo "\n";
} else {
	echo "Field Not found $field_detail.\n";
}

$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $module);

/* Manufacturer */
$field = new Vtiger_Field();
$field->name = 'manufacturer';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 33;
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->typeofdata = 'I~O';
$field->label = "Manufacturer";
$array = array("Japan","Thailand","Indonesia","South Korea","China","Vietnam");
$field->setPicklistValues( $array );
$blockInstance->addField($field);
echo "\n";

$log->debug("[START] Update Manufacturer of Product");
?>
<!--2020-10-20 Thet Phyo Wai Update Manufacturer of Porduct MSCRM Ver 1.0 End-->