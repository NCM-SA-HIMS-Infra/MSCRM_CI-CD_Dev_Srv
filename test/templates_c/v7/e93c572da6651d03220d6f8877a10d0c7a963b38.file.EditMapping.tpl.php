<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 08:54:13
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouFieldMapping\EditMapping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7922076535f9bd4b575a927-97258014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e93c572da6651d03220d6f8877a10d0c7a963b38' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouFieldMapping\\EditMapping.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7922076535f9bd4b575a927-97258014',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINKTOLIST' => 0,
    'QUALIFIED_MODULE' => 0,
    'RECORDID' => 0,
    'FIELDSCONTROL' => 0,
    'INFOABOUTRECORD' => 0,
    'MODULEFROMFIELDS' => 0,
    'FIELD_INFO' => 0,
    'MODULETOFIELDS' => 0,
    'FIELDSID' => 0,
    'INFO_ABOUT_RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9bd4b57ced5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd4b57ced5')) {function content_5f9bd4b57ced5($_smarty_tpl) {?>
<div class="container-fluid"><style>.errorDuplicate, .errorTypes {outline: 1px solid #C55042;}</style><div class="widget_header row-fluid"><h2><a href="<?php echo $_smarty_tpl->tpl_vars['LINKTOLIST']->value;?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h2></div><hr><form id="editMappingForm" method="POST"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="SaveMapping"><input type="hidden" name="recordId" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
"><input type="hidden" name="fieldsControl" id="fieldsControl" value="true" data-value='<?php echo $_smarty_tpl->tpl_vars['FIELDSCONTROL']->value;?>
'><div class="row-fluid settingsHeader padding1per clearfix"><span class="span8"><h3><?php echo vtranslate('LBL_CONVERT_MAPPING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></span><span class="span4"><span class="pull-right"><button type="submit" class="btn btn-success"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="window.history.back();">Cancel</a></span></span></div><div class="contents" id="detailView"><br><table class="table table-bordered" width="100%" id="convertFieldMapping"><thead><tr style="background: #eee"><th><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
: <?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_from'];?>
<div class="actions pull-right"><span class="actionImages"><i class="fa fa-arrow-right"></i></span></div></th><th><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
: <?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_to'];?>
</th></tr><tr><td><b><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_from'];?>
</b></td><td><b><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_to'];?>
</b></td></tr><tr class="hide newMapping listViewEntries"><td><select class="sourceFields firstModuleFields newSelect" style="width:280px"><?php  $_smarty_tpl->tpl_vars['FIELD_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULEFROMFIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_INFO']->key => $_smarty_tpl->tpl_vars['FIELD_INFO']->value){
$_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_TYPE']->value = $_smarty_tpl->tpl_vars['FIELD_INFO']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('label'),Vtiger_Functions::getModuleName($_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_from']));?>
</option><?php } ?></select></td><td><select class="targetFields secondModuleFields newSelect" style="width:280px"><?php  $_smarty_tpl->tpl_vars['FIELD_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULETOFIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_INFO']->key => $_smarty_tpl->tpl_vars['FIELD_INFO']->value){
$_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_TYPE']->value = $_smarty_tpl->tpl_vars['FIELD_INFO']->key;
?><?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value->isEditable()==1){?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('label'),Vtiger_Functions::getModuleName($_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_to']));?>
</option><?php }?><?php } ?></select><div class="actions pull-right"><span class="actionImages"><a class="deleteMapping"><i class="fa fa-trash alignMiddle" title="Delete"></i></a></span></div></td></tr></thead><tbody class="duplicateControl"><?php  $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_ID_FROM_MAPPING'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['FIELDSID']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fieldmoduleto"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->key => $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->value){
$_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_ID_FROM_MAPPING']->value = $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fieldmoduleto"]['iteration']++;
?><tr class="listViewEntries" sequence-number="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fieldmoduleto']['iteration'];?>
" id="tr_mapping_<?php echo $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->value['fieldmapping_mappingid'];?>
"><td><select class="sourceFields select2" style="width:280px" name="mappingID_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fieldmoduleto']['iteration'];?>
[firstModule]"><?php  $_smarty_tpl->tpl_vars['FIELD_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULEFROMFIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_INFO']->key => $_smarty_tpl->tpl_vars['FIELD_INFO']->value){
$_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_TYPE']->value = $_smarty_tpl->tpl_vars['FIELD_INFO']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id');?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id')==$_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->value['fieldid_sourcemodule']){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('label'),Vtiger_Functions::getModuleName($_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_from']));?>
</option><?php } ?></select></td><td><select class="targetFields select2" style="width:280px" name="mappingID_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fieldmoduleto']['iteration'];?>
[secondModule]"><?php  $_smarty_tpl->tpl_vars['FIELD_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULETOFIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_INFO']->key => $_smarty_tpl->tpl_vars['FIELD_INFO']->value){
$_smarty_tpl->tpl_vars['FIELD_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_TYPE']->value = $_smarty_tpl->tpl_vars['FIELD_INFO']->key;
?><?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value->isEditable()==1){?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id');?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('id')==$_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->value['fieldid_targetmodule']){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_INFO']->value->get('label'),Vtiger_Functions::getModuleName($_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['module_to']));?>
</option><?php }?><?php } ?></select><div class="actions pull-right"><span class="actionImages"><a class="deleteMapping" data-id="<?php echo $_smarty_tpl->tpl_vars['INFO_ABOUT_RECORD']->value['fieldmapping_mappingid'];?>
"><i class="fa fa-trash alignMiddle" title="Delete"></i></a></span></div></td></tr><?php } ?></tbody></table></div><br><div class="row-fluid"><span class="span4"><button class="btn btn-default addButton" id="addMapping" type="button"><?php echo vtranslate('LBL_ADD_MAPPING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span><span class="span8"><span class="pull-right"><button type="submit" class="btn btn-success"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="window.history.back();">Cancel</a></span></span></div></form></div>
<?php }} ?>