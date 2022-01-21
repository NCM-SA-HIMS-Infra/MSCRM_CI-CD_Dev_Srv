<?php

$Vtiger_Utils_Log = true;

include_once ('vtlib/Vtiger/Module.php');

$module_name = 'HelpDesk';
$module = Vtiger_Module::getInstance ( $module_name );

$field_delete = array('trauble_categories');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance ( $field_detail, $module );

	if ($fieldInstance) {

		$fieldInstance->delete (); echo "\n";

	} else {

		echo "Field Not found $field_detail.\n";

	}
}

$db = PearDatabase::getInstance();
$db->query('DROP TABLE IF EXISTS vtiger_trauble_categories');
$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('vtiger_trauble_categories'));


$blockInstance = Vtiger_Block::getInstance('LBL_TICKET_INFORMATION', $module);

/* Trauble Categories */
$field = new Vtiger_Field();
$field->name = 'trauble_categories';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 33;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_TRAUBLE_CATEGORIES';
$array = array("Electronic","Hydraulic","Access Disconnection Alerm","Monitor Broken","No Display Appear On Unit","Disconnect USB Cable","Batteries are Worn");
$field->setPicklistValues( $array );
$blockInstance->addField($field);
echo "\n";

?>