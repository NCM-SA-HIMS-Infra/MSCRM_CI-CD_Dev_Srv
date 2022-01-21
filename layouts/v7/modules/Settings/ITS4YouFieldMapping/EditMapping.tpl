{*/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
********************************************************************************/*}
{strip}
    <div class="container-fluid">
        <style>
            .errorDuplicate, .errorTypes {
                outline: 1px solid #C55042;
            }
        </style>
        <div class="widget_header row-fluid">
            <h2><a href="{$LINKTOLIST}">{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</a></h2>
        </div>
        <hr>
        <form id="editMappingForm" method="POST">
            <input type="hidden" name="module" value="ITS4YouFieldMapping">
            <input type="hidden" name="parent" value="Settings">
            <input type="hidden" name="action" value="SaveMapping">
            <input type="hidden" name="recordId" id="recordId" value="{$RECORDID}">
            <input type="hidden" name="fieldsControl" id="fieldsControl" value="true" data-value='{$FIELDSCONTROL}'>
            <div class="row-fluid settingsHeader padding1per clearfix">
                <span class="span8">
                    <h3>{vtranslate('LBL_CONVERT_MAPPING', $QUALIFIED_MODULE)}</h3>
                </span>
                <span class="span4">
                    <span class="pull-right">
                        <button type="submit" class="btn btn-success"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>
                        <a class="cancelLink" type="reset" onclick="window.history.back();">Cancel</a>
                    </span>
                </span>
            </div>
            <div class="contents" id="detailView">
                <br>
                <table class="table table-bordered" width="100%" id="convertFieldMapping">
                    <thead>
                    <tr style="background: #eee">
                        <th>
                            {vtranslate('Source Module', $QUALIFIED_MODULE)}: {$INFOABOUTRECORD.moduleLabel_from}
                            <div class="actions pull-right">
                                    <span class="actionImages">
                                        <i class="fa fa-arrow-right"></i>
                                    </span>
                            </div>
                        </th>
                        <th>
                            {vtranslate('Target Module', $QUALIFIED_MODULE)}: {$INFOABOUTRECORD.moduleLabel_to}
                        </th>
                    </tr>
                    <tr>
                        <td><b>{$INFOABOUTRECORD.moduleLabel_from}</b></td>
                        <td><b>{$INFOABOUTRECORD.moduleLabel_to}</b></td>
                    </tr>
                    <tr class="hide newMapping listViewEntries">
                        <td>
                            <select class="sourceFields firstModuleFields newSelect" style="width:280px">
                                {foreach item=FIELD_INFO key=FIELD_TYPE from=$MODULEFROMFIELDS}
                                    <option value="{$FIELD_INFO->get('id')}">
                                        {vtranslate($FIELD_INFO->get('label'), Vtiger_Functions::getModuleName($INFOABOUTRECORD.module_from))}
                                    </option>
                                {/foreach}
                            </select>
                        </td>
                        <td>
                            <select class="targetFields secondModuleFields newSelect" style="width:280px">
                                {foreach item=FIELD_INFO key=FIELD_TYPE from=$MODULETOFIELDS}
                                    {if $FIELD_INFO->isEditable() eq 1}
                                        <option value="{$FIELD_INFO->get('id')}">
                                            {vtranslate($FIELD_INFO->get('label'), Vtiger_Functions::getModuleName($INFOABOUTRECORD.module_to))}
                                        </option>
                                    {/if}
                                {/foreach}
                            </select>
                            <div class="actions pull-right">
                                        <span class="actionImages">
                                            <a class="deleteMapping">
                                                <i class="fa fa-trash alignMiddle" title="Delete"></i>
                                            </a>
                                        </span>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="duplicateControl">
                    {foreach name="fieldmoduleto" item=INFO_ABOUT_RECORD key=FIELD_ID_FROM_MAPPING from=$FIELDSID}
                        <tr class="listViewEntries" sequence-number="{$smarty.foreach.fieldmoduleto.iteration}" id="tr_mapping_{$INFO_ABOUT_RECORD['fieldmapping_mappingid']}">
                            <td>
                                <select class="sourceFields select2" style="width:280px" name="mappingID_{$smarty.foreach.fieldmoduleto.iteration}[firstModule]">
                                    {foreach item=FIELD_INFO key=FIELD_TYPE from=$MODULEFROMFIELDS}
                                        <option value="{$FIELD_INFO->get('id')}" {if $FIELD_INFO->get('id') eq $INFO_ABOUT_RECORD['fieldid_sourcemodule']} selected {/if}>
                                            {vtranslate($FIELD_INFO->get('label'), Vtiger_Functions::getModuleName($INFOABOUTRECORD.module_from))}
                                        </option>
                                    {/foreach}
                                </select>
                            </td>
                            <td>
                                <select class="targetFields select2" style="width:280px" name="mappingID_{$smarty.foreach.fieldmoduleto.iteration}[secondModule]">
                                    {foreach item=FIELD_INFO key=FIELD_TYPE from=$MODULETOFIELDS}
                                        {if $FIELD_INFO->isEditable() eq 1}
                                            <option value="{$FIELD_INFO->get('id')}" {if $FIELD_INFO->get('id') eq $INFO_ABOUT_RECORD['fieldid_targetmodule']} selected {/if}>
                                                {vtranslate($FIELD_INFO->get('label'), Vtiger_Functions::getModuleName($INFOABOUTRECORD.module_to))}
                                            </option>
                                        {/if}
                                    {/foreach}
                                </select>
                                <div class="actions pull-right">
                                        <span class="actionImages">
                                            <a class="deleteMapping" data-id="{$INFO_ABOUT_RECORD['fieldmapping_mappingid']}">
                                                <i class="fa fa-trash alignMiddle" title="Delete"></i>
                                            </a>
                                        </span>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row-fluid">
                <span class="span4">
                    <button class="btn btn-default addButton" id="addMapping" type="button">
                        {vtranslate('LBL_ADD_MAPPING', $QUALIFIED_MODULE)}
                    </button>
                </span>
                <span class="span8">
                    <span class="pull-right">
                        <button type="submit" class="btn btn-success"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>
                        <a class="cancelLink" type="reset" onclick="window.history.back();">Cancel</a>
                    </span>
                </span>
            </div>
        </form>
    </div>
{/strip}
