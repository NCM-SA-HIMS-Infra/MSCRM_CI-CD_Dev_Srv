<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 06:57:32
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Events\DetailViewBlockView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1833197395f9e5c5c3f1e51-08623995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac5f5f38ec91350af1bb80479ba595a7440cecb5' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Events\\DetailViewBlockView.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1833197395f9e5c5c3f1e51-08623995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PICKIST_DEPENDENCY_DATASOURCE' => 0,
    'RECORD_STRUCTURE' => 0,
    'MODULE_NAME' => 0,
    'USER_MODEL' => 0,
    'WIDTHTYPE' => 0,
    'ACCESSIBLE_USERS' => 0,
    'USER_ID' => 0,
    'INVITIES_SELECTED' => 0,
    'USER_NAME' => 0,
    'INVITEES_DETAILS' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e5c5c4729c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e5c5c4729c')) {function content_5f9e5c5c4729c($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value)){?><input type="hidden" name="picklistDependency" value='<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value);?>
' /><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>
<div class="block block_LBL_INVITE_USER_BLOCK"><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><?php $_smarty_tpl->tpl_vars["IS_HIDDEN"] = new Smarty_variable(false, null, 0);?><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><div><h4><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate('LBL_INVITE_USER_BLOCK',$_tmp1);?>
</h4></div><hr><div class="blockData"><table class="table detailview-table no-border"><tbody><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><span class="muted"><?php echo vtranslate('LBL_INVITE_USERS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</span></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php  $_smarty_tpl->tpl_vars['USER_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['USER_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['USER_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ACCESSIBLE_USERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['USER_NAME']->key => $_smarty_tpl->tpl_vars['USER_NAME']->value){
$_smarty_tpl->tpl_vars['USER_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['USER_ID']->value = $_smarty_tpl->tpl_vars['USER_NAME']->key;
?><?php if (in_array($_smarty_tpl->tpl_vars['USER_ID']->value,$_smarty_tpl->tpl_vars['INVITIES_SELECTED']->value)){?><?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
 - <?php echo vtranslate($_smarty_tpl->tpl_vars['INVITEES_DETAILS']->value[$_smarty_tpl->tpl_vars['USER_ID']->value],$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php }?><?php } ?></td></tr></tbody></table></div></div><?php }} ?>