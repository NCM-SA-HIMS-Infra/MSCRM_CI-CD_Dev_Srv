<?php

// 2020-09-23 Myo Min Kyaw Add New Field in Products database mscrm Ver 1.0 add start

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$module_name = 'Products';
/*
$db->query('ALTER TABLE vtiger_usageunit ADD wd_product_unit varchar(255)');
$db->query('DELETE FROM vtiger_usageunit');

$module = Vtiger_Module::getInstance($module_name);
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $module);



$field = Vtiger_Field::getInstance('usageunit', $module);
*/
$array = array("Set(s)","Unit(s)","Box(s)","Parts","Piece(s)","Jar(s)","Pack(s)","Disp(s)","Carton(s)","Roll(s)");

//$field->setPicklistValues($array);


$group_id = array("1","2","3","4","5","6","7","55","57","58");

for ($i = 0; $i < count($array) ; $i++) {
	$db->pquery("UPDATE vtiger_usageunit SET wd_product_unit='$group_id[$i]' WHERE usageunit='$array[$i]'");
}

echo 'End of the Usage Unit';

// 2020-09-23 Myo Min Kyaw Add New Field in Products database mscrm Ver 1.0 add end

?>
