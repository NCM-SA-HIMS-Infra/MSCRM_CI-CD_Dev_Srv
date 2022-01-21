<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:11:40
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\DetailViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3186988005f998a2cd4bd44-77847230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3c5e1f44ab6769c7b49c0b23188d086bd5889e' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\DetailViewActions.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3186988005f998a2cd4bd44-77847230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DETAILVIEW_ACTIONS' => 0,
    'DETAILVIEW_LINK' => 0,
    'LINK_ICON_CLASS' => 0,
    'LINK_URL' => 0,
    'DASHBOARD_TABS' => 0,
    'REPORT_MODEL' => 0,
    'MODULE' => 0,
    'BTN_I' => 0,
    'LINK_NAME' => 0,
    'TAB_INFO' => 0,
    'COUNT' => 0,
    'COLUMNS_LIMIT' => 0,
    'SUMMARIES_LIMIT' => 0,
    'PDFMakerActive' => 0,
    'IS_TEST_WRITE_ABLE' => 0,
    'DETAILVIEW_LINKS' => 0,
    'LINKNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998a2cde833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998a2cde833')) {function content_5f998a2cde833($_smarty_tpl) {?>
<div class="listViewPageDiv"><div class="reportHeader"><div class="row"><div class="col-lg-3"><div class="btn-toolbar"><div class="btn-group"><?php $_smarty_tpl->tpl_vars['BTN_I'] = new Smarty_variable('0', null, 0);?><?php  $_smarty_tpl->tpl_vars['DETAILVIEW_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_ACTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->key => $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value){
$_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['LINK_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getUrl(), null, 0);?><?php $_smarty_tpl->tpl_vars['LINK_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getLabel(), null, 0);?><?php $_smarty_tpl->tpl_vars['LINK_ICON_CLASS'] = new Smarty_variable($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->get('linkiconclass'), null, 0);?><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?><div class="btn-group"><?php }?><button <?php if ($_smarty_tpl->tpl_vars['LINK_URL']->value){?> onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['LINK_URL']->value;?>
"' <?php }?> type="button"class="cursorPointer btn btn-default <?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->get('customclass');?>
<?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'&&count($_smarty_tpl->tpl_vars['DASHBOARD_TABS']->value)>1){?> dropdown-toggle<?php }?>"title="<?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?><?php if ($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isPinnedToDashboard()){?><?php echo vtranslate('LBL_UNPIN_CHART_FROM_DASHBOARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_PIN_CHART_TO_DASHBOARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->get('linktitle');?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'&&count($_smarty_tpl->tpl_vars['DASHBOARD_TABS']->value)>1){?>data-toggle="dropdown"<?php }?><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?>data-dashboard-tab-count='<?php echo count($_smarty_tpl->tpl_vars['DASHBOARD_TABS']->value);?>
'<?php }?>style="<?php if (0<$_smarty_tpl->tpl_vars['BTN_I']->value){?>margin-left:5px;<?php }?>"><?php if ($_smarty_tpl->tpl_vars['LINK_NAME']->value){?> <?php echo $_smarty_tpl->tpl_vars['LINK_NAME']->value;?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value){?><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='icon-pencil'){?>&nbsp;&nbsp;&nbsp;<?php }?><i class="fa <?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='icon-pencil'){?>fa-pencil<?php }elseif($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?><?php if ($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isPinnedToDashboard()){?>vicon-unpin<?php }else{ ?>vicon-pin<?php }?><?php }?>" style="font-size: 13px;"></i><?php }?></button><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?><ul class='dropdown-menu dashBoardTabMenu'><li class="dropdown-header popover-title"><?php echo vtranslate('LBL_DASHBOARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li><?php  $_smarty_tpl->tpl_vars['TAB_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TAB_INFO']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DASHBOARD_TABS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TAB_INFO']->key => $_smarty_tpl->tpl_vars['TAB_INFO']->value){
$_smarty_tpl->tpl_vars['TAB_INFO']->_loop = true;
?><li class='dashBoardTab' data-tab-id='<?php echo $_smarty_tpl->tpl_vars['TAB_INFO']->value['id'];?>
'><a href='javascript:void(0)'> <?php echo $_smarty_tpl->tpl_vars['TAB_INFO']->value['tabname'];?>
</a></li><?php } ?></ul><?php }?><?php if ($_smarty_tpl->tpl_vars['LINK_ICON_CLASS']->value=='vtGlyph vticon-attach'){?></div><?php }?><?php $_smarty_tpl->tpl_vars['BTN_I'] = new Smarty_variable($_smarty_tpl->tpl_vars['BTN_I']->value+1, null, 0);?><?php } ?></div></div></div><div class="col-lg-6 textAlignCenter"><h3 class="marginTop0px"><?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getName();?>
</h3><div id="noOfRecords"><?php echo vtranslate('LBL_NO_OF_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <span id="countValue"><?php echo $_smarty_tpl->tpl_vars['COUNT']->value;?>
</span><?php if ($_smarty_tpl->tpl_vars['COUNT']->value>1000){?><span class="redColor" id="moreRecordsText"> (<?php echo vtranslate('LBL_MORE_RECORDS_TXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
)</span><?php }else{ ?><span class="redColor hide" id="moreRecordsText"> (<?php echo vtranslate('LBL_MORE_RECORDS_TXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
)</span><?php }?></div><?php if ('custom_report'!=$_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getReportType()){?><div class="limitsAreaInfoColored" id="limitOfRecords"><?php echo vtranslate('LBL_LIMITED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: (<?php if ($_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value>0){?><?php echo vtranslate('SET_LIMIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value;?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value>0&&$_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value>0){?>, <?php }elseif($_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value==0&&$_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value==0){?><?php echo vtranslate('LBL_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value>0){?><?php echo vtranslate('SUMMARIES_LIMIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value;?>
<?php }?>)</div><?php }?><div id='activate_pdfmaker' class="fieldValue" style="display:block;"><span class="value"><?php if ($_smarty_tpl->tpl_vars['PDFMakerActive']->value!==true){?><?php echo vtranslate('Please_Install_PDFMaker',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['IS_TEST_WRITE_ABLE']->value!==true){?><?php echo vtranslate('Test_Not_WriteAble',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></span></div></div><div class='col-lg-3'><span class="pull-right"><div class="btn-toolbar"><div class="btn-group"><?php  $_smarty_tpl->tpl_vars['DETAILVIEW_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->key => $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value){
$_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['LINKNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getLabel(), null, 0);?><button class="btn btn-default reportActions" name="<?php echo $_smarty_tpl->tpl_vars['LINKNAME']->value;?>
"data-href="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getUrl();?>
&source=<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getReportType();?>
"style="margin-left:5px;"><?php echo $_smarty_tpl->tpl_vars['LINKNAME']->value;?>
</button><?php } ?></div></div></span></div></div></div></div><?php }} ?>