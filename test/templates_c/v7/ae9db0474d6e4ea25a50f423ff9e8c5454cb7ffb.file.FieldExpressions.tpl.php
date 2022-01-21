<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:11:40
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\FieldExpressions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17114836205f998a2cba4a51-88091644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae9db0474d6e4ea25a50f423ff9e8c5454cb7ffb' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\FieldExpressions.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17114836205f998a2cba4a51-88091644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columnIndex' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998a2cbb828',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998a2cbb828')) {function content_5f998a2cbb828($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["columnIndex"] = new Smarty_variable("WCCINRW", null, 0);?><div class="form-group hide" id='fieldExpressionsBase'><div class="fieldExpressionsBase " id='fieldExpressionsBaseWCCINRW' style="position:relative;left:40%;padding-left: 3%;padding-right: 3%"><div class="col-lg-5" data-backdrop="false" style="z-index: 900;min-width: 750px;overflow: visible;border:1px solid #ccc;padding:0px;"><div class="modal-header contentsBackground" style="text-align:left;"><button type="button" class="close" onClick="jQuery('#fieldExpressionsBase<?php echo $_smarty_tpl->tpl_vars['columnIndex']->value;?>
').css('display', 'none');" data-dismiss="modal" aria-hidden="true" style="margin-top:2px; opacity: .9;">&times;</button><h3><?php echo vtranslate('LBL_SET_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><div class="modal-body"><div class="row-fluid"><span class="span4" style="text-align:left;"><select name="fc_fval_<?php echo $_smarty_tpl->tpl_vars['columnIndex']->value;?>
" id="fc_fval_<?php echo $_smarty_tpl->tpl_vars['columnIndex']->value;?>
" onChange="AddFieldToFilter('<?php echo $_smarty_tpl->tpl_vars['columnIndex']->value;?>
',this);" class="inputElement"style="margin-top:0.5em;"></select></span></div></div></div><div class="clonedPopUp"></div></div></div><?php }} ?>