<?php /* Smarty version Smarty-3.1.7, created on 2020-12-28 05:48:01
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PDFMaker\GetPDFButtons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13475685275f9e32c06bb067-82386278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c6278af064421b66b844aeff02859594fed8212' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\GetPDFButtons.tpl',
      1 => 1609134293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13475685275f9e32c06bb067-82386278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e32c071582',
  'variables' => 
  array (
    'ENABLE_PDFMAKER' => 0,
    'CRM_TEMPLATES_EXIST' => 0,
    'templateid' => 0,
    'itemArr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e32c071582')) {function content_5f9e32c071582($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['ENABLE_PDFMAKER']->value=='true'&&$_smarty_tpl->tpl_vars['CRM_TEMPLATES_EXIST']->value=='0'){?><div class="col-sm-4 pull-right" id="PDFMakerContentDiv"><div class="row clearfix"><div class="col-sm-6 padding0px pull-right"><div class="btn-group pull-right"><button class="btn btn-default selectPDFTemplates"><i title="<?php echo vtranslate('LBL_EXPORT_TO_PDF','PDFMaker');?>
" class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<?php echo vtranslate('LBL_EXPORT_TO_PDF','PDFMaker');?>
</button><button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split PDFMoreAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo vtranslate('LBL_MORE','PDFMaker');?>
&nbsp;&nbsp;<span class="caret"></span></button></button><ul class="dropdown-menu"><li class="dropdown-header"><select class="form-control" name="use_common_template" id="use_common_template" multiple><?php  $_smarty_tpl->tpl_vars["itemArr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["itemArr"]->_loop = false;
 $_smarty_tpl->tpl_vars["templateid"] = new Smarty_Variable;
 $_from = ($_smarty_tpl->tpl_vars['CRM_TEMPLATES']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["itemArr"]->key => $_smarty_tpl->tpl_vars["itemArr"]->value){
$_smarty_tpl->tpl_vars["itemArr"]->_loop = true;
 $_smarty_tpl->tpl_vars["templateid"]->value = $_smarty_tpl->tpl_vars["itemArr"]->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['itemArr']->value['title']!=''){?>title="<?php echo $_smarty_tpl->tpl_vars['itemArr']->value['title'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['itemArr']->value['is_default']=='1'||$_smarty_tpl->tpl_vars['itemArr']->value['is_default']=='3'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['itemArr']->value['templatename'];?>
</option><?php } ?></select></li><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("GetPDFActions.tpl",'PDFMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</ul></div></div></div></div></div><?php }?><?php }} ?>