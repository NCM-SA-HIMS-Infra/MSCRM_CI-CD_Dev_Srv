<?php /* Smarty version Smarty-3.1.7, created on 2020-11-01 06:36:16
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Calendar\partials\SidebarEssentials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10337759135f9e57607b85f9-13748150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2789f3a53805cf9eb1eca223f7bd9358eb56bc9' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Calendar\\partials\\SidebarEssentials.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10337759135f9e57607b85f9-13748150',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUICK_LINKS' => 0,
    'SIDEBARWIDGET' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e57607dce2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e57607dce2')) {function content_5f9e57607dce2($_smarty_tpl) {?>

<?php if ($_GET['view']=='Calendar'||$_GET['view']=='SharedCalendar'){?>
<div class="sidebar-menu">
    <div class="module-filters" id="module-filters">
        <div class="sidebar-container lists-menu-container">
            <?php  $_smarty_tpl->tpl_vars['SIDEBARWIDGET'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['QUICK_LINKS']->value['SIDEBARWIDGET']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->key => $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value){
$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel')=='LBL_ACTIVITY_TYPES'||$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel')=='LBL_ADDED_CALENDARS'){?>
            <div class="calendar-sidebar-tabs sidebar-widget" id="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
-accordion" role="tablist" aria-multiselectable="true" data-widget-name="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
">
                <div class="calendar-sidebar-tab">
                    <div class="sidebar-widget-header" role="tab" data-url="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->getUrl();?>
">
                        <div class="sidebar-header clearfix">
                            
                            <h5 class="pull-left"><?php echo vtranslate($_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5>
                            <button class="btn btn-default pull-right sidebar-btn add-calendar-feed">
                                <div class="fa fa-plus" aria-hidden="true"></div>
                            </button> 
                        </div>
                    </div>
                    <hr style="margin: 5px 0;">
                    <div class="list-menu-content">
                        <div id="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
" class="sidebar-widget-body activitytypes" style="max-height: 500px;">
                            <div style="text-align:center;"><img src="layouts/v7/skins/images/loading.gif"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php } ?>    
        </div>
    </div>
</div>
<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/SidebarEssentials.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>