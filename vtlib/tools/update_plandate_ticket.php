<!--2020-09-21 Thet Phyo Wai Ticket Status Value Update MSCRM Var 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');


global $adb, $log;

$log->debug("[START] Ticket Status Value Update");

$module_name = 'HelpDesk';
$module = Vtiger_Module::getInstance($module_name);

$field_delete = array('plan_start_date','plan_end_date');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance ( $field_detail, $module );

	if ($fieldInstance) {

		$fieldInstance->delete (); echo "\n";

	} else {

		echo "Field Not found $field_detail.\n";

	}
}

$blockInstance = Vtiger_Block::getInstance('LBL_TICKET_INFORMATION', $module);

/* Plan Start Date  */
$field = new Vtiger_Field();
$field->name = 'startdate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->typeofdata = 'D~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLAN_START_DATE';
$blockInstance->addField($field);
echo "\n";

/* Plan End Date  */
$field = new Vtiger_Field();
$field->name = 'enddate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->typeofdata = 'D~M~OTH~GE~startdate';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLAN_END_DATE';
$blockInstance->addField($field);
echo "\n";

$log->debug("[END] Ticket Status Value Update");
?>
<!--2020-09-21 Thet Phyo Wai Ticket Status Value Update MSCRM Var 1.0 End-->
