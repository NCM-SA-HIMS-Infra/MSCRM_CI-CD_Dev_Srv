<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 08:06:36
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\HelpDesk\ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1341912515f9e6c8c4c2837-76328836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '112efea6cd6a02d69701d90b4b1cdde3b13d6793' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\HelpDesk\\ModuleSummaryView.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1341912515f9e6c8c4c2837-76328836',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e6c8c4d01c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e6c8c4d01c')) {function content_5f9e6c8c4d01c($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>