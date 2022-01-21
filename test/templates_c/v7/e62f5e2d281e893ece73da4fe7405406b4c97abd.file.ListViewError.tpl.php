<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:06:30
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/ListViewError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16135492315f6591d69e4b75-61715794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62f5e2d281e893ece73da4fe7405406b4c97abd' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/ListViewError.tpl',
      1 => 1600491958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16135492315f6591d69e4b75-61715794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'EXTENSIONS_ERROR' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6591d69e846',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6591d69e846')) {function content_5f6591d69e846($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['EXTENSIONS_ERROR']->value){?>
    <div class="col-sm-12 col-xs-12">
        <a class="alert alert-danger displayInlineBlock" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Extensions">
            <div>
                <b style="padding-right: 15px; color: #b12d26;">
                    <?php echo vtranslate('LBL_CKEDITOR_HTMLDOM_ERROR',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                </b>
            </div>
            <br>
            <div class="btn btn-danger"><?php echo vtranslate('LBL_EXTENSIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div>
        </a>
    </div>
<?php }?><?php }} ?>