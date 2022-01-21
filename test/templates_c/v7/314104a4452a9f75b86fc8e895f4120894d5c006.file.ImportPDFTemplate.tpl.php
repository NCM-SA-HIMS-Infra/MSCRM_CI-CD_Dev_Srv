<?php /* Smarty version Smarty-3.1.7, created on 2020-09-22 05:23:12
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/ImportPDFTemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2622597205f698a40cbd951-14280217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314104a4452a9f75b86fc8e895f4120894d5c006' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/ImportPDFTemplate.tpl',
      1 => 1600491958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2622597205f698a40cbd951-14280217',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'TITLE' => 0,
    'IMPORT_UPLOAD_SIZE' => 0,
    'IMPORT_UPLOAD_SIZE_MB' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f698a40cfc18',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f698a40cfc18')) {function content_5f698a40cfc18($_smarty_tpl) {?>
<div class='fc-overlay-modal'><div class = "modal-content"><div class="overlayHeader"><?php ob_start();?><?php echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TITLE'] = new Smarty_variable($_tmp1, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0);?>
</div><div class='modal-body' style="margin-bottom:100%" id ="landingPageDiv"><hr><div class="landingPage container-fluid importServiceSelectionContainer"><form enctype="multipart/form-data" name="importBasic" method="POST" action="index.php"><input type="hidden" name="module" value="PDFMaker"><input type="hidden" name="action" value="Import"><div class ="importBlockContainer show" id = "uploadFileContainer"><table class = "table table-borderless" cellpadding = "30" ><span><h4>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_PDFMAKER_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></span><hr><tr id="file_type_container" style="height:50px"><td></td><td><?php echo vtranslate('LBL_SELECT_XML',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td><td data-import-upload-size="<?php echo $_smarty_tpl->tpl_vars['IMPORT_UPLOAD_SIZE']->value;?>
" data-import-upload-size-mb="<?php echo $_smarty_tpl->tpl_vars['IMPORT_UPLOAD_SIZE_MB']->value;?>
"><div><input name="type" value="xml" type="hidden"><input type="hidden" name="is_scheduled" value="1" /><div class="fileUploadBtn btn btn-primary"><span><i class="fa fa-laptop"></i> <?php echo vtranslate('Select from My Computer',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span><input type="file" name="import_file" id="import_file" onchange="Vtiger_Import_Js.checkFileType(event)" data-file-formats="xml" data-fileFormats="xml" /></div><div id="importFileDetails" class="padding10"></div></div></td></tr></table></div><div class="modal-overlay-footer border1px clearfix"><div class="row clearfix"><div class="textAlignCenter col-lg-12 col-md-12 col-sm-12 "><button type="submit" name="import" id="importButton" class="btn btn-success btn-lg" onclick="return PDFMaker_List_Js.uploadAndParse()"><strong><?php echo vtranslate('LBL_IMPORT_BUTTON_LABEL','Import');?>
</strong></button> &nbsp;&nbsp;<a class="cancelLink" onclick="Vtiger_Import_Js.loadListRecords();" data-dismiss="modal" href="#"><?php echo vtranslate('LBL_CANCEL');?>
</a></div></div></div></form></div></div></div></div><?php }} ?>