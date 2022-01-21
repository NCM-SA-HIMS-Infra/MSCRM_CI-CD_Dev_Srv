<!-- 2020-12-14 Thet Phyo Wai Add Other Assigned User in Ticket MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$log->debug("[START] Add Other Assigned User in Ticket");

$module_name = 'HelpDesk';

$module = Vtiger_Module::getInstance($module_name);

$field_delete = array('other_assigned_user');

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
/* Other Assigned User */
$field = new Vtiger_Field();
$field->name = 'other_assigned_user';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(255)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 2;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_OTHER_ASSIGNED_USER';
$field->sequence = 30;
$blockInstance->addField($field);
echo "\n";

$log->debug("[END] Add Other Assigned User in Ticket");
?>
<!-- 2020-12-14 Thet Phyo Wai Add Other Assigned User in Ticket MSCRM End-->