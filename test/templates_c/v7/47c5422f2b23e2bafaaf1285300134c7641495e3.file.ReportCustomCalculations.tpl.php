<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:01
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportCustomCalculations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8623246815f998ab9043981-19290998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47c5422f2b23e2bafaaf1285300134c7641495e3' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportCustomCalculations.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8623246815f998ab9043981-19290998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'CUSTOM_CALCULATIONS_INFO' => 0,
    'CUSTOM_CALCULATIONS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998ab906ea4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998ab906ea4')) {function content_5f998ab906ea4($_smarty_tpl) {?>

<br /><div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group col-lg-12"><label class="control-label textAlignLeft "><h4 style="float:left;"><?php echo vtranslate('LBL_CUSTOM_CALCULATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><a href="javascript:;" title="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_CALCULATIONS_INFO']->value;?>
"  style="float:left;"><i class="glyphicon glyphicon-info-sign" style="padding-left:0.5em;padding-top:1em;"></i>&nbsp;</a></label></div></div><div class="form-group"><div class="span9"><div class="row-fluid"><div class="col-lg-12 hide"><?php $_smarty_tpl->tpl_vars["cc_i"] = new Smarty_variable("WCCINRW", null, 0);?><?php $_smarty_tpl->tpl_vars["cc_special"] = new Smarty_variable('', null, 0);?><div id="cc_row_base"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CustomCalculationRow.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><?php $_smarty_tpl->tpl_vars["cc_special"] = new Smarty_variable('', null, 0);?><div class="col-lg-12" id="cc_td_cell"><?php if (empty($_smarty_tpl->tpl_vars['CUSTOM_CALCULATIONS']->value)){?><?php $_smarty_tpl->tpl_vars["cc_i"] = new Smarty_variable("1", null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CustomCalculationRow.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }else{ ?><?php  $_smarty_tpl->tpl_vars['cc_calculation_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cc_calculation_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['cc_i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CUSTOM_CALCULATIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cc_calculation_arr']->key => $_smarty_tpl->tpl_vars['cc_calculation_arr']->value){
$_smarty_tpl->tpl_vars['cc_calculation_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['cc_i']->value = $_smarty_tpl->tpl_vars['cc_calculation_arr']->key;
?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CustomCalculationRow.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php } ?><?php }?></div><div class="col-lg-12"><br><button type='button' class='btn btn-default' style='float:left;' onclick="addNewCustomCalculation()"><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate('LBL_NEW_CUSTOM_CALCULATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div></div></div></div><?php }} ?>