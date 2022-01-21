<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:11:30
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportLabels.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10948187355f9fc1a0d18ef4-76431665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3bd932f2b4392077fc725648e6c8f1a84f877b3' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportLabels.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10948187355f9fc1a0d18ef4-76431665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9fc1a0d57cf',
  'variables' => 
  array (
    'ROWS_COUNT' => 0,
    'COL_SPAN' => 0,
    'labels_html' => 0,
    'lbl_type' => 0,
    'MODULE' => 0,
    'type_arr' => 0,
    'type_row_lbl' => 0,
    'ROWS_I' => 0,
    'fieldarray' => 0,
    'fieldkey' => 0,
    'fieldinput' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9fc1a0d57cf')) {function content_5f9fc1a0d57cf($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'F:\\Project\\MSCRM_Release\\libraries\\Smarty\\libs\\plugins\\function.math.php';
?>

<?php $_smarty_tpl->tpl_vars["ROWS_COUNT1"] = new Smarty_variable($_smarty_tpl->tpl_vars['ROWS_COUNT']->value, null, 0);?><?php $_smarty_tpl->tpl_vars["ROWS_COUNT2"] = new Smarty_variable($_smarty_tpl->tpl_vars['ROWS_COUNT']->value+1, null, 0);?><?php $_smarty_tpl->tpl_vars["COL_SPAN"] = new Smarty_variable(2, null, 0);?><?php if ($_smarty_tpl->tpl_vars['ROWS_COUNT']->value>20){?><?php echo smarty_function_math(array('assign'=>"ROWS_COUNT1",'equation'=>"(".($_smarty_tpl->tpl_vars['ROWS_COUNT1']->value)."/2)+2"),$_smarty_tpl);?>
<?php echo smarty_function_math(array('assign'=>"ROWS_COUNT2",'equation'=>"(".($_smarty_tpl->tpl_vars['ROWS_COUNT2']->value)."/2)+2"),$_smarty_tpl);?>
<?php $_smarty_tpl->tpl_vars["COL_SPAN"] = new Smarty_variable($_smarty_tpl->tpl_vars['COL_SPAN']->value+2, null, 0);?><?php }?><div style="border:1px solid #ccc;padding:4%;"><input type="hidden" name="labels_to_go" id="labels_to_go" value="_XYZ_"><?php $_smarty_tpl->tpl_vars["ROWS_I"] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['type_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['lbl_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['labels_html']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type_arr']->key => $_smarty_tpl->tpl_vars['type_arr']->value){
$_smarty_tpl->tpl_vars['type_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['lbl_type']->value = $_smarty_tpl->tpl_vars['type_arr']->key;
?><?php if ($_smarty_tpl->tpl_vars['lbl_type']->value=="SC"){?><?php $_smarty_tpl->tpl_vars["type_row_lbl"] = new Smarty_variable(vtranslate("LBL_SC_LABELS",$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['lbl_type']->value=="SM"){?><?php $_smarty_tpl->tpl_vars["type_row_lbl"] = new Smarty_variable(vtranslate("LBL_SM_LABELS",$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php }?><?php if (!empty($_smarty_tpl->tpl_vars['type_arr']->value)){?><div class="row"><div class="form-group"><label class="control-label textAlignLeft"><h4><?php echo $_smarty_tpl->tpl_vars['type_row_lbl']->value;?>
</h4></label></div></div><?php }?><?php $_smarty_tpl->tpl_vars["ROWS_I"] = new Smarty_variable($_smarty_tpl->tpl_vars['ROWS_I']->value+1, null, 0);?><?php $_smarty_tpl->tpl_vars["make_row"] = new Smarty_variable(1, null, 0);?><?php  $_smarty_tpl->tpl_vars['fieldarray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldarray']->_loop = false;
 $_smarty_tpl->tpl_vars['fieldi'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldarray']->key => $_smarty_tpl->tpl_vars['fieldarray']->value){
$_smarty_tpl->tpl_vars['fieldarray']->_loop = true;
 $_smarty_tpl->tpl_vars['fieldi']->value = $_smarty_tpl->tpl_vars['fieldarray']->key;
?><?php $_smarty_tpl->tpl_vars["fieldkey"] = new Smarty_variable($_smarty_tpl->tpl_vars['fieldarray']->value['translated_key'], null, 0);?><?php $_smarty_tpl->tpl_vars["fieldinput"] = new Smarty_variable($_smarty_tpl->tpl_vars['fieldarray']->value['translate_html'], null, 0);?><div class="row"><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo $_smarty_tpl->tpl_vars['fieldkey']->value;?>
</label><div class="col-lg-4"><?php echo $_smarty_tpl->tpl_vars['fieldinput']->value;?>
</div></div></div><?php $_smarty_tpl->tpl_vars["ROWS_I"] = new Smarty_variable($_smarty_tpl->tpl_vars['ROWS_I']->value+1, null, 0);?><?php } ?><?php } ?></div><?php }} ?>