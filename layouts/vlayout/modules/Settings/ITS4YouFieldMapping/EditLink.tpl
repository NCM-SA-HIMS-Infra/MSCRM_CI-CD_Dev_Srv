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
    <div class="container-fluid">
        <div class="widget_header row-fluid">
            <h2><a href="{$LINKTOLIST}">{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</a></h2>
        </div>
        <hr>
        <form id="editLinkForm" method="POST">
            <input type="hidden" name="module" value="ITS4YouFieldMapping">
            <input type="hidden" name="parent" value="Settings">
            <input type="hidden" name="action" value="SaveLink">
            <input type="hidden" name="recordId" value="{$RECORDID}">
            <input type="hidden" name="linkId" value="{$LINKID}">
            <div class="row-fluid settingsHeader padding1per">
                <span class="span8">
                    <span class="font-x-x-large">{vtranslate('Edit Link', $QUALIFIED_MODULE)}</span>
                </span>
                <span class="span4">
                    <span class="pull-right">
                        <button type="submit" class="btn btn-success"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>
                        <a class="cancelLink" type="reset" onclick="window.history.back();">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a>
                    </span>
                </span>
            </div>
            <hr>
            <div class="contents" id="detailView">
                <table class="table table-bordered" width="100%" id="convertFieldMapping">
                    <tbody>
                    <tr class="listViewEntries">
                        <td class="fieldLabel medium">
                            <label class="muted pull-right marginRight10px">{vtranslate('LBL_LINK_LABEL', $QUALIFIED_MODULE)}</label>
                        </td>
                        <td class="fieldValue medium">
                            <div id="addIntoSpan" class="fieldValue medium hide" style="float: left;">
                                {vtranslate('AddInto', $QUALIFIED_MODULE)}
                            </div>
                            <div style="float: left;">
                                <input class="input-xxlarge nameField" type="text" name="linklabel" value="{$LINKLABEL}">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
{/strip}