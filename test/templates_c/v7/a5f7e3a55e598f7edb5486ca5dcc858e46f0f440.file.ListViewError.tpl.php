<?php /* Smarty version Smarty-3.1.7, created on 2020-10-09 12:26:01
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/PDFMaker/ListViewError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15949716445f8056d97a2213-63210476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5f7e3a55e598f7edb5486ca5dcc858e46f0f440' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/PDFMaker/ListViewError.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15949716445f8056d97a2213-63210476',
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
  'unifunc' => 'content_5f8056d97a64a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f8056d97a64a')) {function content_5f8056d97a64a($_smarty_tpl) {?>
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