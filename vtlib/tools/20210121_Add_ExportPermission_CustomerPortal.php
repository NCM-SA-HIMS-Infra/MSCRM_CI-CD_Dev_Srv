<!--2021-01-12 Thet Phyo Wai Customer Portal Export With Permission MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Customer Portal Export With Permission");


$result = $adb->query("SELECT relatedmodules FROM vtiger_customerportal_relatedmoduleinfo WHERE tabid = 13");

if($adb->num_rows($result) > 0){
	$relatedModulesJSON = $adb->query_result($result, 0, "relatedmodules");
	$data_arr = Zend_Json::decode(decode_html($relatedModulesJSON));
	$data_arr[] = array(
						"name"=>"Export",
						"value"=>1
					);
	$result_data = Zend_Json::encode($data_arr);
	$adb->pquery("UPDATE vtiger_customerportal_relatedmoduleinfo SET relatedmodules=? WHERE tabid = ?",array($result_data,13));
}else{
	echo "FAILED :: No Record Found!!!";
}

$log->debug("[END] Customer Portal Export With Permission");
?>

<!--2021-01-12 Thet Phyo Wai Customer Portal Export With Permission MSCRM End-->