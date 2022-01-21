<?php /* Smarty version Smarty-3.1.7, created on 2021-06-26 04:58:57
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\dashboards\DashBoardWidgetHtml.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47558466960c50034027fa6-53979501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01a8e0b469cf9a6222833be508e8ff9e7459f152' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\dashboards\\DashBoardWidgetHtml.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47558466960c50034027fa6-53979501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60c500340e91f',
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'DATA' => 0,
    'recordid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c500340e91f')) {function content_60c500340e91f($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHtmlHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div style="height:100%;width:100%;overflow: hidden;"><div style="height:80%;width:100%;overflow: auto;"><div style="height:5px;"></div><input class="widgetData" type='hidden' value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' /><input id="widgetReports4YouHtmlId" type='hidden' value='<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
' /><!-- div id="reports4you_widget_html_<?php echo $_REQUEST['tab'];?>
<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
" style="height:85%;width:95%;margin:auto;" ></div--><div class="dashboardWidgetContent"><?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
</div></div></div><div class="widgeticons dashBoardWidgetFooter"><div class="footerIcons pull-right"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div>
<?php }} ?>