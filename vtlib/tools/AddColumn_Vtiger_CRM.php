<!--vtiger_crmentity Add Column  update Start-->
<?php

$Vtiger_Utils_Log = true;

chdir(dirname(__FILE__) . '/../..');
include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Package.php';
include_once 'includes/main/WebUI.php';

include_once 'include/Webservices/Utils.php';

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] vtiger_crmentity Add Column update");


// $db->pquery("ALTER TABLE `vtiger_crmentity` ADD COLUMN `IsCreate` int(19) DEFAULT 0 NOT NULL,
// 			`IsUpdate` int(19) DEFAULT 0 NOT NULL");

$db->pquery("ALTER TABLE `vtiger_crmentity` ADD `is_create` int(19) DEFAULT 0 NOT NULL");

$db->pquery("ALTER TABLE `vtiger_crmentity` ADD `is_update` int(19) DEFAULT 0 NOT NULL");

$log->debug("[END] vtiger_ticketstatus presence update");

?>
<!--vtiger_crmentity Add Column  update end-->
