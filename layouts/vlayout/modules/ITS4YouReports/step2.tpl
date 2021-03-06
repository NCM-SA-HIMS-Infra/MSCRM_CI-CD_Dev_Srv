{*/*<!--
/*********************************************************************************
 * The content of this file is subject to the Reports 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*/*}

{strip}
	<form class="form-horizontal recordEditView" id="report_step2" method="post" action="index.php">
		<input type="hidden" name="module" value="{$MODULE}" />
		<input type="hidden" name="view" value="Edit" />
		<input type="hidden" name="mode" value="step3" />
		<input type="hidden" name="record" value="{$RECORD_ID}" />
		<input type="hidden" name="reportname" value="{$REPORT_MODEL->get('reportname')}" />
		<input type="hidden" name="folderid" value="{$REPORT_MODEL->get('folderid')}" />
		<input type="hidden" name="description" value="{$REPORT_MODEL->get('description')}" />
		<input type="hidden" name="primary_module" value="{$PRIMARY_MODULE}" />
		<input type="hidden" name="secondary_modules" value={ZEND_JSON::encode($SECONDARY_MODULES)} />
		<input type="hidden" name="selected_fields" id="seleted_fields" value='{ZEND_JSON::encode($SELECTED_FIELDS)}' />
		<input type="hidden" name="selected_sort_fields" id="selected_sort_fields" value="" />
		<input type="hidden" name="calculation_fields" id="calculation_fields" value="" />
		<input type="hidden" name="isDuplicate" value="{$IS_DUPLICATE}" />
		<input type="hidden" class="step" value="2" />
		<div class="well padding1per contentsBackground">
			<div class="row-fluid block">
				<div class="row span"><strong>{vtranslate('LBL_SELECT_COLUMNS',$MODULE)}({vtranslate('LBL_MAX',$MODULE)} 25)</strong></div>
				<div class="row-fluid row span">
					<select data-placeholder="{vtranslate('LBL_ADD_MORE_COLUMNS',$MODULE)}" id="reportsColumnsList" class="select2-container span11 columns" multiple="">
						{foreach key=PRIMARY_MODULE_NAME item=PRIMARY_MODULE from=$PRIMARY_MODULE_FIELDS}
							{foreach key=BLOCK_LABEL item=BLOCK from=$PRIMARY_MODULE}
								<optgroup label='{vtranslate($PRIMARY_MODULE_NAME,$MODULE)}-{vtranslate($BLOCK_LABEL,$PRIMARY_MODULE_NAME)}'>
								{foreach key=FIELD_KEY item=FIELD_LABEL from=$BLOCK}
									<option value="{$FIELD_KEY}" {if !empty($SELECTED_FIELDS) && in_array($FIELD_KEY,array_map('decode_html',$SELECTED_FIELDS))}selected=""{/if}>{vtranslate($FIELD_LABEL, $PRIMARY_MODULE_NAME)}</option>
								{/foreach}
								</optgroup>
							{/foreach}
						{/foreach}
						{foreach key=SECONDARY_MODULE_NAME item=SECONDARY_MODULE from=$SECONDARY_MODULE_FIELDS}
							{foreach key=BLOCK_LABEL item=BLOCK from=$SECONDARY_MODULE}
								<optgroup label='{vtranslate($SECONDARY_MODULE_NAME,$MODULE)}-{vtranslate($BLOCK_LABEL,$SECONDARY_MODULE_NAME)}'>
								{foreach key=FIELD_KEY item=FIELD_LABEL from=$BLOCK}
									<option value="{$FIELD_KEY}"{if !empty($SELECTED_FIELDS) && in_array($FIELD_KEY,array_map('decode_html',$SELECTED_FIELDS))}selected=""{/if}>{vtranslate($FIELD_LABEL, $SECONDARY_MODULE_NAME)}</option>
								{/foreach}
								</optgroup>
							{/foreach}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="row-fluid block">
				<div class="row-fluid row span">
					<span class="span6">
						<strong>{vtranslate('LBL_GROUP_BY',$MODULE)}</strong>
					</span>	
					<span class="span6">
						<strong>{vtranslate('LBL_SORT_ORDER',$MODULE)}</strong>
					</span>
				</div>
				{assign var=ROW_VAL value=1}	
				{foreach key=SELECTED_SORT_FIELD_KEY item=SELECTED_SORT_FIELD_VALUE from=$SELECTED_SORT_FIELDS}
					<div class="row-fluid row span sortFieldRow">
						{include file='RelatedFields.tpl'|@vtemplate_path:$MODULE ROW_VAL=$ROW_VAL}
						{assign var=ROW_VAL value=($ROW_VAL+1)}
					</div>
				{/foreach}
				{assign var=SELECTED_SORT_FEILDS_ARRAY value=$SELECTED_SORT_FIELDS}
				{assign var=SELECTED_SORT_FIELDS_COUNT value=count($SELECTED_SORT_FEILDS_ARRAY)}
				{while $SELECTED_SORT_FIELDS_COUNT lt 3 }
					<div class="row-fluid row span sortFieldRow">
						{include file='RelatedFields.tpl'|@vtemplate_path:$MODULE ROW_VAL=$ROW_VAL}
						{assign var=ROW_VAL value=($ROW_VAL+1)}
						{assign var=SELECTED_SORT_FIELDS_COUNT value=($SELECTED_SORT_FIELDS_COUNT+1)}
					</div>
				{/while}
			</div>
			<div class="row-fluid block">
				<div class="row span"><strong>{vtranslate('LBL_CALCULATIONS',$MODULE)}</strong></div>
				<div class="span11">
					<table class="table table-bordered CalculationFields" width="100%">
						<thead>
							<tr class="calculationHeaders">
								<th>{vtranslate('LBL_COLUMNS',$MODULE)}</th>
								<th>{vtranslate('LBL_SUM_VALUE',$MODULE)}</th>
								<th>{vtranslate('LBL_AVERAGE',$MODULE)}</th>
								<th>{vtranslate('LBL_LOWEST_VALUE',$MODULE)}</th>
								<th>{vtranslate('LBL_HIGHEST_VALUE',$MODULE)}</th>
							</tr>
						</thead>
						{assign var=FIELD_OPERATION_VALUES value=','|explode:'SUM:2,AVG:3,MIN:4,MAX:5'}
						{foreach key=CALCULATION_FIELDS_MODULE_LABEL item=CALCULATION_FIELDS_MODULE from=$CALCULATION_FIELDS}
							{foreach key=CALCULATION_FIELD_KEY item=CALCULATION_FIELD from=$CALCULATION_FIELDS_MODULE}
								{assign var=FIELD_EXPLODE value=explode(':',$CALCULATION_FIELD_KEY)}
								{assign var=tableName value=$FIELD_EXPLODE['0']}
								{assign var=columnName value=$FIELD_EXPLODE['1']}
								{assign var=FIELDNAME_EXPLODE value=explode('_',$FIELD_EXPLODE['2'])}
								{assign var=fieldNameArray value=array_slice($FIELDNAME_EXPLODE, 1)}
								{assign var=fieldName value=implode('_',$fieldNameArray)}
								<tr class="calculationFieldRow">
									<td>{vtranslate($CALCULATION_FIELDS_MODULE_LABEL,$MODULE)}-{vtranslate($CALCULATION_FIELD,$MODULE)}</td>
									{foreach item=FIELD_OPERATION_VALUE from=$FIELD_OPERATION_VALUES}
										{assign var=FIELD_CALCULATION_VALUE value="cb:$tableName:$columnName:$fieldName"|cat:'_'|cat:$FIELD_OPERATION_VALUE}
										<td width="15%">
											<input class="calculationType" type="checkbox" value="{$FIELD_CALCULATION_VALUE}" {if !empty($SELECTED_CALCULATION_FIELDS) && in_array($FIELD_CALCULATION_VALUE,$SELECTED_CALCULATION_FIELDS)} checked=""{/if} />
										</td>
									{/foreach}	
								</tr>
							{/foreach}	
						{/foreach}
					</table>
				</div>
			</div>
		</div>	
		<div class="pull-right block">
			<button type="button" class="btn btn-danger backStep"><strong>{vtranslate('LBL_BACK',$MODULE)}</strong></button>&nbsp;&nbsp;
			<button type="submit" class="btn btn-success nextStep"><strong>{vtranslate('LBL_NEXT',$MODULE)}</strong></button>&nbsp;&nbsp;
			<a class="cancelLink" onclick="window.history.back()">{vtranslate('LBL_CANCEL',$MODULE)}</a>
		</div>				
	</form>
{/strip}	