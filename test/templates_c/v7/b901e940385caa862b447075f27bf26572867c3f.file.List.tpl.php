<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:06:13
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1930828055f6591c5ab2804-82603378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b901e940385caa862b447075f27bf26572867c3f' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouFieldMapping/List.tpl',
      1 => 1600491589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1930828055f6591c5ab2804-82603378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'QUALIFIED_MODULE' => 0,
    'FIELDMAPPING' => 0,
    'IMPROVEMENT' => 0,
    'DATA_ID' => 0,
    'NAME' => 0,
    'SOURCE_MODULE' => 0,
    'TARGET_MODULE' => 0,
    'DESCRIPTION' => 0,
    'MAPPINGREADY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591c5b099e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591c5b099e')) {function content_5f6591c5b099e($_smarty_tpl) {?>
<div class="listViewContentDiv col-lg-12"><div class="widget_header row-fluid"><h4><a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultUrl();?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h4></div><hr><div class="row-fluid"><button class="btn btn-primary addButton" onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateRecordUrl();?>
"'><strong><?php echo vtranslate('LBL_CREATE_RECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div><br><div class="listViewEntriesDiv contents-bottomscroll"><div class="bottomscroll-div"><table class="table table-bordered listViewEntriesTable"><thead><tr class="listViewHeaders" style="background: #eee;"><th class="medium" nowrap="" style="width: 24%;"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="medium" nowrap="" style="width: 24%;"><?php echo vtranslate('Source Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="medium" nowrap="" style="width: 24%;"><?php echo vtranslate('Target Module',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="medium" nowrap="" style="width: 24%;"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="medium" nowrap=""></th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['IMPROVEMENT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMPROVEMENT']->_loop = false;
 $_smarty_tpl->tpl_vars['KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['FIELDMAPPING']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMPROVEMENT']->key => $_smarty_tpl->tpl_vars['IMPROVEMENT']->value){
$_smarty_tpl->tpl_vars['IMPROVEMENT']->_loop = true;
 $_smarty_tpl->tpl_vars['KEY']->value = $_smarty_tpl->tpl_vars['IMPROVEMENT']->key;
?><?php $_smarty_tpl->tpl_vars['SOURCE_MODULE'] = new Smarty_variable(getTabModuleName($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['module_from']), null, 0);?><?php $_smarty_tpl->tpl_vars['TARGET_MODULE'] = new Smarty_variable(getTabModuleName($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['module_to']), null, 0);?><?php $_smarty_tpl->tpl_vars['LINK_LABEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['label'], null, 0);?><?php $_smarty_tpl->tpl_vars['DESCRIPTION'] = new Smarty_variable($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['info'], null, 0);?><?php $_smarty_tpl->tpl_vars['NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['name'], null, 0);?><?php $_smarty_tpl->tpl_vars['DATA_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['fieldmappingid'], null, 0);?><?php $_smarty_tpl->tpl_vars['MAPPINGREADY'] = new Smarty_variable($_smarty_tpl->tpl_vars['IMPROVEMENT']->value['mappingready'], null, 0);?><tr class="listViewEntries" data-id="<?php echo $_smarty_tpl->tpl_vars['DATA_ID']->value;?>
"><td class="listViewEntryValue medium" nowrap=""><a href="<?php echo Settings_ITS4YouFieldMapping_Module_Model::getDetailViewUrl($_smarty_tpl->tpl_vars['DATA_ID']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
</a></td><td class="listViewEntryValue medium" nowrap=""><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
&view=List"><?php echo vtranslate($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value,$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</a></td><td class="listViewEntryValue medium" nowrap=""><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['TARGET_MODULE']->value;?>
&view=List"><?php echo vtranslate($_smarty_tpl->tpl_vars['TARGET_MODULE']->value,$_smarty_tpl->tpl_vars['TARGET_MODULE']->value);?>
</a></td><td class="listViewEntryValue medium" nowrap=""><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</td><td class="medium" nowrap=""><a href="<?php echo Settings_ITS4YouFieldMapping_Module_Model::getEditRecordUrl($_smarty_tpl->tpl_vars['DATA_ID']->value);?>
"><i class="fa fa-pencil" title="Edit"></i></a>&nbsp;&nbsp;<a class="deleteRecordButton" data-id="<?php echo $_smarty_tpl->tpl_vars['DATA_ID']->value;?>
"><i class="fa fa-trash" title="Delete"></i></a>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['MAPPINGREADY']->value){?><a href="<?php echo Settings_ITS4YouFieldMapping_Module_Model::getEditMappingUrl($_smarty_tpl->tpl_vars['DATA_ID']->value);?>
"><i class="fa fa-bars" title="Map"></i></a>&nbsp;&nbsp;<?php }?></td></tr><?php } ?></tbody></table></div></div></div>

<?php }} ?>