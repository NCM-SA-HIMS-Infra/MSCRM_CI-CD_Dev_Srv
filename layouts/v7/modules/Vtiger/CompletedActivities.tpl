{*2020-10-01 Thet Phyo Wai Add Completed Activity MSCRM Ver 1.0 Create*}
{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}
{strip}
	{assign var=MODULE_NAME value="Calendar"}
	<div class="summaryWidgetContainer">
		<div class="widget_header clearfix">
			<h4 class="display-inline-block pull-left">{vtranslate('LBL_COMPLETED_ACTIVITIES',$MODULE_NAME)}</h4>
			
			{assign var=SOURCE_MODEL value=$RECORD}
		</div>
		<div class="widget_contents">
			{if count($ACTIVITIES) neq '0'}
				{foreach item=RECORD key=KEY from=$ACTIVITIES}
					{assign var=START_DATE value=$RECORD->get('date_start')}
					{assign var=START_TIME value=$RECORD->get('time_start')}
					{assign var=EDITVIEW_PERMITTED value=isPermitted('Calendar', 'EditView', $RECORD->get('crmid'))}
					{assign var=DETAILVIEW_PERMITTED value=isPermitted('Calendar', 'DetailView', $RECORD->get('crmid'))}
					{assign var=DELETE_PERMITTED value=isPermitted('Calendar', 'Delete', $RECORD->get('crmid'))}
					<div class="activityEntries">
						<input type="hidden" class="activityId" value="{$RECORD->get('activityid')}"/>
						<div class='media'>
							<div class='row'>
								<div class='media-left module-icon col-lg-1 col-md-1 col-sm-1 textAlignCenter'>
									<span class='vicon-{strtolower($RECORD->get('activitytype'))}'></span>
								</div>
								<div class='media-body col-lg-7 col-md-7 col-sm-7'>
									<div class="summaryViewEntries">
										{if $DETAILVIEW_PERMITTED == 'yes'}<a href="{$RECORD->getDetailViewUrl()}" title="{$RECORD->get('subject')}">{$RECORD->get('subject')}</a>{else}{$RECORD->get('subject')}{/if}&nbsp;&nbsp;
										{if $EDITVIEW_PERMITTED == 'yes'}<a href="{$RECORD->getEditViewUrl()}&sourceModule={$SOURCE_MODEL->getModuleName()}&sourceRecord={$SOURCE_MODEL->getId()}&relationOperation=true" class="fieldValue"><i class="summaryViewEdit fa fa-pencil" title="{vtranslate('LBL_EDIT',$MODULE_NAME)}"></i></a>{/if}&nbsp;
										{if $DELETE_PERMITTED == 'yes'}<a onclick="Vtiger_Detail_Js.deleteRelatedActivity(event);" data-id="{$RECORD->getId()}" data-recurring-enabled="{$RECORD->isRecurringEnabled()}" class="fieldValue"><i class="summaryViewEdit fa fa-trash " title="{vtranslate('LBL_DELETE',$MODULE_NAME)}"></i></a>{/if}
									</div>
								<span><strong title="{Vtiger_Util_Helper::formatDateTimeIntoDayString("$START_DATE $START_TIME")}">{Vtiger_Util_Helper::formatDateIntoStrings($START_DATE, $START_TIME)}</strong></span>
							</div>

							<div class='col-lg-4 col-md-4 col-sm-4 activityStatus' style='line-height: 0px;padding-right:30px;'>
								<div class="row">
									{if $RECORD->get('activitytype') eq 'Task'}
										{assign var=MODULE_NAME value=$RECORD->getModuleName()}
										<input type="hidden" class="activityModule" value="{$RECORD->getModuleName()}"/>
										<input type="hidden" class="activityType" value="{$RECORD->get('activitytype')}"/>
										<div class="pull-right">
											 {assign var=FIELD_MODEL value=$RECORD->getModule()->getField('taskstatus')}
											<style>
												{assign var=PICKLIST_COLOR_MAP value=Settings_Picklist_Module_Model::getPicklistColorMap('taskstatus', true)}
												{foreach item=PICKLIST_COLOR key=PICKLIST_VALUE from=$PICKLIST_COLOR_MAP}
													{assign var=PICKLIST_TEXT_COLOR value=Settings_Picklist_Module_Model::getTextColor($PICKLIST_COLOR)}
													{assign var=CONVERTED_PICKLIST_VALUE value=Vtiger_Util_Helper::convertSpaceToHyphen($PICKLIST_VALUE)}
														.picklist-{$FIELD_MODEL->getId()}-{Vtiger_Util_Helper::escapeCssSpecialCharacters($CONVERTED_PICKLIST_VALUE)} {
															background-color: {$PICKLIST_COLOR};color: {$PICKLIST_TEXT_COLOR};
														}
												{/foreach}
											</style>
											<strong><span class="value picklist-color picklist-{$FIELD_MODEL->getId()}-{Vtiger_Util_Helper::convertSpaceToHyphen($RECORD->get('status'))}">{vtranslate($RECORD->get('status'),$MODULE_NAME)}</span></strong>&nbsp&nbsp;
										</div>
									{else}
										{assign var=MODULE_NAME value="Events"}
										<input type="hidden" class="activityModule" value="Events"/>
										<input type="hidden" class="activityType" value="{$RECORD->get('activitytype')}"/>
										<div class="pull-right">
											{assign var=FIELD_MODEL value=$RECORD->getModule()->getField('eventstatus')}
											<style>
												{assign var=PICKLIST_COLOR_MAP value=Settings_Picklist_Module_Model::getPicklistColorMap('eventstatus', true)}
												{foreach item=PICKLIST_COLOR key=PICKLIST_VALUE from=$PICKLIST_COLOR_MAP}
													{assign var=PICKLIST_TEXT_COLOR value=Settings_Picklist_Module_Model::getTextColor($PICKLIST_COLOR)}
													{assign var=CONVERTED_PICKLIST_VALUE value=Vtiger_Util_Helper::convertSpaceToHyphen($PICKLIST_VALUE)}
														.picklist-{$FIELD_MODEL->getId()}-{Vtiger_Util_Helper::escapeCssSpecialCharacters($CONVERTED_PICKLIST_VALUE)} {
															background-color: {$PICKLIST_COLOR};color: {$PICKLIST_TEXT_COLOR};
														}
												{/foreach}
											</style>
											<strong><span class="value picklist-color picklist-{$FIELD_MODEL->getId()}-{Vtiger_Util_Helper::convertSpaceToHyphen($RECORD->get('eventstatus'))}">{vtranslate($RECORD->get('eventstatus'),$MODULE_NAME)}</span></strong>&nbsp&nbsp;
										</div>
									{/if}
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
			{/foreach}
		{else}
			<div class="summaryWidgetContainer noContent">
				<p class="textAlignCenter">{vtranslate('LBL_NO_PENDING_ACTIVITIES',$MODULE_NAME)}</p>
			</div>
		{/if}
		{if $PAGING_MODEL->isNextPageExists()}
			<div class="row">
				<div class="textAlignCenter">
					<a href="javascript:void(0)" class="moreRecentActivities">{vtranslate('LBL_SHOW_MORE',$MODULE_NAME)}</a>
				</div>
			</div>
		{/if}
	</div>
</div>
{/strip}