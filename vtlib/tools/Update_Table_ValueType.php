<!--2020-09-18 Thet Phyo Wai Update Table Value and Type MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Update Table Value and Type MSCRM var 1.0");

/*For Product Module Start*/
$adb->query('ALTER TABLE vtiger_products MODIFY COLUMN unit_price decimal(18, 3)');
echo "Update Unit Price to decimal(18, 3) DONE\n";

$adb->query('ALTER TABLE vtiger_products MODIFY COLUMN purchase_cost decimal(18, 3)');
echo "Update Purchase Cost to decimal(18, 3) DONE\n";
/*For Product Module End*/

/*For Contact Module Start*/
$adb->query('ALTER TABLE vtiger_contactdetails MODIFY COLUMN lastname varchar(200)');
echo "Update Primary Email to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_contactaddress MODIFY COLUMN mailingstreet varchar(200)');
echo "Update Mailing Street to varchar(200) DONE\n";

$adb->query('ALTER TABLE vtiger_contactaddress MODIFY COLUMN mailingcity varchar(50)');
echo "Update Mailing City to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_contactaddress MODIFY COLUMN mailingstate varchar(50)');
echo "Update Mailing State to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_contactaddress MODIFY COLUMN mailingcountry varchar(50)');
echo "Update Mailing Country to varchar(50) DONE\n";
/*For Contact Module End*/

/*For Organization Module Start*/
$adb->query('ALTER TABLE vtiger_account MODIFY COLUMN accountname varchar(50)');
echo "Update Organization Name to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_accountbillads MODIFY COLUMN bill_street varchar(200)');
echo "Update Billing Adderss to varchar(200) DONE\n";

$adb->query('ALTER TABLE vtiger_accountbillads MODIFY COLUMN bill_city varchar(50)');
echo "Update Billing City to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_accountbillads MODIFY COLUMN bill_state varchar(50)');
echo "Update Billing State to varchar(50) DONE\n";

$adb->query('ALTER TABLE vtiger_accountbillads MODIFY COLUMN bill_country varchar(50)');
echo "Update Billing Country to varchar(50) DONE\n";
/*For Organization End Start*/

$log->debug("[END] Update Table Value and Type MSCRM var 1.0");
?>
<!--2020-09-18 Thet Phyo Wai Update Table Value and Type MSCRM var 1.0 Add End-->