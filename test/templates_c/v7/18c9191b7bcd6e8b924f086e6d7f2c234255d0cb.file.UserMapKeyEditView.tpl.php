<?php /* Smarty version Smarty-3.1.7, created on 2021-01-15 09:54:42
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\UserMapKeyEditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182756530760010afaee6543-39002657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18c9191b7bcd6e8b924f086e6d7f2c234255d0cb' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\UserMapKeyEditView.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182756530760010afaee6543-39002657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'VIEW' => 0,
    'MSG_SAVED' => 0,
    'MAPS_API_USE_TYPE' => 0,
    'IS_ADMIN_USER' => 0,
    'DEFAULT_MAPS_API_KEY' => 0,
    'MAPS_API_KEY' => 0,
    'MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60010afb005a0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60010afb005a0')) {function content_60010afb005a0($_smarty_tpl) {?>
<div class="container-fluid" id="UninstallITS4YouReportsContainer"><form name="user_map_key_edit" action="index.php" method="post" class="form-horizontal"><br><label class="pull-left themeTextColor font-x-x-large"><?php echo vtranslate('LBL_USER_API_KEY_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><br clear="all"><hr><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" /><input type="hidden" name="mode" value="SaveApiKey" /><input type="hidden" name="msg_saved" value="<?php echo $_smarty_tpl->tpl_vars['MSG_SAVED']->value;?>
" /><div class="row-fluid"><table class="table table-bordered table-condensed themeTableColor"><thead><tr class="blockHeader"><th class="mediumWidthType" colspan="2"><span><strong><?php echo vtranslate('LBL_DEFINE_API_KEY_DESC_BING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span></th></tr></thead><tbody><tr><td width="25%"><label class="muted pull-right marginRight10px"><strong><?php echo vtranslate('API_KEY_BING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</strong></label></td><td style="border-left: none;"><div class="pull-left col-lg-2"><select name="maps_api_use_type" id="maps_api_use_type" class="select2 inputElement row"><option value="default" <?php if ('detault'==$_smarty_tpl->tpl_vars['MAPS_API_USE_TYPE']->value){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_DEFAULT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="user" <?php if ('user'==$_smarty_tpl->tpl_vars['MAPS_API_USE_TYPE']->value){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_USER_DEFINED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><div class="pull-left col-lg-5 maps_api_keys"><?php if ($_smarty_tpl->tpl_vars['IS_ADMIN_USER']->value){?><input name="maps_api_key_default" id="maps_api_key_default" autocomplete="off" class="inputElement <?php if ('default'!=$_smarty_tpl->tpl_vars['MAPS_API_USE_TYPE']->value){?>hide<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_MAPS_API_KEY']->value;?>
"placeholder="<?php echo vtranslate('LBL_DEFAULT_KEY_PLACEHOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php }?><input name="maps_api_key_user" id="maps_api_key_user" autocomplete="off" class="inputElement <?php if ('user'!=$_smarty_tpl->tpl_vars['MAPS_API_USE_TYPE']->value){?>hide<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['MAPS_API_KEY']->value;?>
"placeholder="<?php echo vtranslate('LBL_USER_DEFINED_KEY_PLACEHOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></div></td></tr></tbody></table></div><?php if ($_smarty_tpl->tpl_vars['MODE']->value=="edit"){?><div class="pull-right"><button class="btn btn-success" type="submit"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button><a class="cancelLink" onclick="javascript:window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }?></form></div><?php }} ?>