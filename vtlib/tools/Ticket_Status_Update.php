<!--2020-09-21 Thet Phyo Wai Ticket Status Value Update MSCRM Var 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');


global $adb, $log;

$log->debug("[START] Ticket Status Value Update");

$module_name = 'HelpDesk';
$module = Vtiger_Module::getInstance($module_name);

$adb->pquery("UPDATE `vtiger_ticketstatus` SET `presence` = '1' WHERE `ticketstatus` = 'In Progress' OR `ticketstatus` = 'Wait For Response'");
echo "Updated Ticket Status Value\n";

$field = Vtiger_Field::getInstance('ticketstatus',$module);
$field->setPicklistValues(  array('WIP') );
echo "Add WIP in Ticket Status\n";
$log->debug("[END] Ticket Status Value Update");
?>
<!--2020-09-21 Thet Phyo Wai Ticket Status Value Update MSCRM Var 1.0 End-->
