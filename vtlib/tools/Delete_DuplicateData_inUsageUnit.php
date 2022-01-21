<!--2020-10-13 Pyae Phyo Mon Delete Duplicate Data in Usage Unit MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Delete Duplicate Data In Usage Unit MSCRM var 1.0");

$adb->query('DELETE FROM vtiger_usageunit where wd_product_unit is NULL');
echo "Delete Duplicate data in Usage Unit DONE\n";

$log->debug("[END] Delete Duplicate Data In Usage Unit MSCRM var 1.0");
?>

<!--2020-10-13 Pyae Phyo Mon Delete Duplicate Data in Usage Unit MSCRM var 1.0 Add End-->
