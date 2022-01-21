<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:21:30
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\dashboards\DashBoardWidgetContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19335597605fb1fb7eafd587-30950373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfd80678b28f027dbe8badf5b4c5b109062f30d0' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\dashboards\\DashBoardWidgetContents.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19335597605fb1fb7eafd587-30950373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fb1fb7eb7d7a',
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'DATA' => 0,
    'recordid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fb1fb7eb7d7a')) {function content_5fb1fb7eb7d7a($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div style="height:5px;"></div>
<input class="widgetData" type='hidden' value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' /><input id="widgetReports4YouId" type='hidden' value='<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
' /><div id="reports4you_widget_<?php echo $_REQUEST['tab'];?>
<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
" style="height:85%;width:95%;margin:auto;" ></div><div class="dashboardWidgetContent"><?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
</div>

<div class="widgeticons dashBoardWidgetFooter">
    <div class="footerIcons pull-right">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>