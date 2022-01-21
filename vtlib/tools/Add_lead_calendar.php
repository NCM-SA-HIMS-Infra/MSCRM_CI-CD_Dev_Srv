<!-- 2020/10/14 Thet Phyo Wai Add Calendar MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Calendar Module Add Field");

$module_name = 'Events';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_RELATED_TO', $module);

/* Lead Name */
$field = new Vtiger_Field();
$field->name = 'lead_id';
$field->table = 'vtiger_activity';
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_LEAD_NAME";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Leads'));
echo "\n";

$module_name2 = 'Calendar';

$module2 = Vtiger_Module::getInstance($module_name2);

$blockInstance2 = Vtiger_Block::getInstance('LBL_TASK_INFORMATION', $module2);

/* Lead Name */
$field2 = new Vtiger_Field();
$field2->name = 'lead_id';
$field2->table = 'vtiger_activity';
$field2->column = $field2->name;
$field2->columntype = 'int(19)';
$field2->uitype = 10;
$field2->summaryfield = 1;
$field2->typeofdata = 'I~O';
$field2->label = "LBL_LEAD_NAME";
$blockInstance2->addField($field2);
$field2->setRelatedModules(Array('Leads'));
echo "\n";

$log->debug("[END] Calendar Module Add Field");
?>
<!-- 2020/10/14 Thet Phyo Wai Add Lead MSCRM Ver 1.0 Start-->