<?php /* Smarty version Smarty-3.1.7, created on 2020-09-20 08:36:14
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5392192315f67147e79d118-16105290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f076dc16a7df07e2ed16eb6b75a7845b37a891' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/DetailViewHeaderTitle.tpl',
      1 => 1600491958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5392192315f67147e79d118-16105290',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_NAME' => 0,
    'SELECTED_MENU_CATEGORY' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f67147e7a9a2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f67147e7a9a2')) {function content_5f67147e7a9a2($_smarty_tpl) {?>
<div class="col-lg-6 col-md-6 col-sm-6"><div class="record-header clearfix"><?php if (!$_smarty_tpl->tpl_vars['MODULE']->value){?><?php $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_NAME']->value, null, 0);?><?php }?><div class="hidden-sm hidden-xs recordImage bg_<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
 app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><div class="name"><span><strong><i class="vicon-<?php echo strtolower($_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></strong></span></div></div><div class="recordBasicInfo"><div class="info-row"><h4><span class="recordLabel pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><span><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
</span>&nbsp;</span></h4></div><div class="info-row"><span class="modulename_label"><?php echo vtranslate('LBL_MODULENAMES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</span>&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['RECORD']->value->get('module'),$_smarty_tpl->tpl_vars['RECORD']->value->get('module'));?>
</div></div></div></div><?php }} ?>