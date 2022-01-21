<?php /* Smarty version Smarty-3.1.7, created on 2021-06-10 16:23:44
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\rows\License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183114742160c1e12872ab12-24720744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ebcfbd48c2c4d560defea0c2f4c849a0dac013' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\rows\\License.tpl',
      1 => 1623318814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183114742160c1e12872ab12-24720744',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LICENSE' => 0,
    'LICENSE_KEY' => 0,
    'QUALIFIED_MODULE' => 0,
    'SHOP_LINK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60c1e128750fd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c1e128750fd')) {function content_60c1e128750fd($_smarty_tpl) {?>
<tr>
    <td style="border-left:none;border-right:none;">
        <a class="licenseColors" href="#<?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('service_usageunit')!='Package'){?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('cf_identifier');?>
<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>

        </a>
    </td>
    <td style="border-left:none;border-right:none;">
        <?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('servicename');?>

    </td>
    <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isHostingLicense()){?>
        <td colspan="3" style="border-left:none;">
            <?php echo vtranslate('LBL_HOSTING_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

        </td>
    <?php }else{ ?>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date')!=''){?>
                <?php echo Vtiger_Util_Helper::formatDateIntoStrings($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date'));?>

            <?php }?>
        </td>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?>
                <?php echo vtranslate('LBL_SUBSCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')=="1"){?>
                <?php echo vtranslate('LBL_DEMO_FREE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }else{ ?>
                <?php echo vtranslate('LBL_FULL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }?>
        </td>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isRenewReady()){?>
                <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?>
                    <a class="btn btn-info" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('buy_id');?>
"><?php echo vtranslate('LBL_PROLONG_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')==true){?>
                    <a class="btn btn-success" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('buy_id');?>
"><?php echo vtranslate('LBL_BUY_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="btn btn-primary" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getRenewUrl();?>
"><?php echo vtranslate('LBL_RENEW_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }?>
                &nbsp;&nbsp;
            <?php }?>
            <button class="btn btn-danger actionLicenses" type="button" data-mode="deactivate" data-license="<?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>
"><?php echo vtranslate('LBL_DEACTIVATE_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
            <div class="pull-right">
                <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isExpired()){?>
                    <div class="alert alert-danger displayInlineBlock" style="margin:0;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isTrial()){?><?php echo vtranslate('LBL_TRIAL_INACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_MEMBERSHIP_INACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getExpireString();?>
</div>
                <?php }else{ ?>
                    <div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isRenewReady()){?>warning<?php }else{ ?>info<?php }?> displayInlineBlock" style="margin:0;"><?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isTrial()){?><?php echo vtranslate('LBL_TRIAL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_MEMBERSHIP_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getExpireString();?>
</div>
                <?php }?>
            </div>
        </td>
    <?php }?>
</tr><?php }} ?>