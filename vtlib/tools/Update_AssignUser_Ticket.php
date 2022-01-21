<!-- 2020/10/20 Thet Phyo Wai Update Assign User Ticket MSCRM Ver 1.0 Start-->
<?php

//$Vtiger_Utils_Log = true;
//$log->debug("[START] Update Assign User Ticket");

include_once ('vtlib/Vtiger/Module.php');

$module_name = 'HelpDesk';
$module = Vtiger_Module::getInstance ( $module_name );

$field_delete = array('assigned_user');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance ( $field_detail, $module );

	if ($fieldInstance) {

		$fieldInstance->delete (); echo "\n";

	} else {

		echo "Field Not found $field_detail.\n";

	}
}

$blockInstance = Vtiger_Block::getInstance('LBL_TICKET_INFORMATION', $module);
/* Assigned User */
$field = new Vtiger_Field();
$field->name = 'assigned_user';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(36)';
$field->uitype = 53;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ASSIGNED_USER';
$blockInstance->addField($field);
$field->setRelatedModules(Array('Users'));
echo "\n";

//$log->debug("[END] Update Assign User Ticket");
?>
<!-- 2020/10/20 Thet Phyo Wai Update Assign User Ticket MSCRM Ver 1.0 End-->
