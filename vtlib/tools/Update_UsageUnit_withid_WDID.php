<!--2020-10-13 Pyae Phyo Mon Update In Usage Unit wd_product_unit MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update In Usage Unit wd_product_unit MSCRM var 1.0");


$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='1',usageunit ='Set (s)'  WHERE usageunitid =17");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='2',usageunit ='Unit (s)'  WHERE usageunitid =18");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='3',usageunit ='Box (s)'  WHERE usageunitid =19");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='4',usageunit ='Piece (s)'  WHERE usageunitid =20");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='5',usageunit ='Jar (s)'  WHERE usageunitid =21");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='6',usageunit ='Pack (s)'  WHERE usageunitid =22");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='7',usageunit ='Disp (s)'  WHERE usageunitid =23");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='55',usageunit ='Bag (s)'  WHERE usageunitid =24");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='57',usageunit ='Carton (s)'  WHERE usageunitid =25");

$adb->query("UPDATE vtiger_usageunit SET wd_product_unit='58',usageunit ='Roll (s)'  WHERE usageunitid =26");

echo "Update Update In Usage Unit wd_product_unit DONE\n";

$log->debug("[END] Update In Usage Unit wd_product_unit MSCRMMSCRM var 1.0");
?>

<!--2020-10-13 Pyae Phyo Mon Update In Usage Unit wd_product_unit MSCRM var 1.0 Add End-->




