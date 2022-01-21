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
            <h2><a href="{$LINKTOLIST}">{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</a></h2>
        </div>
        <hr>
        <form id="EditRecord" class="form-horizontal recordEditView" enctype="multipart/form-data" action="index.php" method="post" name="EditView">
            <input type="hidden" name="module" value="ITS4YouFieldMapping">
            <input type="hidden" name="parent" value="Settings">
            <input type="hidden" name="action" value="Update">
            <input type="hidden" name="recordId" value="{$RECORDID}">
            <div class="contentHeader row-fluid clearfix">
                <h3 class="span8 textOverflowEllipsis">{vtranslate('LBL_EDIT_RECORD',$QUALIFIED_MODULE)}</h3>
                <span class="pull-right">
                    <button class="btn btn-success" type="submit"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>&nbsp;
                    <a class="cancelLink" onclick="window.history.back();" type="reset">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a>
                </span>
            </div>
            <br>
            <table class="table">
                <tbody>
                <tr class="border1px" style="background: #eee;">
                    <th colspan="4">{vtranslate('LBL_REL_DETAIL',$QUALIFIED_MODULE)}</th>
                </tr>
                <tr class="border1px">
                    <td class="fieldLabel medium">
                        <label class="muted pull-right marginRight10px">{vtranslate('Name',$QUALIFIED_MODULE)}</label>
                    </td>
                    <td class="fieldValue medium">
                        <div class="row-fluid">
                                    <span class="span10">
                                        <input class="inputElement nameField" type="text" name="Name" value="{$INFOABOUTRECORD['name']}">
                                    </span>
                        </div>
                    </td>
                    <td class="fieldLabel medium">
                        {*<label class="muted pull-right marginRight10px">{vtranslate('Active',$QUALIFIED_MODULE)}</label>*}
                    </td>
                    <td class="fieldValue medium">
                        <input type="hidden" name="Active" value="1">
                        {*<div class="row-fluid">
                            <span class="span10">
                                <input class="input-large nameField" type="checkbox" name="Active"
                                       {if $INFOABOUTRECORD['isactive'] eq 1}checked{/if}>
                            </span>
                        </div>*}
                    </td>
                </tr>
                <tr class="border1px">
                    <td class="fieldLabel medium">
                        <label class="muted pull-right marginRight10px">{vtranslate('Source Module',$QUALIFIED_MODULE)}</label>
                    </td>
                    <td class="fieldValue medium">
                        <div class="row-fluid">
                                    <span class="span10">
                                        <input type="hidden" name="sourceModule" value="{$INFOABOUTRECORD['module_from']}">
                                        {$INFOABOUTRECORD['module_from_name']}
                                    </span>
                        </div>
                    </td>
                    {*<td class="fieldLabel medium">
                        <label class="muted pull-right marginRight10px">{vtranslate('Link Label',$QUALIFIED_MODULE)}</label>
                    </td>
                    <td class="fieldValue medium">
                        <div class="row-fluid">
                            <span class="span10">
                                <input class="input-large nameField" type="text" name="{vtranslate('Link Label',$QUALIFIED_MODULE)}" value="{$INFOABOUTRECORD['label']}">
                            </span>
                        </div>
                    </td>*}
                    <td class="fieldLabel medium">
                        <label class="muted pull-right marginRight10px">{vtranslate('Target Module',$QUALIFIED_MODULE)}</label>
                    </td>
                    <td class="fieldValue medium">
                        <div class="row-fluid">
                            <span class="span10">
                                <input type="hidden" name="targetModule" value="{$INFOABOUTRECORD['module_to']}">
                                {$INFOABOUTRECORD['module_to_name']}
                            </span>
                        </div>
                    </td>
                </tr>
                <tr class="border1px">
                    <td class="fieldLabel medium">
                        <label class="muted pull-right marginRight10px">{vtranslate('Description',$QUALIFIED_MODULE)}</label>
                    </td>
                    <td class="fieldValue medium" colspan="3">
                        <textarea style="padding: 5px; min-height: 80px;" class="inputElement " type="" name="Description">{$INFOABOUTRECORD['info']}</textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="pull-right">
                    <button class="btn btn-success" type="submit"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>&nbsp;
                    <a class="cancelLink" onclick="window.history.back();" type="reset">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
{/strip}