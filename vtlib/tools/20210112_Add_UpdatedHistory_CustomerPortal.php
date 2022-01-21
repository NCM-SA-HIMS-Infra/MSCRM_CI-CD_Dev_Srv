<!--2021-01-08 Thet Phyo Wai Add Updated History in Customer Portal MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Add Updated History in Customer Portal");


$adb->query("UPDATE vtiger_customerportal_relatedmoduleinfo SET relatedmodules='[{\"name\":\"History\",\"value\":1}]' WHERE tabid = 50");

$log->debug("[END] Add Updated History in Customer Portal");
?>

<!--2021-01-08 Thet Phyo Wai Add Updated History in Customer Portal MSCRM End-->