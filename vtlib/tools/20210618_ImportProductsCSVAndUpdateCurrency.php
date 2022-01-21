<!--2021-06-04 Phyo Phyo Win update Products Currency using csv data MSCRM Var 1.0 Start-->
<?php
include_once('vtlib/Vtiger/Module.php');

$module_name = 'Products';
$module = Vtiger_Module::getInstance($module_name);

$start_time = "START:" . date(" d-M H:i") . "<br>";
logger('[START] Import Products');
$handle = fopen("C:\Users\Administrator\Desktop\To_Release_20210618\product_list.csv", "r");
$count = 0;
while (($row = fgetcsv($handle, 0, ",")) !== FALSE) {
    $count++;
    if ($count == 1) { continue; } // Skip the csv header
    $p_name=$row[0]; 
    $PurchaseCost=$row[1]; 
    $wk_purchasecurrency = fetchPurchaseCurrencyById($PurchaseCost);
    $wk_productname = fetchProductNameByName($p_name);

    if($wk_purchasecurrency=='NotExistCurrencyName' && $wk_productname=='NotExistProductName'){
        logger("Product Name ".$p_name." and Purchase Currency Name ".$PurchaseCost." does not Exist.");
    }
    else if($wk_purchasecurrency=='NotExistCurrencyName')
    {
        logger("Product Name ".$p_name."'s Purchase Currency Name ".$PurchaseCost." does not Exist.");
    }
    else if ($wk_productname=='NotExistProductName'){
        logger(" Product Name ".$p_name." does not Exist.");
    }
    else{
        $update_sql ='UPDATE vtiger_products SET currency = ? WHERE productname = ?';
        $result=$adb->pquery($update_sql, array($PurchaseCost,$p_name));
    }  
}

fclose($handle); 

//ログを出力する。logger('[END] Import Product');
logger('[End] Import Products');

function fetchPurchaseCurrencyById($PurchaseCost)
{
    global $log;
    $log->debug("Entering fetchPurchaseCurrencyById(".$PurchaseCost.") method ...");
    global $adb;
$sql = <<< EOM
SELECT id
FROM vtiger_currency_info
WHERE id = ? AND currency_status = 'Active';
EOM;

    $result = $adb->pquery($sql, array($PurchaseCost));
    if($adb->num_rows($result) >0){
        $row = $adb->query_result_rowdata($result);
        $log->debug("Existing fetchPurchaseCurrencyById method ...");
        return $row;
    }
    else
    {
        return "NotExistCurrencyName";
    }
}

function fetchProductNameByName($p_name){
    global $log;
    $log->debug("Entering fetchProductByName(".$p_name.") method ...");

    global $adb;
    $sql = <<< EOM
SELECT productname
FROM vtiger_products
WHERE productname = ?;
EOM;
    $result=$adb->pquery($sql, array($p_name));
    if($adb->num_rows($result) >0){
        $row = $adb->query_result_rowdata($result);
        $log->debug("Existing fetchProductNameByName method ...");
        return $row;
    }
    else
    {
        return "NotExistProductName";
    }
}

function logger($message){
    $log_file = 'F:\Project\MSCRM_Release\UpadteProductCurrencyLog\ImportProductsCSV.log';
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Asia/Rangoon'));
    
    $logmessage = '[' . $date->format('Y-m-d H:i:s') . ']' . mb_convert_encoding($message, "SJIS") . "\r\n";
    file_put_contents($log_file, $logmessage, FILE_APPEND | LOCK_EX);
}

$log->debug("[END] Product Currency Value Update");
?>
<!--2021-06-04 Phyo Phyo Win update Products Currency using csv data MSCRM Var 1.0 End-->