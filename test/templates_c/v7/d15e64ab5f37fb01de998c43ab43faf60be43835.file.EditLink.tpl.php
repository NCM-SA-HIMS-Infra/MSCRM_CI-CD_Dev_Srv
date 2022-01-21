<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 08:56:25
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouFieldMapping\EditLink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13085415585f9bd5393fbd23-54531444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd15e64ab5f37fb01de998c43ab43faf60be43835' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouFieldMapping\\EditLink.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13085415585f9bd5393fbd23-54531444',
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
  'unifunc' => 'content_5f9bd53945995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd53945995')) {function content_5f9bd53945995($_smarty_tpl) {?>
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