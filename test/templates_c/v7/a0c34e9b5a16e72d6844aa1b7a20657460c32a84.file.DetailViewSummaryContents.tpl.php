<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 08:06:36
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\HelpDesk\DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5994752375f9e6c8c59cc19-43597340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0c34e9b5a16e72d6844aa1b7a20657460c32a84' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\HelpDesk\\DetailViewSummaryContents.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5994752375f9e6c8c59cc19-43597340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e6c8c5aa35',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e6c8c5aa35')) {function content_5f9e6c8c5aa35($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>