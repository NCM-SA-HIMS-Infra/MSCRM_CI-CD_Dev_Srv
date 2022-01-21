<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:04:18
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/InstalledModules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6794662965f659152e6d4f8-86623670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b589b5add334145c79d1e4823118e5ec8fd25cb8' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/InstalledModules.tpl',
      1 => 1600491838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6794662965f659152e6d4f8-86623670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
    'ERROR_MESSAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'IS_AUTH' => 0,
    'LICENSES_LIST' => 0,
    'LICENSE' => 0,
    'LICENSE_KEY' => 0,
    'SHOP_LINK' => 0,
    'EMPTY_LICENSES' => 0,
    'EMPTY_LICENSE' => 0,
    'MODULE' => 0,
    'EXTENSIONS_LIST' => 0,
    'EXTENSION' => 0,
    'MODULE_NAME' => 0,
    'MODULE_MODEL' => 0,
    'SETTINGS_LINKS' => 0,
    'SETTINGS_LINK' => 0,
    'LANGUAGES_LIST' => 0,
    'LANGUAGE' => 0,
    'LANG_KEY' => 0,
    'ALL_LANGUAGES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f659152f11ce',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f659152f11ce')) {function content_5f659152f11ce($_smarty_tpl) {?>
<div class="tab-pane active" id="installedModules"><?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value){?><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['ERROR_MESSAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->key => $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value){
$_smarty_tpl->tpl_vars['ERROR_MESSAGE']->_loop = true;
?><div><div class="displayInlineBlock alert alert-danger"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></div><?php } ?></div><?php }elseif(!$_smarty_tpl->tpl_vars['IS_AUTH']->value){?><div style="text-align: center;"><div class="alert alert-danger displayInlineBlock logintoInstaller extensionLoginAlert"><?php echo vtranslate('LBL_LOGIN_TO_INSTALLER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><br></div><?php }else{ ?><div class="col-md-12"><h4><?php echo vtranslate('LBL_ACTIVATED_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4><hr><div><button class="btn btn-primary activateButton" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<div class="displayInlineBlock"><?php echo vtranslate('LBL_ACTIVATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo vtranslate('LBL_LICENSE_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></button>&nbsp;&nbsp;<button class="btn btn-default updateButton" type="button"><i class="fa fa-refresh"></i>&nbsp;&nbsp;<div class="displayInlineBlock"><?php echo vtranslate('LBL_UPDATE_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></button></div><br><table class="table table-bordered"><thead><tr><th><?php echo vtranslate('LBL_LICENSE_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_DUE_DATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_TYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['LICENSE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LICENSE']->_loop = false;
 $_smarty_tpl->tpl_vars['LICENSE_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LICENSES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LICENSE']->key => $_smarty_tpl->tpl_vars['LICENSE']->value){
$_smarty_tpl->tpl_vars['LICENSE']->_loop = true;
 $_smarty_tpl->tpl_vars['LICENSE_KEY']->value = $_smarty_tpl->tpl_vars['LICENSE']->key;
?><?php if (!$_smarty_tpl->tpl_vars['LICENSE']->value){?><?php continue 1?><?php }?><tr><td style="border-left:none;border-right:none;"><a class="licenseColors" href="#<?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('service_usageunit')!='Package'){?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('cf_identifier');?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>
</a></td><td style="border-left:none;border-right:none;"><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('servicename');?>
</td><td style="border-left:none;border-right:none;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date')!=''){?><?php echo Vtiger_Util_Helper::formatDateIntoStrings($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date'));?>
<?php }?></td><td style="border-left:none;border-right:none;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?><?php echo vtranslate('LBL_SUBSCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')=="1"){?><?php echo vtranslate('LBL_DEMO_FREE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_FULL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?></td><td style="border-left:none;border-right:none;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isRenewReady()){?><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?><a class="btn btn-info" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('buy_id');?>
"><?php echo vtranslate('LBL_PROLONG_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')==true){?><a class="btn btn-success" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('buy_id');?>
"><?php echo vtranslate('LBL_BUY_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php }else{ ?><a class="btn btn-primary" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getRenewUrl();?>
"><?php echo vtranslate('LBL_RENEW_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php }?>&nbsp;&nbsp;<?php }?><button class="btn btn-danger actionLicenses" type="button" data-mode="deactivate" data-license="<?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>
"><?php echo vtranslate('LBL_DEACTIVATE_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isExpired()){?><div class="alert alert-danger displayInlineBlock" style="margin:0;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isTrial()){?><?php echo vtranslate('LBL_TRIAL_INACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_MEMBERSHIP_INACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getExpireString();?>
</div><?php }else{ ?><div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isRenewReady()){?>warning<?php }else{ ?>info<?php }?> displayInlineBlock" style="margin:0;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isTrial()){?><?php echo vtranslate('LBL_TRIAL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_MEMBERSHIP_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getExpireString();?>
</div><?php }?></div></td></tr><?php } ?><?php if (!empty($_smarty_tpl->tpl_vars['EMPTY_LICENSES']->value)){?><tr><td style="border-left:none;border-right:none;" colspan="4"><?php  $_smarty_tpl->tpl_vars['EMPTY_LICENSE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EMPTY_LICENSES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->key => $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->value){
$_smarty_tpl->tpl_vars['EMPTY_LICENSE']->_loop = true;
?><div><?php echo $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->value;?>
</div><br><?php } ?></td><td style="border-left:none;border-right:none;" title="<?php echo vtranslate('LBL_EMPTY_LICENSES_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><form action="index.php" method="post"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="Basic"><input type="hidden" name="mode" value="clearEmptyLicenses"><button class="btn btn-warning"><?php echo vtranslate('LBL_EMPTY_LICENSES_BUTTON',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</></form></td></tr><?php }?></tbody></table></div><?php }?><div class="col-md-12"><div><h4><?php echo vtranslate('LBL_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4><table class="table table-bordered"><thead><tr><th style="border-right:0;"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_INSTALLED_VERSION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_NEWEST_VERSION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['EXTENSION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EXTENSION']->_loop = false;
 $_smarty_tpl->tpl_vars['EXTENSION_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['EXTENSIONS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EXTENSION']->key => $_smarty_tpl->tpl_vars['EXTENSION']->value){
$_smarty_tpl->tpl_vars['EXTENSION']->_loop = true;
 $_smarty_tpl->tpl_vars['EXTENSION_ID']->value = $_smarty_tpl->tpl_vars['EXTENSION']->key;
?><?php if (!$_smarty_tpl->tpl_vars['EXTENSION']->value->isAvailable()){?><?php continue 1?><?php }?><?php $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('moduleModel'), null, 0);?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('name'), null, 0);?><tr class="installedModuleRow " data-cfmid="1" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><td style="border-left:none;border-right:none;"><a <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?>href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultUrl();?>
" target="_blank" <?php }else{ ?> href="#<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['EXTENSION']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></td><td style="border-left:none;border-right:none;" class="validateVersion"><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->getVersion();?>
</td><td style="border-left:none;border-right:none;"><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('pkgVersion');?>
</td><td style="border-left:none;border-right:none;"><span class="extension_container"><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isVtigerCompatible()){?><input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('name');?>
"/><input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('downloadURL');?>
"/><input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('id');?>
"/><?php if (!$_smarty_tpl->tpl_vars['EXTENSION']->value->isAlreadyExists()){?><input type="hidden" name="moduleAction" value="Install"/><button class="oneclickInstallFree btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }elseif($_smarty_tpl->tpl_vars['EXTENSION']->value->isUpgradable()){?><input type="hidden" name="moduleAction" value="Upgrade"/><button class="oneclickInstallFree isUpdateBtn btn btn-success margin0px <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?><?php }?></span><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value){?><?php $_smarty_tpl->tpl_vars['SETTINGS_LINKS'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getSettingLinks(), null, 0);?><?php if ((count($_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value)>0)){?><span class="btn-group pull-right <?php if (!$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?>hide<?php }?>"><button class="btn btn-default btn dropdown-toggle unpin hiden " data-toggle="dropdown"><?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<i class="caret"></i></button><ul class="dropdown-menu pull-right dropdownfields"><?php  $_smarty_tpl->tpl_vars['SETTINGS_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SETTINGS_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SETTINGS_LINK']->key => $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value){
$_smarty_tpl->tpl_vars['SETTINGS_LINK']->_loop = true;
?><li><a target="_blank" <?php if (stripos($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],'javascript:')===0){?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],strlen("javascript:"));?>
'<?php }else{ ?>href='<?php echo $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'];?>
'<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value,vtranslate("SINGLE_".($_smarty_tpl->tpl_vars['MODULE_NAME']->value),$_smarty_tpl->tpl_vars['MODULE_NAME']->value));?>
</a></li><?php } ?></ul></span><?php }?><?php }?><span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->get('website')!=''){?><button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></span></td></tr><?php } ?></tbody></table></div><div><h4><?php echo vtranslate('LBL_AVAILABLE_LANGUAGES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4><table class="table table-bordered"><thead><tr><th><?php echo vtranslate('LBL_LANGUAGE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_DESCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['LANGUAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LANGUAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LANGUAGES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LANGUAGE']->key => $_smarty_tpl->tpl_vars['LANGUAGE']->value){
$_smarty_tpl->tpl_vars['LANGUAGE']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isVtigerCompatible()&&!$_smarty_tpl->tpl_vars['LANGUAGE']->value->isAlreadyExists()&&($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')=='Free'||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')==0||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('available')==1)){?><tr class="" data-cfmid="1"><td style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td style="border-left:none;border-right:none;"><span class="extension_container"><input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name');?>
"/><input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('downloadURL');?>
"/><input type="hidden" name="moduleAction" value="Install"/><input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('id');?>
"/><span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website')!=''){?><button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?><?php $_smarty_tpl->tpl_vars['LANG_KEY'] = new Smarty_variable($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name'), null, 0);?><?php if ($_smarty_tpl->tpl_vars['ALL_LANGUAGES']->value[$_smarty_tpl->tpl_vars['LANG_KEY']->value]!=''){?><div class="alert alert-info displayInlineBlock" style="margin:0;"><?php echo vtranslate('LBL_INSTALLED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php }else{ ?><button class="oneclickInstallFree btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></span></span></td></tr><?php }?><?php } ?></tbody></table></div></div></div><?php }} ?>