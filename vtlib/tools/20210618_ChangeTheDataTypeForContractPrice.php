<!--2021-05-17 Myo Min Kyaw  Change the Data type for contract price in Customer Product link MSCRM var 1.0 Start-->
<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Change the Data type for contract price in Customer Product link");

$db->query("Alter TABLE vtiger_contactproduct MODIFY COLUMN contract_price DECIMAL (25,7)");


$log->debug("[END] Change the Data type for contract price in Customer Product link");
?>

<!--2021-05-17 Myo Min Kyaw  Change the Data type for contract price in Customer Product link MSCRM var 1.0 End-->