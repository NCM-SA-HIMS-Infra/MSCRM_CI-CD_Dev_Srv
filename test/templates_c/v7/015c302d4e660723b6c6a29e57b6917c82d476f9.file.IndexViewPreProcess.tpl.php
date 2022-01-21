<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/IndexViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17969004885f7d801e6274a7-79843125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015c302d4e660723b6c6a29e57b6917c82d476f9' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/IndexViewPreProcess.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17969004885f7d801e6274a7-79843125',
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
  'unifunc' => 'content_5f7d801e6611f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801e6611f')) {function content_5f7d801e6611f($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid app-nav"><div class="row"><?php echo $_smarty_tpl->getSubTemplate ("modules/ITS4YouReports/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></nav><div class="clearfix main-container"><div><div class="editViewPageDiv viewContent"><?php if ('Edit'!=$_smarty_tpl->tpl_vars['VIEW']->value&&'EditKeyMetricsRow'!=$_smarty_tpl->tpl_vars['VIEW']->value){?><div class="reports-content-area"> <?php }?><?php }} ?>