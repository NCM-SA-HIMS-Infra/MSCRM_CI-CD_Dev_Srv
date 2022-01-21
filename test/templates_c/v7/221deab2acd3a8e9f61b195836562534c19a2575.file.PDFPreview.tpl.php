<?php /* Smarty version Smarty-3.1.7, created on 2020-12-30 03:40:10
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PDFMaker\PDFPreview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15157462455f9e6322295dc1-49061214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '221deab2acd3a8e9f61b195836562534c19a2575' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\PDFPreview.tpl',
      1 => 1609134293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15157462455f9e6322295dc1-49061214',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9e63222d60d',
  'variables' => 
  array (
    'MODULE' => 0,
    'COMMONTEMPLATEIDS' => 0,
    'FILE_PATH' => 0,
    'DOWNLOAD_URL' => 0,
    'PRINT_ACTION' => 0,
    'SEND_EMAIL_PDF_ACTION' => 0,
    'SEND_EMAIL_PDF_ACTION_TYPE' => 0,
    'EDIT_AND_EXPORT_ACTION' => 0,
    'SAVE_AS_DOC_ACTION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9e63222d60d')) {function content_5f9e63222d60d($_smarty_tpl) {?>
<div class="modal-dialog modal-lg"><div class="modal-content"><div class="filePreview container-fluid"><div class="modal-header row"><div class="filename col-lg-8"><h4 class="textOverflowEllipsis maxWidth50" title="<?php echo vtranslate('LBL_PREVIEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><b><?php echo vtranslate('LBL_PREVIEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></h4></div><div class="col-lg-1 pull-right"><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div></div><div class="modal-body row" style="height:550px;"><input type="hidden" name="commontemplateid" value='<?php echo $_smarty_tpl->tpl_vars['COMMONTEMPLATEIDS']->value;?>
' /><iframe id='PDFMakerPreviewContent' src="<?php echo $_smarty_tpl->tpl_vars['FILE_PATH']->value;?>
" data-desc="<?php echo $_smarty_tpl->tpl_vars['FILE_PATH']->value;?>
" height="100%" width="100%"></iframe></div></div><div class="modal-footer"><div class='clearfix modal-footer-overwrite-style'><div class="row clearfix "><div class=' textAlignCenter col-lg-12 col-md-12 col-sm-12 '><button type='button' class='btn btn-success downloadButton' data-desc="<?php echo $_smarty_tpl->tpl_vars['DOWNLOAD_URL']->value;?>
"><i title="<?php echo vtranslate('LBL_EXPORT','PDFMaker');?>
" class="fa fa-download"></i>&nbsp;<strong><?php echo vtranslate('LBL_DOWNLOAD_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['PRINT_ACTION']->value=="1"){?><button type='button' class='btn btn-success printButton'><i class="fa fa-print" aria-hidden="true"></i>&nbsp;<strong><?php echo vtranslate('LBL_PRINT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['SEND_EMAIL_PDF_ACTION']->value=="1"){?><button type='button' class='btn btn-success sendEmailWithPDF' data-sendtype="<?php echo $_smarty_tpl->tpl_vars['SEND_EMAIL_PDF_ACTION_TYPE']->value;?>
"><i class="fa fa-send" aria-hidden="true"></i>&nbsp;<strong><?php echo vtranslate('LBL_SEND_EMAIL');?>
</strong></button>&nbsp;&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['EDIT_AND_EXPORT_ACTION']->value=="1"){?><button type='button' class='btn btn-success editPDF'><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;<strong><?php echo vtranslate('LBL_EDIT');?>
</strong></button>&nbsp;&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['SAVE_AS_DOC_ACTION']->value=="1"){?><button type='button' class='btn btn-success savePDFToDoc'><i class="fa fa-save" aria-hidden="true"></i>&nbsp;<strong><?php echo vtranslate('LBL_SAVEASDOC','PDFMaker');?>
</strong></button>&nbsp;&nbsp;<?php }?><a class='cancelLink' href="javascript:void(0);" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></div></div></div></div></div><?php }} ?>