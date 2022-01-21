{*/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
********************************************************************************/*}
{strip}
    <div class="container-fluid">
        <div class="widget_header row-fluid">
            <h2><a href="index.php?module=ITS4YouFieldMapping&parent=Settings&view=List">{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</a></h2>
        </div>
        <hr>
        <div class="contentHeader row-fluid">
            <h3 class="span8">
                {$INFOABOUTRECORD['name']}
            </h3>
        </div>
        <br>
        <table class="table">
            <tbody>
            <tr class="border1px" style="background: #eee;">
                <th colspan="4">
                    {vtranslate('LBL_REL_DETAIL',$QUALIFIED_MODULE)}
                    <span class="pull-right">
                            <button class="btn btn-primary" type="submit"><strong>{vtranslate('LBL_EDIT', $QUALIFIED_MODULE)}</strong></button>
                        </span>
                </th>
            </tr>
            <tr class="border1px">
                <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">{vtranslate('Name',$QUALIFIED_MODULE)}</label>
                </td>
                <td class="fieldValue medium" colspan="3">
                    <div class="row-fluid">
                            <span class="span10">
                                {$INFOABOUTRECORD['name']}
                            </span>
                    </div>
                </td>
            </tr>
            <tr class="border1px">
                <td class="fieldLabel medium" style="width: 25%;">
                    <label class="muted pull-right marginRight10px">{vtranslate('Source Module',$QUALIFIED_MODULE)}</label>
                </td>
                <td class="fieldValue medium" style="width: 25%;">
                    <div class="row-fluid">
                            <span class="span10">
                                <a href="index.php?module={$MODULE_FROM->getName()}&view=List">
                                    {vtranslate($MODULE_FROM->getName(),$MODULE_FROM->getName())}
                                </a>
                            </span>
                    </div>
                </td>
                <td class="fieldLabel medium" style="width: 25%;">
                    <label class="muted pull-right marginRight10px">{vtranslate('Target Module',$QUALIFIED_MODULE)}</label>
                </td>
                <td class="fieldValue medium" style="width: 25%;">
                    <div class="row-fluid">
                            <span class="span10">
                                <a href="index.php?module={$MODULE_TO->getName()}&view=List">
                                {vtranslate($MODULE_TO->getName(),$MODULE_TO->getName())}
                                </a>
                            </span>
                    </div>
                </td>
            </tr>
            <tr class="border1px">
                <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">{vtranslate('Description',$QUALIFIED_MODULE)}</label>
                </td>
                <td class="fieldValue medium" colspan="3">
                    <div class="row-fluid">
                            <span class="span10">
                                {$INFOABOUTRECORD['info']}
                            </span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container-fluid" id="LinksDiv">
        <form name="linksForm" action="index.php" method="post" id="linksForm">
            <input type="hidden" name="module" value="ITS4YouFieldMapping">
            <input type="hidden" name="parent" value="Settings">
            <input type="hidden" name="view" value="EditLink">
            <table class="table">
                <tr class="border1px" style="background: #eee;">
                    <th colspan="3">{vtranslate('LBL_EXISTING_LINKS', $QUALIFIED_MODULE)}
                        {if !$MAPPINGREADY}
                            <span class="pull-right">
                            <button class="btn btn-primary" id="editLinks" type="submit"><strong>{vtranslate('LBL_ADD_LINK', $QUALIFIED_MODULE)}</strong></button>
                        </span>
                        {/if}
                    </th>
                </tr>
                <tr class="border1px">
                    <th style="width: 50%;">{vtranslate('LBL_LOCATION', $QUALIFIED_MODULE)}</th>
                    <th>{vtranslate('LBL_LINK_LABEL', $QUALIFIED_MODULE)}</th>
                    <th>{vtranslate('LBL_ACTIONS')}</th>
                </tr>
                {foreach item=LINK_DATA key=LINK_COUNTER from=$LINKS}
                    <tr class="border1px links convert{$LINK_DATA.convert}" data-id="{$LINK_DATA.linkid}">
                        <td>{vtranslate('Detail', $QUALIFIED_MODULE)}</td>
                        <td class="linkLabel">{$LINK_DATA.linklabel}</td>
                        <td>
                            {if $LINK_DATA.mapped eq 0}
                                <a href='index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditLink&recordId={$RECORDID}&linkId={$LINK_DATA.linkid}'>
                                    <i title="{vtranslate('LBL_EDIT', $MODULE)}" style="vertical-align: top;" class="fa fa-pencil alignMiddle"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="deleteLink">
                                    <i class="fa fa-trash" title="{vtranslate('LBL_DELETE', $MODULE)}"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                {if $LINK_DATA.convert eq true}
                                    <a class="relationAdd">
                                        <i title="{vtranslate('LBL_CONVERT_LINK', $QUALIFIED_MODULE)}" class="vicon-linkopen"></i>
                                    </a>
                                {/if}
                            {else}
                                <a href="index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId={$LINK_DATA.mapped}">
                                    {vtranslate('LBL_MAPPED_TO', $QUALIFIED_MODULE)}{$LINK_DATA.mappedlabel}
                                </a>
                            {/if}
                        </td>
                    </tr>
                    {foreachelse}
                    <tr class="border1px">
                        <td>{vtranslate('LBL_NO_LINKS', $QUALIFIED_MODULE)}</td>
                    </tr>
                {/foreach}
            </table>
            <input type="hidden" name="recordId" id="recordId" value="{$RECORDID}">
        </form>
    </div>
    {if $MAPPINGREADY eq true}
        <div class="container-fluid" id="AddMapping">
            <form name="mappingForm" action="index.php" method="post" id="mappingForm">
                <input type="hidden" name="module" value="ITS4YouFieldMapping">
                <input type="hidden" name="parent" value="Settings">
                <input type="hidden" name="view" value="EditMapping">
                <input type="hidden" name="recordId" id="recordId" value="{$RECORDID}">
                <table class="table">
                    <tr class="border1px" style="background: #eee;">
                        <th colspan="2">{vtranslate('LBL_EXISTING_MAPING', $QUALIFIED_MODULE)}
                            <span class="pull-right">
                                <button class="btn btn-primary" id="editMapping" type="submit"><strong>{vtranslate('LBL_EDIT_MAPPING', $QUALIFIED_MODULE)}</strong></button>
                            </span>
                        </th>
                    </tr>
                    <tr class="border1px">
                        <th>{vtranslate('Source Module', $QUALIFIED_MODULE)}: {$INFOABOUTRECORD.moduleLabel_from}</th>
                        <th>{vtranslate('Target Module', $QUALIFIED_MODULE)}: {$INFOABOUTRECORD.moduleLabel_to}</th>
                    </tr>
                    {foreach item=MAPPING_FIELD from=$FIELDSID}
                        <tr class="border1px">
                            <td>
                                {$MAPPING_FIELD.fieldlabel_sourcemodule}
                            </td>
                            <td>
                                {$MAPPING_FIELD.fieldlabel_targetmodule}
                            </td>
                        </tr>
                    {/foreach}
                </table>
            </form>
        </div>
    {/if}
    <style>
        .links * {
            vertical-align: top;
            font-size: 12px;
        }
    </style>
{/strip}