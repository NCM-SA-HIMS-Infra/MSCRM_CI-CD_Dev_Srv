<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 09:10:43
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\PDFMaker\SidebarEssentials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14574906065f9bd893953ad3-62660913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a6e9034d870e43e069a47bc49b35acde9f5fa3' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\SidebarEssentials.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14574906065f9bd893953ad3-62660913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9bd893973ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd893973ba')) {function content_5f9bd893973ba($_smarty_tpl) {?>
<div class="sidebar-menu">
    <div class="module-filters" id="module-filters">
        <div class="sidebar-container lists-menu-container">
            <div class="sidebar-header clearfix">
                <h5 class="pull-left"><?php echo vtranslate('LBL_LISTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5>
            </div>
            <hr>
            <div class="menu-scroller scrollContainer" style="position:relative; top:0; left:0;">
				<div class="list-menu-content">
                    <ul class="lists-menu">
                        <li style="font-size:12px;" class='listViewFilter <?php if ($_smarty_tpl->tpl_vars['MODE']->value!="Blocks"){?>active<?php }?>'>
                             <a class="filterName listViewFilterElipsis" href="index.php?module=PDFMaker&view=List"><?php echo vtranslate('LBL_PDF_TEMPLATES_LIST',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                        </li>
                        <li style="font-size:12px;" class='listViewFilter <?php if ($_smarty_tpl->tpl_vars['MODE']->value=="Blocks"){?>active<?php }?>'>
                            <a class="filterName listViewFilterElipsis" href="index.php?module=PDFMaker&view=List&mode=Blocks"><?php echo vtranslate('LBL_BLOCKS_LIST',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>