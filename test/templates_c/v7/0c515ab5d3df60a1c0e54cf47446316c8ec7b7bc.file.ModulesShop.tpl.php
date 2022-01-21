<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 06:02:19
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/ModulesShop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8498104435f7d59ebbfb8d8-18515893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c515ab5d3df60a1c0e54cf47446316c8ec7b7bc' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/ModulesShop.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8498104435f7d59ebbfb8d8-18515893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PACKAGES_LIST' => 0,
    'PACKAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'imageSource' => 0,
    'SHOP_LINK' => 0,
    'EXTENSIONS_LIST' => 0,
    'EXTENSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d59ebc34bd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d59ebc34bd')) {function content_5f7d59ebc34bd($_smarty_tpl) {?>
<div class="tab-pane" id="modulesShop"><div class="clearfix"><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['PACKAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PACKAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PACKAGES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PACKAGE']->key => $_smarty_tpl->tpl_vars['PACKAGE']->value){
$_smarty_tpl->tpl_vars['PACKAGE']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('inshop')=="1"){?><div class="col-lg-4 col-md-4 col-sm-4 "><div class="thumbnail extension_container extensionWidgetContainer padding10"><div class="row contentHeader"><div class="col-sm-12 col-xs-12"><div style="margin-bottom: 5px;"><div class="extension_header"><div class="font-x-x-large boxSizingBorderBox" style="text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['PACKAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLTop')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLTop'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('description')!=''){?><div class="caption"><div class="font-x-x-large boxSizingBorderBox"><div style="text-align: center;"><strong><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('description');?>
</strong></div></div></div><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterA')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterA'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><div class="row"><div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center"><a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?q=true&addidtob=<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid');?>
"><h2 class="summaryCount" style="padding:0px;margin:0px"><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('price');?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('currency_symbol');?>
</h2></a></div></div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterB')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterB'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><div class="caption"><hr><div class="font-x-x-large boxSizingBorderBox"><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('more_info');?>
</div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLBottom')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLBottom'), null, 0);?><div style="text-align: center;"><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/></div><?php }?><br><div class="row" style="padding: 10px 0 5px 0"><div class="col-md-12" style="text-align: right;"><span><?php if (!$_smarty_tpl->tpl_vars['PACKAGE']->value->isRegisteredUser()){?><button class="m0550 btn btn-secondary logintoInstaller" type="button"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }elseif($_smarty_tpl->tpl_vars['PACKAGE']->value->isTrialReady()){?><button class="m0550 btn btn-warning trialButton" data-trial="<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('id');?>
"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }else{ ?><button class="m0550 btn btn-warning" disabled type="button"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('price')!='Free'&&$_smarty_tpl->tpl_vars['PACKAGE']->value->get('price')!=0&&$_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid')!=''){?><button class="m0550 btn btn-success  buyButton" data-url="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?q=true&addidtob=<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid');?>
" data-trial=false><?php echo vtranslate('LBL_BUY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('price');?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('currency_symbol');?>
</button><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('website')!=''){?><button class="m0550 btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></span></div></div></div></div></div><?php }?><?php } ?></div></div><div class="clearfix"><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['EXTENSION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EXTENSION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EXTENSIONS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EXTENSION']->key => $_smarty_tpl->tpl_vars['EXTENSION']->value){
$_smarty_tpl->tpl_vars['EXTENSION']->_loop = true;
?><?php if ("1"==$_smarty_tpl->tpl_vars['EXTENSION']->value->get('inshop')){?><div class="col-lg-3 col-md-4 col-sm-4 "><div class="thumbnail extension_container extensionWidgetContainer"><div class="row contentHeader" style="margin-bottom: 10px;"><div class="col-sm-12 col-xs-12" style="margin-bottom: 5px;"><div style="margin-bottom: 5px;"><div class="extension_header"><div class="font-x-x-large boxSizingBorderBox"><?php echo vtranslate($_smarty_tpl->tpl_vars['EXTENSION']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('name');?>
" /><input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('downloadURL');?>
" /><input type="hidden" name="moduleAction" value="<?php if (($_smarty_tpl->tpl_vars['EXTENSION']->value->isAlreadyExists())){?><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isUpgradable()){?>Upgrade<?php }else{ ?>Installed<?php }?><?php }else{ ?>Install<?php }?>" /><input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('id');?>
" /></div></div></div></div><?php if (null!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('thumbnailURL')){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('thumbnailURL'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><div class="caption extensionDescription" ><div class="font-x-x-large boxSizingBorderBox"><?php if (''!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('description')){?><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('description');?>
<?php }?></div><br><div class="row"><div class="col-md-12" style="text-align: right"><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isVtigerCompatible()){?><span><?php if ('Free'!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('price')||0!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('price')){?><button class="m0550 btn btn-success  buyButton" data-url="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('bid');?>
" data-trial=false><?php echo vtranslate('LBL_BUY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('currency_symbol');?>
<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('price');?>
</button><?php }?><?php if (''!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('website')){?><button class="m0550 btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></span><?php }else{ ?><span class="alert alert-error"><?php echo vtranslate('LBL_EXTENSION_NOT_COMPATABLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php }?></div></div></div></div></div><?php }?><?php } ?></div></div></div><?php }} ?>