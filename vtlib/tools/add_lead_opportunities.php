<!-- 2020/10/13 Thet Phyo Wai Add Lead MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Opportunity Module Add Field");

$module_name = 'Potentials';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_OPPORTUNITY_INFORMATION', $module);

/* Lead Name */
$field = new Vtiger_Field();
$field->name = 'lead_id';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_LEAD_NAME";
$blockInstance->addField($field);
$field->setRelatedModules(Array('Leads'));
echo "\n";

$log->debug("[END] Opportunity Module Add Field");
?>
<!-- 2020/10/13 Thet Phyo Wai Add Lead MSCRM Ver 1.0 End-->