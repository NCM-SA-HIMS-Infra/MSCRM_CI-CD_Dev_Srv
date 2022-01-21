<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 06:02:19
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3077667825f7d59ebb52c40-30593438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9196d9e3d80d701c2f686c193ab5ec72565962e8' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/Index.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3077667825f7d59ebb52c40-30593438',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d59ebb56db',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d59ebb56db')) {function content_5f7d59ebb56db($_smarty_tpl) {?>
<div class="main-container clearfix"><div class="ExtensionscontentsDiv contentsDiv"><div class="col-sm-12 col-xs-12 content-area" id="importModules"><div class="contents row"><div class="col-sm-12 col-xs-12" id="extensionContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ExtensionModules.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("LoginModals.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>