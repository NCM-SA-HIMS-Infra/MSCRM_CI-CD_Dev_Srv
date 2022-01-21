<!--2020-12-24 Thet Phyo Wai Update User Currency allow to change  MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update User Currency allow to change");


$adb->query("UPDATE vtiger_field SET displaytype = 1  WHERE columnname = 'currency_id' AND tablename = 'vtiger_users'");

echo "Update User Currency allow to change";

$log->debug("[END] Update User Currency allow to change");
?>

<!--2020-12-24 Thet Phyo Wai Update User Currency allow to change  MSCRM End-->