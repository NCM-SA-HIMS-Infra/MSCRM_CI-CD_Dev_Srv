<?php

// 2021-07-15 Myo Min Kyaw Chagne the pick list value in event status start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');
$db = PearDatabase::getInstance();

global $adb, $log;

$module_name = 'Events';
$db->query('DELETE FROM vtiger_eventstatus');
$module = Vtiger_Module::getInstance($module_name);
$blockInstance = Vtiger_Block::getInstance('LBL_EVENT_INFORMATION', $module);
$field = Vtiger_Field::getInstance('eventstatus', $module);

$array = array("Planned", "In Progress", "Completed", "Cancel");
$field->setPicklistValues($array);


echo 'End of Add Picklist Field';

// 2021-07-15 Myo Min Kyaw Chagne the pick list value in event status end
