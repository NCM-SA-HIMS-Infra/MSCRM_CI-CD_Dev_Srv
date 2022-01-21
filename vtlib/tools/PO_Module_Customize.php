<!-- 2020/09/11 Pyae Phyo Mon Purchase order Customize (Add Field) MSCRM Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] PurchaseOrder Module");

$module_name = 'PurchaseOrder';

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = Vtiger_Block::getInstance('LBL_PO_INFORMATION', $module);

/*Order Date*/
$field = new Vtiger_Field();
$field->name = 'order_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype =5;
$field->typeofdata = 'D~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ORDER_DATE';
$blockInstance->addField($field);


/*Order Issue Person*/
$field = new Vtiger_Field();
$field->name = 'order_issued_person';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype =1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ORDER_ISSUE_PERSON';
$blockInstance->addField($field);

/*Shipment*/
$field = new Vtiger_Field();
$field->name = 'shipment';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~O~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_SHIPMENT';
$blockInstance->addField($field);

/*Loading Port*/
$field = new Vtiger_Field();
$field->name = 'loadingport';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~O~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_LOADING_PORT';
$blockInstance->addField($field);

/* Approve */
$field = new Vtiger_Field();
$field->name = 'approve';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(3)';
$field->uitype = 56;
$field->typeofdata = 'C~O';
$field->masseditable = 0;
$field->quickcreate = 0;
$field->summaryfield = 0;
$field->label = 'LBL_APPROVE';
$blockInstance->addField($field);

$module = Vtiger_Module::getInstance($module_name);

$blockInstance = new Vtiger_Block();
$blockInstance->label = 'LBL_VENDOR_INFORMATION';
$module->addBlock($blockInstance);

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

/* Phone No */
$field = new Vtiger_Field();
$field->name = 'vendor_phone';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_VENDOR_PHONE_NO';
$blockInstance->addField($field);

/* Email */
$field = new Vtiger_Field();
$field->name = 'vendor_email';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_VENDOR_EMAIL';
$blockInstance->addField($field);

/* Address */
$field = new Vtiger_Field();
$field->name = 'address';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 21;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_ADDRESS';
$blockInstance->addField($field);

/*Esimate Arrival Date*/
$field = new Vtiger_Field();
$field->name = 'estimate_arrival_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype =5;
$field->typeofdata = 'D~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ESTIMATE_ARRIVAL_DATE';
$blockInstance->addField($field);

/* Incoterms */
$field = new Vtiger_Field();
$field->name = 'vendor_incoterms';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 33;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_VENDOR_INCOTERMS';
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


$module = Vtiger_Module::getInstance($module_name);

$blockInstance = new Vtiger_Block();
$blockInstance->label = 'LBL_PRINT_INFORMATION';
$module->addBlock($blockInstance);


/* Name */
$field = new Vtiger_Field();
$field->name = 'print_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 1;
$field->label = 'LBL_PRINT_NAME';
$blockInstance->addField($field);


/*Position*/
$field = new Vtiger_Field();
$field->name = 'print_position';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PRINT_POSITION';
$blockInstance->addField($field);


/*Company Name*/
$field = new Vtiger_Field();
$field->name = 'print_company_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~100';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PRINT_COMPANY_NAME';
$blockInstance->addField($field);

/*Place Port of Discharge*/
$field = new Vtiger_Field();
$field->name = 'place_port_of_discharge';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 1;
$field->typeofdata = 'V~M~LE~25';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLACE_PORT_OF_DISCHARGE';
$blockInstance->addField($field);

$log->debug("[END] Update Module");
?>

<!-- 2020/09/11 Pyae Phyo Mon Purchase order Customize (Add Field) MSCRM Ver 1.0 End-->
