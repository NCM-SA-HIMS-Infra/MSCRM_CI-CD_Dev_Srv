<?php /* Smarty version Smarty-3.1.7, created on 2020-10-30 09:10:43
         compiled from "F:\Project\MSCRM_Rehearsal_2\includes\runtime/../../layouts/v7\modules\PDFMaker\ListViewError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16270283255f9bd893a19141-47006282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dec11be47a567d0cabf367548b4fbaa00028766' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal_2\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\ListViewError.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16270283255f9bd893a19141-47006282',
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
  'unifunc' => 'content_5f9bd893a2ce7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9bd893a2ce7')) {function content_5f9bd893a2ce7($_smarty_tpl) {?>
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