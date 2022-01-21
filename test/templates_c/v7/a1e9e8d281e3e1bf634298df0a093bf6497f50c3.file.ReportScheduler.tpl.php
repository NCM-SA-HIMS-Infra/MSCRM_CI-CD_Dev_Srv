<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:13:57
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\ReportScheduler.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19438780085f998ab5a626d0-11564986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1e9e8d281e3e1bf634298df0a093bf6497f50c3' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\ReportScheduler.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19438780085f998ab5a626d0-11564986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'IS_SCHEDULED' => 0,
    'generate_subject' => 0,
    'generate_text' => 0,
    'schtypeid' => 0,
    'MONTH_STRINGS' => 0,
    'mid' => 0,
    'schmonth' => 0,
    'month' => 0,
    'schday' => 0,
    'WEEKDAY_STRINGS' => 0,
    'wid' => 0,
    'schweek' => 0,
    'week' => 0,
    'schtime' => 0,
    'REPORT_FORMAT_PDF' => 0,
    'REPORT_FORMAT_XLS' => 0,
    'CURRENT_USER' => 0,
    'SCHEDULED_REPORT' => 0,
    'recipients' => 0,
    'ALL_ACTIVEUSER_LIST' => 0,
    'USER_ID' => 0,
    'USERID' => 0,
    'recipientsUsers' => 0,
    'CLEAR_USERID' => 0,
    'USER_NAME' => 0,
    'ALL_ACTIVEGROUP_LIST' => 0,
    'GROUP_ID' => 0,
    'GROUPID' => 0,
    'recipientsGroups' => 0,
    'CLEAR_GROUP_ID' => 0,
    'GROUP_NAME' => 0,
    'ROLES' => 0,
    'ROLE_ID' => 0,
    'ROLEID' => 0,
    'recipientsRoles' => 0,
    'CLEAR_ROLEID' => 0,
    'ROLE_OBJ' => 0,
    'RS_ROLE_ID' => 0,
    'RS_ROLEID' => 0,
    'recipientsRS' => 0,
    'CLEAR_RS_ROLE_ID' => 0,
    'RS_ROLE_OBJ' => 0,
    'generate_other' => 0,
    'schedule_all_records' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998ab5b185f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998ab5b185f')) {function content_5f998ab5b185f($_smarty_tpl) {?>

<div style="border:1px solid #ccc;padding:4%;"><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('Active',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input type="checkbox" class="listViewEntriesMainCheckBox" name="isReportScheduled" id="isReportScheduled" <?php if ($_smarty_tpl->tpl_vars['IS_SCHEDULED']->value=='1'){?> checked <?php }?>></div></div></div><div id="isReportScheduledArea" class="<?php if ($_smarty_tpl->tpl_vars['IS_SCHEDULED']->value!='1'){?>hide<?php }?>" ><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_GENERATE_SUBJECT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input type="text" class="inputElement" data-rule-required="false" name="generate_subject" id="generate_subject"placeholder="<?php echo vtranslate('LBL_GENERATE_PLACEHOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" value="<?php echo $_smarty_tpl->tpl_vars['generate_subject']->value;?>
"/></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_GENERATE_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4 fieldBlockContainer"><textarea rows="3" class="inputElement textAreaElement col-lg-12" id="generate_text" name="generate_text"><?php echo $_smarty_tpl->tpl_vars['generate_text']->value;?>
</textarea></div></div></div><div class="row"><div class="form-group"><input type="hidden" name="scheduledIntervalString" value=""/><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_FREQUENCY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4" id="scheduledTypeSpan"><select class="select2 col-lg-12 inputElement" name="scheduledType" id="scheduledType" data-rule-required="false" onchange="javascript: setScheduleOptions();"><!-- Hourly doesn't make sense on OD as the cron job is running once in 2 hours --><option id="schtype_2" value="2" <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==2){?>selected<?php }?>><?php echo vtranslate('Daily',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option id="schtype_3" value="3" <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==3){?>selected<?php }?>><?php echo vtranslate('Weekly',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option id="schtype_4" value="4" <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==4){?>selected<?php }?>><?php echo vtranslate('BiWeekly',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option id="schtype_5" value="5" <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==5){?>selected<?php }?>><?php echo vtranslate('Monthly',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option id="schtype_6" value="6" <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==6){?>selected<?php }?>><?php echo vtranslate('Annually',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div></div></div><!-- months --><div class="row" id="scheduledMonthSpan" style="display: <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==6){?>block<?php }else{ ?>none<?php }?>;"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_EMAIL_MONTH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="scheduledMonth" id="scheduledMonth" data-rule-required="false"><?php $_smarty_tpl->tpl_vars["MONTH_STRINGS"] = new Smarty_variable(vtranslate('MONTH_STRINGS',$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_smarty_tpl->tpl_vars['mid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MONTH_STRINGS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value){
$_smarty_tpl->tpl_vars['month']->_loop = true;
 $_smarty_tpl->tpl_vars['mid']->value = $_smarty_tpl->tpl_vars['month']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['schmonth']->value==$_smarty_tpl->tpl_vars['mid']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</option><?php } ?></select></div></div></div><!-- day of month (monthly, annually) --><div class="row" id="scheduledDOMSpan" style="display: <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==5||$_smarty_tpl->tpl_vars['schtypeid']->value==6){?>block<?php }else{ ?>none<?php }?>;"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_EMAIL_DAY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="scheduledDOM" id="scheduledDOM"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['day'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['day']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['name'] = 'day';
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total']);
?><option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['iteration'];?>
" <?php if ($_smarty_tpl->tpl_vars['schday']->value==$_smarty_tpl->getVariable('smarty')->value['section']['day']['iteration']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['iteration'];?>
</option><?php endfor; endif; ?></select></div></div></div><!-- day of week (weekly/bi-weekly) --><div class="row" id="scheduledDOWSpan" style="display: <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value==3||$_smarty_tpl->tpl_vars['schtypeid']->value==4){?>block<?php }else{ ?>none<?php }?>;"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_EMAIL_DOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><select class="select2 col-lg-12 inputElement" name="scheduledDOW" id="scheduledDOW"><?php $_smarty_tpl->tpl_vars["WEEKDAY_STRINGS"] = new Smarty_variable(vtranslate('WEEKDAY_STRINGS',$_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php  $_smarty_tpl->tpl_vars['week'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['week']->_loop = false;
 $_smarty_tpl->tpl_vars['wid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['WEEKDAY_STRINGS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['week']->key => $_smarty_tpl->tpl_vars['week']->value){
$_smarty_tpl->tpl_vars['week']->_loop = true;
 $_smarty_tpl->tpl_vars['wid']->value = $_smarty_tpl->tpl_vars['week']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['wid']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['schweek']->value==$_smarty_tpl->tpl_vars['wid']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['week']->value;?>
</option><?php } ?></select></div></div></div><!-- time (daily, weekly, bi-weekly, monthly, annully) --><div class="row" id="scheduledTimeSpan" style="display: <?php if ($_smarty_tpl->tpl_vars['schtypeid']->value>0){?>block<?php }else{ ?>none<?php }?>;"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_EMAIL_TIME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><input class="inputElement" type="text" name="scheduledTime" id="scheduledTime" value="<?php echo $_smarty_tpl->tpl_vars['schtime']->value;?>
" size="5"maxlength="5"/>&nbsp;<?php echo vtranslate('LBL_TIME_FORMAT_MSG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_REPORT_FORMAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><label class="checkbox" style="margin-left: 30px;display: inline;"><input name="scheduledReportFormat_pdf"id="scheduledReportFormat_pdf" <?php if ($_smarty_tpl->tpl_vars['REPORT_FORMAT_PDF']->value=='true'){?> checked <?php }?>type="checkbox"/>&nbsp;<?php echo vtranslate('LBL_REPORT_FORMAT_PDF',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox" style="margin-left: 30px;display: inline;"><input name="scheduledReportFormat_xls"id="scheduledReportFormat_xls" <?php if ($_smarty_tpl->tpl_vars['REPORT_FORMAT_XLS']->value=='true'){?> checked <?php }?>type="checkbox"/>&nbsp;<?php echo vtranslate('LBL_REPORT_FORMAT_EXCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_USERS_AVAILABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<a data-original-title="" href="#" class="editHelpInfo" data-placement="top" data-text="<?php echo vtranslate('LBL_USERS_AVAILABEL_INFO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot; style=&quot;text-align: left&quot;></div></div>"><iclass="icon-info-sign alignMiddle"></i>&nbsp;</a></label><input type="hidden" name="selectedRecipientsString_v7" /><div class='col-lg-4'><?php $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER']->value->getAccessibleUsers(), null, 0);?><?php $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER']->value->getAccessibleGroups(), null, 0);?><?php $_smarty_tpl->tpl_vars['recipients'] = new Smarty_variable($_smarty_tpl->tpl_vars['SCHEDULED_REPORT']->value->scheduledRecipients, null, 0);?><?php $_smarty_tpl->tpl_vars['recipientsUsers'] = new Smarty_variable($_smarty_tpl->tpl_vars['recipients']->value['users'], null, 0);?><?php $_smarty_tpl->tpl_vars['recipientsGroups'] = new Smarty_variable($_smarty_tpl->tpl_vars['recipients']->value['groups'], null, 0);?><?php $_smarty_tpl->tpl_vars['recipientsRoles'] = new Smarty_variable($_smarty_tpl->tpl_vars['recipients']->value['roles'], null, 0);?><?php $_smarty_tpl->tpl_vars['recipientsRS'] = new Smarty_variable($_smarty_tpl->tpl_vars['recipients']->value['rs'], null, 0);?><select multiple class="select2 col-lg-12 inputElement" id='selectedRecipients' name='selectedRecipients' data-rule-required="true"><optgroup label="<?php echo vtranslate('LBL_USERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['USER_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['USER_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['USER_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['USER_NAME']->key => $_smarty_tpl->tpl_vars['USER_NAME']->value){
$_smarty_tpl->tpl_vars['USER_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['USER_ID']->value = $_smarty_tpl->tpl_vars['USER_NAME']->key;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['CLEAR_USERID'] = new Smarty_variable($_tmp1, null, 0);?><?php $_smarty_tpl->tpl_vars['USERID'] = new Smarty_variable("users::".($_smarty_tpl->tpl_vars['USER_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipientsUsers']->value)&&in_array($_smarty_tpl->tpl_vars['CLEAR_USERID']->value,$_smarty_tpl->tpl_vars['recipientsUsers']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
 </option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_GROUPS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['GROUP_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['GROUP_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['GROUP_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_NAME']->key => $_smarty_tpl->tpl_vars['GROUP_NAME']->value){
$_smarty_tpl->tpl_vars['GROUP_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['GROUP_ID']->value = $_smarty_tpl->tpl_vars['GROUP_NAME']->key;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['GROUP_ID']->value;?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['CLEAR_GROUP_ID'] = new Smarty_variable($_tmp2, null, 0);?><?php $_smarty_tpl->tpl_vars['GROUPID'] = new Smarty_variable("groups::".($_smarty_tpl->tpl_vars['GROUP_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['GROUPID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipientsGroups']->value)&&in_array($_smarty_tpl->tpl_vars['CLEAR_GROUP_ID']->value,$_smarty_tpl->tpl_vars['recipientsGroups']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['GROUP_NAME']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['GROUP_NAME']->value;?>
</option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_ROLES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['ROLE_OBJ'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ROLE_OBJ']->_loop = false;
 $_smarty_tpl->tpl_vars['ROLE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ROLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ROLE_OBJ']->key => $_smarty_tpl->tpl_vars['ROLE_OBJ']->value){
$_smarty_tpl->tpl_vars['ROLE_OBJ']->_loop = true;
 $_smarty_tpl->tpl_vars['ROLE_ID']->value = $_smarty_tpl->tpl_vars['ROLE_OBJ']->key;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ROLE_ID']->value;?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['CLEAR_ROLEID'] = new Smarty_variable($_tmp3, null, 0);?><?php $_smarty_tpl->tpl_vars['ROLEID'] = new Smarty_variable("roles::".($_smarty_tpl->tpl_vars['ROLE_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['ROLEID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipientsRoles']->value)&&in_array($_smarty_tpl->tpl_vars['CLEAR_ROLEID']->value,$_smarty_tpl->tpl_vars['recipientsRoles']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['ROLE_OBJ']->value->get('rolename');?>
'><?php echo $_smarty_tpl->tpl_vars['ROLE_OBJ']->value->get('rolename');?>
</option><?php } ?></optgroup><optgroup label="<?php echo vtranslate('LBL_ROLES_SUBORDINATES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['RS_ROLE_OBJ'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->_loop = false;
 $_smarty_tpl->tpl_vars['RS_ROLE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ROLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->key => $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value){
$_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->_loop = true;
 $_smarty_tpl->tpl_vars['RS_ROLE_ID']->value = $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->key;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RS_ROLE_ID']->value;?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['CLEAR_RS_ROLE_ID'] = new Smarty_variable($_tmp4, null, 0);?><?php $_smarty_tpl->tpl_vars['RS_ROLEID'] = new Smarty_variable("rs::".($_smarty_tpl->tpl_vars['RS_ROLE_ID']->value), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['RS_ROLEID']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['recipientsRS']->value)&&in_array($_smarty_tpl->tpl_vars['CLEAR_RS_ROLE_ID']->value,$_smarty_tpl->tpl_vars['recipientsRS']->value)){?> selected <?php }?>data-picklistvalue='<?php echo $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value->get('rolename');?>
'><?php echo $_smarty_tpl->tpl_vars['RS_ROLE_OBJ']->value->get('rolename');?>
</option><?php } ?></optgroup></select></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft">&nbsp;</label><div class="col-lg-4"><input type="text" class="inputElement" data-rule-required="false" name="generate_other" id="generate_other"placeholder="<?php echo vtranslate('LBL_GENERATE_OTHER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" value="<?php echo $_smarty_tpl->tpl_vars['generate_other']->value;?>
"/></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_GENERATE_FOR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<a data-original-title="" href="#" class="editHelpInfo" data-placement="top" data-text='<?php echo vtranslate("LBL_GENERATE_FOR_INFO",$_smarty_tpl->tpl_vars['MODULE']->value);?>
'data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot; style=&quot;text-align: left&quot;></div></div>"><iclass="icon-info-sign alignMiddle"></i>&nbsp;</a></label><div class="col-lg-4"><input type="hidden" name="selectedGenerateForString" id="selectedGenerateForString" value=""/><div id="generate_for_div"><?php echo $_smarty_tpl->getSubTemplate ("modules/ITS4YouReports/generateFor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div></div><div class="row"><div class="form-group"><label class="col-lg-2 control-label textAlignLeft"><?php echo vtranslate('LBL_SCHEDULE_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="col-lg-4"><label class="checkbox" style="margin-left: 30px;display: inline;"><input name="schedule_all_records"id="schedule_all_records" <?php if ($_smarty_tpl->tpl_vars['schedule_all_records']->value=='1'){?> checked <?php }?>type="checkbox"/></label></div></div></div></div></div><?php }} ?>