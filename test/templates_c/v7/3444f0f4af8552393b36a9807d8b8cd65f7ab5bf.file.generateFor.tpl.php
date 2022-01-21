<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/generateFor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7503135695f7d801e8b16e5-01589773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3444f0f4af8552393b36a9807d8b8cd65f7ab5bf' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/generateFor.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7503135695f7d801e8b16e5-01589773',
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
  'unifunc' => 'content_5f7d801e8b7ff',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801e8b7ff')) {function content_5f7d801e8b7ff($_smarty_tpl) {?>


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