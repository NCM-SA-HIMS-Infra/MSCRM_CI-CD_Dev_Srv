<?php /* Smarty version Smarty-3.1.7, created on 2021-06-10 16:23:44
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\rows\Language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155916436260c1e12895a549-99597071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b45a7950d13c61499ab7f9d7d60547d11afd7297' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\rows\\Language.tpl',
      1 => 1623318814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155916436260c1e12895a549-99597071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANGUAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'LANG_KEY' => 0,
    'ALL_LANGUAGES' => 0,
    'IS_AUTH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60c1e12897a93',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c1e12897a93')) {function content_60c1e12897a93($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isVtigerCompatible()&&!$_smarty_tpl->tpl_vars['LANGUAGE']->value->isAlreadyExists()&&($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')=='Free'||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')==0||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('available')==1)){?>
    <tr class="" data-cfmid="1">
        <td style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
        <td colspan="2" style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
        <td style="border-left:none;border-right:none;">
            <span class="extension_container">
                <input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name');?>
"/>
                <input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('downloadURL');?>
"/>
                <input type="hidden" name="moduleAction" value="Install"/>
                <input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('id');?>
"/>
                <span class="pull-left">
                    <?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website')!=''){?>
                        <button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['LANG_KEY'] = new Smarty_variable($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name'), null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['ALL_LANGUAGES']->value[$_smarty_tpl->tpl_vars['LANG_KEY']->value]!=''){?>
                        <?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isUpgradableLanguage()){?>
                        <input type="hidden" name="moduleAction" value="Update"/>
                        <button class="oneclickInstallFree isUpdateBtn btn btn-success <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                        <?php }?>
                    <?php }else{ ?>
                        <input type="hidden" name="moduleAction" value="Install"/>
                        <button class="oneclickInstallFree btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                    <?php }?>
                </span>
            </span>
        </td>
    </tr>
<?php }?><?php }} ?>