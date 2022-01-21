<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:06:16
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/Edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11043302295f6591c8b584f0-48438073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e9b86ab9d91df225e0d6e5954204debd5589a0f' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/Edit.tpl',
      1 => 1600491589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11043302295f6591c8b584f0-48438073',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'ENTITY_MODULES' => 0,
    'MODULE_MODEL' => 0,
    'MODULE_ID' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591c8b9fa9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591c8b9fa9')) {function content_5f6591c8b9fa9($_smarty_tpl) {?>
<div class="listViewContentDiv col-lg-12"><div class="container-fluid editViewContainer"><div class="widget_header row-fluid"><div class="span8"><h2><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2></div></div><hr><form id="EditView" class="form-horizontal recordEditView" enctype="multipart/form-data" action="index.php" method="post" name="EditView"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="Save"><div class="contentHeader row-fluid clearfix"><h3 class="span8 textOverflowEllipsis"><?php echo vtranslate('LBL_CREATE_RELATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><span class="pull-right"><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>&nbsp;<a class="cancelLink" onclick="window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></span></div><br><table class="table table-bordered blockContainer showInlineTable"><tbody><tr style="background: #eee;"><th colspan="4"><?php echo vtranslate('LBL_REL_DETAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr><tr><td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue"><div class="row-fluid"><span class="span10"><input class="inputElement nameField" type="text" name="Name"></span></div></td><td class="fieldLabel"></td><td class="fieldValue"><input type="hidden" name="Active" value="1"></td></tr><tr><td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue"><div class="row-fluid"><span class="span10"><select name="sourceModule" class="inputElement select2"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ENTITY_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_ID']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_ID']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></span></div></td><td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue"><div class="row-fluid"><span class="span10"><select name="targetModule" class="inputElement select2"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ENTITY_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_ID']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_ID']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></span></div></td></tr><tr><td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue" colspan="3"><textarea rows="3" class="inputElement" style="padding: 5px; min-height: 80px; resize: vertical;" type="text" name="Description"></textarea></td></tr></tbody></table><div class="row-fluid"><div class="pull-right"><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>&nbsp;<a class="cancelLink" onclick="window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></div><div class="clearfix"></div></div></form></div></div><?php }} ?>