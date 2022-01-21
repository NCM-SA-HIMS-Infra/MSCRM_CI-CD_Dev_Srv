<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:02
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\EditHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14376878215f998aba8e6d74-32393055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b4e03514a3c52c0d6e7196881302d848c15f81f' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\EditHeader.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14376878215f998aba8e6d74-32393055',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'REPORTTYPE' => 0,
    'MODULE' => 0,
    'LABELS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998aba90217',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998aba90217')) {function content_5f998aba90217($_smarty_tpl) {?>
<div class="main-container clearfix"><?php if (file_exists('modules/Vtiger/partials/Menubar.tpl')){?><div id="modnavigator" class="module-nav editViewModNavigator"><div class="hidden-xs hidden-sm mod-switcher-container"><?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Menubar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><?php }?><div class="editViewPageDiv mailBoxEditDiv viewContent"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="editContainer" style="padding-left: 2%;padding-right: 0%; min-height:70em;"><input type="hidden" name="reporttype" id="reporttype" value="<?php echo $_smarty_tpl->tpl_vars['REPORTTYPE']->value;?>
" /><div class="row"><?php $_smarty_tpl->tpl_vars['LABELS'] = new Smarty_variable(array("1"=>"LBL_REPORT_DETAILS","13"=>"LBL_REPORT_SQL","4"=>"LBL_SPECIFY_GROUPING","5"=>"LBL_SELECT_COLUMNS","6"=>"LBL_CALCULATIONS","7"=>"LBL_LABELS","8"=>"LBL_FILTERS","9"=>"LBL_SHARING","10"=>"LBL_LIMIT_SCHEDULER","11"=>"LBL_GRAPHS","12"=>"LBL_REPORT_DASHBOARDS","14"=>"LBL_REPORT_MAPS"), null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BreadCrumbs.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('ACTIVESTEP'=>1,'BREADCRUMB_LABELS'=>$_smarty_tpl->tpl_vars['LABELS']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0);?>
</div><div class="clearfix"></div><?php echo $_smarty_tpl->getSubTemplate ('modules/ITS4YouReports/Buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>