<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:02
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportDashboards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8143744385f998aba74fca2-06661096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f03829e92da4521b7c56021949bab53456d6f2a5' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportDashboards.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8143744385f998aba74fca2-06661096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'primary_search_options' => 0,
    'primary_search_arr' => 0,
    'primary_search' => 0,
    'allmodules' => 0,
    'moduleName' => 0,
    'allowedmodules' => 0,
    'moduleLabel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998aba76ace',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998aba76ace')) {function content_5f998aba76ace($_smarty_tpl) {?>

<div style="border:1px solid #ccc;padding:4%;"><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('PrimarySearchBy',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select id="primary_search" name="primary_search" class="select2 inputElement" style="margin:auto;"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['primary_search_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['primary_search_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['primary_search_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['primary_search_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['primary_search_arr']->key => $_smarty_tpl->tpl_vars['primary_search_arr']->value){
$_smarty_tpl->tpl_vars['primary_search_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['primary_search_key']->value = $_smarty_tpl->tpl_vars['primary_search_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['primary_search_arr']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['primary_search_arr']->value['value']==$_smarty_tpl->tpl_vars['primary_search']->value){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['primary_search_arr']->value['text'];?>
</option><?php } ?></select></div></div><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('AllowInModules',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input type="hidden" name="allow_in_modules_hidden" id="allow_in_modules_hidden" value=""><select id="allow_in_modules" multiple name="allow_in_modules" class="select2 inputElement" style="margin:auto;"><?php  $_smarty_tpl->tpl_vars['moduleLabel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleLabel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allmodules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleLabel']->key => $_smarty_tpl->tpl_vars['moduleLabel']->value){
$_smarty_tpl->tpl_vars['moduleLabel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleLabel']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"<?php if (in_array($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['allowedmodules']->value)){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['moduleLabel']->value;?>
</option><?php } ?></select></div></div></div><?php }} ?>