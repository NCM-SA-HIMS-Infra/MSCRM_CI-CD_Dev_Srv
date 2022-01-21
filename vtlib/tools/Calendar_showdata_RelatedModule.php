<!--2020-10-15 Su Latt Calendar show data related Inventory module MSCRM var 1.0 Add Start-->
<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Calendar_showdata_RelatedModule");

$db->pquery("INSERT INTO `vtiger_ws_referencetype`(`fieldtypeid`, `type`) VALUES (34,'Invoice')");
$db->pquery("INSERT INTO `vtiger_ws_referencetype`(`fieldtypeid`, `type`) VALUES (34,'SalesOrder')");
$db->pquery("INSERT INTO `vtiger_ws_referencetype`(`fieldtypeid`, `type`) VALUES (34,'PurchaseOrder')");
$db->pquery("INSERT INTO `vtiger_ws_referencetype`(`fieldtypeid`, `type`) VALUES (34,'Quotes')");
$db->pquery("UPDATE `vtiger_relatedlists` SET `relationfieldid` = '238', `relationtype` = '1:N' WHERE `vtiger_relatedlists`.`relation_id` = 77");

$db->pquery("UPDATE `vtiger_relatedlists` SET `relationfieldid` = '238', `relationtype` = '1:N' WHERE `vtiger_relatedlists`.`relation_id` = 72");

$db->pquery("UPDATE `vtiger_relatedlists` SET `relationfieldid` = '238', `relationtype` = '1:N' WHERE `vtiger_relatedlists`.`relation_id` = 68");

$db->pquery("UPDATE `vtiger_relatedlists` SET `relationfieldid` = '238', `relationtype` = '1:N' WHERE `vtiger_relatedlists`.`relation_id` = 64");

$log->debug("[END] Calendar_showdata_RelatedModule");
?>

<!--2020-10-15 Su Latt Calendar show data related Inventory module MSCRM var 1.0 Add End-->