<!--2020-11-01 Thet Phyo Wai Remove Add Purchase Orders in Contact MSRCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Remove Add Purchase Orders in Contact");

/*For User Currency Field Hidden*/
$adb->query('UPDATE vtiger_relatedlists SET actions = "" WHERE tabid = 4 AND related_tabid = 21');
echo "Remove Add Purchase Orders in Contact\n";

$log->debug("[END] Remove Add Purchase Orders in Contact");
?>
<!--2020-11-01 Thet Phyo Wai Remove Add Purchase Orders in Contact MSRCRM var 1.0 Add End-->