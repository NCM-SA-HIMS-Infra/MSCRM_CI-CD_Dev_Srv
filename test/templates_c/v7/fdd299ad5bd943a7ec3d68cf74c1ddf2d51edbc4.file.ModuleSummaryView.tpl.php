<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 06:25:31
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Invoice\ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16102142735f9e54dbde2bf5-51786502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdd299ad5bd943a7ec3d68cf74c1ddf2d51edbc4' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Invoice\\ModuleSummaryView.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16102142735f9e54dbde2bf5-51786502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e54dbdfd13',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e54dbdfd13')) {function content_5f9e54dbdfd13($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>