<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:07:07
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/EditLink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13493530445f6591fb41cdd6-55431157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2832d2b479d43dac7300dd5704c198b27e859ebf' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/EditLink.tpl',
      1 => 1600491589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13493530445f6591fb41cdd6-55431157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINKTOLIST' => 0,
    'QUALIFIED_MODULE' => 0,
    'RECORDID' => 0,
    'LINKID' => 0,
    'LINKLABEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591fb45491',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591fb45491')) {function content_5f6591fb45491($_smarty_tpl) {?>
<div class="container-fluid"><div class="widget_header row-fluid"><h2><a href="<?php echo $_smarty_tpl->tpl_vars['LINKTOLIST']->value;?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h2></div><hr><form id="editLinkForm" method="POST"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="SaveLink"><input type="hidden" name="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
"><input type="hidden" name="linkId" value="<?php echo $_smarty_tpl->tpl_vars['LINKID']->value;?>
"><div class="row-fluid settingsHeader padding1per"><span class="span8"><h3 class="span8 textOverflowEllipsis"><?php echo vtranslate('Edit Link',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></span><br></div><div class="contents" id="detailView"><table class="table table-bordered" width="100%" id="convertFieldMapping"><tbody><tr class="listViewEntries"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_LINK_LABEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium"><div id="addIntoSpan" class="fieldValue medium hide" style="float: left;"><?php echo vtranslate('AddInto',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div style="float: left;"><input class="inputElement nameField" type="text" name="linklabel" value="<?php echo $_smarty_tpl->tpl_vars['LINKLABEL']->value;?>
"></div></td></tr></tbody></table><span class="span4"><span class="pull-right"><button type="submit" class="btn btn-success"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></span></span></div></form></div><?php }} ?>