<!--2020-12-24 Thet Phyo Wai Update Schedular Frequency for Reminder  MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update Schedular Frequency for Reminder");


$adb->query("UPDATE vtiger_cron_task SET frequency = 300  WHERE name ='SendReminder' and module = 'Calendar'");

echo "Update Schedular Frequency for Reminder DONE";

$log->debug("[END] Update Schedular Frequency for Reminder");
?>

<!--2020-12-24 Thet Phyo Wai Update Schedular Frequency for Reminder  MSCRM End-->