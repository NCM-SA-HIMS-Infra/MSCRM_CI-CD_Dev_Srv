{*/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
********************************************************************************/*}
{strip}
    <div class="listViewContentDiv col-lg-12">
        <div class="container-fluid editViewContainer">
            <div class="widget_header row-fluid">
                <div class="span8">
                    <h2>{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)}</h2>
                </div>
            </div>
            <hr>
            <form id="EditView" class="form-horizontal recordEditView" enctype="multipart/form-data" action="index.php" method="post" name="EditView">
                <input type="hidden" name="module" value="ITS4YouFieldMapping">
                <input type="hidden" name="parent" value="Settings">
                <input type="hidden" name="action" value="Save">
                <div class="contentHeader row-fluid clearfix">
                    <h3 class="span8 textOverflowEllipsis">{vtranslate('LBL_CREATE_RELATION',$QUALIFIED_MODULE)}</h3>
                    <span class="pull-right">
                        <button class="btn btn-success" type="submit"><strong>{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</strong></button>&nbsp;
                        <a class="cancelLink" onclick="window.history.back();" type="reset">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a>
                    </span>
                </div>
                <br>
                <table class="table table-bordered blockContainer showInlineTable">
                    <tbody>
                    <tr style="background: #eee;">
                        <th colspan="4">{vtranslate('LBL_REL_DETAIL',$QUALIFIED_MODULE)}</th>
                    </tr>
                    <tr>
                        <td class="fieldLabel">
                            <label class="muted pull-right marginRight10px">{vtranslate('Name',$QUALIFIED_MODULE)}</label>
                        </td>
                        <td class="fieldValue">
                            <div class="row-fluid">
                                    <span class="span10">
                                        <input class="inputElement nameField" type="text" name="Name">
                                    </span>
                            </div>
                        </td>
                        <td class="fieldLabel"></td>
                        <td class="fieldValue">
                            <input type="hidden" name="Active" value="1">
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel">
                            <label class="muted pull-right marginRight10px">{vtranslate('Source Module',$QUALIFIED_MODULE)}</label>
                        </td>
                        <td class="fieldValue">
                            <div class="row-fluid">
                                    <span class="span10">
                                        <select name="sourceModule" class="inputElement select2">
                                            {foreach item=MODULE_MODEL key=MODULE_ID from=$ENTITY_MODULES}
                                                {assign var=MODULE_NAME value=$MODULE_MODEL->get('name')}
                                                <option value="{$MODULE_ID}">{vtranslate($MODULE_NAME, $MODULE_NAME)}</option>
                                            {/foreach}
                                        </select>
                                    </span>
                            </div>
                        </td>
                        <td class="fieldLabel">
                            <label class="muted pull-right marginRight10px">{vtranslate('Target Module',$QUALIFIED_MODULE)}</label>
                        </td>
                        <td class="fieldValue">
                            <div class="row-fluid">
                                    <span class="span10">
                                        <select name="targetModule" class="inputElement select2">
                                            {foreach item=MODULE_MODEL key=MODULE_ID from=$ENTITY_MODULES}
                                                {assign var=MODULE_NAME value=$MODULE_MODEL->get('name')}
                                                <option value="{$MODULE_ID}">{vtranslate($MODULE_NAME, $MODULE_NAME)}</option>
                                            {/foreach}
                                        </select>
                                    </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel">
                            <label class="muted pull-right marginRight10px">{vtranslate('Description',$QUALIFIED_MODULE)}</label>
                        </td>
                        <td class="fieldValue" colspan="3">
                            <textarea rows="3" class="inputElement" style="padding: 5px; min-height: 80px; resize: vertical;" type="text" name="Description"></textarea>
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
    </div>
{/strip}