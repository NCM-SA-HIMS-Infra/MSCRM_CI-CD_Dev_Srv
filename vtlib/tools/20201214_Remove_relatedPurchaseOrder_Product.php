<!--2020-12-10 Thet Phyo Wai Remove One Related Purchase Order in Product MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Remove One Related Purchase Order in Product");

$adb->query('DELETE FROM vtiger_relatedlists WHERE tabid = 14 AND related_tabid = 21 AND relation_id = 170');
echo "Delete One Relation with Purchase Order and Product\n";

$log->debug("[END] Remove One Related Purchase Order in Product");
?>
<!--2020-12-10 Thet Phyo Wai Remove One Related Purchase Order in Product MSCRM Start-->