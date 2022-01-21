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

$db->query('ALTER TABLE vtiger_product_part ADD wd_product_part_id varchar(10)');
$db->query('DELETE FROM vtiger_product_part');


$module = Vtiger_Module::getInstance($module_name);
$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $module);

$field = Vtiger_Field::getInstance('product_part', $module);

$array = array("Product", "Part");

$field->setPicklistValues($array);


$group_id = array(1, 2);

for ($i = 0; $i < count($array) ; $i++) {
	$db->pquery("UPDATE vtiger_product_part SET wd_product_part_id='$group_id[$i]' WHERE product_part='$array[$i]'");
}


echo 'End of Add Picklist Field';

// 2020-09-23 Myo Min Kyaw Add New Field in Products database mscrm Ver 1.0 add end

?>