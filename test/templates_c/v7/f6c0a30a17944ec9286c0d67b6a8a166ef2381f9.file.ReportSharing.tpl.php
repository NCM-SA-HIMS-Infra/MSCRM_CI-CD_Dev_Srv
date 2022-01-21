<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportSharing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14574906065f7d801e7fdeb2-64086698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c0a30a17944ec9286c0d67b6a8a166ef2381f9' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportSharing.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14574906065f7d801e7fdeb2-64086698',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'TEMPLATE_OWNERS' => 0,
    'TEMPLATE_OWNER' => 0,
    'SHARINGTYPES' => 0,
    'SHARINGTYPE' => 0,
    'CURRENT_USER' => 0,
    'RECIPIENTS' => 0,
    'ALL_ACTIVEUSER_LIST' => 0,
    'USER_ID' => 0,
    'USERID' => 0,
    'recipients' => 0,
    'USER_NAME' => 0,
    'ALL_ACTIVEGROUP_LIST' => 0,
    'GROUP_ID' => 0,
    'GROUPID' => 0,
    'GROUP_NAME' => 0,
    'ROLES' => 0,
    'ROLE_ID' => 0,
    'ROLEID' => 0,
    'ROLE_OBJ' => 0,
    'RS_ROLE_ID' => 0,
    'RS_ROLEID' => 0,
    'RS_ROLE_OBJ' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801e831e6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801e831e6')) {function content_5f7d801e831e6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/maintcrm20i28/libraries/Smarty/libs/plugins/function.html_options.php';
?>

<div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate("LBL_TEMPLATE_OWNER",$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="template_owner" id="template_owner" data-rule-required="true"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNERS']->value,'selected'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNER']->value),$_smarty_tpl);?>
</select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate("LBL_SHARING_TAB",$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="sharing" id="sharing" data-rule-required="true" onchange="sharing_changed();"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SHARINGTYPE']->value),$_smarty_tpl);?>
</select></div></div></div><div class="row" id="sharing_share_div"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SHARE_WITH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class='col-lg-4'><?php $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER']->value->getAccessibleUsers(), null, 0);?><?php $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER']->value->getAccessibleGroups(), null, 0);?><?php $_smarty_tpl->tpl_vars['recipients'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECIPIENTS']->value, null, 0);?><input type="hidden" name="recipientsString_v7" /><select multiple class="select2 col-lg-12 inputElement" id='recipients' name='recipients' data-rule-required="true" ><optgroup label="<?php echo vtranslate('LBL_USERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['USER_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['USER_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['USER_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['USER_NAME']->key => $_smarty_tpl->tpl_vars['USER_NAME']->value){
$_smarty_tpl->tpl_vars['USER_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['USER_ID']->value = $_smarty_tpl->tpl_vars['USER_NAME']->key;
?><?php $_smarty_tpl->tpl_vars['USERID'] = new Smarty_variable("users::".($_smarty_tpl->tpl_vars['USER_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipients']->value)&&in_array($_smarty_tpl->tpl_vars['USERID']->value,$_smarty_tpl->tpl_vars['recipients']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
 </option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_GROUPS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['GROUP_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['GROUP_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['GROUP_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_NAME']->key => $_smarty_tpl->tpl_vars['GROUP_NAME']->value){
$_smarty_tpl->tpl_vars['GROUP_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['GROUP_ID']->value = $_smarty_tpl->tpl_vars['GROUP_NAME']->key;
?><?php $_smarty_tpl->tpl_vars['GROUPID'] = new Smarty_variable("groups::".($_smarty_tpl->tpl_vars['GROUP_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['GROUPID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipients']->value)&&in_array($_smarty_tpl->tpl_vars['GROUPID']->value,$_smarty_tpl->tpl_vars['recipients']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['GROUP_NAME']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['GROUP_NAME']->value;?>
</option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_ROLES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['ROLE_OBJ'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ROLE_OBJ']->_loop = false;
 $_smarty_tpl->tpl_vars['ROLE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ROLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ROLE_OBJ']->key => $_smarty_tpl->tpl_vars['ROLE_OBJ']->value){
$_smarty_tpl->tpl_vars['ROLE_OBJ']->_loop = true;
 $_smarty_tpl->tpl_vars['ROLE_ID']->value = $_smarty_tpl->tpl_vars['ROLE_OBJ']->key;
?><?php $_smarty_tpl->tpl_vars['ROLEID'] = new Smarty_variable("roles::".($_smarty_tpl->tpl_vars['ROLE_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['ROLEID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipients']->value)&&in_array($_smarty_tpl->tpl_vars['ROLEID']->value,$_smarty_tpl->tpl_vars['recipients']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['ROLE_OBJ']->value->get('rolename');?>
'><?php echo $_smarty_tpl->tpl_vars['ROLE_OBJ']->value->get('rolename');?>
</option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_ROLES_SUBORDINATES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['RS_ROLE_OBJ'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->_loop = false;
 $_smarty_tpl->tpl_vars['RS_ROLE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ROLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->key => $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value){
$_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->_loop = true;
 $_smarty_tpl->tpl_vars['RS_ROLE_ID']->value = $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->key;
?><?php $_smarty_tpl->tpl_vars['RS_ROLEID'] = new Smarty_variable("rs::".($_smarty_tpl->tpl_vars['RS_ROLE_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['RS_ROLEID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipients']->value)&&in_array($_smarty_tpl->tpl_vars['RS_ROLEID']->value,$_smarty_tpl->tpl_vars['recipients']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value->get('rolename');?>
'><?php echo $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value->get('rolename');?>
</option><?php } ?></optgroup></select></div></div></div></div><?php }} ?>