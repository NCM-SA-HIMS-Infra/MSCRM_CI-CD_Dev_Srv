<!--2020-09-23 Thet Phyo Wai Data Transfer to WD MSCRM Ver 1.0 Start-->
<?php 
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

global $log,$adb;

$log->debug("[START] Data Transfer to WD");

$TRANSFER_DATA;
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
$SuccessCount =0;
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

// global $log;
// $log->info("errorhandle");

/*Get Data of Product Create and Update List*/
// $queryProduct = 'SELECT pd.product_number as PRODUCT_ID, pd.productname as PRODUCT_NAME, pdc.wd_product_category as PRODUCT_GROUP_ID, 
// 				vd.vendor_number as SUPPLIER_ID, crm.description as REMARK, usu.wd_product_unit as MINIMUM_ORD_UNIT_TYPE_ID, pd.unit_price as STANDARD_SELL_PRICE, pd.purchase_cost as STANDARD_NET_PRICE,pd.min_or_qty as MINIMUM_ORD_QTY, pdp.wd_product_part_id as PRODUCT_PART, pas.wd_product_available_status_id as PRODUCT_AVAL_STATUS,
// 				ci.wd_currency_id as SELL_PRICE_CURRENCY,ci.wd_currency_id as NET_PRICE_CURRENCY
// 				FROM vtiger_products AS pd
// 				INNER JOIN vtiger_crmentity AS crm ON crm.crmid = pd.productid
// 				INNER JOIN vtiger_vendor AS vd ON vd.vendorid = pd.vendor_id
// 				INNER JOIN vtiger_productcategory AS pdc ON pdc.productcategory = pd.productcategory
// 				INNER JOIN vtiger_currency_info AS ci ON ci.id = pd.currency_id
// 				INNER JOIN vtiger_usageunit AS usu ON usu.usageunit = pd.usageunit
// 				INNER JOIN vtiger_product_part AS pdp ON pdp.product_part = pd.product_part
// 				INNER JOIN vtiger_product_available_status AS pas ON pas.product_available_status = pd.product_available_status
// 				WHERE crm.deleted = 0';
$queryProduct = 'SELECT pd.product_number as PRODUCT_ID, pd.productname as PRODUCT_NAME, pdc.wd_product_category as PRODUCT_GROUP_ID, 
				vd.vendor_number as SUPPLIER_ID, usu.wd_product_unit as MINIMUM_ORD_UNIT_TYPE_ID, pd.unit_price as STANDARD_SELL_PRICE, pd.purchase_cost as STANDARD_NET_PRICE,pd.min_or_qty as MINIMUM_ORD_QTY, pdp.wd_product_part_id as PRODUCT_PART, pas.wd_product_available_status_id as PRODUCT_AVAL_STATUS,
				ci.wd_currency_id as SELL_PRICE_CURRENCY,cp.wd_currency_id as NET_PRICE_CURRENCY
				FROM vtiger_products AS pd
				INNER JOIN vtiger_crmentity AS crm ON crm.crmid = pd.productid
				INNER JOIN vtiger_vendor AS vd ON vd.vendorid = pd.vendor_id
				INNER JOIN vtiger_productcategory AS pdc ON pdc.productcategory = pd.productcategory
				INNER JOIN vtiger_currency_info AS ci ON ci.id = pd.currency_id
				INNER JOIN vtiger_currency_info AS cp ON cp.id = pd.currency
				INNER JOIN vtiger_usageunit AS usu ON usu.usageunit = pd.usageunit
				INNER JOIN vtiger_product_part AS pdp ON pdp.product_part = pd.product_part
				INNER JOIN vtiger_product_available_status AS pas ON pas.product_available_status = pd.product_available_status
				WHERE crm.deleted = 0 AND pd.transfer_to_wd = 1';				

$queryProductCreate = $queryProduct.' AND crm.is_create = 1 order by PRODUCT_ID desc';
$queryProductUpdate = $queryProduct.' AND crm.is_create = 0 AND crm.is_update = 1 order by PRODUCT_ID desc';

$TRANSFER_DATA['PRODUCT']['CREATE'] = getTransferData($queryProductCreate,array(),"Products");
$TRANSFER_DATA['PRODUCT']['UPDATE'] = getTransferData($queryProductUpdate,array(),"Products");

/*Get Data of Vendor Create and Update List*/
// $queryVendor = 'SELECT vd.vendor_number as SUPPLIER_ID, vd.vendor_code as SUPPLIER_CODE, vd.vendorname as SUPPLIER_LONG_NAME, vd.short_name as SUPPLIER_SHORT_NAME, 
// 				vd.attention_name as ATTENTION_NAME, crm.description as REMARK, vd.lead_time as LEAD_TIME, vd.incoterms as S0906IncotermList,  
// 				vd.payment_term as PAYMENT_TERM, vd.email as EMAIL, vd.contact_person as CONTACT_PERSON1, vd.`position` as POSITION1, vd.phone  as PHONE_NO1, CONCAT_WS(", ",vd.street,vd.city,vd.state,vd.country) as ADDRESS1
// 				FROM vtiger_vendor AS vd
// 				INNER JOIN vtiger_crmentity AS crm ON crm.crmid = vd.vendorid
// 				WHERE crm.deleted = 0 AND vd.transfer_to_wd = 1 ';

$queryVendor = 'SELECT vd.vendor_number as SUPPLIER_ID, vd.vendor_code as SUPPLIER_CODE, vd.vendorname as SUPPLIER_LONG_NAME, vd.short_name as SUPPLIER_SHORT_NAME, 
				vd.attention_name as ATTENTION_NAME, vd.lead_time as LEAD_TIME, vd.incoterms as S0906IncotermList,  
				vd.payment_term as PAYMENT_TERM, vd.email as EMAIL, vd.contact_person as CONTACT_PERSON1, vd.`position` as POSITION1, vd.phone  as PHONE_NO1, CONCAT_WS(", ",vd.street,vd.city,vd.state,vd.country) as ADDRESS1
				FROM vtiger_vendor AS vd
				INNER JOIN vtiger_crmentity AS crm ON crm.crmid = vd.vendorid
				WHERE crm.deleted = 0 AND vd.transfer_to_wd = 1 ';

$queryVendorCreate = $queryVendor.' AND crm.is_create = 1';
$queryVendorUpdate = $queryVendor.' AND crm.is_create = 0 AND crm.is_update = 1';

$TRANSFER_DATA['VENDOR']['CREATE'] = getTransferData($queryVendorCreate,array(),"Vendors");
$TRANSFER_DATA['VENDOR']['UPDATE'] = getTransferData($queryVendorUpdate,array(),"Vendors");

/*Get Data of Customer Create and Update List*/
// $queryCustomer = "SELECT 
// 				CASE WHEN ac.accountid != '' THEN ac.account_number ELSE ct.contact_number END as CUSTOMER_ID,
// 				CASE WHEN ac.accountid != '' THEN ac.email1 ELSE ct.email END AS EMAIL,
// 				ct.lastname as CONTACT_PERSON_1,
// 				ct.phone as PHONE_NO_1,
// 				CASE WHEN ac.accountid != '' THEN ac.accountname ELSE ct.lastname END as CUSTOMER_NAME,
// 				CASE WHEN ac.accountid != '' THEN ac.fax ELSE ct.fax END as FAX,
// 				CASE WHEN ac.accountid != '' THEN acbil.bill_street ELSE ctad.mailingstreet END AS ADDRESS,
// 				CASE WHEN ac.accountid != '' THEN acbil.bill_city ELSE ctad.mailingcity END AS CITY,
// 				CASE WHEN ac.accountid != '' THEN acbil.bill_state ELSE ctad.mailingstate END AS TOWNSHIP,
// 				CASE WHEN ac.accountid != '' THEN acbil.bill_country ELSE ctad.mailingcountry END AS COUNTRY,				
// 				CASE WHEN ac.accountid != '' THEN accrm.description ELSE ctcrm.description END AS REMARK,
// 				CASE WHEN ac.accountid != '' AND mbac.accountid != '' THEN mbac.account_number ELSE (CASE WHEN ac.accountid != '' THEN ac.account_number ELSE ct.contact_number END) END AS HEAD_OFFICE_ID
// 				FROM vtiger_contactdetails AS ct
// 				INNER JOIN vtiger_crmentity AS ctcrm ON ctcrm.crmid = ct.contactid
// 				INNER JOIN vtiger_contactaddress AS ctad ON ctad.contactaddressid = ct.contactid
// 				LEFT JOIN vtiger_account AS ac ON ac.accountid = ct.accountid
// 				LEFT JOIN vtiger_accountbillads AS acbil ON acbil.accountaddressid = ac.accountid
// 				LEFT JOIN vtiger_crmentity AS accrm ON accrm.crmid = ac.accountid
// 				LEFT JOIN vtiger_account AS mbac ON mbac.accountid = ac.parentid
// 				WHERE ctcrm.deleted = 0 AND ((ctcrm.is_create = 1 OR ctcrm.is_update = 1 OR accrm.is_create = 1 OR accrm.is_update = 1) OR ct.accountid IN (select ct2.accountid from vtiger_contactdetails AS ct2 INNER JOIN vtiger_crmentity AS crm2 ON crm2.crmid = ct2.contactid WHERE (crm2.is_create = 1 OR crm2.is_update = 1) AND ct2.accountid !=0 ) )
// 				ORDER BY CUSTOMER_ID";

$queryCustomer = "SELECT 
				ac.account_number as CUSTOMER_ID,
				ac.email1 AS EMAIL,
				ct.lastname as CONTACT_PERSON_1,
				ct.phone as PHONE_NO_1,
				ac.accountname as CUSTOMER_NAME,
				ac.fax as FAX,
				acbil.bill_street AS ADDRESS,
				acbil.bill_city AS CITY,
				acbil.bill_state AS TOWNSHIP,
				acbil.bill_country AS COUNTRY,	
				CASE WHEN ac.accountid != '' AND mbac.accountid != '' THEN mbac.account_number ELSE ac.account_number END AS HEAD_OFFICE_ID
				FROM vtiger_account AS ac
				JOIN vtiger_contactdetails AS ct ON ac.accountid = ct.accountid
				INNER JOIN vtiger_crmentity AS ctcrm ON ctcrm.crmid = ct.contactid
				LEFT JOIN vtiger_accountbillads AS acbil ON acbil.accountaddressid = ac.accountid
				LEFT JOIN vtiger_crmentity AS accrm ON accrm.crmid = ac.accountid
				LEFT JOIN vtiger_account AS mbac ON mbac.accountid = ac.parentid
				WHERE ctcrm.deleted = 0 AND ((ctcrm.is_create = 1 OR ctcrm.is_update = 1 OR accrm.is_create = 1 OR accrm.is_update = 1) OR ct.accountid IN (select ct2.accountid from vtiger_contactdetails AS ct2 INNER JOIN vtiger_crmentity AS crm2 ON crm2.crmid = ct2.contactid WHERE (crm2.is_create = 1 OR crm2.is_update = 1) AND ct2.accountid !=0 AND crm2.deleted = 0 )) 
				ORDER BY CUSTOMER_ID,ct.contactid";

$TRANSFER_DATA['CUSTOMER']['CREATE'] = getTransferData($queryCustomer,array(),"Customer");

$queryOrganization = "SELECT 
				ac.account_number AS CUSTOMER_ID ,
				ac.email1 AS EMAIL,
				ac.phone AS PHONE_NO_1,
				ac.accountname AS CUSTOMER_NAME,
				ac.fax AS FAX,
				acbil.bill_street AS ADDRESS,
				acbil.bill_city AS CITY,
				acbil.bill_state AS TOWNSHIP,
				acbil.bill_country AS COUNTRY,
				CASE WHEN mbac.accountid != '' THEN mbac.account_number ELSE ac.account_number END AS HEAD_OFFICE_ID
				FROM vtiger_account AS ac
				INNER JOIN vtiger_crmentity AS crm ON crm.crmid = ac.accountid
				LEFT JOIN vtiger_accountbillads AS acbil ON acbil.accountaddressid = ac.accountid
				LEFT JOIN (SELECT ac2.* FROM vtiger_account AS ac2 INNER JOIN vtiger_crmentity AS ac2crm ON ac2crm.crmid = ac2.accountid AND ac2crm.deleted = 0) AS mbac ON mbac.accountid = ac.parentid
				WHERE crm.deleted = 0 AND (crm.is_create = 1 OR crm.is_update = 1) AND ac.accountid NOT IN (SELECT ct.accountid FROM vtiger_contactdetails AS ct INNER JOIN vtiger_crmentity AS crm ON crm.crmid = ct.contactid WHERE crm.deleted = 0 and ct.accountid is not null) ";
$Organization_Data = getTransferData($queryOrganization,array(),"Customer");
foreach($Organization_Data as $key=>$value){
	$value['CONTACT_PERSON_1'] = 'Office';
	$TRANSFER_DATA['CUSTOMER']['CREATE'][] = $value;
}

// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
$ProductCreateCount= count($TRANSFER_DATA['PRODUCT']['CREATE']);
$ProductUpdateCount= count($TRANSFER_DATA['PRODUCT']['UPDATE']);
$VendorCreateCount= count($TRANSFER_DATA['VENDOR']['CREATE']);
$VendorUpdateCount= count($TRANSFER_DATA['VENDOR']['UPDATE']);
$CustomerCreateCount= count($TRANSFER_DATA['CUSTOMER']['CREATE']);

$TransferCount = $ProductCreateCount + $ProductUpdateCount + $VendorCreateCount + $VendorUpdateCount + $CustomerCreateCount;
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End

print_r($TRANSFER_DATA);
/*Change to JSON Format*/
//$JSON_DATA = json_encode($TRANSFER_DATA,true);
//$url = "www.wd_api_url.com/postdata";
//$url = "http://localhost:52143/api/DataTransfer";
$url = "https://www.activebizs.com/webapi/api/DataTransfer";

// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
logger("Transfer Data");
logger(json_encode($TRANSFER_DATA));
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

$postResult = file_post_contents($url, json_encode($TRANSFER_DATA));

// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
logger("Success Data");
logger($postResult);
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

/*Update Post data to complete*/
if(sizeof(json_decode($postResult)) > 0){
	$crmid = array();
	foreach(json_decode($postResult) as $k=>$v){
		// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
		$SuccessCount++;
		// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	
		if($v=="Product"){
			$result = $adb->pquery('SELECT productid FROM vtiger_products pro join vtiger_crmentity v on pro.productid=v.crmid WHERE v.deleted=0  and pro.product_number = ?',array($k));
			$crmid[] = $adb->query_result($result, 0, 'productid');
		}else if($v=="Vendor"){
			$result = $adb->pquery('SELECT vendorid FROM vtiger_vendor ven join vtiger_crmentity v on ven.vendorid=v.crmid WHERE v.deleted=0  and ven.vendor_number = ?', array($k));
			$crmid[] = $adb->query_result($result, 0, 'vendorid');
		}else if($v=="Customer"){
			$result = $adb->pquery('SELECT accountid FROM vtiger_account a join vtiger_crmentity v on a.accountid=v.crmid WHERE v.deleted=0  and a.account_number = ?', array($k));
			$reslutCount = $adb->num_rows($result);
			if($reslutCount > 0){
				$accountid = $adb->query_result($result, 0, 'accountid');
				$crmid[] = $accountid;
				$result2 = $adb->pquery('SELECT contactid FROM vtiger_contactdetails con join vtiger_crmentity v on con.contactid=v.crmid WHERE v.deleted=0  and con.accountid = ?', array($accountid));

				$reslut2Count = $adb->num_rows($result2);
				for ($i = 0; $i < $reslut2Count; $i++) {
					$crmid[] = $adb->query_result($result2, $i, 'contactid');
				}
			}else{
				$result = $adb->pquery('SELECT contactid FROM vtiger_contactdetails con join vtiger_crmentity v on con.contactid=v.crmid WHERE v.deleted=0  and con.contact_number = ?', array($k));
				$crmid[] = $adb->query_result($result, 0, 'contactid');
			}
		}
	}
	$sql_crmid = '('.implode(', ', $crmid).')';
	$adb->query('UPDATE vtiger_crmentity SET is_create = 0 , is_update = 0 WHERE crmid IN '.$sql_crmid);
}

// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
function logger($message){

		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Rangoon'));
		$logmessage = '[' . $date->format('Y-m-d H:i:s') . ']' . mb_convert_encoding($message, "SJIS") . "\r\n";
		file_put_contents('F:\Project\MSCRM_Release\TransferLog\DataTransfer.log', $logmessage, FILE_APPEND | LOCK_EX);
}


if($TransferCount != $SuccessCount )
{
	$FailCount = $TransferCount - $SuccessCount;
	logger("Transfer Data Count :".$TransferCount);
	logger("Transfer Success Count :".$SuccessCount);
	logger("Transfer Fail Count :".$FailCount);
	exit(1);
}
else
{
	logger("Transfer Data Count :".$TransferCount);
	logger("Transfer Success Count :".$SuccessCount);
	logger("Transfer Fail Count :0");
}
// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

/*file_get_contents('http://192.168.123.35/webapi/api/User', false, stream_context_create([
	    'http' => [
	        'method' => 'POST',
	        'header'  => "Content-Type: application/x-www-form-urlencoded",
	        'content' => http_build_query( $TRANSFER_DATA )
	    ]
	]));*/

/*Post Data to WD*/
function file_post_contents($url, $data, $username = null, $password = null){
	//$postdata = http_build_query($data);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => "Content-type: application/json\r\n",
	        'content' => $data
	    )
	);

	if($username && $password)
	{
	    $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password")); // .= to append to the header array element
	}

	$context = stream_context_create($opts);	
	return file_get_contents($url, false, $context);
	//return "NO_ERROR";
}

function getTransferData($sql,$params=array(),$module=""){
	global $adb;

	// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
	try{
            $result = $adb->pquery($sql,$params);
            
            if($result === false){
                throw new Exception("Database Error");
            }   
    }catch(Exception $e) {
        logger($e->getMessage());
    }
	//$result = $adb->pquery($sql,$params);
	// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

	$fieldNames = $adb->getFieldsArray($result);
	$reslutCount = $adb->num_rows($result);
	$incoterms = array();
	if($module == "Vendors"){
		// 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File Start	
		try{
            $incotermResult = $adb->pquery('SELECT incoterms,wd_vendor_incoterms FROM vtiger_incoterms', array());
            
            if($incotermResult === false){
                throw new Exception("Database Error");
            }   
	    }catch(Exception $e) {
	        logger($e->getMessage());
	    }
	    // 2020-12-30 Pyae Phyo Mon Transfer Data Success or not and Log File End	

		$incotermCount = $adb->num_rows($incotermResult);
		for ($a = 0; $a < $incotermCount; $a++) {
			$incotermName = $adb->query_result($incotermResult, $a,  'incoterms');
			$incotermId = $adb->query_result($incotermResult, $a,  'wd_vendor_incoterms');
			$incoterms[$incotermName] = $incotermId;
			
		}
	}
	if($reslutCount>0){
		for ($i = 0; $i < $reslutCount; $i++) {
			foreach($fieldNames as $fieldName){
				$rows[$i][$fieldName] = $adb->query_result($result, $i,  strtolower($fieldName));
				if($fieldName == 'S0906IncotermList' && $module == "Vendors"){
					$fieldValues = explode(' |##| ', $adb->query_result($result, $i,  strtolower($fieldName) ));
					$incoterms_id = array();
					foreach($fieldValues as $k=>$value){
						$incoterms_id[$k]['CODE_TYPE'] = $incoterms[$value];					
						//$incoterms_id[$k] = $incoterms[$value];
					}
					$rows[$i][$fieldName] = $incoterms_id;
				}
			}
		}

		if($module == "Customer"){
			$prevContact = "";
			$start = 1;
			$arr = array();
			$arrKey = 0;
			foreach($rows as $row){
				if($prevContact == $row['CUSTOMER_ID']){
					if($start == 1){
						$arr[$arrKey-1]['CONTACT_PERSON_2'] = $row['CONTACT_PERSON_1'];
						$arr[$arrKey-1]['PHONE_NO_2'] = $row['PHONE_NO_1'];
					}if($start == 2){
						$arr[$arrKey-1]['CONTACT_PERSON_3'] = $row['CONTACT_PERSON_1'];
						$arr[$arrKey-1]['PHONE_NO_3'] = $row['PHONE_NO_1'];
					}
					$start ++;
				}else{
					$row['CONTACT_PERSON_2'] = "";
					$row['PHONE_NO_2'] = "";
					$row['CONTACT_PERSON_3'] = "";
					$row['PHONE_NO_3'] = "";
					$arr[$arrKey] = $row;
					$prevContact = $row['CUSTOMER_ID'];
					$start = 1;
					$arrKey++;
				}
			}
			$rows = $arr;
		}

		// if($module == "Products"){
		// 	$qry = 'SELECT sppd.product_number FROM vtiger_products AS pd
  //               INNER JOIN vtiger_seproductsrel AS spd ON spd.productid = pd.productid AND spd.setype = "Products"
  //               INNER JOIN vtiger_crmentity AS crm ON crm.crmid = spd.crmid
  //               INNER JOIN vtiger_products AS sppd ON sppd.productid = spd.crmid
  //               WHERE crm.deleted = 0 AND pd.product_number = ?';
		// 	foreach($rows as $k=>$row){

		// 		$bundleResult = $adb->pquery($qry, array($row['PRODUCT_ID']));
		// 		$bundleCount = $adb->num_rows($bundleResult);
		// 		$arr = array();
		// 		if($bundleCount>0){
		// 			for ($a = 0; $a < $bundleCount; $a++) {
		// 				$arr[$a]['PRODUCT_PART_ID'] = $adb->query_result($bundleResult, $a, 'product_number');
		// 			}
		// 		}
		// 		$rows[$k]['productPartList'] = $arr;
		// 	}
		// }

		return $rows;
	}else{
		return array();
	}
}
$log->debug("[END] Data Transfer to WD");
?>
<!--2020-09-23 Thet Phyo Wai Data Transfer to WD MSCRM Ver 1.0 End-->
