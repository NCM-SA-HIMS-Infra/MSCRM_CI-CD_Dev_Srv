<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 14:13:26
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\LoginModals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5974363145f997c86e93281-98287099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2bd02de610e38ae7e3e67d723c6619c4e3485de' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\LoginModals.tpl',
      1 => 1601907276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5974363145f997c86e93281-98287099',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'REGISTRATION_STATUS' => 0,
    'USER_NAME' => 0,
    'SHOP_LINK' => 0,
    'MODULE' => 0,
    'LOADER_REQUIRED' => 0,
    'LOADER_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f997c86ec05c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f997c86ec05c')) {function content_5f997c86ec05c($_smarty_tpl) {?>
<div class="modal-dialog loginAccount hide">
    <div class="modal-content" data-actual-tab="useraccessDiv">
        <div class="modal-header">
            <div class="clearfix">
                <div class="pull-right " >
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true" class='fa fa-close'></span>
                    </button>
                </div>
                <h4 class="pull-left">
                    <?php echo vtranslate('LBL_INSTALLER_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                </h4>
            </div>
        </div>
        <div class="modal-body tabbable" style="padding:0">
            <ul class="nav nav-pills" style="padding:5px;">
                <li class="active">
                    <a href="" data-toggle="tab" data-target="useraccessDiv" data-tab-name="useraccessDiv"><?php echo vtranslate('LBL_USERLOGIN_TAB',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                </li>
                <li class="">
                    <a href="" data-toggle="tab" data-target="accesskeyDiv" data-tab-name="accesskeyDiv"><?php echo vtranslate('LBL_KEYLOGIN_TAB',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                </li>
            </ul>

            <div style="padding-top:2%;margin-top:5px;">
                <div class="tab-pane active" id="useraccessDiv">
                    <form class="form-horizontal loginForm">
                        <input type="hidden" name="module" value="ITS4YouInstaller" />
                        <input type="hidden" name="parent" value="Settings" />
                        <input type="hidden" name="action" value="Basic" />
                        <input type="hidden" name="userAction" value="login" />
                        <input type="hidden" name="mode" value="registerAccount" />

                        <div class="form-group">
                            <span class="control-label col-sm-3 fieldLabel">
                                <?php echo vtranslate('LBL_EMAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                            </span>
                            <div class="controls col-sm-5">
                                <?php if ($_smarty_tpl->tpl_vars['REGISTRATION_STATUS']->value){?>
                                    <input type="hidden" name="emailAddress" value="<?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
">
                                    <span class="control-label"><span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
</span></span>
                                <?php }else{ ?>
                                    <input type="text" name="emailAddress" data-rule-required="true" data-rule-email="true" class="inputElement" placeholder="@">
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="control-label fieldLabel col-sm-3">
                                <?php echo vtranslate('LBL_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                            </span>
                            <div class="controls col-sm-5">
                                <input type="password" name="password" data-rule-required="true" class="inputElement" placeholder="******">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="control-label fieldLabel col-sm-3">
                                &nbsp;
                            </span>
                            <div class="controls col-sm-5">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
" target="_blank"><?php echo vtranslate('LBL_REGISTER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                                <?php echo vtranslate('LBL_OR','Vtiger');?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
" target="_blank"><?php echo vtranslate('LBL_FORGOT_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane hide" id="accesskeyDiv">
                    <form class="form-horizontal loginKeyForm">
                        <input type="hidden" name="module" value="ITS4YouInstaller">
                        <input type="hidden" name="parent" value="Settings" >
                        <input type="hidden" name="action" value="Basic" >
                        <input type="hidden" name="userAction" value="login" >
                        <input type="hidden" name="mode" value="registerAccount" >
                        <input type="hidden" name="emailAddress" value="accesskey" >
                        <div class="form-group">
                            <span class="control-label col-sm-3 fieldLabel">
                                <?php echo vtranslate('LBL_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                            </span>
                            <div class="controls col-sm-5">
                                <input type="text" name="password" data-rule-required="true" class="inputElement">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row-fluid">
                <span class="col-sm-12">
                    <div class="pull-right">
                        <div class="pull-right cancelLinkContainer" style="margin-top:0;">
                            <a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                        </div>
                        <button class="btn btn-success" id="saveButton" name="saveButton" type="button"><strong><?php echo vtranslate('LBL_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>
                    </div>
                </span>
            </div>
        </div>

    </div>                
</div>
<!-- Login form end -->

<?php if ($_smarty_tpl->tpl_vars['LOADER_REQUIRED']->value){?>
    <div class="modal extensionLoader hide">
        <div class="modal-header contentsBackground">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3><?php echo vtranslate('LBL_INSTALL_EXTENSION_LOADER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <p><?php echo vtranslate('LBL_TO_CONTINUE_USING_EXTENSION_STORE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<a href="https://marketplace.vtiger.com/loaderfiles/<?php echo $_smarty_tpl->tpl_vars['LOADER_INFO']->value['loader_file'];?>
"><?php echo vtranslate('LBL_DOWNLOAD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php echo vtranslate('LBL_COMPATIABLE_EXTENSION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p>
            </div>
            <div class="row-fluid">
                <p><?php echo vtranslate('LBL_MORE_DETAILS_ON_INSTALLATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<a onclick=window.open("http://community.vtiger.com/help/vtigercrm/php/extension-loader.html")><?php echo vtranslate('LBL_READ_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></p>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row-fluid">
                <div class="pull-right">
                    <div class="pull-right cancelLinkContainer" style="margin-top:0;">
                        <button class="btn btn-success" data-dismiss="modal"><?php echo vtranslate('LBL_OK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?><?php }} ?>