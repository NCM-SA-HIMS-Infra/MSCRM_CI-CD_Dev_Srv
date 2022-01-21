{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*************************************************************************************}

{strip}
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}

	{foreach key=BLOCK_LABEL_KEY item=FIELD_MODEL_LIST from=$RECORD_STRUCTURE}
		{assign var=BLOCK value=$BLOCK_LIST[$BLOCK_LABEL_KEY]}
		{if $BLOCK eq null or $FIELD_MODEL_LIST|@count lte 0}{continue}{/if}
		<div class="block block_{$BLOCK_LABEL_KEY}" data-block="{$BLOCK_LABEL_KEY}" data-blockid="{$BLOCK_LIST[$BLOCK_LABEL_KEY]->get('id')}">
			{assign var=IS_HIDDEN value=$BLOCK->isHidden()}
			{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
			<input type=hidden name="timeFormatOptions" data-value='{$DAY_STARTS}' />
			<div>
				<h4 class="textOverflowEllipsis maxWidth50">
					<img class="cursorPointer alignMiddle blockToggle {if !($IS_HIDDEN)} hide {/if}" src="{vimage_path('arrowRight.png')}" data-mode="hide" data-id={$BLOCK_LIST[$BLOCK_LABEL_KEY]->get('id')}>
					<img class="cursorPointer alignMiddle blockToggle {if ($IS_HIDDEN)} hide {/if}" src="{vimage_path('arrowdown.png')}" data-mode="show" data-id={$BLOCK_LIST[$BLOCK_LABEL_KEY]->get('id')}>&nbsp;
					{vtranslate({$BLOCK_LABEL_KEY},{$MODULE_NAME})}
				</h4>
			</div>
			<hr>
			<div class="blockData">
				<table class="table detailview-table no-border">
					<tbody {if $IS_HIDDEN} class="hide" {/if}>
						{assign var=COUNTER value=0}
						<tr>
							{foreach item=FIELD_MODEL key=FIELD_NAME from=$FIELD_MODEL_LIST}
								{assign var=fieldDataType value=$FIELD_MODEL->getFieldDataType()}
								{*2020-09-21 Thet Phyo Wai Add Organization Numer Ver 1.0 Add Start*}
								{*{if !$FIELD_MODEL->isViewableInDetailView()}*}
								{if !$FIELD_MODEL->isViewableInDetailView() or ($MODULE eq 'Accounts' and $FIELD_NAME eq "account_no")}
									{* {continue} *}
								{/if}
								{*2020-09-21 Thet Phyo Wai Add Organization Numer Ver 1.0 Add End*}
								{if $FIELD_MODEL->get('uitype') eq "83"}
									{foreach item=tax key=count from=$TAXCLASS_DETAILS}
										{if $COUNTER eq 2}
											</tr><tr>
											{assign var="COUNTER" value=1}
										{else}
											{assign var="COUNTER" value=$COUNTER+1}
										{/if}
										<td class="fieldLabel {$WIDTHTYPE}">
											<span class='muted'>{vtranslate($tax.taxlabel, $MODULE)}(%)</span>
										</td>
										<td class="fieldValue {$WIDTHTYPE}">
											<span class="value textOverflowEllipsis" data-field-type="{$FIELD_MODEL->getFieldDataType()}" >
												{if $tax.check_value eq 1}
													{$tax.percentage}
												{else}
													0
												{/if} 
											</span>
										</td>
									{/foreach}
								{else if $FIELD_MODEL->get('uitype') eq "69" || $FIELD_MODEL->get('uitype') eq "105"}
									{if $COUNTER neq 0}
										{if $COUNTER eq 2}
											</tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									<td class="fieldLabel {$WIDTHTYPE}"><span class="muted">{vtranslate({$FIELD_MODEL->get('label')},{$MODULE_NAME})}</span></td>
									<td class="fieldValue {$WIDTHTYPE}">
										<ul id="imageContainer">
											{foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
												{if !empty($IMAGE_INFO.url) && !empty({$IMAGE_INFO.orgname})}
													<li><img src="{$IMAGE_INFO.url}" title="{$IMAGE_INFO.orgname}" width="400" height="300" /></li>
												{/if}
											{/foreach}
										</ul>
									</td>
									{assign var=COUNTER value=$COUNTER+1}
								{else}
									{if $FIELD_MODEL->get('uitype') eq "20" or $FIELD_MODEL->get('uitype') eq "19" or $fieldDataType eq 'reminder' or $fieldDataType eq 'recurrence'}
										{if $COUNTER eq '1'}
											<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td></tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									{if $COUNTER eq 2}
										</tr><tr>
										{assign var=COUNTER value=1}
									{else}
										{assign var=COUNTER value=$COUNTER+1}
									{/if}

										{* // 2020-09-11 Myo Min Kyaw hidden field Ver 1.0  start *}
										{*<td class="fieldLabel textOverflowEllipsis {$WIDTHTYPE}" id="{$MODULE_NAME}_detailView_fieldLabel_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->getName() eq 'description' or $FIELD_MODEL->get('uitype') eq '69'} style='width:8%'{/if}>*}
										<td class="fieldLabel textOverflowEllipsis {$WIDTHTYPE}" id="{$MODULE_NAME}_detailView_fieldLabel_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->getName() eq 'description' or $FIELD_MODEL->get('uitype') eq '69'} style='width:8%'{/if}
										{*if $FIELD_NAME eq "product_no" || $FIELD_NAME eq "contact_no" || $FIELD_NAME eq "vendor_no"}
											{* hidden=	"true" 												 *}
										{*/if}
										{* // 2020-09-11 Myo Min Kyaw hidden field Ver 1.0 end *}	
										>
										<span class="muted">
											{if $MODULE_NAME eq 'Documents' && $FIELD_MODEL->get('label') eq "File Name" && $RECORD->get('filelocationtype') eq 'E'}
												{vtranslate("LBL_FILE_URL",{$MODULE_NAME})}
											{else}
												{vtranslate({$FIELD_MODEL->get('label')},{$MODULE_NAME})}
											{/if}
											{if ($FIELD_MODEL->get('uitype') eq '72') && ($FIELD_MODEL->getName() eq 'unit_price')}
												({$BASE_CURRENCY_SYMBOL})
											{/if}
										</span>
									</td>
									<td class="fieldValue {$WIDTHTYPE}" id="{$MODULE_NAME}_detailView_fieldValue_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->get('uitype') eq '19' or $fieldDataType eq 'reminder' or $fieldDataType eq 'recurrence'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}

											{* // 2020-09-11 Myo Min Kyaw hidden field Ver 1.0 add start *}


											{*if $FIELD_NAME eq "product_no" || $FIELD_NAME eq "contact_no" || $FIELD_NAME eq "vendor_no"}
												{* hidden="true"  *}
											{*/if}
											{* // 2020-09-11 Myo Min Kyaw hidden field Ver 1.0 add end *}

										>
										{assign var=FIELD_VALUE value=$FIELD_MODEL->get('fieldvalue')}
										{if $fieldDataType eq 'multipicklist'}
											{assign var=FIELD_DISPLAY_VALUE value=$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'))}
										{else}
											{assign var=FIELD_DISPLAY_VALUE value=Vtiger_Util_Helper::toSafeHTML($FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue')))}
										{/if}

										<span class="value" data-field-type="{$FIELD_MODEL->getFieldDataType()}" {if $FIELD_MODEL->get('uitype') eq '19' or $FIELD_MODEL->get('uitype') eq '21'} style="white-space:normal;" {/if}>
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getDetailViewTemplateName(),$MODULE_NAME) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=$MODULE_NAME RECORD=$RECORD}
										</span>
										{if $IS_AJAX_ENABLED && $FIELD_MODEL->isEditable() eq 'true' && $FIELD_MODEL->isAjaxEditable() eq 'true'}
										{*2020/11/05 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*}
										{if !($IS_EDIT) and !(($MODULE eq 'Products' or $MODULE eq 'Services') and ($FIELD_NAME eq 'purchase_cost' or $FIELD_NAME eq 'currency') ) and !($MODULE_NAME eq HelpDesk and ($FIELD_NAME eq "parent_id" or $FIELD_NAME eq "contact_id" or $FIELD_NAME eq "product_id" or $FIELD_NAME eq "ticketstatus" or $FIELD_NAME eq "machine_serial_no" or $FIELD_NAME eq "invoice_pattern" or $FIELD_NAME eq "engineer_name" or $FIELD_NAME eq "customer_name") )}
										{*2020/11/05 Thet Phyo Wai Add Field Ticket Ver 1.0 End*}
											<span class="hide edit pull-left">
												{if $fieldDataType eq 'multipicklist'}
													<input type="hidden" class="fieldBasicData" data-name='{$FIELD_MODEL->get('name')}[]' data-type="{$fieldDataType}" data-displayvalue='{$FIELD_DISPLAY_VALUE}' data-value="{$FIELD_VALUE}" />
												{else}
													<input type="hidden" class="fieldBasicData" data-name='{$FIELD_MODEL->get('name')}' data-type="{$fieldDataType}" data-displayvalue='{$FIELD_DISPLAY_VALUE}' data-value="{$FIELD_VALUE}" />
												{/if}
											</span>
											{* // 2020-09-10 Pyae Phyo Mon hidden field MSCRM Ver 1.0 add start *}
											{if $FIELD_NAME eq "approve" and $IS_ADMIN eq false}
                            					{continue}
                        					{/if}
											

											{* 2021-12-16 Myo Min Kyaw Hidde the contract price currency in the Customer Product link start*}
											{if ($FIELD_NAME eq "currency" and $MODULE_NAME eq "ContactProduct") or ($FIELD_NAME eq "contract_price" and $MODULE_NAME eq "ContactProduct")}
												{continue}
											{/if}
											{* 2021-12-16 Myo Min Kyaw Hidde the contract price currency in the Customer Product link end*}
											<span class="action pull-right"><a href="#" onclick="return false;" class="editAction fa fa-pencil"></a></span>
											
											{* // 2020-09-10 Pyae Phyo Mon hidden field MSCRM Ver 1.0 add end *}
											{*2020/09/17 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*}
											{/if}
											{*2020/09/17 Thet Phyo Wai Add Field Ticket Ver 1.0 End*}
										{/if}
										

									</td>
								{/if}

								{if $FIELD_MODEL_LIST|@count eq 1 and $FIELD_MODEL->get('uitype') neq "19" and $FIELD_MODEL->get('uitype') neq "20" and $FIELD_MODEL->get('uitype') neq "30" and $FIELD_MODEL->get('name') neq "recurringtype" and $FIELD_MODEL->get('uitype') neq "69" and $FIELD_MODEL->get('uitype') neq "105"}
									<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
								{/if}
							{/foreach}
							{* adding additional column for odd number of fields in a block *}
							{if $FIELD_MODEL_LIST|@end eq true and $FIELD_MODEL_LIST|@count neq 1 and $COUNTER eq 1}
								<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
							{/if}
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<br>
	{/foreach}
{/strip}
