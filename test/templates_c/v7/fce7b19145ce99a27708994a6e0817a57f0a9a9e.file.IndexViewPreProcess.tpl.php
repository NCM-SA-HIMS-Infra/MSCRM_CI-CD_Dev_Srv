<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:11:37
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\IndexViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10979795665f998a2957a6f2-98655603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fce7b19145ce99a27708994a6e0817a57f0a9a9e' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\IndexViewPreProcess.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10979795665f998a2957a6f2-98655603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'VIEW' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998a2963bc6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998a2963bc6')) {function content_5f998a2963bc6($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid app-nav"><div class="row"><?php echo $_smarty_tpl->getSubTemplate ("modules/ITS4YouReports/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></nav><div class="clearfix main-container"><div><div class="editViewPageDiv viewContent"><?php if ('Edit'!=$_smarty_tpl->tpl_vars['VIEW']->value&&'EditKeyMetricsRow'!=$_smarty_tpl->tpl_vars['VIEW']->value){?><div class="reports-content-area"> <?php }?><?php }} ?>