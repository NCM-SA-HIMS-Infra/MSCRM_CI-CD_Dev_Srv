<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 06:29:47
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/Install.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9351464805f7d605baf0b52-37664354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75b834011ddab80655bb87a859db4d9478788159' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/Install.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9351464805f7d605baf0b52-37664354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'STEP' => 0,
    'CURRENT_STEP' => 0,
    'TOTAL_STEPS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d605bb081d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d605bb081d')) {function content_5f7d605bb081d($_smarty_tpl) {?>
&nbsp;<div class="contentsDiv marginLeftZero"><div class="padding1per"><div class="editContainer" style="padding-left: 3%;padding-right: 0%; min-height:70em;"><div class="padding15px"><h3><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3><hr><div id="breadcrumb"><ul class="crumbs marginLeftZero"><li class="step <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="1"){?>active<?php }?>" style="z-index:9;" id="steplabel2"><a><span class="stepNum">1</span><span class="stepText"><?php echo vtranslate('LBL_IMPORT_STEP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></a></li><li class="step <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="2"){?>active<?php }?>" style="z-index:9;" id="steplabel3"><a><span class="stepNum">2</span><span class="stepText"><?php echo vtranslate('LBL_DOWNLOAD_STEP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></a></li><li class="step last <?php if ($_smarty_tpl->tpl_vars['CURRENT_STEP']->value==$_smarty_tpl->tpl_vars['TOTAL_STEPS']->value){?>active<?php }?>" style="z-index:7;" id="steplabel<?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
"><a><span class="stepNum"><?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
</span><span class="stepText"><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></a></li></ul></div><div class="clearfix"><br></div><form name="install" id="editLicense" method="POST" action="index.php" class="form-horizontal"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"/><input type="hidden" name="view" value="List"/><div id="step1" class="padding1per" style="<?php if ($_smarty_tpl->tpl_vars['STEP']->value!="1"){?>display:none;<?php }?>"><input type="hidden" name="installtype" value="download_src"/><div class="controls"><div><?php echo vtranslate('LBL_IMPORT_SKIP_1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<strong>"<?php echo vtranslate('LBL_IMPORT');?>
"</strong><?php echo vtranslate('LBL_IMPORT_SKIP_2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<strong>"<?php echo vtranslate('LBL_NEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"</strong><?php echo vtranslate('LBL_IMPORT_SKIP_3',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br/><br/></div><br></div><div class="controls"><div><button type="submit" id="import_button" class="btn btn-success"><strong><?php echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<button type="submit" id="skip_import_button" class="btn btn-success"><strong><?php echo vtranslate('LBL_NEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;</div><br><div class="clearfix"></div></div></div><div id="step2" class="padding1per" style="<?php if ($_smarty_tpl->tpl_vars['STEP']->value!="2"){?>display:none;<?php }?>"><input type="hidden" name="installtype" value="download_src"/><div class="controls"><div><strong><?php echo vtranslate('LBL_DOWNLOAD_SRC',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></div><br><div class="clearfix"></div></div><div class="controls"><div><?php echo vtranslate('LBL_DOWNLOAD_SRC_DESC',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><br><div class="clearfix"></div></div><div class="controls"><button type="button" id="download_button" class="btn btn-success" onclick="window.open( 'http://www.its4you.sk/en/images/extensions/Reports4You/src/highcharts_7x.zip' , '_newtab');"><strong><?php echo vtranslate('LBL_DOWNLOAD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<button type="button" id="finish_button" class="btn btn-success" onclick="location.reload(true);"><strong><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;</div></div><div id="step<?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
" class="padding1per" style="border:1px solid #ccc; <?php if ($_smarty_tpl->tpl_vars['STEP']->value!="4"){?>display:none;<?php }?>"><input type="hidden" name="installtype" value="redirect_recalculate"/><div class="controls"><div><?php echo vtranslate('LBL_INSTALL_SUCCESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><div class="clearfix"></div></div><br><div class="controls"><button type="submit" id="next_button" class="btn btn-success"><strong><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;</div></div></form></div></div></div></div><script language="javascript" type="text/javascript">jQuery(document).ready(function () {var thisInstance = ITS4YouReports_License_Js.getInstance();thisInstance.registerInstallEvents();});</script><?php }} ?>