<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportGrouping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20304551565f7d801e99e058-86666949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '807e2a1c0380d1e99040705af47fd1ab6d4483c0' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportGrouping.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20304551565f7d801e99e058-86666949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'timelinecolumn' => 0,
    'date_options_json' => 0,
    'sum_group_columns' => 0,
    'summaries_orderby' => 0,
    'REPORTTYPE' => 0,
    'REL_MODULES_STR' => 0,
    'MODULE' => 0,
    'RG_BLOCK1' => 0,
    'ASCDESC1' => 0,
    'timelinecolumn1_html' => 0,
    'timeline_type2' => 0,
    'ALLOW_COLS' => 0,
    'RG_BLOCK2' => 0,
    'ASCDESC2' => 0,
    'timelinecolumn2_html' => 0,
    'timeline_type3' => 0,
    'RG_BLOCK3' => 0,
    'ASCDESC3' => 0,
    'timelinecolumn3_html' => 0,
    'SummariesModules' => 0,
    'modulearr' => 0,
    'ALL_FIELDS_STRING' => 0,
    'RG_BLOCK4' => 0,
    'selectedSummariesString' => 0,
    'RG_BLOCK6' => 0,
    'summaries_orderby_type' => 0,
    'SUMMARIES_LIMIT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801e9cc14',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801e9cc14')) {function content_5f7d801e9cc14($_smarty_tpl) {?>

<input type="hidden" name="timelinecolumn_html" id='timelinecolumn_html' value='<?php echo $_smarty_tpl->tpl_vars['timelinecolumn']->value;?>
'><div id='date_options_json' class="none" style='display:none;'><?php echo $_smarty_tpl->tpl_vars['date_options_json']->value;?>
</div><div id='sum_group_columns' class="none" style='display:none;'><?php echo $_smarty_tpl->tpl_vars['sum_group_columns']->value;?>
</div><input type="hidden" id="summaries_orderby_val" value="<?php echo $_smarty_tpl->tpl_vars['summaries_orderby']->value;?>
"><?php $_smarty_tpl->tpl_vars["matrix_js"] = new Smarty_variable('', null, 0);?><?php $_smarty_tpl->tpl_vars["reporttype_readonly"] = new Smarty_variable('', null, 0);?><?php if ($_smarty_tpl->tpl_vars['REPORTTYPE']->value=="summaries"||$_smarty_tpl->tpl_vars['REPORTTYPE']->value=="summaries_matrix"){?><?php $_smarty_tpl->tpl_vars["reporttype_readonly"] = new Smarty_variable("readonly", null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['REPORTTYPE']->value=="summaries_matrix"){?><?php $_smarty_tpl->tpl_vars["matrix2_js"] = new Smarty_variable("matrix_js(2);", null, 0);?><?php $_smarty_tpl->tpl_vars["matrix3_js"] = new Smarty_variable("matrix_js(3);", null, 0);?><?php $_smarty_tpl->tpl_vars["timeline_type2"] = new Smarty_variable("cols", null, 0);?><?php }?><div style="border:1px solid #ccc;padding:4%;"><input type="hidden" name='all_related_modules' id='all_related_modules' value="<?php echo $_smarty_tpl->tpl_vars['REL_MODULES_STR']->value;?>
"/><div class="row"><div class="form-group"><div class="col-lg-2"><select class="select2 col-lg-12 inputElement" name="timeline_type1" id="timeline_type1" readonly style="float:left;width:7em;margin:auto;" ><option value="rows" selected="selected" ><?php echo vtranslate('LBL_ROWS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="Group1" id="Group1" onChange="checkTimeLineColumn(this,1)" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK1']->value;?>
</select></div><div class="col-lg-2"><?php echo $_smarty_tpl->tpl_vars['ASCDESC1']->value;?>
</div><div class="col-lg-2"><div id="radio_group1" class="col-lg-7"><?php echo $_smarty_tpl->tpl_vars['timelinecolumn1_html']->value;?>
</div></div></div></div><div class="row" id="group2_table_row"><div class="form-group"><div class="col-lg-2"><select class="select2 col-lg-12 inputElement" name="timeline_type2" id="timeline_type2" readonly style="float:left;width:7em;margin:auto;" ><option value="rows" <?php if ($_smarty_tpl->tpl_vars['timeline_type2']->value=="rows"){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_ROWS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php if ('true'==$_smarty_tpl->tpl_vars['ALLOW_COLS']->value){?><option value="cols" <?php if ($_smarty_tpl->tpl_vars['timeline_type2']->value=="cols"){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_COLS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }?></select></div><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="Group2" id="Group2" onChange="checkTimeLineColumn(this,2)" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK2']->value;?>
</select></div><div class="col-lg-2"><?php echo $_smarty_tpl->tpl_vars['ASCDESC2']->value;?>
</div><div class="col-lg-2"><div id="radio_group2" class="col-lg-7"><?php echo $_smarty_tpl->tpl_vars['timelinecolumn2_html']->value;?>
</div></div></div></div><div class="row" id="group3_table_row"><div class="form-group"><div class="col-lg-2"><select class="select2 col-lg-12 inputElement" name="timeline_type3" id="timeline_type3" readonly style="float:left;width:7em;margin:auto;" ><option value="rows" <?php if ($_smarty_tpl->tpl_vars['timeline_type3']->value=="rows"){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_ROWS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php if ('true'==$_smarty_tpl->tpl_vars['ALLOW_COLS']->value){?><option value="cols" <?php if ($_smarty_tpl->tpl_vars['timeline_type3']->value=="cols"){?>selected="selected"<?php }?> ><?php echo vtranslate('LBL_COLS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }?></select></div><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="Group3" id="Group3" onChange="checkTimeLineColumn(this,3)" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK3']->value;?>
</select></div><div class="col-lg-2"><?php echo $_smarty_tpl->tpl_vars['ASCDESC3']->value;?>
</div><div class="col-lg-2"><div id="radio_group3" class="col-lg-7"><?php echo $_smarty_tpl->tpl_vars['timelinecolumn3_html']->value;?>
</div></div></div></div><div class="row"><div class="form-group"><div class="col-lg-2 fieldBlockContainer"><label class="control-label textAlignLeft"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-2 "><select class="select2 col-lg-2 inputElement" name="SummariesModules" id="SummariesModules" onchange='defineSUMModuleFields(this)' ><?php  $_smarty_tpl->tpl_vars['modulearr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['modulearr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SummariesModules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['modulearr']->key => $_smarty_tpl->tpl_vars['modulearr']->value){
$_smarty_tpl->tpl_vars['modulearr']->_loop = true;
?><option value=<?php echo $_smarty_tpl->tpl_vars['modulearr']->value['id'];?>
 <?php if ($_smarty_tpl->tpl_vars['modulearr']->value['checked']=="checked"){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['modulearr']->value['name'];?>
</option><?php } ?></select></div><div class="col-lg-2 "><input type="text" class="inputElement" id="search_input_sum" onkeyup="getSUMFieldsOptionsSearch(this)" placeholder="<?php echo vtranslate('LBL_Search_column',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></div></div></div><div class="row"><div class="form-group"><div class="col-lg-2 fieldBlockContainer">&nbsp;</div><div class="col-lg-3 fieldBlockContainer"><div id="availSumModValues" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['ALL_FIELDS_STRING']->value;?>
</div><select class="col-lg-12" name="availListSum" id="availListSum" multiple size="11" ondblclick="addOndblclickSUM(this)" ><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK4']->value;?>
</select></div><div class="col-lg-1 fieldBlockContainer"><button type='button' class='btn btn-default' onclick="addColumn('selectedSummaries');" style="margin-top: 50%;"><?php echo vtranslate('LBL_ADD_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <i class="fa fa-arrow-right"></i></button></div><div class="col-lg-3"><input type="hidden" name="selectedSummariesString" id="selectedSummariesString" value="<?php echo $_smarty_tpl->tpl_vars['selectedSummariesString']->value;?>
"><select id="selectedSummaries" size="11" name="selectedSummaries" onchange="selectedColumnClick(this);" multiple class="inputElement" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK6']->value;?>
</select></div><div class="col-lg-1 fieldBlockContainer"><button type='button' class='btn btn-default' onclick="moveUp('selectedSummaries');" title="<?php echo vtranslate('LBL_MOVE_UP_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-arrow-circle-up"></i></button><br><button type='button' class='btn btn-default' onclick="delColumn('selectedSummaries');" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle "></i></button><br><button type='button' class='btn btn-default' onclick="moveDown('selectedSummaries');" title="<?php echo vtranslate('LBL_MOVE_UP_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-arrow-circle-down"></i></button></div></div></div><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo vtranslate('SUMMARIES_ORDER_BY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</label></div><div class="col-lg-3"><input type="hidden" name="summaries_orderby_columnString" id="summaries_orderby_columnString" value="<?php echo $_smarty_tpl->tpl_vars['summaries_orderby']->value;?>
"><select id="summaries_orderby_column" class="select2 inputElement" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['RG_BLOCK6']->value;?>
</select>&nbsp;</div><div class="col-lg-2"><input type="hidden" name="summaries_orderby_typeString" id="summaries_orderby_typeString" value="<?php echo $_smarty_tpl->tpl_vars['summaries_orderby_type']->value;?>
"><input type='radio' name='summaries_orderby_type' id='summaries_orderby_asc' <?php if ($_smarty_tpl->tpl_vars['summaries_orderby_type']->value=="ASC"){?>checked="checked"<?php }?> $TimeLineColumnD value='ASC' style="margin:auto;">&nbsp;<?php echo vtranslate('Ascending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<input type='radio' name='summaries_orderby_type' id='summaries_orderby_desc' <?php if ($_smarty_tpl->tpl_vars['summaries_orderby_type']->value=="DESC"){?>checked="checked"<?php }?> $TimeLineColumnW value='DESC' style="margin:auto;">&nbsp;<?php echo vtranslate('Descending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</div></div></div><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo vtranslate('SET_LIMIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</label></div><div class="col-lg-3"><input type="text" class="inputElement" id="summaries_limit" name="summaries_limit" value="<?php if ($_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value!="0"){?><?php echo $_smarty_tpl->tpl_vars['SUMMARIES_LIMIT']->value;?>
<?php }?>"><small>&nbsp;&nbsp;<?php echo vtranslate('SET_EMPTY_FOR_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</small></div></div></div></div><?php }} ?>