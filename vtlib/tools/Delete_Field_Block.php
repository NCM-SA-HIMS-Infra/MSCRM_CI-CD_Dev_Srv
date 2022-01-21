<?php

$Vtiger_Utils_Log = true;

include_once ('vtlib/Vtiger/Module.php');

$module_name = 'Invoice';
$moduleInstance = Vtiger_Module::getInstance ( $module_name );

$field_delete = array('ticketid','product_id','machine_serial_no','account_number');

//$field_delete = array('LBL_TICKET_SIGNATURES');
//$field_delete = array('account_number');

foreach($field_delete as $field_detail) {
	//$fieldInstance = Vtiger_Block::getInstance ( $field_detail, $moduleInstance );
	$fieldInstance = Vtiger_Field::getInstance ( $field_detail, $moduleInstance );

	if ($fieldInstance) {

		$fieldInstance->delete (); echo "\n";

	} else {

		echo "Field Not found $field_detail.\n";

	}
}

?>