<!--2020-12-10 Thet Phyo Wai Remove Contact and Organication in Product MSCRM Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Remove Contact and Organication in Product");

$module_name = 'Products';

$moduleInstance = Vtiger_Module::getInstance($module_name);

$relatedModules = array(['Contacts','get_contacts'], ['Accounts','get_accounts']);

foreach ($relatedModules as $index => $relatedModule) {
	$relatedModuleInstance = Vtiger_Module::getInstance($relatedModule[0]);
	$moduleInstance->unsetRelatedList($relatedModuleInstance);
	$moduleInstance->unsetRelatedList($relatedModuleInstance,$relatedModule[0],$relatedModule[1]);
	echo "\n";
}

$log->debug("[END] Remove Contact and Organication in Product");
?>
<!--2020-12-10 Thet Phyo Wai Remove Contact and Organication in Product MSCRM End-->