<?php

$Vtiger_Utils_Log = true;
// include_once('../vtlib/Vtiger/Menu.php');
// include_once('../vtlib/Vtiger/Module.php');
// include_once('../modules/PickList/DependentPickListUtils.php');
// include_once('../modules/ModTracker/ModTracker.php');
// include_once('../include/utils/CommonUtils.php');

chdir(dirname(__FILE__) . '/../..');
include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Package.php';
include_once 'includes/main/WebUI.php';

include_once 'include/Webservices/Utils.php';

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] vtiger_currencies - value MMK add");

$db->pquery("INSERT INTO `vtiger_currencies`(`currencyid`, `currency_name`, `currency_code`, `currency_symbol`) VALUES ('', 'Myanmar, MMK', 'MMK', 'MMK');");

$log->debug("[END] vtiger_currencies - value MMK added");
