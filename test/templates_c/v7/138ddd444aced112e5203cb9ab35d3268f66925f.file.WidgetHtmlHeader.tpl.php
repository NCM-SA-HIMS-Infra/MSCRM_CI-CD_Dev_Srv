<?php /* Smarty version Smarty-3.1.7, created on 2021-06-26 04:58:57
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\dashboards\WidgetHtmlHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117787442060c5003418f587-84061270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '138ddd444aced112e5203cb9ab35d3268f66925f' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\dashboards\\WidgetHtmlHeader.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117787442060c5003418f587-84061270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60c500342582b',
  'variables' => 
  array (
    'display_widget_header' => 0,
    'recordid' => 0,
    'STYLES' => 0,
    'cssModel' => 0,
    'SCRIPTS' => 0,
    'jsModel' => 0,
    'WIDGET' => 0,
    'MODULE_NAME' => 0,
    'primary_values' => 0,
    'primary_value' => 0,
    'optGroupDone' => 0,
    'primary_value_key' => 0,
    'primary_value_opt' => 0,
    'LModule' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c500342582b')) {function content_60c500342582b($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['display_widget_header']->value=='true'){?>
    <div class="dashboardWidgetHeader" id="dashboardWidgetHeader<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
" >
    <?php  $_smarty_tpl->tpl_vars['cssModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['STYLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssModel']->key => $_smarty_tpl->tpl_vars['cssModel']->value){
$_smarty_tpl->tpl_vars['cssModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['cssModel']->key;
?>
        <link rel="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getRel();?>
" href="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getHref();?>
" type="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getType();?>
" media="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getMedia();?>
" />
    <?php } ?>
    <?php  $_smarty_tpl->tpl_vars['jsModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SCRIPTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsModel']->key => $_smarty_tpl->tpl_vars['jsModel']->value){
$_smarty_tpl->tpl_vars['jsModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['jsModel']->key;
?>
        <script type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
"></script>
    <?php } ?>

        <div class="title clearfix">
            <span class="dashboardTitle" title=<?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" style="width: 25em;" >
                <b><?php echo htmlspecialchars(vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value), ENT_QUOTES, 'UTF-8', true);?>
</b>
            </span>
        </div>

    <?php if (count($_smarty_tpl->tpl_vars['primary_values']->value)>0){?>
        <div class="dashboardWidgetHeader clearfix">
            <div class="userList">
                <select class="select2 widgetFilter reloadOnChange "  name="primarySearchBy" id="SelectPrimarySearchWidget<?php echo $_smarty_tpl->tpl_vars['recordid']->value;?>
">
                    <option value="all"  selected><?php echo vtranslate('All',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option>
                    <?php  $_smarty_tpl->tpl_vars["primary_value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["primary_value"]->_loop = false;
 $_smarty_tpl->tpl_vars['primary_value_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['primary_values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["primary_value"]->key => $_smarty_tpl->tpl_vars["primary_value"]->value){
$_smarty_tpl->tpl_vars["primary_value"]->_loop = true;
 $_smarty_tpl->tpl_vars['primary_value_key']->value = $_smarty_tpl->tpl_vars["primary_value"]->key;
?>
                        <?php $_smarty_tpl->tpl_vars['optGroupDone'] = new Smarty_variable("0", null, 0);?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['primary_value']->value)){?>
                            <?php  $_smarty_tpl->tpl_vars["primary_value_opt"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["primary_value_opt"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['primary_value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["primary_value_opt"]->key => $_smarty_tpl->tpl_vars["primary_value_opt"]->value){
$_smarty_tpl->tpl_vars["primary_value_opt"]->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['optGroupDone']->value!="1"){?>
                                    <?php $_smarty_tpl->tpl_vars['optGroupDone'] = new Smarty_variable("1", null, 0);?>
                                    <optgroup label="<?php echo $_smarty_tpl->tpl_vars['primary_value_key']->value;?>
">
                                <?php }?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['primary_value_opt']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['primary_value_opt']->value,$_smarty_tpl->tpl_vars['LModule']->value);?>
</option>
                            <?php } ?>
                        <?php }else{ ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['primary_value']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['primary_value']->value,$_smarty_tpl->tpl_vars['LModule']->value);?>
</option>
                        <?php }?>
                    <?php } ?>
                </select>
            </div>
        </div>
    <?php }?>
    </div>
<?php }?>
<?php }} ?>