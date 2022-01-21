<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:13:57
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\generateFor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21088256025f998ab5c297b6-18629540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3147ad69b329d7b2a82b2e94e5b3ca766315b6b0' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\generateFor.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21088256025f998ab5c297b6-18629540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'generateForOptionsArray' => 0,
    'moduleGroupKey' => 0,
    'moduleGroupOpts' => 0,
    'optionArray' => 0,
    'selectedForOptions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998ab5c40ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998ab5c40ba')) {function content_5f998ab5c40ba($_smarty_tpl) {?>


<select multiple class="select2 col-lg-12 inputElement" id='generate_for' name='generate_for' data-rule-required="false" ><?php  $_smarty_tpl->tpl_vars['moduleGroupOpts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleGroupOpts']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleGroupKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['generateForOptionsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleGroupOpts']->key => $_smarty_tpl->tpl_vars['moduleGroupOpts']->value){
$_smarty_tpl->tpl_vars['moduleGroupOpts']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleGroupKey']->value = $_smarty_tpl->tpl_vars['moduleGroupOpts']->key;
?><optgroup label="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleGroupKey']->value,$_smarty_tpl->tpl_vars['moduleGroupKey']->value);?>
"><?php  $_smarty_tpl->tpl_vars['optionArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['optionArray']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['moduleGroupOpts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['optionArray']->key => $_smarty_tpl->tpl_vars['optionArray']->value){
$_smarty_tpl->tpl_vars['optionArray']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['optionArray']->value['value'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['optionArray']->value['value'],$_smarty_tpl->tpl_vars['selectedForOptions']->value)){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['optionArray']->value['text'];?>
</option><?php } ?></optgroup><?php } ?></select><?php }} ?>