<!--2020-10-05 Pyae Phyo Mon Delete transfer_to_wd Field MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once ('vtlib/Vtiger/Module.php');
$moduleInstance = new Vtiger_Module ();

$module_name = 'Vendors';

$moduleInstance = Vtiger_Module::getInstance ( $module_name );

$fieldInstance = Vtiger_Field::getInstance ('transfer_to_wd', $moduleInstance );
if ($fieldInstance) {

		$fieldInstance->delete (); echo "\nDeleted field.\n";

	} else {

		echo "Field Not found.\n";

	}
?>
<!--2020-10-05 Pyae Phyo Mon Delete transfer_to_wd Field MSCRM var 1.0 Add End-->