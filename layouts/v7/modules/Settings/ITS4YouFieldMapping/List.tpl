{*
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/
*}
{strip}
    <div class="listViewContentDiv col-lg-12">
        <div class="widget_header row-fluid">
            <h4><a href="{$MODULE_MODEL->getDefaultUrl()}">{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</a></h4>
        </div>
        <hr>
        <div class="row-fluid">
            <button class="btn btn-primary addButton" onclick='window.location.href = "{$MODULE_MODEL->getCreateRecordUrl()}"'>
                <strong>{vtranslate('LBL_CREATE_RECORD', $QUALIFIED_MODULE)}</strong>
            </button>
        </div>
        <br>
        <div class="listViewEntriesDiv contents-bottomscroll">
            <div class="bottomscroll-div">
                <table class="table table-bordered listViewEntriesTable">
                    <thead>
                    <tr class="listViewHeaders" style="background: #eee;">
                        <th class="medium" nowrap="" style="width: 24%;">
                            {vtranslate('Name',$QUALIFIED_MODULE)}
                        </th>
                        <th class="medium" nowrap="" style="width: 24%;">
                            {vtranslate('Source Module',$QUALIFIED_MODULE)}
                        </th>
                        <th class="medium" nowrap="" style="width: 24%;">
                            {vtranslate('Target Module',$QUALIFIED_MODULE)}
                        </th>
                        <th class="medium" nowrap="" style="width: 24%;">
                            {vtranslate('Description',$QUALIFIED_MODULE)}
                        </th>
                        <th class="medium" nowrap="">
                            {*{vtranslate('Action',$QUALIFIED_MODULE)}*}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=KEY item=IMPROVEMENT from=$FIELDMAPPING}
                        {assign var=SOURCE_MODULE value=getTabModuleName($IMPROVEMENT['module_from'])}
                        {assign var=TARGET_MODULE value=getTabModuleName($IMPROVEMENT['module_to'])}
                        {assign var=LINK_LABEL value=$IMPROVEMENT['label']}
                        {assign var=DESCRIPTION value=$IMPROVEMENT['info']}
                        {assign var=NAME value=$IMPROVEMENT['name']}
                        {assign var=DATA_ID value=$IMPROVEMENT['fieldmappingid']}
                        {assign var=MAPPINGREADY value=$IMPROVEMENT['mappingready']}
                        <tr class="listViewEntries" data-id="{$DATA_ID}">
                            <td class="listViewEntryValue medium" nowrap=""><a href="{Settings_ITS4YouFieldMapping_Module_Model::getDetailViewUrl($DATA_ID)}">{$NAME}</a></td>
                            <td class="listViewEntryValue medium" nowrap="">
                                <a href="index.php?module={$SOURCE_MODULE}&view=List">
                                    {vtranslate($SOURCE_MODULE, $SOURCE_MODULE)}
                                </a>
                            </td>
                            <td class="listViewEntryValue medium" nowrap="">
                                <a href="index.php?module={$TARGET_MODULE}&view=List">
                                    {vtranslate($TARGET_MODULE, $TARGET_MODULE)}
                                </a>
                            </td>
                            <td class="listViewEntryValue medium" nowrap="">{$DESCRIPTION}</td>
                            <td class="medium" nowrap="">
                                <a href="{Settings_ITS4YouFieldMapping_Module_Model::getEditRecordUrl($DATA_ID)}">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>&nbsp;&nbsp;
                                <a class="deleteRecordButton" data-id="{$DATA_ID}">
                                    <i class="fa fa-trash" title="Delete"></i>
                                </a>&nbsp;&nbsp;
                                {if $MAPPINGREADY}
                                    <a href="{Settings_ITS4YouFieldMapping_Module_Model::getEditMappingUrl($DATA_ID)}">
                                        <i class="fa fa-bars" title="Map"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{/strip}

