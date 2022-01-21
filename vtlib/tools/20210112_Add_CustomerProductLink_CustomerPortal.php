<!--2020-12-29 Thet Phyo Wai Add Customer Product Link Module MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Add Customer Product Link Module in Customer Protal");


$adb->query("INSERT INTO vtiger_customerportal_tabs(tabid,visible,sequence,createrecord,editrecord) VALUES(50,1,15,0,0)");
echo "Add To Customer Portal Tabs\n";

$adb->query("INSERT INTO vtiger_customerportal_prefs(tabid, prefkey, prefvalue) VALUES (50, 'showrelatedinfo', 1)");
echo "Add To Customer Portal Prefs\n";

$module_name = 'ContactProduct';

$moduleInstance = Vtiger_Module::getInstance($module_name);
$relatedModules = array('Contacts','Accounts');

foreach ($relatedModules as $index => $relatedModule) {
	$relatedModuleInstance = Vtiger_Module::getInstance($relatedModule);
	if($relatedModule == 'Contacts'){
		$related_Name = 'get_dependents_list';
	}else{
		$related_Name = 'get_contactproduct';
	}
	$relatedModuleInstance->setRelatedList($moduleInstance, $module_name, Array(),$related_Name);
	echo "\n";
}

$log->debug("[END] Add Customer Product Link Module in Customer Protal");
?>

<!--2020-12-29 Thet Phyo Wai Add Customer Product Link Module MSCRM Start-->
