<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:04:19
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/ITS4YouInstaller/Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1810675405f6591530f5639-68450353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f72df4ee07c2dfa4501968d63a257b8cfc21eea1' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/ITS4YouInstaller/Footer.tpl',
      1 => 1600491838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1810675405f6591530f5639-68450353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591530f993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591530f993')) {function content_5f6591530f993($_smarty_tpl) {?>

<br><div class="small" style="color: rgb(153, 153, 153);text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo ITS4YouInstaller_Version_Helper::$version;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Footer.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>