<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportColumns.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5775764725f7d801e9d62f1-58358693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a962f1346567669fe12ef0403c08a7aadcf36f2' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/ReportColumns.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5775764725f7d801e9d62f1-58358693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'availModules' => 0,
    'modulearr' => 0,
    'ALL_FIELDS_STRING' => 0,
    'BLOCK1' => 0,
    'BLOCK2' => 0,
    'scolrow_n' => 0,
    'BLOCK3' => 0,
    'BLOCKS3' => 0,
    'SC_INDEX' => 0,
    'sortColumnRowPadding' => 0,
    'SC_BLOCK' => 0,
    'BLOCKS_ORDER3' => 0,
    'COLUMNS_LIMIT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801e9f873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801e9f873')) {function content_5f7d801e9f873($_smarty_tpl) {?>

<script>var moveupLinkObj,moveupDisabledObj,movedownLinkObj,movedownDisabledObj;</script><div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-2"><select id="availModules" name="availModules" onchange='defineModuleFields(this)' class="select2 inputElement"><?php  $_smarty_tpl->tpl_vars['modulearr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['modulearr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['availModules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['modulearr']->key => $_smarty_tpl->tpl_vars['modulearr']->value){
$_smarty_tpl->tpl_vars['modulearr']->_loop = true;
?><option value=<?php echo $_smarty_tpl->tpl_vars['modulearr']->value['id'];?>
 <?php if ($_smarty_tpl->tpl_vars['modulearr']->value['checked']=="checked"){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['modulearr']->value['name'];?>
</option><?php } ?></select></div><div class="col-lg-2"><input type="text" id="search_input" onkeyup="getFieldsOptionsSearch(this)" placeholder="<?php echo vtranslate('LBL_Search_column',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"class="inputElement"></div></div></div><div class="row"><div class="form-group"><div class="col-lg-3"><div id="availModValues" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['ALL_FIELDS_STRING']->value;?>
</div><select id="availList" multiple size="20" name="availList" class="txtBox" ondblclick="addOndblclick(this)" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['BLOCK1']->value;?>
</select></div><div class="col-lg-1"><button type='button' class='btn btn-default' onclick="addColumn('selectedColumns');" style="margin-top: 50%;"><?php echo vtranslate('LBL_ADD_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <i class="fa fa-arrow-right"></i></button></div><div class="col-lg-3"><input type="hidden" name="selectedColumnsString" id="selectedColumnsString"><select id="selectedColumns" size="20" name="selectedColumns" onchange="selectedColumnClick(this);" multiple class="inputElement" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['BLOCK2']->value;?>
</select></div><div class="col-lg-1"><button type='button' class='btn btn-default' onclick="moveUp('selectedColumns');" title="<?php echo vtranslate('LBL_MOVE_UP_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-arrow-circle-up"></i></button><br><button type='button' class='btn btn-default' onclick="delColumn('selectedColumns');" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle "></i></button><br><button type='button' class='btn btn-default' onclick="moveDown('selectedColumns');" title="<?php echo vtranslate('LBL_MOVE_UP_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-arrow-circle-down"></i></button></div></div></div><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo vtranslate('LBL_SORT_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-1"><span id="addSortCol1"><button type='button' class='btn btn-default' style='float:left;' onclick="addSortColumnRow()"><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate('LBL_ADD_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></span></div><div class="col-lg-4 fieldBlockContainer"><div id="sortColumnsByDiv"><input id="scolrow_n" name="scolrow_n" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['scolrow_n']->value;?>
"><div id="sortColumnsByDivBase" style="display:none;"><div id="sortColumnRow" style="padding-top:5px;vertical-align: middle;"><select id="SortByColumnIdNr" name="SortByColumnIdNr" class="rep_select2 inputElement" style="margin:auto;" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['BLOCK3']->value;?>
</select>&nbsp;&nbsp;<input type="radio" name="SortOrderColumnIdNr" value="ASC" checked><?php echo vtranslate('Ascending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<input type="radio" name="SortOrderColumnIdNr" value="DESC"><?php echo vtranslate('Descending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<a onclick="deleteSortColumnRow(this);" href="javascript:;"><img src="modules/ITS4YouReports/img/Delete.png" align="absmiddle" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
..." border="0" ></a></div></div><?php $_smarty_tpl->tpl_vars["sortColumnRowPadding"] = new Smarty_variable('', null, 0);?><?php  $_smarty_tpl->tpl_vars['SC_BLOCK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SC_BLOCK']->_loop = false;
 $_smarty_tpl->tpl_vars['SC_INDEX'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BLOCKS3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SC_BLOCK']->key => $_smarty_tpl->tpl_vars['SC_BLOCK']->value){
$_smarty_tpl->tpl_vars['SC_BLOCK']->_loop = true;
 $_smarty_tpl->tpl_vars['SC_INDEX']->value = $_smarty_tpl->tpl_vars['SC_BLOCK']->key;
?><?php if ($_smarty_tpl->tpl_vars['SC_INDEX']->value>1){?><?php $_smarty_tpl->tpl_vars["sortColumnRowPadding"] = new Smarty_variable("padding-top:5px;", null, 0);?><?php }?><div id="sortColumnRow" style="<?php echo $_smarty_tpl->tpl_vars['sortColumnRowPadding']->value;?>
vertical-align: middle;"><select id="SortByColumn<?php echo $_smarty_tpl->tpl_vars['SC_INDEX']->value;?>
" name="SortByColumn<?php echo $_smarty_tpl->tpl_vars['SC_INDEX']->value;?>
" class="select2 inputElement" style="margin:auto;" ><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['SC_BLOCK']->value;?>
</select>&nbsp;&nbsp;<input type="radio" name="SortOrderColumn<?php echo $_smarty_tpl->tpl_vars['SC_INDEX']->value;?>
" value="ASC" <?php if ($_smarty_tpl->tpl_vars['BLOCKS_ORDER3']->value[$_smarty_tpl->tpl_vars['SC_INDEX']->value]=="ASC"){?>checked<?php }?>><?php echo vtranslate('Ascending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<input type="radio" name="SortOrderColumn<?php echo $_smarty_tpl->tpl_vars['SC_INDEX']->value;?>
" value="DESC" <?php if ($_smarty_tpl->tpl_vars['BLOCKS_ORDER3']->value[$_smarty_tpl->tpl_vars['SC_INDEX']->value]=="DESC"){?>checked<?php }?>><?php echo vtranslate('Descending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<a onclick="deleteSortColumnRow(this);" href="javascript:;"><img src="modules/ITS4YouReports/img/Delete.png" align="absmiddle" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
..." border="0" ></a></div><?php }
if (!$_smarty_tpl->tpl_vars['SC_BLOCK']->_loop) {
?><div id="sortColumnRow" style="vertical-align: middle;"><select id="SortByColumn1" name="SortByColumn1" class="select2 inputElement" style="margin:auto;" >addSortColumnRow        <option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php echo $_smarty_tpl->tpl_vars['BLOCK3']->value;?>
</select>&nbsp;&nbsp;<input type="radio" name="SortOrderColumn1" value="ASC" checked ><?php echo vtranslate('Ascending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<input type="radio" name="SortOrderColumn1" value="DESC"><?php echo vtranslate('Descending',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<a onclick="deleteSortColumnRow(this);" href="javascript:;"><img src="modules/ITS4YouReports/img/Delete.png" align="absmiddle" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
..." border="0" ></a></div><?php } ?></div></div></div></div><div class="row"><div class="form-group"><div class="col-lg-2"><label class="control-label textAlignLeft"><?php echo vtranslate('SET_LIMIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="col-lg-4 fieldBlockContainer"><input type="text" id="columns_limit" name="columns_limit" value="<?php if ($_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value!="0"){?><?php echo $_smarty_tpl->tpl_vars['COLUMNS_LIMIT']->value;?>
<?php }?>" class="inputElement" >&nbsp;&nbsp;<small><?php echo vtranslate('SET_EMPTY_FOR_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</small></div></div></div></div><?php }} ?>