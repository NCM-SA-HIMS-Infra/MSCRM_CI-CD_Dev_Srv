<?php /* Smarty version Smarty-3.1.7, created on 2021-01-15 09:54:12
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\KeyMetricsContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173406892460010adc1e9490-93351627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a74ef9fc7ffd5cec320991f79d0f538b47f10cb' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\KeyMetricsContents.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173406892460010adc1e9490-93351627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LEFTPANELHIDE' => 0,
    'CURRENT_USER_MODEL' => 0,
    'ORDER_BY' => 0,
    'SORT_ORDER' => 0,
    'MODULE' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
    'SEARCH_MODE_RESULTS' => 0,
    'LISTVIEW_HEADERS' => 0,
    'WIDTHTYPE' => 0,
    'COLUMN_NAME' => 0,
    'LISTVIEW_HEADER_KEY' => 0,
    'NEXT_SORT_ORDER' => 0,
    'LISTVIEW_HEADER' => 0,
    'MODULE_MODEL' => 0,
    'USERS_OPTIONS' => 0,
    'SEARCH_DETAILS' => 0,
    'FIELD_INFO' => 0,
    'PICKLIST_VALUES' => 0,
    'PICKLIST_ARR' => 0,
    'PICKLIST_KEY' => 0,
    'SEARCH_VALUES' => 0,
    'ICON_CLASS' => 0,
    'PICKLIST_LABEL' => 0,
    'LISTVIEW_ENTRIES' => 0,
    'LISTVIEW_ENTRY' => 0,
    'COLUMNNAME' => 0,
    'LISTVIEW_HEADERNAME' => 0,
    'LISTVIEW_ENTRY_RAWVALUE' => 0,
    'COLUMNVALUE' => 0,
    'COLSPAN_WIDTH' => 0,
    'VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60010adc3501c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60010adc3501c')) {function content_60010adc3501c($_smarty_tpl) {?>

<div class="col-sm-12 col-xs-12 dependencyMapping " id="listViewPageDiv"><?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value!='1'){?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div class="essentials-toggle" title="<?php echo vtranslate('LBL_LEFT_PANEL_SHOW_HIDE','Vtiger');?>
"><span class="essentials-toggle-marker fa <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?>fa-chevron-right<?php }else{ ?>fa-chevron-left<?php }?> cursorPointer"></span></div><?php }?><div id="table-content" class="table-container"><form name='list' id='listedit' action='' onsubmit="return false;"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder"><p class="listViewLoadingMsg hide"><?php echo vtranslate('LBL_LOADING_LISTVIEW_CONTENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
........</p><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('rowheight'), null, 0);?><table id="listview-table"  class="table <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'){?>listview-table-norecords <?php }?> listview-table listViewEntriesTable"><thead><tr class="listViewContentHeader"><th style="width:5% !important;"><?php if (!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value){?><div class="table-actions"></div><?php }elseif($_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value){?><?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></th><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><th nowrap <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last){?> colspan="2" <?php }?> class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="width:25% !important;"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value){?><?php echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;?>
<?php }else{ ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value;?>
">&nbsp;<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value['name'];?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</a><?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value){?><a href="#" class="removeSorting"><i class="fa fa-remove"></i></a><?php }?></th><?php } ?></tr><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isQuickSearchEnabled()&&!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value){?><tr class="searchRow"><th class="inline-search-btn"><div class="table-actions"><button class="btn btn-success btn-sm" data-trigger="listSearch"><?php echo vtranslate("LBL_SEARCH",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></th><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><th><?php $_smarty_tpl->tpl_vars["DATA_TYPE"] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value['type'], null, 0);?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value['column']=="smcreatorid"){?><?php $_smarty_tpl->tpl_vars['PICKLIST_VALUES'] = new Smarty_variable($_smarty_tpl->tpl_vars['USERS_OPTIONS']->value, null, 0);?><?php $_smarty_tpl->tpl_vars['SEARCH_VALUES'] = new Smarty_variable(explode(',',$_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value]['searchValue']), null, 0);?><div class="row-fluid"><select class="listSearchContributor select2 report-type-select col-lg-10" name="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value;?>
" multiple data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'><?php  $_smarty_tpl->tpl_vars['PICKLIST_ARR'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_ARR']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_ARR']->key => $_smarty_tpl->tpl_vars['PICKLIST_ARR']->value){
$_smarty_tpl->tpl_vars['PICKLIST_ARR']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value==='reporttype'){?><?php $_smarty_tpl->tpl_vars["PICKLIST_LABEL"] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['PICKLIST_ARR']->value['1'],$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["PICKLIST_LABEL"] = new Smarty_variable($_smarty_tpl->tpl_vars['PICKLIST_ARR']->value['1'], null, 0);?><?php }?><?php $_smarty_tpl->tpl_vars["PICKLIST_KEY"] = new Smarty_variable($_smarty_tpl->tpl_vars['PICKLIST_ARR']->value['0'], null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['PICKLIST_KEY']->value,$_smarty_tpl->tpl_vars['SEARCH_VALUES']->value)&&($_smarty_tpl->tpl_vars['PICKLIST_KEY']->value!='')){?> selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value=='reporttype'){?>class='<?php echo $_smarty_tpl->tpl_vars['ICON_CLASS']->value;?>
'<?php }?>><?php echo $_smarty_tpl->tpl_vars['PICKLIST_LABEL']->value;?>
</option><?php } ?></select></div><?php }else{ ?><div class="row-fluid"><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value;?>
" class="listSearchContributor inputElement" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value]['searchValue'];?>
" data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'/></div><?php }?><input type="hidden" class="operatorValue" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value]['comparator'];?>
"></th><?php } ?></tr><?php }?></thead><tbody class="overflow-y"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']++;
?><tr class="listViewEntries" data-id='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value['id'];?>
' data-recordUrl='' id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_row_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listview']['index']+1;?>
"><td class = "listViewRecordActions textAlignCenter"><a href='javascript:void(0);' class="editRecordButton" data-id="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value['id'];?>
"><i class="fa fa-pencil"></i></a>&nbsp;<a href='javascript:void(0);' class="deleteRecordButton" data-id="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value['id'];?>
" ><i class="fa fa-trash" title="<?php echo vtranslate('Delete');?>
"></i></a></td><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><?php $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER_KEY']->value, null, 0);?><?php $_smarty_tpl->tpl_vars['COLUMNNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value['column'], null, 0);?><?php $_smarty_tpl->tpl_vars['COLUMNVALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value[$_smarty_tpl->tpl_vars['COLUMNNAME']->value], null, 0);?><td class="listViewEntryValue" data-name="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_RAWVALUE']->value;?>
" data-rawvalue="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_RAWVALUE']->value;?>
" data-field-type=""><span class="fieldValue"><span class="value textOverflowEllipsis"><?php if ($_smarty_tpl->tpl_vars['COLUMNNAME']->value=="name"){?><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=KeyMetricsRows&id=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['COLUMNVALUE']->value;?>
</a><?php }elseif($_smarty_tpl->tpl_vars['COLUMNNAME']->value=="smcreatorid"){?><?php echo getUserFullName($_smarty_tpl->tpl_vars['COLUMNVALUE']->value);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['COLUMNVALUE']->value;?>
<?php }?></span></span></span></td><?php } ?></tr><?php } ?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'){?><tr class="emptyRecordsDiv"><?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['COLSPAN_WIDTH'] = new Smarty_variable($_tmp2+1, null, 0);?><td colspan="<?php echo $_smarty_tpl->tpl_vars['COLSPAN_WIDTH']->value;?>
"><div class="emptyRecordsDiv"><div class="emptyRecordsContent"><?php $_smarty_tpl->tpl_vars['SINGLE_MODULE'] = new Smarty_variable("SINGLE_".($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate('LBL_KEY_METRICS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FOUND');?>
. <a href="javascript:void(0);" id="add_widget_href" style="color:blue"><?php echo vtranslate("LBL_ADD_ITEM",$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate("LBL_KEY_METRICS",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></div></td></tr><?php }?></tbody></table></form></div><div id="scroller_wrapper" class="bottom-fixed-scroll"><div id="scroller" class="scroller-div"></div></div></div><br><div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><?php }} ?>