<!--2020-11-17 Thet Phyo Wai Change Singapore Dollar Symbol MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

chdir(dirname(__FILE__) . '/../..');
include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Package.php';
include_once 'includes/main/WebUI.php';
include_once 'include/Webservices/Utils.php';

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Change Singapore Dollar Symbol");

$db->pquery("UPDATE `vtiger_currencies` SET `currency_symbol` = 'S$' WHERE currency_name = 'Singapore, Dollars' AND currency_code = 'SGD'");

$db->pquery("UPDATE `vtiger_currency_info` SET `currency_symbol` = 'S$' WHERE currency_name = 'Singapore, Dollars' AND currency_code = 'SGD'");

$log->debug("[END] Change Singapore Dollar Symbol");

?>
<!--2020-11-17 Thet Phyo Wai Change Singapore Dollar Symbol MSCRM End-->