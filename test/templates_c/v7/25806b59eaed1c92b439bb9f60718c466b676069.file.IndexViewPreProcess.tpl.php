<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:11:28
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\IndexViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18843520865f9fc0bf6c96e3-90431613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25806b59eaed1c92b439bb9f60718c466b676069' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\IndexViewPreProcess.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18843520865f9fc0bf6c96e3-90431613',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9fc0bf87d59',
  'variables' => 
  array (
    'MODULE' => 0,
    'VIEW' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9fc0bf87d59')) {function content_5f9fc0bf87d59($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid app-nav"><div class="row"><?php echo $_smarty_tpl->getSubTemplate ("modules/ITS4YouReports/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></nav><div class="clearfix main-container"><div><div class="editViewPageDiv viewContent"><?php if ('Edit'!=$_smarty_tpl->tpl_vars['VIEW']->value&&'EditKeyMetricsRow'!=$_smarty_tpl->tpl_vars['VIEW']->value){?><div class="reports-content-area"> <?php }?><?php }} ?>