<!--2020-10-03 Thet Phyo Wai Contact Product Record Identifier Change MSCRM Ver 1.0 Start-->
<?php 
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Field.php');

$module = Vtiger_Module::getInstance('ContactProduct');
$field = Vtiger_Field::getInstance('machine_serial_no', $module);

$module->unsetEntityIdentifier();
echo "\n";
$module->setEntityIdentifier($field);
echo "\n";
?>
<!--2020-10-03 Thet Phyo Wai Contact Product Record Identifier Change MSCRM Ver 1.0 End-->