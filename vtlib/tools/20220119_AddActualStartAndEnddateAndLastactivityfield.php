<!-- 2021/07/01 Myo Min Kyaw Add new field at ticket MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $adb, $log;

$log->debug("[START] Add Actual Start date, Actual End date and last activity");

$module_name = 'HelpDesk';
$module = Vtiger_Module::getInstance($module_name);

$field_delete = array('actual_start_date', 'actual_end_date', 'last_activity');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance($field_detail, $module);

	if ($fieldInstance) {
		$fieldInstance->delete(); echo "\nDeleted field.";
	} else {

		echo "\nField Not found.";

	}
	echo "\n";
}
echo "\n";
echo "End";

$blockInstance = Vtiger_Block::getInstance('LBL_TICKET_INFORMATION', $module);

/* Actual Start Date */
$field = new Vtiger_Field();
$field->name = 'actual_start_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 23;
$field->summaryfield = 1;
$field->typeofdata = 'D~O';
$field->label = "LBL_ACTUAL_START_DATE";
$blockInstance->addField($field);

/* Actual END Date */
$field = new Vtiger_Field();
$field->name = 'actual_end_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 23;
$field->summaryfield = 1;
$field->typeofdata = 'D~O';
$field->label = "LBL_ACTUAL_END_DATE";
$blockInstance->addField($field);


/* Actual END Date */
$field = new Vtiger_Field();
$field->name = 'last_activity';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 23;
$field->summaryfield = 1;
$field->typeofdata = 'D~O';
$field->label = "LBL_LASTACTIVITY_DATE";
$blockInstance->addField($field);

echo "\n";

$log->debug("[END] dd Actual Start date, Actual End date and last activity");
?>
<!-- 2021/07/01 Myo Min Kyaw Add new field at ticket MSCRM Ver 1.0 end-->