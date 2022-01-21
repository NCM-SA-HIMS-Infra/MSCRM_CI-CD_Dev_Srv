<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:14:10
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\SettingsEditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115876383660d3ff8a932e38-69848669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b057b6df9784da0cc8d2a503b2abcba84b0db5d' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\SettingsEditView.tpl',
      1 => 1624506041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115876383660d3ff8a932e38-69848669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'VIEW' => 0,
    'MSG_SAVED' => 0,
    'SHARINGTYPES' => 0,
    'SHARINGTYPE' => 0,
    'MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60d3ff8a96865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60d3ff8a96865')) {function content_60d3ff8a96865($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\Project\\MSCRM_Release\\libraries\\Smarty\\libs\\plugins\\function.html_options.php';
?>
<div class="container-fluid" id="UninstallITS4YouReportsContainer"><form name="settings_edit" action="index.php" method="post" class="form-horizontal"><br><label class="pull-left themeTextColor font-x-x-large"><?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><br clear="all"><hr><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" /><input type="hidden" name="mode" value="SaveSettings" /><input type="hidden" name="msg_saved" value="<?php echo $_smarty_tpl->tpl_vars['MSG_SAVED']->value;?>
" /><div class="row-fluid"><table class="table table-bordered table-condensed themeTableColor"><thead><tr class="blockHeader"><th class="mediumWidthType" colspan="2"><span><strong><?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span></th></tr></thead><tbody><tr><td width="25%"><label class="muted pull-right marginRight10px"><strong><?php echo vtranslate('LBL_SHARING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</strong></label></td><td style="border-left: none;"><div class="pull-left col-lg-2"><select name="default_sharing" id="default_sharing" class="select2 inputElement row"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SHARINGTYPE']->value),$_smarty_tpl);?>
</select></div></td></tr></tbody></table></div><?php if ($_smarty_tpl->tpl_vars['MODE']->value=="edit"){?><div class="pull-right"><button class="btn btn-success" type="submit"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button><a class="cancelLink" onclick="javascript:window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }?></form></div><?php }} ?>