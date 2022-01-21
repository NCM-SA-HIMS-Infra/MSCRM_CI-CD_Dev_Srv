<!--2020-10-05 Pyae Phyo Mon Delete Table Column MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Delete Table Column MSCRM var 1.0");

/*For Product Module Start*/
$adb->query('ALTER TABLE vtiger_vendor DROP COLUMN transfer_to_WD');
echo "Drop Column transfer_to_WD DONE\n";

$log->debug("[END] Delete Table Column MSCRM var 1.0");
?>
<!--2020-10-05 Pyae Phyo Mon Delete Table Column MSCRM var 1.0 Add End-->