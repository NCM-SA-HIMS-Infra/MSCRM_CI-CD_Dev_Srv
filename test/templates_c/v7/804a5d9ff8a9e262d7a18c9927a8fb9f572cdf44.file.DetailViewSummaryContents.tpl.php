<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 06:25:31
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Invoice\DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19388200965f9e54dbe8e022-25752330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '804a5d9ff8a9e262d7a18c9927a8fb9f572cdf44' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Invoice\\DetailViewSummaryContents.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19388200965f9e54dbe8e022-25752330',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e54dbe9ebf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e54dbe9ebf')) {function content_5f9e54dbe9ebf($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>