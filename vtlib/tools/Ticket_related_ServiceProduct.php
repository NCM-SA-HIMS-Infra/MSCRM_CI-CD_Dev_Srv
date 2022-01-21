<!--2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add Start-->
<?php

$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Module.php');

global $adb, $log;

$log->debug("[START] Add Related Ticket With Service And Product");

$module_name = 'HelpDesk';

$moduleInstance = Vtiger_Module::getInstance($module_name);

$relatedModules = array(
						['Services','get_ticket_services'],
						['Products','get_ticket_products']
					);

foreach ($relatedModules as $index => $relatedModule) {
	$relatedModuleInstance = Vtiger_Module::getInstance($relatedModule[0]);
	$moduleInstance->unsetRelatedList($relatedModuleInstance);
	$moduleInstance->unsetRelatedList($relatedModuleInstance,$relatedModule[0],$relatedModule[1]);
	echo "\n";
	$moduleInstance->setRelatedList($relatedModuleInstance, $relatedModule[0], Array('SELECT'),$relatedModule[1]);
	echo "\n";
}

$adb->query('CREATE TABLE IF NOT EXISTS vtiger_ticketsproductrel (
			ticketid int(91) NOT NULL,
		    productid int(91) NOT NULL,
		    qty int(19) NOT NULL,
		    listprice decimal(27,8)	NULL,
		    usedcurrency int(11) NOT NULL
		)');
echo "Create vtiger_ticketsproductrel DONE\n";

$log->debug("[END] Add Related Ticket With Service And Product");
?>
<!--2020-09-17 Thet Phyo Wai Create Related Ticket MSCRM var 1.0 Add End-->