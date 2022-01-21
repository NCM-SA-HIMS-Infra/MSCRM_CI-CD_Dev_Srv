<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:02
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\Buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7948421575f998abaa37080-52496992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a360d47aead9e780710d87518bdf06b0fc00fbd' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\Buttons.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7948421575f998abaa37080-52496992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998abaa49f0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998abaa49f0')) {function content_5f998abaa49f0($_smarty_tpl) {?>

<div class="modal-overlay-footer"><div class="row clearfix"><div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '><button type="button" class="btn btn-default" name="back_rep_top" id="back_rep_top"><i class="fa fa-chevron-left"></i>&nbsp;<?php echo vtranslate('LBL_BACK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<button class="btn btn-success saveButton" id="savebtn" type="button"><?php echo vtranslate('LBL_SAVE_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<button class="btn btn-success saveButton" id="saverunbtn" type="button"><?php echo vtranslate('LBL_SAVE_RUN_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<a class="cancelLink" href="javascript:history.back()" type="reset"><?php echo vtranslate('LBL_CANCEL_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>&nbsp;&nbsp;<button type="button" class="btn btn-default" name="next" id="next_rep_top"><i class="fa fa-chevron-right"></i>&nbsp;<?php echo vtranslate('LNK_LIST_NEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div></div><?php }} ?>