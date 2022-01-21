<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:02
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportGraphs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152908075f998aba5bf3d0-20002419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a76aebcbd8be7b66bdc7443fd1e8d75b6ccbb29' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportGraphs.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152908075f998aba5bf3d0-20002419',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'charttitle' => 0,
    'collapse_data_block' => 0,
    'chart_position' => 0,
    'X_GROUP' => 0,
    'x_column_str' => 0,
    'x_column_arr' => 0,
    'CHARTS_ARRAY' => 0,
    'chtype1' => 0,
    'CHART_TYPE' => 0,
    'chart_type_key' => 0,
    'charttype_arr' => 0,
    'selected_summaries' => 0,
    'column_arr' => 0,
    'chtype2' => 0,
    'chtype3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998aba61225',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998aba61225')) {function content_5f998aba61225($_smarty_tpl) {?>

<input type="hidden" name="none_chart" id="none_chart" value="<?php echo getTranslatedString('LBL_SELECT_CHARTTYPE','ITS4YouReports');?>
"><div style="border:1px solid #ccc;padding:4%;"><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('LBL_CHART_Title',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input class="inputElement" id="charttitle" name="charttitle" value="<?php echo $_smarty_tpl->tpl_vars['charttitle']->value;?>
" type="text" placeholder="<?php echo getTranslatedString('LBL_CHART_Title','ITS4YouReports');?>
" onblur="setChartTitle(this)"></div></div><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('LBL_CHART_CollapseDataBlock',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input class="span5" id="collapse_data_block" name="collapse_data_block" value="<?php echo $_smarty_tpl->tpl_vars['collapse_data_block']->value;?>
" type="hidden" ><input class="span5" id="collapse_data_checkbox" name="collapse_data_checkbox" value="" <?php if (1==$_smarty_tpl->tpl_vars['collapse_data_block']->value){?>checked<?php }?> type="checkbox" ></div></div><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('LBL_CHART_Position',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select class="select2 inputElement" id="chart_position" name="chart_position"><option value="bttom" <?php if ('bottom'==$_smarty_tpl->tpl_vars['chart_position']->value){?>selected='selected'<?php }?>><?php echo vtranslate('LBL_BOTTOM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="top" <?php if ('top'==$_smarty_tpl->tpl_vars['chart_position']->value){?>selected='selected'<?php }?>><?php echo vtranslate('LBL_TOP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div></div><div class="form-group"><label class="control-label textAlignLeft col-lg-2"><?php echo vtranslate('LBL_CHART_DataSeries',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select class="select2 inputElement" id="x_group" name="x_group" onchange="ChartDataSeries(this);"><?php  $_smarty_tpl->tpl_vars['x_column_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x_column_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['x_column_str'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['X_GROUP']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['x_column_arr']->key => $_smarty_tpl->tpl_vars['x_column_arr']->value){
$_smarty_tpl->tpl_vars['x_column_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['x_column_str']->value = $_smarty_tpl->tpl_vars['x_column_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['x_column_str']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['x_column_arr']->value['selected'];?>
><?php echo $_smarty_tpl->tpl_vars['x_column_arr']->value['value'];?>
</option><?php } ?></select></div></div><div class="form-group"><?php $_smarty_tpl->tpl_vars["chtype1"] = new Smarty_variable($_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[1]['charttype'], null, 0);?><label class="control-label textAlignLeft col-lg-1"><?php echo vtranslate('Graph1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-1" style="height:20px;margin-top:10px;"><i id="iconchtype1" name="iconchtype" class="<?php echo $_smarty_tpl->tpl_vars['CHART_TYPE']->value[$_smarty_tpl->tpl_vars['chtype1']->value]['icon'];?>
" style="float:right;"></i></div><div class="col-lg-2"><select class="select2 inputElement" id="chartType1" name="chartType1" data-i="1"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['charttype_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['charttype_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['chart_type_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CHART_TYPE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['charttype_arr']->key => $_smarty_tpl->tpl_vars['charttype_arr']->value){
$_smarty_tpl->tpl_vars['charttype_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['chart_type_key']->value = $_smarty_tpl->tpl_vars['charttype_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['chart_type_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['chart_type_key']->value==$_smarty_tpl->tpl_vars['chtype1']->value){?>selected='selected'<?php }?>data-icon="<?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['icon'];?>
"><?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['value'];?>
</option><?php } ?></select></div><div class="col-lg-2"><select class="select2 inputElement" id="data_series1" name="data_series1"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['column_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['column_i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['selected_summaries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column_arr']->key => $_smarty_tpl->tpl_vars['column_arr']->value){
$_smarty_tpl->tpl_vars['column_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['column_i']->value = $_smarty_tpl->tpl_vars['column_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['column_arr']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['column_arr']->value['value']==$_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[1]['dataseries']){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['column_arr']->value['label'];?>
</option><?php } ?></select></div></div><div class="form-group"><?php $_smarty_tpl->tpl_vars["chtype2"] = new Smarty_variable($_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[2]['charttype'], null, 0);?><label class="control-label textAlignLeft col-lg-1"><?php echo vtranslate('Graph2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-1" style="height:20px;margin-top:10px;"><i id="iconchtype2" name="iconchtype" class="<?php echo $_smarty_tpl->tpl_vars['CHART_TYPE']->value[$_smarty_tpl->tpl_vars['chtype2']->value]['icon'];?>
" style="float:right;"></i></div><div class="col-lg-2"><select class="select2 inputElement" id="chartType2" name="chartType2" data-i="2"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['charttype_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['charttype_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['chart_type_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CHART_TYPE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['charttype_arr']->key => $_smarty_tpl->tpl_vars['charttype_arr']->value){
$_smarty_tpl->tpl_vars['charttype_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['chart_type_key']->value = $_smarty_tpl->tpl_vars['charttype_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['chart_type_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['chart_type_key']->value==$_smarty_tpl->tpl_vars['chtype2']->value){?>selected='selected'<?php }?>data-icon="<?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['icon'];?>
" ><?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['value'];?>
</option><?php } ?></select></div><div class="col-lg-2"><select class="select2 inputElement" id="data_series2" name="data_series2"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['column_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['column_i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['selected_summaries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column_arr']->key => $_smarty_tpl->tpl_vars['column_arr']->value){
$_smarty_tpl->tpl_vars['column_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['column_i']->value = $_smarty_tpl->tpl_vars['column_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['column_arr']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['column_arr']->value['value']==$_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[2]['dataseries']){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['column_arr']->value['label'];?>
</option><?php } ?></select></div></div><div class="form-group"><?php $_smarty_tpl->tpl_vars["chtype3"] = new Smarty_variable($_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[3]['charttype'], null, 0);?><label class="control-label textAlignLeft col-lg-1"><?php echo vtranslate('Graph3',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-1" style="height:20px;margin-top:10px;"><i id="iconchtype3" name="iconchtype" class="<?php echo $_smarty_tpl->tpl_vars['CHART_TYPE']->value[$_smarty_tpl->tpl_vars['chtype3']->value]['icon'];?>
" style="float:right;"></i></div><div class="col-lg-2"><select class="select2 inputElement" id="chartType3" name="chartType3" data-i="3"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['charttype_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['charttype_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['chart_type_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CHART_TYPE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['charttype_arr']->key => $_smarty_tpl->tpl_vars['charttype_arr']->value){
$_smarty_tpl->tpl_vars['charttype_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['chart_type_key']->value = $_smarty_tpl->tpl_vars['charttype_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['chart_type_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['chart_type_key']->value==$_smarty_tpl->tpl_vars['chtype3']->value){?>selected='selected'<?php }?>data-icon="<?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['icon'];?>
" ><?php echo $_smarty_tpl->tpl_vars['charttype_arr']->value['value'];?>
</option><?php } ?></select></div><div class="col-lg-2"><select class="select2 inputElement" id="data_series3" name="data_series3"><option value="none"><?php echo getTranslatedString('LBL_NONE','ITS4YouReports');?>
</option><?php  $_smarty_tpl->tpl_vars['column_arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column_arr']->_loop = false;
 $_smarty_tpl->tpl_vars['column_i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['selected_summaries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column_arr']->key => $_smarty_tpl->tpl_vars['column_arr']->value){
$_smarty_tpl->tpl_vars['column_arr']->_loop = true;
 $_smarty_tpl->tpl_vars['column_i']->value = $_smarty_tpl->tpl_vars['column_arr']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['column_arr']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['column_arr']->value['value']==$_smarty_tpl->tpl_vars['CHARTS_ARRAY']->value[3]['dataseries']){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['column_arr']->value['label'];?>
</option><?php } ?></select></div></div></div><?php }} ?>