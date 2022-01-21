<!-- 2020/09/29 Pyae Phyo Mon add Column in Currency for WD in Vendor MSCRM Ver 1.0 Start-->
<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$module_name = 'Vendors';

$db->query('ALTER TABLE vtiger_currency_info ADD wd_currency_id varchar(255)');

$array	  = array(
					['1','USD'],
					['2','MMK']
				);

foreach ($array as $index => $arrayvalue) {

	$db->pquery("UPDATE vtiger_currency_info SET wd_currency_id='$arrayvalue[0]' WHERE currency_code='$arrayvalue[1]'");
}

?>
<!-- 2020/09/29 Pyae Phyo Mon add Column in Currency for WD in Vendor MSCRM Ver 1.0 End-->

