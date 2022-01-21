<!-- 2020/12/30 Su Latt Customer Portal Design Change MSCRM Ver 1.0 Start-->
<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

// For Ticket
$db->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '' WHERE tabid = 13");

$val = '{"ticket_title":1,"issue_date":0,"product_id":1,"support_type":0,"ticketstatus":1,"assigned_user":0,"ticketpriorities":0,"assigned_user_id":0,"ticket_no":0,"description":1}';
$adb->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '".$val."' WHERE tabid = 13");

// For Invoice
$db->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '' WHERE tabid = 23");

$val = '{"subject":1,"invoice_no":0,"account_id":0,"invoicedate":0,"assigned_user_id":0,"bill_street":0,"ship_street":0,"duedate":0,"invoicestatus":0}';
$adb->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '".$val."' WHERE tabid = 23");

// For Quotes
$db->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '' WHERE tabid = 20");

$val = '{"subject":1,"quotestage":1,"account_id":1,"assigned_user_id":0,"bill_street":1,"ship_street":1,"quote_no":0,"validtill":0}';
$adb->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '".$val."' WHERE tabid = 20");

// For service
$db->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '' WHERE tabid = 36");

$val = '{"servicename":1,"servicecategory":0,"start_date":0,"expiry_date":0}';
$adb->query("UPDATE vtiger_customerportal_fields SET fieldinfo = '".$val."' WHERE tabid = 36");

?>
<!-- 2020/12/30 Su Latt Customer Portal Design Change MSCRM Ver 1.0 End-->


