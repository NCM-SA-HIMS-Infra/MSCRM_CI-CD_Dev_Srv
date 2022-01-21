<!--2020-09-21 Su Latt Naing Invoice Status Value Update MSCRM Var 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');


global $adb, $log;

$log->debug("[START] Invoice Status Value Update");

$module_name = 'Invoice';
$module = Vtiger_Module::getInstance($module_name);

$adb->pquery("UPDATE `vtiger_invoicestatus` SET `presence` = '1' WHERE `invoicestatus` = 'AutoCreated' OR `invoicestatus` = 'Created' OR `invoicestatus` = 'Approved'");
$adb->pquery("UPDATE `vtiger_invoicestatus` SET `invoicestatus` = 'Credit' WHERE `invoicestatus` = 'Credit Invoice'");
echo "Updated Invoice Status Value\n";

$field = Vtiger_Field::getInstance('invoicestatus',$module);
$field->setPicklistValues(  array('Partial Receive ') );
echo "Add WIP in Ticket Status\n";
$log->debug("[END] Ticket Status Value Update");
?>
<!--2020-09-21 Su Latt Naing Invoice Status Value Update MSCRM Var 1.0 End-->
