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

$db->query('ALTER TABLE vtiger_productcategory ADD wd_product_category varchar(255)');
$db->query('DELETE FROM vtiger_productcategory');

$module = Vtiger_Module::getInstance($module_name);
$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $module);



$field = Vtiger_Field::getInstance('productcategory', $module);

$array = array("Machine","Liquid","G-16-Hospital Services (Curtch)","Parts","G-1-NIP-Product","G-2-NIP-Spare parts","G-3-NIP-Machine","G-4-Sanacide R7","G-5-AISIN","G-6-TOITU","G-7-Feather","G-8-OG","G-9-Wheelchair","G-10-Cotton","G-11-RO","G-12-Filter","G-13-Aung","G-14-Paramount Bed","G-15-Other");

$field->setPicklistValues($array);


$group_id = array("PG0001","PG0002","PG0003","PG0004","PG0005","PG0006","PG0007","PG0008","PG0009","PG0010","PG0011","PG0012","PG0013","PG0014","PG0015","PG0016","PG0017","PG0018","PG0019");

for ($i = 0; $i < count($array) ; $i++) {
	$db->pquery("UPDATE vtiger_productcategory SET wd_product_category='$group_id[$i]' WHERE productcategory='$array[$i]'");
}


echo 'End of Add Picklist Field';

// 2020-09-23 Myo Min Kyaw Add New Field in Products database mscrm Ver 1.0 add end

?>
