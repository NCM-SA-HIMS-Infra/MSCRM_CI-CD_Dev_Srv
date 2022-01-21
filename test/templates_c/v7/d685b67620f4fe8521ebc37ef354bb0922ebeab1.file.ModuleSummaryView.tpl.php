<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 04:08:52
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PurchaseOrder\ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7044121215f9e34d453a109-12736380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd685b67620f4fe8521ebc37ef354bb0922ebeab1' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PurchaseOrder\\ModuleSummaryView.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7044121215f9e34d453a109-12736380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e34d454a54',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e34d454a54')) {function content_5f9e34d454a54($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>