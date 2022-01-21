<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/CustomCalculationRow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20418414965f7d801ea266c1-11343699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a7ad9170778f3fc1b414f9fbb6129fbcdf6dc5' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/CustomCalculationRow.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20418414965f7d801ea266c1-11343699',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cc_i' => 0,
    'cc_calculation_arr' => 0,
    'MODULE' => 0,
    'cc_special' => 0,
    'COLUMNS_OPTIONS' => 0,
    'optName' => 0,
    'all_columns_array' => 0,
    'column_array' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801ea3fda',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801ea3fda')) {function content_5f7d801ea3fda($_smarty_tpl) {?>

<div id="cc_row_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class="cc_row_class col-lg-12" style="padding:5px 0px 5px 0px;"><div class="col-lg-3"><input type="hidden" id="cc_id_val" value="<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" ><input type="text" name="cc_name_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" id="cc_name_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class="inputElement col-lg-2 cc_row_name" value="<?php echo $_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_name'];?>
" placeholder="<?php echo vtranslate('LBL_CUSTOM_CALCULATION_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" ></div><div class="col-lg-2"><select name="cc_options_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" id="cc_options_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class=" <?php echo $_smarty_tpl->tpl_vars['cc_special']->value;?>
 inputElement cc-new-select"  onChange="addCustomCalculationValue(this,'cc_calculation_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
')"><option value="" selected ><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['all_columns_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['all_columns_array']->_loop = false;
 $_smarty_tpl->tpl_vars['optName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['COLUMNS_OPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['all_columns_array']->key => $_smarty_tpl->tpl_vars['all_columns_array']->value){
$_smarty_tpl->tpl_vars['all_columns_array']->_loop = true;
 $_smarty_tpl->tpl_vars['optName']->value = $_smarty_tpl->tpl_vars['all_columns_array']->key;
?><optgroup label='<?php echo $_smarty_tpl->tpl_vars['optName']->value;?>
'><?php  $_smarty_tpl->tpl_vars['column_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column_array']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_columns_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column_array']->key => $_smarty_tpl->tpl_vars['column_array']->value){
$_smarty_tpl->tpl_vars['column_array']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['column_array']->value['value'];?>
" ><?php echo $_smarty_tpl->tpl_vars['column_array']->value['text'];?>
</option><?php } ?></optgroup><?php } ?></select></div><div class="col-lg-3"><textarea name="cc_calculation_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" id="cc_calculation_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class="form-control col-sm-6 resize-vertical cc-new-textarea" style="margin:auto;height:28px;" value="" placeholder="<?php echo vtranslate('LBL_CUSTOM_CALCULATION_EXPRESSION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" ><?php echo $_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_calculation'];?>
</textarea></div><div class="col-lg-2"><input type="hidden" id="cc_totals_hidden_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" name="cc_totals_hidden_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_totals_hidden'];?>
" class="cc-totals-hidden"><select name="cc_totals_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" id="cc_totals_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" multiple class=" <?php echo $_smarty_tpl->tpl_vars['cc_special']->value;?>
 inputElement cc-new-select cc-totals"  ><option value="sum" <?php if (in_array('sum',$_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_totals'])){?>selected<?php }?> ><?php echo vtranslate('SUM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="avg" <?php if (in_array('avg',$_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_totals'])){?>selected<?php }?> ><?php echo vtranslate('AVG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="min" <?php if (in_array('min',$_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_totals'])){?>selected<?php }?> ><?php echo vtranslate('MIN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="max" <?php if (in_array('max',$_smarty_tpl->tpl_vars['cc_calculation_arr']->value['cc_totals'])){?>selected<?php }?> ><?php echo vtranslate('MAX',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><div class="col-lg-2"><span><a onclick="deleteCustomCalculationRow(<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
);" href="javascript:;"><img src="modules/ITS4YouReports/img/Delete.png" align="absmiddle" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
..." border="0"></a></span>&nbsp;<span><a data-original-title="" href="#" id="cc_tooltip_<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class="editHelpInfo tooltipstered" onmouseover="displayCustomCalculationArea(<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
)" onmouseout="hideCustomCalculationArea(<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
)" data-placement="top" data-text="test" data-template="<div class='tooltip' role='tooltip'><div class='tooltip-arrow'></div><div class='tooltip-inner' style='text-align: left'></div></div>"><i class="glyphicon glyphicon-info-sign alignMiddle"></i></a><span id="cc_tooltip_base<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
" class="" style="z-index:999;position:relative;top:-23px;left:-100px;display:none;" ><span class='tooltip-arrow'></span><span class='tooltip-inner' style='text-align: left' id="cc_tooltip_content<?php echo $_smarty_tpl->tpl_vars['cc_i']->value;?>
"></span></span></span></div></div><?php }} ?>