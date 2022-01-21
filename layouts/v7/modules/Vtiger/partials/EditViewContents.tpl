{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
********************************************************************************/
-->*}
{strip}
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}

	<div name='editContent'>
		{if $DUPLICATE_RECORDS}
			<div class="fieldBlockContainer duplicationMessageContainer">
				<div class="duplicationMessageHeader"><b>{vtranslate('LBL_DUPLICATES_DETECTED', $MODULE)}</b></div>
				<div>{getDuplicatesPreventionMessage($MODULE, $DUPLICATE_RECORDS)}</div>
			</div>
		{/if}
		{foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE name=blockIterator}
			{if $BLOCK_FIELDS|@count gt 0}
				<div class='fieldBlockContainer' data-block="{$BLOCK_LABEL}">
					<h4 class='fieldBlockHeader'>{vtranslate($BLOCK_LABEL, $MODULE)}</h4>
					<hr>
					<table class="table table-borderless">
						<tr>
							{assign var=COUNTER value=0}
							{foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS name=blockfields}

							{*2020-10-02 Pyae Phyo Mon Update Contact Save MSCRM Ver 1.0 Start*}
							{* {if $MODULE eq 'Vendors' and $FIELD_NAME eq "transfer_to_wd"} *}
							{*2020-11-24 Pyae Phyo Mon Update Product Save MSCRM Ver 1.0 Start*}
							{if ($MODULE eq 'Vendors' or $MODULE eq 'Products') and $FIELD_NAME eq "transfer_to_wd"}
							{*2020-11-24 Pyae Phyo Mon Update Product Save MSCRM Ver 1.0 End*}
							<input type="hidden" name ="old_transfer_to_wd" value="{$FIELD_MODEL->get('fieldvalue')}">
							{/if}
							{*2020-10-02 Pyae Phyo Mon Update Contact Save MSCRM Ver 1.0 Start*}
							
							{*2020-09-21 Thet Phyo Wai Add Organization Numer Ver 1.0 Add Start*}
							{if $MODULE eq 'Accounts' and $FIELD_NAME eq "account_number"}
							{continue}
							{/if}
							{*2020-09-21 Thet Phyo Wai Add Organization Numer Ver 1.0 Add End*}

							{*2020-10-14 Thet Phyo Wai Update Opportunity Activity MSCRM Ver 1.0 Start*}
							{if ($MODULE eq 'Calendar' or $MODULE eq 'Events') }
								{if !$HIDE_LEAD and $FIELD_NAME eq "lead_id"}
								{continue}
								{else}
								<input type='hidden' id ="leadId" value="{$LEAD_VALUE['leadid']}">
								<input type='hidden' id ="leadName" value="{$LEAD_VALUE['leadname']}">
								{/if}
							{/if}
							{*2020-10-14 Thet Phyo Wai Update Opportunity Activity MSCRM Ver 1.0 End*}
							
							{*2020-10-01 Thet Phyo Wai Update Contact Save MSCRM Ver 1.0 Start*}
							{if $MODULE eq 'Contacts' and $FIELD_NAME eq "account_id"}
							<input type="hidden" name ="old_account_id" value="{$FIELD_MODEL->get('fieldvalue')}">
							{/if}
							{*2020-10-01 Thet Phyo Wai Update Contact Save MSCRM Ver 1.0 Start*}
								
								{assign var="isReferenceField" value=$FIELD_MODEL->getFieldDataType()}
								{assign var="refrenceList" value=$FIELD_MODEL->getReferenceList()}
								{assign var="refrenceListCount" value=count($refrenceList)}
								{if $FIELD_MODEL->isEditable() eq true}
									{if $FIELD_MODEL->get('uitype') eq "19"}
										{if $COUNTER eq '1'}
											<td></td><td></td></tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									{if $COUNTER eq 2}
									</tr><tr>
										{assign var=COUNTER value=1}
									{else}
										{assign var=COUNTER value=$COUNTER+1}
									{/if}

									{* 2020-09-11 Myo Min Kyaw hide the product number MSCRM Ver 1.0 start *}
									{* <td class="fieldLabel alignMiddle"> *}
									<td class="fieldLabel alignMiddle"
										{if $FIELD_NAME eq "vendor_number" or  $FIELD_NAME eq "product_number" or $FIELD_NAME eq "contact_number"}
											hidden="true" 
										{/if}
									>
									{* 2020-09-11 Myo Min Kyaw hide the product number CRM Ver 1.0 end *}
										{if $isReferenceField eq "reference"}
											{if $refrenceListCount > 1}
												{assign var="DISPLAYID" value=$FIELD_MODEL->get('fieldvalue')}
												{assign var="REFERENCED_MODULE_STRUCTURE" value=$FIELD_MODEL->getUITypeModel()->getReferenceModule($DISPLAYID)}
												{if !empty($REFERENCED_MODULE_STRUCTURE)}
													{assign var="REFERENCED_MODULE_NAME" value=$REFERENCED_MODULE_STRUCTURE->get('name')}
												{/if}
												<select style="width: 140px;" class="select2 referenceModulesList">
													{foreach key=index item=value from=$refrenceList}
														<option value="{$value}" {if $value eq $REFERENCED_MODULE_NAME} selected {/if}>{vtranslate($value, $value)}</option>
													{/foreach}
												</select>
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{else if $FIELD_MODEL->get('uitype') eq "83"}
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE) COUNTER=$COUNTER MODULE=$MODULE}
											{if $TAXCLASS_DETAILS}
												{assign 'taxCount' count($TAXCLASS_DETAILS)%2}
												{if $taxCount eq 0}
													{if $COUNTER eq 2}
														{assign var=COUNTER value=1}
													{else}
														{assign var=COUNTER value=2}
													{/if}
												{/if}
											{/if}
										{else}
											{if $MODULE eq 'Documents' && $FIELD_MODEL->get('label') eq 'File Name'}
												{assign var=FILE_LOCATION_TYPE_FIELD value=$RECORD_STRUCTURE['LBL_FILE_INFORMATION']['filelocationtype']}
												{if $FILE_LOCATION_TYPE_FIELD}
													{if $FILE_LOCATION_TYPE_FIELD->get('fieldvalue') eq 'E'}
														{vtranslate("LBL_FILE_URL", $MODULE)}&nbsp;<span class="redColor">*</span>
													{else}
														{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
													{/if}
												{else}
													{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
												{/if}
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{/if}
										&nbsp;{if $FIELD_MODEL->isMandatory() eq true} <span class="redColor">*</span> {/if}
									</td>
									{if $FIELD_MODEL->get('uitype') neq '83'}
										
											{* // 2020-09-09 Myo Min Kyaw hidden field Ver 1.0 start *}
											{*<td class="fieldValue" {if $FIELD_MODEL->getFieldDataType() eq 'boolean'} style="width:25%" {/if} {if $FIELD_MODEL->get('uitype') eq '19'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}>*}

										<td class="fieldValue" {if $FIELD_MODEL->getFieldDataType() eq 'boolean'} style="width:25%" {/if} {if $FIELD_MODEL->get('uitype') eq '19'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}
												{if $FIELD_NAME eq "vendor_number" or  $FIELD_NAME eq "product_number" or $FIELD_NAME eq "contact_number"}
													hidden="true" 
												{/if}
												{* // 2020-09-09 Myo Min Kyaw hidden field Ver 1.0 end *}

											>

											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE)}

										</td>
									{/if}
								{/if}
							{/foreach}
							{*If their are odd number of fields in edit then border top is missing so adding the check*}
							{if $COUNTER is odd}
								<td></td>
								<td></td>
							{/if}
						</tr>
					</table>
				</div>
			{/if}
		{/foreach}
	</div>
{/strip}
