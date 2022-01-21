<?php /* Smarty version Smarty-3.1.7, created on 2021-01-26 17:00:16
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\PDFMaker\ModalEditAndExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9345730755f9ed5196b4522-25122018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddf4a8c2f32ce690511cc696f2decf1efdf356fa' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\PDFMaker\\ModalEditAndExport.tpl',
      1 => 1609134293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9345730755f9ed5196b4522-25122018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9ed5199ae3b',
  'variables' => 
  array (
    'FILE_NAME' => 0,
    'COMMONTEMPLATEIDS' => 0,
    'RECORDS' => 0,
    'MODULE' => 0,
    'TEMPLATE_SELECT' => 0,
    'PDF_SECTIONS' => 0,
    'section' => 0,
    'PDF_CONTENTS' => 0,
    'templateid' => 0,
    'DEFAULT_TEMPLATEID' => 0,
    'pdfcontent' => 0,
    'PDF_DIVS' => 0,
    'DOWNLOAD_URL' => 0,
    'PRINT_ACTION' => 0,
    'SEND_EMAIL_PDF_ACTION' => 0,
    'SAVE_AS_DOC_ACTION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9ed5199ae3b')) {function content_5f9ed5199ae3b($_smarty_tpl) {?>
<div class="modal-dialog modal-lg"><div class="modal-content"><div class="filePreview container-fluid"><div class="modal-header row"><div class="filename col-lg-8"><h4 class="textOverflowEllipsis maxWidth50" title="<?php echo $_smarty_tpl->tpl_vars['FILE_NAME']->value;?>
"><b><?php echo vtranslate('LBL_EDIT');?>
</b></h4></div><div class="col-lg-1 pull-right"><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div></div><div class="modal-body row" style="height:550px;"><div id="composePDFContainer tabbable ui-sortable"><form class="form-horizontal recordEditView" id="editPDFForm" method="post" action="index.php" enctype="multipart/form-data" name="editPDFForm"><input type="hidden" name="action" id="action" value='CreatePDFFromTemplate' /><input type="hidden" name="module" value="PDFMaker"/><input type="hidden" name="commontemplateid" value='<?php echo $_smarty_tpl->tpl_vars['COMMONTEMPLATEIDS']->value;?>
' /><input type="hidden" name="template_ids" value='<?php echo $_smarty_tpl->tpl_vars['COMMONTEMPLATEIDS']->value;?>
' /><input type="hidden" name="idslist" value="<?php echo $_smarty_tpl->tpl_vars['RECORDS']->value;?>
" /><input type="hidden" name="relmodule" value="<?php echo $_REQUEST['formodule'];?>
" /><input type="hidden" name="language" value='<?php echo $_REQUEST['language'];?>
' /><input type="hidden" name="pmodule" value="<?php echo $_REQUEST['formodule'];?>
" /><input type="hidden" name="pid" value="<?php echo $_REQUEST['record'];?>
" /><input type="hidden" name="mode" value="edit" /><input type="hidden" name="print" value="" /><div id='editTemplate'><div class="row"><div class="col-xs-6"><ul class="nav nav-pills"><li class="active" data-type="body"><a data-toggle="tab" href="#pdfbodyTabA" aria-expanded="true"><strong>&nbsp;<?php echo vtranslate('LBL_BODY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</strong></a></li><li class="" data-type="header"><a data-toggle="tab" href="#pdfheaderTabA" aria-expanded="true"><strong>&nbsp;<?php echo vtranslate('LBL_HEADER_TAB',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</strong></a></li><li class="" data-type="footer"><a data-toggle="tab" href="#pdffooterTabA" aria-expanded="true"><strong>&nbsp;<?php echo vtranslate('LBL_FOOTER_TAB',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</strong></a></li></ul></div><div class="col-xs-6"><?php echo vtranslate('LBL_TEMPLATE','PDFMaker');?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_SELECT']->value;?>
</div></div><br><div class="tab-content"><?php  $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['section']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PDF_SECTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sections"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['section']->key => $_smarty_tpl->tpl_vars['section']->value){
$_smarty_tpl->tpl_vars['section']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sections"]['index']++;
?><div id="pdf<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
TabA" class="tab-pane <?php ob_start();?><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['sections']['index'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==0){?>active<?php }?>" data-section="<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
<?php $_tmp2=ob_get_clean();?><?php  $_smarty_tpl->tpl_vars['pdfcontent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pdfcontent']->_loop = false;
 $_smarty_tpl->tpl_vars['templateid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PDF_CONTENTS']->value[$_tmp2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pdfcontent']->key => $_smarty_tpl->tpl_vars['pdfcontent']->value){
$_smarty_tpl->tpl_vars['pdfcontent']->_loop = true;
 $_smarty_tpl->tpl_vars['templateid']->value = $_smarty_tpl->tpl_vars['pdfcontent']->key;
?><div class="pdfcontent<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['DEFAULT_TEMPLATEID']->value!=$_smarty_tpl->tpl_vars['templateid']->value){?>hide<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
_div<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
"><textarea name="<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
" style="height:470px" class="inputElement textAreaElement col-lg-12" tabindex="5"><?php echo $_smarty_tpl->tpl_vars['pdfcontent']->value;?>
</textarea></div><?php } ?></div><?php } ?></div><?php echo $_smarty_tpl->tpl_vars['PDF_DIVS']->value;?>
</div></form></div></div></div><div class="modal-footer"><div class='clearfix modal-footer-overwrite-style'><div class="row clearfix "><div class=' textAlignCenter col-lg-12 col-md-12 col-sm-12'><button type='submit' class='btn btn-success downloadButton' data-desc="<?php echo $_smarty_tpl->tpl_vars['DOWNLOAD_URL']->value;?>
"><?php echo vtranslate('LBL_DOWNLOAD_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['PRINT_ACTION']->value=="1"){?><button type='button' class='btn btn-success printButton'><?php echo vtranslate('LBL_PRINT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['SEND_EMAIL_PDF_ACTION']->value=="1"){?><button type='button' class='btn btn-success sendEmailWithPDF'><?php echo vtranslate('LBL_SEND_EMAIL');?>
</button>&nbsp;&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['SAVE_AS_DOC_ACTION']->value=="1"){?><button type='button' class='btn btn-success savePDFToDoc'><?php echo vtranslate('LBL_SAVEASDOC','PDFMaker');?>
</button>&nbsp;&nbsp;<?php }?><a class='cancelLink' href="javascript:void(0);" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></div></div></div></div></div><?php }} ?>