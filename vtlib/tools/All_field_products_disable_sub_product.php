<?php
//20201012 Myo Min Kyaw Product Bundle not show in Inventory MSCRM Ver 1.0 Start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$db->query("Update vtiger_products set is_subproducts_viewable=0 where is_subproducts_viewable=1");


echo 'End of the query';


//20201012 Myo Min Kyaw Product Bundle not show in Inventory MSCRM Ver 1.0 End

