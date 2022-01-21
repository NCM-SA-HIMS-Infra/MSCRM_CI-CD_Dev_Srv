<!--2021-01-14 Thet Phyo Wai Quote cannot Accepted at Customer Portal MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Quote cannot Accepted at Customer Portal");

$adb->pquery("UPDATE vtiger_customerportal_tabs SET editrecord=? WHERE tabid = ?",array(1,20));

$log->debug("[END] Quote cannot Accepted at Customer Portal");
?>

<!--2021-01-14 Thet Phyo Wai Quote cannot Accepted at Customer Portal MSCRM End-->