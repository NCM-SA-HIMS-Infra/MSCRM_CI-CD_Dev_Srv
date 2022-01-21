<?php /* Smarty version Smarty-3.1.7, created on 2021-06-26 05:11:15
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportOSMaps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3104567125fa3b38c3b4aa3-39255840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '551078d58fab67fada45872b80fdc3824db22f3f' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportOSMaps.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3104567125fa3b38c3b4aa3-39255840',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fa3b38c50209',
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_OPTIONS' => 0,
    'optGroup' => 0,
    'reportModule' => 0,
    'allColumnsArray' => 0,
    'columnArr' => 0,
    'columnVal' => 0,
    'MAP_COLUMNS' => 0,
    'columnText' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fa3b38c50209')) {function content_5fa3b38c50209($_smarty_tpl) {?>

<div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_PIN_TITLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[pin_title]" id="maps[pin_title]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['pin_title']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_PIN_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[pin_description]" id="maps[pin_description]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['pin_description']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_STREET',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[street]" id="maps[street]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['street']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_CITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[city]" id="maps[city]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['city']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_STATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[state]" id="maps[state]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['state']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_ZIP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[zip]" id="maps[zip]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['zip']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_COUNTRY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[country]" id="maps[country]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['allColumnsArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allColumnsArray']->_loop = false;
 $_smarty_tpl->tpl_vars['optGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allColumnsArray']->key => $_smarty_tpl->tpl_vars['allColumnsArray']->value){
$_smarty_tpl->tpl_vars['allColumnsArray']->_loop = true;
 $_smarty_tpl->tpl_vars['optGroup']->value = $_smarty_tpl->tpl_vars['allColumnsArray']->key;
?><?php if ($_smarty_tpl->tpl_vars['optGroup']->value!=''){?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['optGroup']->value,$_smarty_tpl->tpl_vars['reportModule']->value);?>
'><?php  $_smarty_tpl->tpl_vars['columnArr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columnArr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allColumnsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columnArr']->key => $_smarty_tpl->tpl_vars['columnArr']->value){
$_smarty_tpl->tpl_vars['columnArr']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['columnVal'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['value'], null, 0);?><?php $_smarty_tpl->tpl_vars['columnText'] = new Smarty_variable($_smarty_tpl->tpl_vars['columnArr']->value['text'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['columnVal']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['columnVal']->value===$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['country']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['columnText']->value;?>
</option><?php } ?></optgroup><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_MAPS_ZOOM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="maps[zoom]" id="maps[zoom]" data-rule-required="false"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 23+1 - (1) : 1-(23)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['MAP_COLUMNS']->value['zoom']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select></div></div></div></div><?php }} ?>