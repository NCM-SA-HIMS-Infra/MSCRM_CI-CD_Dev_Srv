<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 14:12:42
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\PDFMaker\ListViewError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12189268775f997c5a550e34-67504126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f83f64b7e97072b24805ec73f2522cd763b68057' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\ListViewError.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12189268775f997c5a550e34-67504126',
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
  'unifunc' => 'content_5f997c5a563e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f997c5a563e3')) {function content_5f997c5a563e3($_smarty_tpl) {?>
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