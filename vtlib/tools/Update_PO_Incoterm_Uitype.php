<!--2020-10-23 Pyae Phyo Mon Update PO Incoterm Uitype MSCRM var 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update PO incoterm Uitype MSCRM var 1.0");


$adb->query("UPDATE vtiger_field SET uitype='15' WHERE tablename='vtiger_purchaseorder'and fieldname='vendor_incoterms'");

$log->debug("[END] Update PO incoterm Uitype MSCRM var 1.0");
?>

<!--2020-10-23 Pyae Phyo Mon Update PO Incoterm Uitype MSCRM var 1.0 End-->

