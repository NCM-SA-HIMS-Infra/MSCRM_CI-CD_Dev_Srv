<!-- 2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 Start-->
<?php

$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');
include_once('modules/PickList/DependentPickListUtils.php');
include_once('modules/ModTracker/ModTracker.php');
include_once('include/utils/CommonUtils.php');

$db = PearDatabase::getInstance();

global $adb, $log;

$log->debug("[START] Ticket Module Add Field");

$module_name = 'HelpDesk';

$module = Vtiger_Module::getInstance($module_name);

$db->query('DROP TABLE IF EXISTS vtiger_support_type');
$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('support_type'));

$db->query('DROP TABLE IF EXISTS vtiger_trauble_categories');
$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('trauble_categories'));

$db->query('DROP TABLE IF EXISTS vtiger_invoice_pattern');
$db->pquery("DELETE FROM vtiger_picklist WHERE name = ?",array('invoice_pattern'));

//$db->query('ALTER TABLE vtiger_crmentity DROP COLUMN received_by');
//$db->query('ALTER TABLE vtiger_crmentity ADD received_by int(19)');

$blockInstance = Vtiger_Block::getInstance('LBL_TICKET_INFORMATION', $module);

/* Issue Date  */
$field = new Vtiger_Field();
$field->name = 'issue_date';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 5;
$field->typeofdata = 'D~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ISSUE_DATE';
$blockInstance->addField($field);
echo "\n";

/* Machine Serial No. */
$field = new Vtiger_Field();
$field->name = 'machine_serial_no';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'int(19)';
$field->uitype = 10;
$field->summaryfield = 1;
$field->typeofdata = 'I~O';
$field->label = "LBL_MACHINE_SERIAL_NO";
$blockInstance->addField($field);
$field->setRelatedModules(Array('ContactProduct'));
echo "\n";

/* Support Type */
$field = new Vtiger_Field();
$field->name = 'support_type';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(255)';
$field->uitype = 15;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_SUPPORT_TYPE';
$array = array("Telephone Support","On Site");
$field->setPicklistValues( $array );
$blockInstance->addField($field);
echo "\n";

/* Assigned User */
$field = new Vtiger_Field();
$field->name = 'assigned_user';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(36)';
$field->uitype = 101;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ASSIGNED_USER';
$blockInstance->addField($field);
$field->setRelatedModules(Array('Users'));
echo "\n";

/* Trauble Categories */
$field = new Vtiger_Field();
$field->name = 'trauble_categories';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'text';
$field->uitype = 33;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_TRAUBLE_CATEGORIES';
$array = array("Electronic","Hydraulic","Access Disconnection Alerm","Monitor Broken","No Display Appear On Unit","Disconnect USB Cable","Batteries are Worn");
$field->setPicklistValues( $array );
$blockInstance->addField($field);
echo "\n";

/* Plan Start Date  */
$field = new Vtiger_Field();
$field->name = 'startdate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->typeofdata = 'D~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLAN_START_DATE';
$blockInstance->addField($field);
echo "\n";

/* Plan End Date  */
$field = new Vtiger_Field();
$field->name = 'enddate';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'date';
$field->uitype = 5;
$field->typeofdata = 'D~M~OTH~GE~startdate';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLAN_END_DATE';
$blockInstance->addField($field);
echo "\n";

/* Time Start */
/*$field = new Vtiger_Field();
$field->name = 'time_start';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(50)';
$field->uitype = 2;
$field->typeofdata = 'T~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_TIME_START';
$blockInstance->addField($field);
echo "\n";*/

/* Time End */
/*$field = new Vtiger_Field();
$field->name = 'time_end';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(50)';
$field->uitype = 2;
$field->typeofdata = 'T~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_TIME_END';
$blockInstance->addField($field);
echo "\n";*/

/* Invoice Pattern */
$field = new Vtiger_Field();
$field->name = 'invoice_pattern';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(255)';
$field->uitype = 15;
$field->typeofdata = 'V~M';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_INVOICE_PATTERN';
$array = array("Need","No Need");
$field->setPicklistValues( $array );
$blockInstance->addField($field);
echo "\n";

/* Reason For Invoice */
$field = new Vtiger_Field();
$field->name = 'reason_for_invoice';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_REASON_FOR_INVOICE';
$blockInstance->addField($field);
echo "\n";

/* Plan Total Time (hr) */
$field = new Vtiger_Field();
$field->name = 'plan_total_time';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'decimal(11,2)';
$field->uitype = 1;
$field->typeofdata = 'N~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_PLAN_TOTAL_TIME';
$blockInstance->addField($field);
echo "\n";

/* Total Service Hour */
$field = new Vtiger_Field();
$field->name = 'total_service_hour';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'decimal(11,2)';
$field->uitype = 1;
$field->typeofdata = 'N~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_TOTAL_SERVICE_HOUR';
$blockInstance->addField($field);
echo "\n";

/* Acknowledge */
$field = new Vtiger_Field();
$field->name = 'acknowledge';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ACKNOWLEDGE';
$blockInstance->addField($field);
echo "\n";

/* Acknowledge(Myanmar) */
$field = new Vtiger_Field();
$field->name = 'acknowledge_myanmar';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ACKNOWLEDGE_MYANMAR';
$blockInstance->addField($field);
echo "\n";

$descriptionblock = Vtiger_Block::getInstance('LBL_DESCRIPTION_INFORMATION', $module);

/* Description(Myanmar) */
$field = new Vtiger_Field();
$field->name = 'description_myanmar';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_DESCRIPTION_MYANMAR';
$descriptionblock->addField($field);
echo "\n";

/* Noted Confirmed */
$field = new Vtiger_Field();
$field->name = 'noted_confirmed';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_NOTED_CONFIRMED';
$descriptionblock->addField($field);
echo "\n";

/* Noted Confirmed(Myanmar) */
$field = new Vtiger_Field();
$field->name = 'noted_confirmed_myanmar';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(250)';
$field->uitype = 21;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_NOTED_CONFIRMED_MYANMAR';
$descriptionblock->addField($field);
echo "\n";

/* Ticket Signatures */
$signblockInstance = new Vtiger_Block();
$signblockInstance->label = 'LBL_TICKET_SIGNATURES';
$module->addBlock($signblockInstance);
echo "\n";

/* Engineer Name */
$field = new Vtiger_Field();
$field->name = 'engineer_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_ENGINEER_NAME';
$signblockInstance->addField($field);
echo "\n";

/* Customer Name */
$field = new Vtiger_Field();
$field->name = 'customer_name';
$field->table = $module->basetable;
$field->column = $field->name;
$field->columntype = 'varchar(100)';
$field->uitype = 1;
$field->typeofdata = 'V~O';
$field->masseditable = 0;
$field->quickcreate = 1;
$field->summaryfield = 0;
$field->label = 'LBL_CUSTOMER_NAME';
$signblockInstance->addField($field);
echo "\n";

$db->pquery("UPDATE `vtiger_field` SET `vtiger_field`.`uitype` = 21 WHERE tabid = 13 AND fieldname = 'description'");

/*Update Assigned To => Received By*/
$db->pquery("UPDATE `vtiger_field` SET `vtiger_field`.`fieldlabel` = 'LBL_RECEIVED_BY' WHERE `vtiger_field`.`tablename` = 'vtiger_crmentity' AND `vtiger_field`.`fieldname` = 'assigned_user_id' AND `vtiger_field`.`tabid` = '13'");


$log->debug("[END] Ticket Module Add Field");
?>
<!-- 2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 End-->