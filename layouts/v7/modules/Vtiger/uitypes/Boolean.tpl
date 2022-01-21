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
{assign var="FIELD_INFO" value=$FIELD_MODEL->getFieldInfo()}
{assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL->getValidator()}
{assign var="FIELD_NAME" value=$FIELD_MODEL->get('name')}
{* // 2020-10-08 Pyae Phyo Mon disable field MSCRM Ver 1.0 add start *}
{assign var="TRANSFER_VALUE" value=$FIELD_MODEL->get('fieldvalue')}
{* // 2020-10-08 Pyae Phyo Mon disable field MSCRM Ver 1.0 add end *}
{if (!$FIELD_NAME)}
    {assign var="FIELD_NAME" value=$FIELD_MODEL->getFieldName()}
{/if}
<input type="hidden" name="{$FIELD_NAME}" value=0 />
<input id="{$MODULE}_editView_fieldName_{$FIELD_NAME}" class="inputElement" style="width:15px;height:15px;" data-fieldname="{$FIELD_NAME}" data-fieldtype="checkbox" type="checkbox" name="{$FIELD_NAME}"
{if $FIELD_MODEL->get('fieldvalue') eq true} checked {/if} {if !empty($SPECIAL_VALIDATOR)}data-validator="{Zend_Json::encode($SPECIAL_VALIDATOR)}"{/if}
{if $FIELD_INFO["mandatory"] eq true} data-rule-required = "true" {/if}
{if count($FIELD_INFO['validator'])}
    data-specific-rules='{ZEND_JSON::encode($FIELD_INFO["validator"])}'
{/if}
{* // 2020-10-08 Pyae Phyo Mon disable field MSCRM Ver 1.0 add start *}
{if $FIELD_NAME eq "transfer_to_wd" &&  $IS_CREATE eq false && $TRANSFER_VALUE eq true }
  onclick="return false" 
{/if}
{* // 2020-10-08 Pyae Phyo Mon disable field MSCRM Ver 1.0 add End *}
/>
{/strip}
