/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

jQuery.Class("ITS4YouFieldMapping_HS_Js", {
    viewType: false,
    formElement: false,
    debugOn: false,
    queryParams: [],
    requestedMappings: [],
    showError: function (message) {
        let params = {
            text: app.vtranslate(message),
            type: 'error'
        };

        Vtiger_Helper_Js.showMessage(params);
    },
    getInstance: function (view) {
        this.setDebugText("ITS4YouDynamicFields_Fields_Js start");
        this.viewType = view;
        let thisInstance = this,
            formElement = this.getForm();

        jQuery(document).on('Vtiger.Reference.Selection', function (e, data) {
            let selectElement = jQuery(e.target),
                forfieldname = selectElement.attr("name");

            thisInstance.checkMappings(forfieldname, selectElement.val());
        });
    },
    getForm: function () {
        if (this.formElement === false) {
            this.setForm(jQuery('#EditView'));
        }
        return this.formElement;
    },
    setForm: function (element) {
        this.formElement = element;
        return this;
    },
    setDebugText: function (text) {
        if (window.console && this.debugOn) console.log('[ITS4YouDynamicFields] ' + text);

    },

    getQueryParams: function () {
        let self = this,
            qs = document.location.search,
            params = {},
            tokens,
            re = /[?&]?([^=]+)=([^&]*)/g;


        qs = qs.split("+").join(" ");

        while (tokens = re.exec(qs)) {
            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
        }

        self.queryParams = params;

        return params;
    },

    getData: function (fieldmappingid, sourceRecord) {
        let thisInstance = this,
            $_GET = thisInstance.queryParams;

        this.setDebugText("ITS4YouDynamicFields_Fields_Js getData start");

        if (typeof sourceRecord == 'undefined') {
            sourceRecord = $_GET.sourceRecord;
        }

        var actionParams = {
            "module": "ITS4YouFieldMapping",
            "action": "GetData",
            "its4youfieldmappingid": fieldmappingid,
            "sourceRecord": sourceRecord,
            "productblock": "0"
        };

        AppConnector.request(actionParams).then(function (data) {
                if (data.success && typeof data.result === 'object') {
                    let columns = data.result;
                    if (columns.length <= 0) {
                        return;
                    }
                    jQuery.each(data.result, function (fieldname, fieldvalue) {
                        if (fieldname !== 'relatedProducts') {
                            let field0 = jQuery('#EditView :input[name=' + fieldname + ']'),
                                value = fieldvalue['source'],
                                displayUiType = [1, 2, 3, 4, 11, 15, 17, 19, 20, 21, 22, 27, 28, 33, 85, 55, 255, 5, 23, 61, 69, 71];

                            if (!isNaN(value) && fieldname !== 'assigned_user_id') {
                                if (isNaN(fieldvalue['display'])) {
                                    value = fieldvalue['display'];
                                }
                            }

                            if (-1 < displayUiType.indexOf(parseInt(fieldvalue['uiType']))) {
                                value = fieldvalue['display'];
                            }
                            if (field0.is('[type="checkbox"]')) {
                                if (fieldvalue['source'] === '1') {
                                    field0.attr('checked', true).trigger('change');
                                }
                                value = 1;
                            }
                            field0.val(value);
                            if (fieldname !== 'currency_id') {
                                field0.trigger('change');
                                // if the field is a relational field (e.g. uitype 10), I run the vtiger selection routine
                                if (jQuery('#EditView :input[name=' + fieldname + '_display]').val() !== undefined && 0 > thisInstance.requestedMappings.indexOf(fieldvalue['source'])) {
                                    let fieldDropDown = jQuery('#' + app.getModuleName() + '_editView_fieldName_' + fieldname + '_dropDown'),
                                        tdElement = field0.closest('td'),
                                        selectedItemData = {'id': parseInt(fieldvalue['source']), 'name': fieldvalue['display']};

                                    if (0 < fieldDropDown.length) {
                                        fieldDropDown.val(fieldvalue['entityType'].trigger('liszt:updated').trigger('change'));
                                    }
                                    Vtiger_Edit_Js.getInstance().setReferenceFieldValue(tdElement, selectedItemData);
                                }
                            }
                            if (field0.prop('type') === 'select-one' || fieldname === 'currency_id') {
                                field0.trigger('liszt:updated');
                            }
                            if (field0.is('.select2')) {
                                let split = fieldvalue['source'].split(' |##| '),
                                    res = split;

                                field0.select2('val', res);
                            }
                        } else if (fieldvalue === 'true') {
                            let lineItemTab = jQuery('#lineItemTab'),
                                lineItemRow = jQuery('.lineItemRow');

                            if (lineItemTab) {
                                let params = {
                                    module: 'ITS4YouFieldMapping',
                                    action: 'GetData',
                                    its4youfieldmappingid: fieldmappingid,
                                    sourceRecord: sourceRecord,
                                    productblock: '1',
                                };

                                AppConnector.request(params).then(function (data) {
                                    let result = data.result;

                                    if (data.success) {

                                        lineItemRow.remove(); /*oficialny konvert to vypočitava rovnako*/
                                        jQuery('#lineItemTab').append(result.products);
                                        jQuery('#region_id').select2('val', result.region);
                                        jQuery('#currency_id').select2('val', result.currency);
                                        jQuery('#taxtype').select2('val', result.mode);

                                        jQuery('#EditView :input[name=taxtype]').trigger('change');
                                    }
                                });
                            }
                        } else {
                            console.log(this);
                        }
                    });
                }
            },
        );
        this.setDebugText("ITS4YouDynamicFields_Fields_Js getData end");
    },

    fillFields: function () {
        this.setDebugText("ITS4YouDynamicFields_Fields_Js fillFields start");
        let thisInstance = this,
            request = thisInstance.queryParams;

        if (!request.its4youfieldmappingid && request.sourceModule && request.sourceRecord) {
            let actionParams = {
                "module": "ITS4YouFieldMapping",
                "action": "GetFieldMappingId",
                "sourceModule": request.sourceModule,
                "sourceRecord": request.sourceRecord,
                "forModule": app.getModuleName()
            };

            AppConnector.request(actionParams).then(function (data) {
                    if (data.success) {
                        if (data.result !== 0) {
                            thisInstance.getData(data.result);
                        }
                    }
                }, function (error, err) {
                    alert(error);
                    alert(err);
                }
            );
        } else if (request.its4youfieldmappingid) {
            thisInstance.getData(request.its4youfieldmappingid);
        }

        this.setDebugText("ITS4YouDynamicFields_Fields_Js fillFields end");
    },
    checkMappings: function (forFieldName, fieldValue) {

        if (fieldValue && forFieldName) {
            let thisInstance = this,
                actionParams = {
                    "module": "ITS4YouFieldMapping",
                    "action": "GetMappingsForModule",
                    "forModule": app.getModuleName(),
                    "forField": forFieldName,
                };

            AppConnector.request(actionParams).then(
                function (data) {
                    if (data.success && 'object' !== typeof data.result && 0 !== data.result) {
                        thisInstance.requestedMappings.push(fieldValue);
                        thisInstance.getData(data.result, fieldValue);
                    }
                },
                function (error, err) {
                    this.setDebugText(error);
                    this.setDebugText(err);
                }
            );
        }
    },

    addSourceField: function () {
        let thisInstance = this,
            query = thisInstance.queryParams;

        if (query.its4youfieldmappingid && query.sourceModule && query.sourceRecord) {
            if (!jQuery("input[name='sourceModule']") && !jQuery("input[name='sourceRecord']")) {
                let record = jQuery("input[name='record']");
                record.after('<input type="hidden" name="sourceModule" value="' + $_GET.sourceModule + '"/>');
                record.after('<input type="hidden" name="sourceRecord" value="' + $_GET.sourceRecord + '"/>');
            }
        }
    },

}, {});

jQuery(document).ready(function () {
    let view = app.getViewName();

    if ('Edit' === view) {
        ITS4YouFieldMapping_HS_Js.getQueryParams();
        ITS4YouFieldMapping_HS_Js.addSourceField();
        ITS4YouFieldMapping_HS_Js.getInstance(view);
        ITS4YouFieldMapping_HS_Js.fillFields();

    }
});
