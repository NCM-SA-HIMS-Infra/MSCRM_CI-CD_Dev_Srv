<?php /* Smarty version Smarty-3.1.7, created on 2020-09-29 13:24:57
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Import/ImportUndoResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8258546525f7335a900a075-22823995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42a4e0776b099337ae0a8ddee9622b494d5cbced' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Import/ImportUndoResult.tpl',
      1 => 1600071944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8258546525f7335a900a075-22823995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'TITLE' => 0,
    'FOR_MODULE' => 0,
    'ERROR_MESSAGE' => 0,
    'TOTAL_RECORDS' => 0,
    'DELETED_RECORDS_COUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7335a904d19',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7335a904d19')) {function content_5f7335a904d19($_smarty_tpl) {?>

<div class='fc-overlay-modal modal-content'>
    <div class="overlayHeader">
        <?php ob_start();?><?php echo vtranslate('LBL_DELETION_COMPLETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TITLE'] = new Smarty_variable($_tmp1, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0);?>

    </div>
    <div class='modal-body' id ="importContainer" style="margin-bottom:390px">
        <div style="padding-left: 15px;">
            <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
" />
            <div class='importBlockContainer'>
                <span>
                    <h4>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_DELETION_SUMMARY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
                </span>
                <hr style="margin-top:12px;margin-bottom:12px;">
                <table class = "table table-borderless">
                    <?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value!=''){?>
                        <span>
                            <h4>
                                <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>

                            </h4>
                        </span>
                    <?php }?>
                    <tr>
                        <td >
                            <table cellpadding="10" cellspacing="0" class = "table table-bordered importResultsTable">
                                <tr>
                                    <td  width="40%"><?php echo vtranslate('LBL_TOTAL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                    <td  width="50%"><?php echo $_smarty_tpl->tpl_vars['TOTAL_RECORDS']->value;?>
</td>
                                </tr>
                                <tr>
                                    <td width="40%"><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_DELETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                    <td width="60%"><?php echo $_smarty_tpl->tpl_vars['DELETED_RECORDS_COUNT']->value;?>
</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class='modal-footer overlayFooter'>
        <footer>
            <center><button class='btn-primary btn-lg undoDoneButton' data-dismiss="modal" onclick="Vtiger_Import_Js.finishUndoOperation();"><?php echo vtranslate('LBL_DONE_BUTTON',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></center>
        </footer>
    </div>
</div>
<?php }} ?>