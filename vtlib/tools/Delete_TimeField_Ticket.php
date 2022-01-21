<!-- 2020-09-22 Thet Phyo Wai Add Fields Invoice Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;

include_once ('vtlib/Vtiger/Module.php');

$module_name = 'HelpDesk';
$moduleInstance = Vtiger_Module::getInstance ( $module_name );

$field_delete = array('time_start','time_end');

foreach($field_delete as $field_detail) {
	$fieldInstance = Vtiger_Field::getInstance ( $field_detail, $moduleInstance );

	if ($fieldInstance) {

		$fieldInstance->delete (); echo "\n";

	} else {

		echo "Field Not found $field_detail.\n";

	}
}

?>
<!-- 2020-09-22 Thet Phyo Wai Add Fields Invoice Ver 1.0 End-->