<?php /* Smarty version Smarty-3.1.7, created on 2020-09-19 05:10:20
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/Install.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5458291315f6592bc9652c0-03677130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30fed39be06d6290278b8850a5cc3a90b3677c0e' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/PDFMaker/Install.tpl',
      1 => 1600491958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5458291315f6592bc9652c0-03677130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MB_STRING_EXISTS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6592bc9a1f0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6592bc9a1f0')) {function content_5f6592bc9a1f0($_smarty_tpl) {?>

<div style="width: 80%; max-width: 1000px;margin: 15px auto;">
    <div class="modal-content">
        <div class="modal-header">
            <h4><?php echo vtranslate('LBL_MODULE_NAME','PDFMaker');?>
 <?php echo vtranslate('LBL_INSTALL','PDFMaker');?>
</h4>
        </div>
        <form name="install" id="editLicense" method="POST" action="index.php" class="form-horizontal">
            <input type="hidden" name="module" value="PDFMaker"/>
            <input type="hidden" name="view" value="List"/>
            <div class="modal-body">
                <input type="hidden" name="installtype" value="download_src"/>
                <div class="controls">
                    <div>
                        <strong><?php echo vtranslate('LBL_DOWNLOAD_SRC','PDFMaker');?>
</strong>
                    </div>
                    <br>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="controls">
                    <div>
                        <?php echo vtranslate('LBL_DOWNLOAD_SRC_DESC','PDFMaker');?>

                        <?php if ($_smarty_tpl->tpl_vars['MB_STRING_EXISTS']->value=='false'){?>
                            <br>
                            <?php echo vtranslate('LBL_MB_STRING_ERROR','PDFMaker');?>

                        <?php }?>
                    </div>
                    <br>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                    <button type="button" id="download_button" class="btn btn-success">
                        <strong><?php echo vtranslate('LBL_DOWNLOAD','PDFMaker');?>
</strong>
                    </button>&nbsp;&nbsp;
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>