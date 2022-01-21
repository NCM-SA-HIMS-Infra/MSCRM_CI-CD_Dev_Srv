<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 08:53:44
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouFieldMapping\EditRecord.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20881041445f9bd498b0e351-89654287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fab278bfb474cd9e5c95db2a6099031cc1b332f0' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouFieldMapping\\EditRecord.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20881041445f9bd498b0e351-89654287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINKTOLIST' => 0,
    'QUALIFIED_MODULE' => 0,
    'RECORDID' => 0,
    'INFOABOUTRECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9bd498b6183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd498b6183')) {function content_5f9bd498b6183($_smarty_tpl) {?>
<div class="container-fluid"><div class="widget_header row-fluid"><h2><a href="<?php echo $_smarty_tpl->tpl_vars['LINKTOLIST']->value;?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h2></div><hr><form id="EditRecord" class="form-horizontal recordEditView" enctype="multipart/form-data" action="index.php" method="post" name="EditView"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="Update"><input type="hidden" name="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
"><div class="contentHeader row-fluid clearfix"><h3 class="span8 textOverflowEllipsis"><?php echo vtranslate('LBL_EDIT_RECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><span class="pull-right"><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>&nbsp;<a class="cancelLink" onclick="window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></span></div><br><table class="table"><tbody><tr class="border1px" style="background: #eee;"><th colspan="4"><?php echo vtranslate('LBL_REL_DETAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr><tr class="border1px"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium"><div class="row-fluid"><span class="span10"><input class="inputElement nameField" type="text" name="Name" value="<?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['name'];?>
"></span></div></td><td class="fieldLabel medium"></td><td class="fieldValue medium"><input type="hidden" name="Active" value="1"></td></tr><tr class="border1px"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium"><div class="row-fluid"><span class="span10"><input type="hidden" name="sourceModule" value="<?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_from'];?>
"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_from_name'];?>
</span></div></td><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium"><div class="row-fluid"><span class="span10"><input type="hidden" name="targetModule" value="<?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_to'];?>
"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_to_name'];?>
</span></div></td></tr><tr class="border1px"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium" colspan="3"><textarea style="padding: 5px; min-height: 80px;" class="inputElement " type="" name="Description"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['info'];?>
</textarea></td></tr></tbody></table><div class="row-fluid"><div class="pull-right"><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>&nbsp;<a class="cancelLink" onclick="window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></div><div class="clearfix"></div></div></form></div><?php }} ?>