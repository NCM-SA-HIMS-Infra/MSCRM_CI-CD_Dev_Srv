<!-- 2020/09/16 Pyae Phyo Mon Add Field in Quotes HIMS Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Vendor Module");

$module_name = 'Quotes';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_TERMS_INFORMATION', $module);

/*Validity*/
$field = new Vtiger_Field();
$field->name = 'validity';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_VALIDITY';
$blockInstance->addField($field);

/*Payment Terms*/
$field = new Vtiger_Field();
$field->name = 'paymentterms';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PAYMENTTERMS';
$blockInstance->addField($field);

/*Delivery Time*/
$field = new Vtiger_Field();
$field->name = 'deliverytime';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_DELIVERY_TIME';
$blockInstance->addField($field);

/*Other*/
$field = new Vtiger_Field();
$field->name = 'other';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_OTHER';
$blockInstance->addField($field);


$module = Vtiger_Module::getInstance($module_name);

$blockInstance = new Vtiger_Block();
$blockInstance->label = 'LBL_PRINT_INFORMATION';
$module->addBlock($blockInstance);


/* Name */
$field = new Vtiger_Field();
$field->name = 'name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_NAME';
$blockInstance->addField($field);


/*Position*/
$field = new Vtiger_Field();
$field->name = 'position';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_POSITION';
$blockInstance->addField($field);


/*Company Name*/
$field = new Vtiger_Field();
$field->name = 'company_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_COMPANY_NAME';
$blockInstance->addField($field);

/*Refrence*/
$field = new Vtiger_Field();
$field->name = 'reference';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_REFRENCE';
$blockInstance->addField($field);

$log->debug("[END] Update Module");
?>
<!-- 2020/09/16 Pyae Phyo Mon Add Field in Quotes HIMS Ver 1.0 End-->
