<!-- 2020/09/10 Pyae Phyo Mon Add Field in Vendor HIMS Ver 1.0 Start-->
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

$module_name = 'Vendors';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_VENDOR_INFORMATION', $module);


/*Vendor Number*/
$field = new Vtiger_Field();
$field->name = 'vendor_number';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~O~LE~25';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_VENDOR_NUMBER';
$blockInstance->addField($field);


/*Vendor Short Name*/
$field = new Vtiger_Field();
$field->name = 'short_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_SHORT_NAME';
$blockInstance->addField($field);

/*Supplier Code*/
$field = new Vtiger_Field();
$field->name = 'vendor_code';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~25';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_VENDOR_CODE';
$blockInstance->addField($field);


/*Attention Name*/
$field = new Vtiger_Field();
$field->name = 'attention_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ATTENTION_NAME';
$blockInstance->addField($field);

/*Contact Person*/
$field = new Vtiger_Field();
$field->name = 'contact_person';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~25';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_CONTACT_PERSON';
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

/* transfer to WD */
$field = new Vtiger_Field();
$field->name = 'transfer_to_WD';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(3)';
$field->uitype = 56;
$field->typeofdata = 'C~O';
$field->masseditable = 0;
$field->quickcreate = 0;
$field->summaryfield = 0;
$field->label = 'LBL_TRANSFER_WD';
$blockInstance->addField($field);


$module = Vtiger_Module::getInstance($module_name);

$blockInstance = new Vtiger_Block();
$blockInstance->label = 'LBL_CONTRACT_INFORMATION';
$module->addBlock($blockInstance);

/* Lead Time(Order Period) */
$field = new Vtiger_Field();
$field->name = 'lead_time';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(10)';
$field->uitype = 7;
$field->typeofdata = 'I~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_LEAD_TIME';
$blockInstance->addField($field);


/* Incoterms */
$field = new Vtiger_Field();
$field->name = 'incoterms';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 33;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_INCOTERMS';
$array = array("FOB","CIF","C&F","CIP","EXW","FAS","FCA","CPT","DAT","DAP","DDP");
$field->setPicklistValues( $array );
$blockInstance->addField($field);

/* Payment Term */
$field = new Vtiger_Field();
$field->name = 'payment_term';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_PAYMENT_TERM';
$blockInstance->addField($field);


$log->debug("[END] Update Module");
?>

<!-- 2020/09/10 Pyae Phyo Mon Add Field in Vendor HIMS Ver 1.0 End-->