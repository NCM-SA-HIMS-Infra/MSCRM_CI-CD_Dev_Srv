<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 06:26:21
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18085194325f7d5f8d6afc81-80926858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5355a88a08716c04674da4f161e11b2345262993' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/Settings/ITS4YouInstaller/License.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18085194325f7d5f8d6afc81-80926858',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d5f8d6f112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d5f8d6f112')) {function content_5f7d5f8d6f112($_smarty_tpl) {?>
<div id="activateLicenseModal" class="modal-dialog" style="width: 800px"><div class="modal-content"><div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><h4 class="pull-left"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><div class="modal-body"><div class="editContainer"><div class="clearfix"></div><div class="installationContents"><div id="stepContent1"><form id="activateLicense" method="POST" action="index.php" class="form-horizontal"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"/><input type="hidden" name="view" value="List"/><input type="hidden" name="parent" value="Settings"><div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><h4><strong><?php echo vtranslate('LBL_WELCOME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></h4><br><p><?php echo vtranslate('LBL_WELCOME_DESC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<br><?php echo vtranslate('LBL_WELCOME_FINISH',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p></div></div><br><div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><label><strong><?php echo vtranslate('LBL_INSERT_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></label><br><p><?php echo vtranslate('LBL_ONLINE_ASSURE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p></div></div><div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LicenseDetails.tpl','Settings:ITS4YouInstaller'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></form></div></div></div></div></div></div><?php }} ?>