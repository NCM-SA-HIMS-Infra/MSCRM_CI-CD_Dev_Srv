<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportFilters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14701754675f7d801ea995a7-62483139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5cf804a8cd176c188ab762e0e270786e08b1a49' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportFilters.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14701754675f7d801ea995a7-62483139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'REL_FIELDS' => 0,
    'BLOCKJS_STD' => 0,
    'VIEW' => 0,
    'MODULE' => 0,
    'REPORTTYPE' => 0,
    'display_summaries_filter' => 0,
    'SUMMARIES_CRITERIA' => 0,
    'COLUMN_INDEX' => 0,
    'COLUMN_CRITERIA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801eaaf5e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801eaaf5e')) {function content_5f7d801eaaf5e($_smarty_tpl) {?>

<script type="text/javascript">
    var advft_column_index_count = -1;
    var advft_group_index_count = 0;
    var column_index_array = [];
    var group_index_array = [];

    var gf_advft_column_index_count = -1;
    var gf_advft_group_index_count = 0;
    var gf_column_index_array = [];
    var gf_group_index_array = [];
    var rel_fields = <?php echo $_smarty_tpl->tpl_vars['REL_FIELDS']->value;?>
;
</script>

<?php echo $_smarty_tpl->getSubTemplate ('modules/ITS4YouReports/AdvanceFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->tpl_vars['BLOCKJS_STD']->value;?>


<input type="hidden" name="advft_criteria" id="advft_criteria" value="" />
<input type="hidden" name="advft_criteria_groups" id="advft_criteria_groups" value="" />
<input type="hidden" name="groupft_criteria" id="groupft_criteria" value="" />
<input type="hidden" name="quick_filter_criteria" id="quick_filter_criteria" value="" />
<?php if ('Detail'!=$_smarty_tpl->tpl_vars['VIEW']->value){?><div style="border:1px solid #ccc;padding:4%;"><?php }?><div class="row"><div class="form-group"><label class="control-label textAlignLeft col-lg-12"><h4><?php echo vtranslate('LBL_ADVANCED_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></label></div></div><div class="row <?php if ('Detail'!=$_smarty_tpl->tpl_vars['VIEW']->value){?>well<?php }?> filterConditionContainer "><div class="form-group"><div class='filterContainer'><div style="display:block" id='adv_filter_div' name='adv_filter_div'><?php echo $_smarty_tpl->getSubTemplate ('modules/ITS4YouReports/FiltersCriteria.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><button type='button' class='btn btn-default' style='float:left;' onclick="addNewConditionGroup('adv_filter_div')"><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate('LBL_NEW_GROUP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div></div><?php if ('Detail'!=$_smarty_tpl->tpl_vars['VIEW']->value){?><?php $_smarty_tpl->tpl_vars["display_summaries_filter"] = new Smarty_variable("display:block;", null, 0);?><?php if ($_smarty_tpl->tpl_vars['REPORTTYPE']->value=="tabular"){?><?php $_smarty_tpl->tpl_vars["display_summaries_filter"] = new Smarty_variable("display:none;", null, 0);?><?php }?><div style="width:100%;<?php echo $_smarty_tpl->tpl_vars['display_summaries_filter']->value;?>
" id='group_filter_div' name='group_filter_div' class="paddingTop20"><div class="row"><div class="form-group"><label class="control-label textAlignLeft col-lg-12"><h4><?php echo vtranslate('LBL_GROUP_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></label></div></div><div class="row well filterConditionContainer " id='conditiongrouptable_0'><div class="form-group" id='ggroupfooter_0'><button type="button" class="btn btn-default" onclick='addGroupConditionRow("0")'><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate('LBL_NEW_CONDITION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div><div class="row"><div class="form-group" id='groupconditionglue_0'></div></div><?php  $_smarty_tpl->tpl_vars['COLUMN_CRITERIA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->_loop = false;
 $_smarty_tpl->tpl_vars['COLUMN_INDEX'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUMMARIES_CRITERIA']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->key => $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value){
$_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->_loop = true;
 $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value = $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->key;
?><script type="text/javascript">addGroupConditionRow('0');document.getElementById('ggroupop<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
').value = '<?php echo $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value['comparator'];?>
';var conditionColumnRowElement = document.getElementById('ggroupcol<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
');conditionColumnRowElement.value = '<?php echo $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value['columnname'];?>
';addRequiredElements('g', '<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
');var columnvalue = '<?php echo $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value['value'];?>
';document.getElementById('ggroupval<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
').value = columnvalue;</script><?php } ?><?php  $_smarty_tpl->tpl_vars['COLUMN_CRITERIA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->_loop = false;
 $_smarty_tpl->tpl_vars['COLUMN_INDEX'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUMMARIES_CRITERIA']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->key => $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value){
$_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->_loop = true;
 $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value = $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->key;
?><script type="text/javascript">if (document.getElementById('gcon<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
'))document.getElementById('gcon<?php echo $_smarty_tpl->tpl_vars['COLUMN_INDEX']->value;?>
').value = '<?php echo $_smarty_tpl->tpl_vars['COLUMN_CRITERIA']->value['column_condition'];?>
';</script><?php } ?></div><div style="width:100%;" id='quick_filter_div' name='quick_filter_div' class="paddingTop20"><div class="row"><div class="form-group"><label class="control-label textAlignLeft col-lg-12"><h4><?php echo vtranslate('LBL_QUICK_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></label></div></div><div class="row well filterConditionContainer " id='quickfiltertable_0'><div class="form-group" id='quickfilter_0'><input type="hidden" name="quick_filters_save" id="quick_filters_save" value=""><select name="quick_filters" id="quick_filters" multiple class="select2 col-lg-10" ></select></div></div></div><script type="text/javascript">jQuery(document).ready(function () {addQuickFilterBox();});</script><?php }?><?php if ('Detail'!=$_smarty_tpl->tpl_vars['VIEW']->value){?></div><?php }?><?php }} ?>