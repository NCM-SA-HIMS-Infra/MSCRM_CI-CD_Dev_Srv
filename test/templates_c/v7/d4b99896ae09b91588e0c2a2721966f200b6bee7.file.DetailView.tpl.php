<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:06:58
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/DetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11486060535f6591f2a2a618-37622214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4b99896ae09b91588e0c2a2721966f200b6bee7' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/DetailView.tpl',
      1 => 1600491589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11486060535f6591f2a2a618-37622214',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'INFOABOUTRECORD' => 0,
    'MODULE_FROM' => 0,
    'MODULE_TO' => 0,
    'MAPPINGREADY' => 0,
    'LINKS' => 0,
    'LINK_DATA' => 0,
    'RECORDID' => 0,
    'MODULE' => 0,
    'FIELDSID' => 0,
    'MAPPING_FIELD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591f2a976f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591f2a976f')) {function content_5f6591f2a976f($_smarty_tpl) {?>
<div class="container-fluid"><div class="widget_header row-fluid"><h2><a href="index.php?module=ITS4YouFieldMapping&parent=Settings&view=List"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h2></div><hr><div class="contentHeader row-fluid"><h3 class="span8"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['name'];?>
</h3></div><br><table class="table"><tbody><tr class="border1px" style="background: #eee;"><th colspan="4"><?php echo vtranslate('LBL_REL_DETAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="pull-right"><button class="btn btn-primary" type="submit"><strong><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span></th></tr><tr class="border1px"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium" colspan="3"><div class="row-fluid"><span class="span10"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['name'];?>
</span></div></td></tr><tr class="border1px"><td class="fieldLabel medium" style="width: 25%;"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium" style="width: 25%;"><div class="row-fluid"><span class="span10"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE_FROM']->value->getName();?>
&view=List"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_FROM']->value->getName(),$_smarty_tpl->tpl_vars['MODULE_FROM']->value->getName());?>
</a></span></div></td><td class="fieldLabel medium" style="width: 25%;"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium" style="width: 25%;"><div class="row-fluid"><span class="span10"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE_TO']->value->getName();?>
&view=List"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_TO']->value->getName(),$_smarty_tpl->tpl_vars['MODULE_TO']->value->getName());?>
</a></span></div></td></tr><tr class="border1px"><td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="fieldValue medium" colspan="3"><div class="row-fluid"><span class="span10"><?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['info'];?>
</span></div></td></tr></tbody></table></div><div class="container-fluid" id="LinksDiv"><form name="linksForm" action="index.php" method="post" id="linksForm"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="view" value="EditLink"><table class="table"><tr class="border1px" style="background: #eee;"><th colspan="3"><?php echo vtranslate('LBL_EXISTING_LINKS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php if (!$_smarty_tpl->tpl_vars['MAPPINGREADY']->value){?><span class="pull-right"><button class="btn btn-primary" id="editLinks" type="submit"><strong><?php echo vtranslate('LBL_ADD_LINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span><?php }?></th></tr><tr class="border1px"><th style="width: 50%;"><?php echo vtranslate('LBL_LOCATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LINK_LABEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTIONS');?>
</th></tr><?php  $_smarty_tpl->tpl_vars['LINK_DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LINK_DATA']->_loop = false;
 $_smarty_tpl->tpl_vars['LINK_COUNTER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LINK_DATA']->key => $_smarty_tpl->tpl_vars['LINK_DATA']->value){
$_smarty_tpl->tpl_vars['LINK_DATA']->_loop = true;
 $_smarty_tpl->tpl_vars['LINK_COUNTER']->value = $_smarty_tpl->tpl_vars['LINK_DATA']->key;
?><tr class="border1px links convert<?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['convert'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['linkid'];?>
"><td><?php echo vtranslate('Detail',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="linkLabel"><?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['linklabel'];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['LINK_DATA']->value['mapped']==0){?><a href='index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditLink&recordId=<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
&linkId=<?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['linkid'];?>
'><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" style="vertical-align: top;" class="fa fa-pencil alignMiddle"></i></a>&nbsp;&nbsp;&nbsp;<a class="deleteLink"><i class="fa fa-trash" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></a>&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['LINK_DATA']->value['convert']==true){?><a class="relationAdd"><i title="<?php echo vtranslate('LBL_CONVERT_LINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" class="vicon-linkopen"></i></a><?php }?><?php }else{ ?><a href="index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId=<?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['mapped'];?>
"><?php echo vtranslate('LBL_MAPPED_TO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['LINK_DATA']->value['mappedlabel'];?>
</a><?php }?></td></tr><?php }
if (!$_smarty_tpl->tpl_vars['LINK_DATA']->_loop) {
?><tr class="border1px"><td><?php echo vtranslate('LBL_NO_LINKS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr><?php } ?></table><input type="hidden" name="recordId" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
"></form></div><?php if ($_smarty_tpl->tpl_vars['MAPPINGREADY']->value==true){?><div class="container-fluid" id="AddMapping"><form name="mappingForm" action="index.php" method="post" id="mappingForm"><input type="hidden" name="module" value="ITS4YouFieldMapping"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="view" value="EditMapping"><input type="hidden" name="recordId" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
"><table class="table"><tr class="border1px" style="background: #eee;"><th colspan="2"><?php echo vtranslate('LBL_EXISTING_MAPING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="pull-right"><button class="btn btn-primary" id="editMapping" type="submit"><strong><?php echo vtranslate('LBL_EDIT_MAPPING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span></th></tr><tr class="border1px"><th><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
: <?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_from'];?>
</th><th><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
: <?php echo $_smarty_tpl->tpl_vars['INFOABOUTRECORD']->value['moduleLabel_to'];?>
</th></tr><?php  $_smarty_tpl->tpl_vars['MAPPING_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MAPPING_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FIELDSID']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MAPPING_FIELD']->key => $_smarty_tpl->tpl_vars['MAPPING_FIELD']->value){
$_smarty_tpl->tpl_vars['MAPPING_FIELD']->_loop = true;
?><tr class="border1px"><td><?php echo $_smarty_tpl->tpl_vars['MAPPING_FIELD']->value['fieldlabel_sourcemodule'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['MAPPING_FIELD']->value['fieldlabel_targetmodule'];?>
</td></tr><?php } ?></table></form></div><?php }?><style>.links * {vertical-align: top;font-size: 12px;}</style><?php }} ?>