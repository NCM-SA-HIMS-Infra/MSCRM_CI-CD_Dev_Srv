<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:11:30
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportColumnsTotal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13006351165f9fc1a0ae3f84-01696714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12f667fd969023afeb2ce0f9637c074a9fd86bf4' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportColumnsTotal.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13006351165f9fc1a0ae3f84-01696714',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9fc1a0b2988',
  'variables' => 
  array (
    'CURL' => 0,
    'MODULE' => 0,
    'BLOCK1' => 0,
    'rowname' => 0,
    'calculations' => 0,
    'checkbox' => 0,
    'cc_populated' => 0,
    'ACT_MODE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9fc1a0b2988')) {function content_5f9fc1a0b2988($_smarty_tpl) {?>

<input type="hidden" name="curl_to_go" id="curl_to_go" value="<?php echo $_smarty_tpl->tpl_vars['CURL']->value;?>
"><div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><label class="control-label textAlignLeft col-lg-12"><h4><?php echo vtranslate('LBL_COLUMNS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></label></div></div><div class="row"><div class="form-group"><div class="col-lg-2">&nbsp;</div><div class="col-lg-1 textAlignCenter"><label class="control-label"><?php echo vtranslate("LBL_COLUMNS_SUM",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-1 textAlignCenter"><label class="control-label"><?php echo vtranslate("LBL_COLUMNS_AVERAGE",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-1 textAlignCenter"><label class="control-label"><?php echo vtranslate("LBL_COLUMNS_LOW_VALUE",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-1 textAlignCenter"><label class="control-label"><?php echo vtranslate("LBL_COLUMNS_LARGE_VALUE",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div></div></div><?php  $_smarty_tpl->tpl_vars['calculations'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['calculations']->_loop = false;
 $_smarty_tpl->tpl_vars['rowname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BLOCK1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['calculations']->key => $_smarty_tpl->tpl_vars['calculations']->value){
$_smarty_tpl->tpl_vars['calculations']->_loop = true;
 $_smarty_tpl->tpl_vars['rowname']->value = $_smarty_tpl->tpl_vars['calculations']->key;
?><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo $_smarty_tpl->tpl_vars['rowname']->value;?>
</label></div><?php  $_smarty_tpl->tpl_vars['checkbox'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['checkbox']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['calculations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['checkbox']->key => $_smarty_tpl->tpl_vars['checkbox']->value){
$_smarty_tpl->tpl_vars['checkbox']->_loop = true;
?><div class="col-lg-1 textAlignCenter"><input name="<?php echo $_smarty_tpl->tpl_vars['checkbox']->value['name'];?>
" type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checkbox']->value['checked'];?>
 class="inputElement" value=""></div><?php } ?></div></div><?php }
if (!$_smarty_tpl->tpl_vars['calculations']->_loop) {
?><div class="row"><div class="form-group"><div class="col-lg-12"><label class="control-label textAlignLeft"><?php echo vtranslate("NO_CALCULATION_COLUMN",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div></div></div><?php } ?></div><?php if ($_smarty_tpl->tpl_vars['cc_populated']->value!=='true'&&$_smarty_tpl->tpl_vars['ACT_MODE']->value==='ChangeSteps'){?>|#<&NBX&>#|<?php echo $_smarty_tpl->getSubTemplate ('modules/ITS4YouReports/ReportCustomCalculations.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php $_smarty_tpl->tpl_vars['cc_populated'] = new Smarty_variable('true', null, 0);?><?php }?><input type="hidden" id="cc_populated" value="<?php echo $_smarty_tpl->tpl_vars['cc_populated']->value;?>
"><?php }} ?>