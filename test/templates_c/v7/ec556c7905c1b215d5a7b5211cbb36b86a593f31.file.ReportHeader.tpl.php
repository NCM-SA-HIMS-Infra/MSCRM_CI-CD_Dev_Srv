<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:11:40
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19352035005f998a2cc23257-77990719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec556c7905c1b215d5a7b5211cbb36b86a593f31' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportHeader.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19352035005f998a2cc23257-77990719',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DATE_FILTERS' => 0,
    'REPORT_LIMIT' => 0,
    'PDFMakerActive' => 0,
    'IS_TEST_WRITE_ABLE' => 0,
    'RECORD_ID' => 0,
    'REPORT_CHANGED' => 0,
    'MODULE' => 0,
    'REPORT_MODEL' => 0,
    'CRITERIA_GROUPS' => 0,
    'filterConditionNotExists' => 0,
    'REPORTTYPE' => 0,
    'REPORT_FILTERS' => 0,
    'checkDashboardWidget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998a2cc728b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998a2cc728b')) {function content_5f998a2cc728b($_smarty_tpl) {?>


<link rel="stylesheet" type="text/css" media="all" href="modules/ITS4YouReports/classes/Reports4YouDefault.css"><script type="text/javascript" src="modules/ITS4YouReports/highcharts/js/rgbcolor.js"></script><script type="text/javascript" src="modules/ITS4YouReports/highcharts/js/canvg.js"> </script><div class="reportsDetailHeader no-print"><input type="hidden" name="date_filters" data-value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));?>
'/><input type="hidden" id="reportLimit" value="<?php echo $_smarty_tpl->tpl_vars['REPORT_LIMIT']->value;?>
"/><input type="hidden" id="pdfmaker_active" value="<?php echo $_smarty_tpl->tpl_vars['PDFMakerActive']->value;?>
"/><input type="hidden" id="is_test_write_able" value="<?php echo $_smarty_tpl->tpl_vars['IS_TEST_WRITE_ABLE']->value;?>
"/><input type="hidden" id="div_id" value="activate_pdfmaker"/><input type="hidden" name="report_filename" id="report_filename" value="" /><form method="post" action="IndexAjax" target="_blank"><input type="hidden" name="module" value="ITS4YouReports"/><input type="hidden" name="action" value="IndexAjax"/><input type="hidden" name="mode" value="ExportXLS"/><input type="hidden" name="filename" value="Test.xls"/><input type="hidden" name="report_html" id="report_html" value=""/></form><form method="post" action="index.php" name="GeneratePDF" id="GeneratePDF" target="_blank"><input type="hidden" name="module" value="ITS4YouReports"/><input type="hidden" name="action" value="GeneratePDF"/><input type="hidden" name="form_export_pdf_format" id="form_export_pdf_format" value=""/><input type="hidden" name="form_filename" id="form_filename" value=""/><input type="hidden" name="form_report_name" id="form_report_name" value=""/><input type="hidden" name="form_report_html" id="form_report_html" value=""/><input type="hidden" name="form_report_totals" id="form_report_totals" value=""/><input type="hidden" name="form_chart_canvas" id="form_chart_canvas" value=""/></form><form method="post" action="index.php" name="GenerateXLS" id="GenerateXLS" target="_blank"><input type="hidden" name="module" value="ITS4YouReports"/><input type="hidden" name="view" value="ExportReport"/><input type="hidden" name="mode" value="GetXLS"/><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
"/></form><form id="detailViewReport" onSubmit="" method="post" ><input type="hidden" name="module" value="ITS4YouReports"/><input type="hidden" name="view" value="Detail"/><input type="hidden" id="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
"/><input type="hidden" name='reload' id='reload' value='true'/><input type="hidden" name="currentMode" id="currentMode" value='generate' /><input type="hidden" name='report_changed' id='report_changed' value='<?php echo $_smarty_tpl->tpl_vars['REPORT_CHANGED']->value;?>
'/><input type="hidden" name="date_filters" data-value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));?>
'/><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php if ('custom_report'!=$_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getReportType()){?><br><div class=''><?php $_smarty_tpl->tpl_vars['filterConditionNotExists'] = new Smarty_variable((empty($_smarty_tpl->tpl_vars['CRITERIA_GROUPS']->value)), null, 0);?><button class="btn btn-default" name="modify_condition" data-val="<?php echo $_smarty_tpl->tpl_vars['filterConditionNotExists']->value;?>
"><strong><?php echo vtranslate('LBL_MODIFY_CONDITION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>&nbsp;&nbsp;<i class="fa <?php if ($_smarty_tpl->tpl_vars['filterConditionNotExists']->value==true){?> fa-chevron-right <?php }else{ ?> fa-chevron-down <?php }?>"></i></button></div><br><div class="row-fluid"><input type="hidden" id="widgetReports4YouId" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
"/><?php if ($_smarty_tpl->tpl_vars['REPORTTYPE']->value!=="custom_report"){?><div id="filterContainer" class="filterContainer filterElements well filterConditionContainer filterConditionsDiv <?php if (empty($_smarty_tpl->tpl_vars['CRITERIA_GROUPS']->value)==true){?> hide <?php }?>"><?php echo $_smarty_tpl->tpl_vars['REPORT_FILTERS']->value;?>
</div><?php }?></div><br><?php }?><div class="row-fluid"><div class="textAlignCenter"><button class="btn btn-default generateReport" data-mode="generate" value="<?php echo vtranslate('LBL_GENERATE_NOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/><strong><?php echo vtranslate('LBL_GENERATE_NOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;<?php if ($_smarty_tpl->tpl_vars['REPORTTYPE']->value!="custom_report"&&$_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isEditable()==true){?><button class="btn btn-success generateReport hide" id="saveReportBtn" data-mode="save" value="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php }?><?php if ($_smarty_tpl->tpl_vars['checkDashboardWidget']->value!=''&&$_smarty_tpl->tpl_vars['checkDashboardWidget']->value!="Exist"){?><button class="btn addWidget" data-mode="addwidget" value="<?php echo vtranslate('LBL_ADD_WIDGET',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/><strong><?php echo vtranslate('LBL_ADD_WIDGET',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php }?></div></div><br></form></div><div id="reportContentsDiv" style="padding-bottom:2em;"><?php }} ?>