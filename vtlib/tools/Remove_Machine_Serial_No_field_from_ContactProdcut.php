<?php

// 2020-10-05 Myo Min Kyaw Remove Machine serical Field from customer product link CRM Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();
$moduleInstance = new Vtiger_Module();

$moduleInstance = Vtiger_Module::getInstance('ContactProduct');

$field_delete = array('machine_serial_no');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance($field_detail, $moduleInstance);

	if ($fieldInstance) {
		$fieldInstance->delete(); echo "\nDeleted field.";
	} else {

		echo "\nField Not found.";

	}
	echo "\n";
}
echo "\n";
echo "End";

// 2020-10-05 Myo Min Kyaw Remove Machine serical Field from customer product link CRM Ver 1.0 add start

?>