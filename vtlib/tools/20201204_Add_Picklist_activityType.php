<?php

// 24-11-2020 Myo Min Kyaw add new Activity type in Event MSCRM Ver 1.0 start
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$module_name = 'Calendar';

$module = Vtiger_Module::getInstance($module_name);
$blockInstance = Vtiger_Block::getInstance('LBL_EVENT_INFORMATION', $module);

$field = Vtiger_Field::getInstance('activitytype', $module);

$array = array("Maintenance", "Delivery", "Appointment", "Business Trip", "Tender", "Bank", "Money Collect");

$field->setPicklistValues($array);

// delete mobile call
$db->query("DELETE FROM vtiger_activitytype WHERE activitytype = 'Mobile Call'");
echo 'End of Add Picklist Field';

// 24-11-2020 Myo Min Kyaw add new Activity type in Event MSCRM Ver 1.0 end

?>