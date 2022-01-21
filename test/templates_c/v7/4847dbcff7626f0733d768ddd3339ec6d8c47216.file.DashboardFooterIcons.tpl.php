<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:21:30
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\dashboards\DashboardFooterIcons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15773362565fb1fb7ed3a581-77760379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4847dbcff7626f0733d768ddd3339ec6d8c47216' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\dashboards\\DashboardFooterIcons.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15773362565fb1fb7ed3a581-77760379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fb1fb7ed5d30',
  'variables' => 
  array (
    'SETTING_EXIST' => 0,
    'CHART_TYPE' => 0,
    'DATA' => 0,
    'CHART_DATA' => 0,
    'WIDGET' => 0,
    'recordid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fb1fb7ed5d30')) {function content_5fb1fb7ed5d30($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['SETTING_EXIST']->value){?>
	<a name="dfilter">
		<i class='fa fa-cog' border='0' align="absmiddle" title="<?php echo vtranslate('LBL_FILTER');?>
" alt="<?php echo vtranslate('LBL_FILTER');?>
"/>
	</a>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['CHART_TYPE']->value)){?>
	<?php $_smarty_tpl->tpl_vars['CHART_DATA'] = new Smarty_variable(ZEND_JSON::decode($_smarty_tpl->tpl_vars['DATA']->value), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['CHART_VALUES'] = new Smarty_variable($_smarty_tpl->tpl_vars['CHART_DATA']->value['values'], null, 0);?>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['WIDGET']->value->isDefault()){?>
	<a href="javascript:void(0);" name="drefresh" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
&tabid=<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('tabid');?>
&linkid=<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
&content=data">
		<i class="fa fa-refresh" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REFRESH');?>
" alt="<?php echo vtranslate('LBL_REFRESH');?>
"></i>
	</a>
	<?php if ('ShowWidget'==$_REQUEST['view']){?>
		<a name="rclose" class="widget" href="index.php?module=ITS4YouReports&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
">
			<i class="fa fa-bars" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_DETAILS');?>
" alt="<?php echo vtranslate('LBL_DETAILS');?>
"></i>
		</a>
	<?php }?>
	<a name="dclose" class="widget" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getDeleteUrl();?>
">
		<i class="fa fa-remove" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REMOVE');?>
" alt="<?php echo vtranslate('LBL_REMOVE');?>
"></i>
	</a>
<?php }?><?php }} ?>