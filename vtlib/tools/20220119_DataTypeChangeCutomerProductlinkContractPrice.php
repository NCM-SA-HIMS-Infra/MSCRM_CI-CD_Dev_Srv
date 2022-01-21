<?php

//Remove field

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[Start] Change the Data type for Contact Price in Customer Product link");

$db->query("Alter TABLE vtiger_contactproduct MODIFY COLUMN contract_price DECIMAL (25,7)");

echo "Successed.";

$log->debug("[End] Change the Data type for Contact Price in Customer Product link");
