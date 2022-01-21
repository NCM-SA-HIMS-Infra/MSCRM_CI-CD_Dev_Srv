<!--2020-10-19 Thet Phyo Wai Update Relation Ticket MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update Relation Ticket MSCRM var 1.0");

/*For Product Module Start*/
$adb->query('UPDATE vtiger_relatedlists SET actions = "", name = "get_service_tickets" WHERE tabid = 36 AND related_tabid = 13');
echo "Service Relation DONE\n";

$adb->query('UPDATE vtiger_relatedlists SET actions = "", name = "get_product_tickets" WHERE tabid = 14 AND related_tabid = 13');
echo "Service Relation DONE\n";

$log->debug("[END] Update Relation Ticket MSCRM var 1.0");
?>
<!--2020-10-19 Thet Phyo Wai Update Relation Ticket MSCRM var 1.0 Add End-->