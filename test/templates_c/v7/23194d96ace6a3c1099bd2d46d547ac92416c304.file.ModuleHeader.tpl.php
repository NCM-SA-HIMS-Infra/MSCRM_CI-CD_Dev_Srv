<?php /* Smarty version Smarty-3.1.7, created on 2020-09-28 14:05:06
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ModuleHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10087706695f71ed921e0e08-11538438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23194d96ace6a3c1099bd2d46d547ac92416c304' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ModuleHeader.tpl',
      1 => 1601301834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10087706695f71ed921e0e08-11538438',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_MODEL' => 0,
    'DEFAULT_FILTER_ID' => 0,
    'CVURL' => 0,
    'DEFAULT_FILTER_URL' => 0,
    'VIEW' => 0,
    'REPORT_NAME' => 0,
    'KM_ID' => 0,
    'KM_NAME' => 0,
    'VIEWNAME' => 0,
    'FOLDERS' => 0,
    'FOLDER' => 0,
    'FOLDERNAME' => 0,
    'NO_LICENSE' => 0,
    'LISTVIEW_LINKS' => 0,
    'LISTVIEW_BASICACTION' => 0,
    'childLinks' => 0,
    'childLink' => 0,
    'ICON_CLASS' => 0,
    'MODULE_NAME' => 0,
    'SETTING' => 0,
    'FIELDS_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f71ed9221fc7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f71ed9221fc7')) {function content_5f71ed9221fc7($_smarty_tpl) {?>

<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop"><div class="module-action-content clearfix"><span class="col-lg-7 col-md-7"><span><?php $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultCustomFilter(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value){?><?php $_smarty_tpl->tpl_vars['CVURL'] = new Smarty_variable(("&viewname=").($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable(($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl()).($_smarty_tpl->tpl_vars['CVURL']->value), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrlWithAllFilter(), null, 0);?><?php }?><a title="<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" href='<?php echo $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL']->value;?>
'><h4 class="module-title pull-left"> <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4></a></span><span><p class="current-filter-name pull-left">&nbsp;&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span><?php if ($_smarty_tpl->tpl_vars['VIEW']->value=='Edit'||$_smarty_tpl->tpl_vars['VIEW']->value=='Detail'){?>&nbsp;<span id="reportnameTop"><?php if (''!=$_smarty_tpl->tpl_vars['REPORT_NAME']->value){?><?php echo $_smarty_tpl->tpl_vars['REPORT_NAME']->value;?>
<?php }else{ ?><?php echo vtranslate('LBL_NEW');?>
<?php }?></span>&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span><?php }?>&nbsp;<?php if ('true'==$_REQUEST['isDuplicate']){?><?php echo vtranslate('Duplicate',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }elseif('KeyMetricsRows'==$_REQUEST['view']||'EditKeyMetricsRow'==$_REQUEST['view']){?><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=KeyMetricsList" style="vertical-align:bottom;"><?php echo vtranslate('KeyMetricsList',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span>&nbsp;<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=KeyMetricsRows&id=<?php echo $_smarty_tpl->tpl_vars['KM_ID']->value;?>
" style="vertical-align:bottom;"><?php echo $_smarty_tpl->tpl_vars['KM_NAME']->value;?>
</a>&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span>&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['VIEW']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['VIEW']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></p></span><?php if ($_smarty_tpl->tpl_vars['VIEWNAME']->value){?><?php if ($_smarty_tpl->tpl_vars['VIEWNAME']->value!='All'){?><?php  $_smarty_tpl->tpl_vars['FOLDER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FOLDER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FOLDERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->key => $_smarty_tpl->tpl_vars['FOLDER']->value){
$_smarty_tpl->tpl_vars['FOLDER']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->getId()==$_smarty_tpl->tpl_vars['VIEWNAME']->value){?><?php $_smarty_tpl->tpl_vars['FOLDERNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['FOLDER']->value->getName(), null, 0);?><?php break 1?><?php }?><?php } ?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['FOLDERNAME'] = new Smarty_variable(vtranslate('LBL_ALL_REPORTS',$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php }?><span><p class="current-filter-name filter-name pull-left">&nbsp;&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span> <?php echo $_smarty_tpl->tpl_vars['FOLDERNAME']->value;?>
 </p></span><?php }?></span><span class="col-lg-5 col-md-5 pull-right"><div id="appnav" class="navbar-right"><?php if (0==$_smarty_tpl->tpl_vars['NO_LICENSE']->value){?><?php  $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWBASIC']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->key => $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->_loop = true;
?><?php $_smarty_tpl->tpl_vars["childLinks"] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->getChildLinks(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['childLinks']->value&&$_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->get('linklabel')=='LBL_ADD_RECORD'){?><span class="btn-group"><button class="btn btn-default dropdown-toggle module-buttons" data-toggle="dropdown" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_basicAction_Add"><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<i class="caret icon-white"></i></button><ul class="dropdown-menu"><?php  $_smarty_tpl->tpl_vars["childLink"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["childLink"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childLinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["childLink"]->key => $_smarty_tpl->tpl_vars["childLink"]->value){
$_smarty_tpl->tpl_vars["childLink"]->_loop = true;
?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_basicAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['childLink']->value->getLabel());?>
" data-edition-disable="<?php echo $_smarty_tpl->tpl_vars['childLink']->value->disabled;?>
" data-edition-message="<?php echo $_smarty_tpl->tpl_vars['childLink']->value->message;?>
"><a <?php if ($_smarty_tpl->tpl_vars['childLink']->value->disabled!='1'){?> <?php if (stripos($_smarty_tpl->tpl_vars['childLink']->value->getUrl(),'javascript:')===0){?> onclick='<?php echo substr($_smarty_tpl->tpl_vars['childLink']->value->getUrl(),strlen("javascript:"));?>
;' <?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['childLink']->value->getUrl();?>
' <?php }?> <?php }else{ ?> href="javascript:void(0);" <?php }?>><i class='<?php echo $_smarty_tpl->tpl_vars['ICON_CLASS']->value;?>
' style="font-size:13px;"></i>&nbsp; <?php echo vtranslate($_smarty_tpl->tpl_vars['childLink']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php } ?></ul></span><?php }?><?php } ?><?php }?><?php if ('KeyMetricsList'===$_REQUEST['view']){?><span class="btn-group"><button class="btn btn-default dropdown-toggle module-buttons" data-toggle="dropdown" id="ITS4YouKeyMetrics_listView_basicAction_LBL_ADD_RECORD"><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate("LBL_ADD_ITEM",$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate("LBL_KEY_METRICS",$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</button></span><?php }?><ul class="nav navbar-nav navbar-right"><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><li><div class="settingsIcon"><button type="button" class="btn btn-default module-buttons dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-wrench" aria-hidden="true" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></span>&nbsp;<?php echo vtranslate('LBL_CUSTOMIZE','Reports');?>
&nbsp; <span class="caret"></span></button><ul class="detailViewSetting dropdown-menu"><?php  $_smarty_tpl->tpl_vars['SETTING'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SETTING']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SETTING']->key => $_smarty_tpl->tpl_vars['SETTING']->value){
$_smarty_tpl->tpl_vars['SETTING']->_loop = true;
?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_listview_advancedAction_<?php echo $_smarty_tpl->tpl_vars['SETTING']->value->getLabel();?>
"><a href=<?php echo $_smarty_tpl->tpl_vars['SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value,vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value));?>
</a></li><?php } ?></ul></div></li><?php }?></ul></div></span></div><div class="rssAddFormContainer hide"></div><?php if ($_smarty_tpl->tpl_vars['FIELDS_INFO']->value!=null){?><script type="text/javascript">var uimeta = (function () {var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['FIELDS_INFO']->value;?>
;return {field: {get: function (name, property) {if (name && property === undefined) {return fieldInfo[name];}if (name && property) {return fieldInfo[name][property]}},isMandatory: function (name) {if (fieldInfo[name]) {return fieldInfo[name].mandatory;}return false;},getType: function (name) {if (fieldInfo[name]) {return fieldInfo[name].type}return false;}},};})();</script><?php }?></div><?php }} ?>