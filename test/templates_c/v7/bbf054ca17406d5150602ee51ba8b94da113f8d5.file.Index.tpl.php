<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 08:44:02
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15070419125f9bd252bfdb05-60190080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbf054ca17406d5150602ee51ba8b94da113f8d5' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\Index.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15070419125f9bd252bfdb05-60190080',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9bd252c2192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd252c2192')) {function content_5f9bd252c2192($_smarty_tpl) {?>
<div class="main-container clearfix"><div class="ExtensionscontentsDiv contentsDiv"><div class="col-sm-12 col-xs-12 content-area" id="importModules"><div class="contents row"><div class="col-sm-12 col-xs-12" id="extensionContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ExtensionModules.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("LoginModals.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>