<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportsStep1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7253905885f7d801ec164d7-31591275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26625a52ce43ee7f94bc3b166508b1154683e5b0' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportsStep1.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7253905885f7d801ec164d7-31591275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'REPORTNAME' => 0,
    'PRIMARYMODULES' => 0,
    'RECORD_MODE' => 0,
    'MODE' => 0,
    'primarymodulearr' => 0,
    'REP_FOLDERS' => 0,
    'folder' => 0,
    'REPORTDESC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801ec28b7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801ec28b7')) {function content_5f7d801ec28b7($_smarty_tpl) {?>

<div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></label><div class="col-lg-4"><input type="text" class="inputElement" data-rule-required="true" name="reportname" id="reportname" value="<?php echo $_smarty_tpl->tpl_vars['REPORTNAME']->value;?>
"/></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_PRIMARY_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="primarymodule" id="primarymodule" data-rule-required="true"><?php  $_smarty_tpl->tpl_vars['primarymodulearr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['primarymodulearr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PRIMARYMODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['primarymodulearr']->key => $_smarty_tpl->tpl_vars['primarymodulearr']->value){
$_smarty_tpl->tpl_vars['primarymodulearr']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['RECORD_MODE']->value=="ChangeSteps"||$_smarty_tpl->tpl_vars['MODE']->value=="edit"){?><?php if ($_smarty_tpl->tpl_vars['primarymodulearr']->value['selected']!=''){?><option value="<?php echo $_smarty_tpl->tpl_vars['primarymodulearr']->value['id'];?>
" selected ><?php echo $_smarty_tpl->tpl_vars['primarymodulearr']->value['module'];?>
</option><?php }?><?php }else{ ?><option value="<?php echo $_smarty_tpl->tpl_vars['primarymodulearr']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['primarymodulearr']->value['selected']!=''){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['primarymodulearr']->value['module'];?>
</option><?php }?><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REP_FOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="reportfolder" id="reportfolder" data-rule-required="true"><?php  $_smarty_tpl->tpl_vars['folder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['folder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['REP_FOLDERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['folder']->key => $_smarty_tpl->tpl_vars['folder']->value){
$_smarty_tpl->tpl_vars['folder']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['folder']->value['folderid'];?>
" <?php if ($_smarty_tpl->tpl_vars['folder']->value['selected']!=''){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['folder']->value['foldername'];?>
</option><?php } ?></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4 fieldBlockContainer"><textarea rows="3" class="inputElement textAreaElement col-lg-12" id="reportdesc" name="reportdesc" ><?php echo $_smarty_tpl->tpl_vars['REPORTDESC']->value;?>
</textarea></div></div></div></div><?php }} ?>