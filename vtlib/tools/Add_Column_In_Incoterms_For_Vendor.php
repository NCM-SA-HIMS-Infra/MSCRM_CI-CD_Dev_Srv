<!-- 2020/09/10 Pyae Phyo Mon add Column in Incoterms for WD Vendor MSCRM Ver 1.0 Start-->
<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;


$module_name = 'Vendors';

$db->query('ALTER TABLE vtiger_incoterms ADD wd_vendor_incoterms varchar(255)');

$array	  = array(
					['1','FOB'],
					['2','CIF'],
					['3','C&F'],
					['4','CIP'],
					['5','EXW'],
					['6','FAS'],
					['7','FCA'],
					['8','CPT'],
					['9','DAT'],
					['10','DAP'],
					['11','DDP']
				);

foreach ($array as $index => $arrayvalue) {

	$db->pquery("UPDATE vtiger_incoterms SET wd_vendor_incoterms='$arrayvalue[0]' WHERE incoterms='$arrayvalue[1]'");
}

?>
<!-- 2020/09/10 Pyae Phyo Mon add Column in Incoterms for WD Vendor MSCRM Ver 1.0 End-->


