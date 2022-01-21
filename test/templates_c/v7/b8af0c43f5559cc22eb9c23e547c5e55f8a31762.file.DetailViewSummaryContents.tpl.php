<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 04:08:52
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PurchaseOrder\DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10687732125f9e34d45dc5d7-58261588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8af0c43f5559cc22eb9c23e547c5e55f8a31762' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PurchaseOrder\\DetailViewSummaryContents.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10687732125f9e34d45dc5d7-58261588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e34d45edbe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e34d45edbe')) {function content_5f9e34d45edbe($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>