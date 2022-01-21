<?php /* Smarty version Smarty-3.1.7, created on 2020-10-09 12:26:01
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/PDFMaker/SidebarEssentials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13658032755f8056d9799b18-17522517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e267292bc2d51e002cd79d2bc1c5539eae10c5f' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/PDFMaker/SidebarEssentials.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13658032755f8056d9799b18-17522517',
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
  'unifunc' => 'content_5f8056d97a08d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f8056d97a08d')) {function content_5f8056d97a08d($_smarty_tpl) {?>
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