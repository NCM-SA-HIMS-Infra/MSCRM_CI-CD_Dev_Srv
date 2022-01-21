<?php /* Smarty version Smarty-3.1.7, created on 2020-12-28 05:45:23
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PDFMaker\ListViewError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2439945545f9e3f47512816-77989782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b15921d8d5cacd33411125b3736cd4575fb0063' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\ListViewError.tpl',
      1 => 1609134293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2439945545f9e3f47512816-77989782',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e3f4752db6',
  'variables' => 
  array (
    'EXTENSIONS_ERROR' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e3f4752db6')) {function content_5f9e3f4752db6($_smarty_tpl) {?>
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