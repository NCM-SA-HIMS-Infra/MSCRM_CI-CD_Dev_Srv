/*+***********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*************************************************************************************/

Vtiger_Index_Js("Vtiger_Edit_Js", {

    file: false,

    editInstance: false,

    recordPresaveEvent: "Pre.Record.Save",

    preReferencePopUpOpenEvent: "Vtiger.Referece.Popup.Pre",

    postReferencePopUpOpenEvent: "Vtiger.Referece.Popup.Post",

    referenceSelectionEvent: "Vtiger.Reference.Selection",

    postReferenceSelectionEvent: "Vtiger.PostReference.Selection",

    postReferenceQuickCreateSave: "Vtiger.PostReference.QuickCreateSave",

    refrenceMultiSelectionEvent: "Vtiger.MultiReference.Selection",

    postReferenceQuickCreateSaveEvent: "Vtiger.PostReferenceQuickCreate.Save",

    popupSelectionEvent: "Vtiger.Reference.Popup.Selection",

    referenceDeSelectionEvent: "Vtiger.Reference.Deselection",

    /**
    * Function to get Instance by name
    * @params moduleName:-- Name of the module to create instance
    */
    getInstanceByModuleName: function (moduleName) {
        if (typeof moduleName == "undefined") {
            moduleName = app.getModuleName();
        }
        var parentModule = app.getParentModuleName();
        if (parentModule == 'Settings') {
            var moduleClassName = parentModule + "_" + moduleName + "_Edit_Js";
            if (typeof window[moduleClassName] == 'undefined') {
                moduleClassName = moduleName + "_Edit_Js";
            }
            var fallbackClassName = parentModule + "_Vtiger_Edit_Js";
            if (typeof window[fallbackClassName] == 'undefined') {
                fallbackClassName = "Vtiger_Edit_Js";
            }
        } else {
            moduleClassName = moduleName + "_Edit_Js";
            fallbackClassName = "Vtiger_Edit_Js";
        }
        if (typeof window[moduleClassName] != 'undefined') {
            var instance = new window[moduleClassName]();
        } else {
            var instance = new window[fallbackClassName]();
        }
        return instance;
    },

    getInstance: function () {
        if (Vtiger_Edit_Js.editInstance == false) {
            var instance = Vtiger_Edit_Js.getInstanceByModuleName();
            Vtiger_Edit_Js.editInstance = instance;
            return instance;
        }
        return Vtiger_Edit_Js.editInstance;
    }
}, {

    editViewContainer: false,
    formValidatorInstance: false,

    getEditViewContainer: function () {
        if (this.editViewContainer === false) {
            this.editViewContainer = jQuery('.editViewPageDiv');
        }
        return this.editViewContainer;
    },
    setEditViewContainer: function (container) {
        this.editViewContainer = container;
    },

    formElement: false,

    getForm: function () {
        if (this.formElement === false) {
            this.formElement = jQuery('#EditView');
        }
        return this.formElement;
    },
    _moduleName: false,

    getModuleName: function () {
        if (this._moduleName != false) {
            return this._moduleName;
        }
        return app.module();
    },

    setModuleName: function (module) {
        this._moduleName = module;
        return this;
    },

    /**
     * Function which will give you all details of the selected record
     * @params - an Array of values like {'record' : recordId, 'source_module' : searchModule, 'selectedName' : selectedRecordName}
     */
    getRecordDetails: function (params) {
        var aDeferred = jQuery.Deferred();
        var url = "index.php?module=" + app.getModuleName() + "&action=GetData&record=" + params['record'] + "&source_module=" + params['source_module'];
        app.request.get({ 'url': url }).then(
            function (error, data) {
                if (error == null) {
                    aDeferred.resolve(data);
                } else {
                    //aDeferred.reject(data['message']);
                }
            },
            function (error) {
                aDeferred.reject();
            }
        )
        return aDeferred.promise();
    },

    /**
     * Function to Validate and Save Event 
     * @returns {undefined}
     */
    registerValidation: function () {
        var editViewForm = this.getForm();
        this.formValidatorInstance = editViewForm.vtValidate({
            submitHandler: function () {
                var e = jQuery.Event(Vtiger_Edit_Js.recordPresaveEvent);
                app.event.trigger(e);

                /*2020-10-21 Thet Phyo Wai Contact and Organization Check MSCRM Ver 1.0 start */
                if (app.module() == 'ContactProduct' || app.module() == 'HelpDesk' || app.module() == 'Invoice' || app.module() == 'SalesOrder' || app.module() == 'Quotes') {
                    if (app.module() == 'ContactProduct') {
                        var contact_id = $('#contact_id_display').val();
                        var organization_id = $('#organization_name_display').val();
                    }
                    if (app.module() == 'HelpDesk') {
                        var contact_id = editViewForm.find('[name="contact_id"]').val();
                        var organization_id = editViewForm.find('[name="parent_id"]').val();
                        var machine_serial_no = editViewForm.find('[name="machine_serial_no"]').val();
                        var status = editViewForm.find('[name="ticketstatus"]').val();
                        var supporttype = editViewForm.find('[name="support_type"]').val();
                        var invoice_need = editViewForm.find('[name="invoice_pattern"]').val();
                        if ((machine_serial_no == "" || machine_serial_no == 0) && (status == "WIP" || status == "Closed")) {
                            if (supporttype == "On Site") {
                                app.helper.showErrorNotification({ 'message': 'Machine Serial Number must be Enter.' });
                                return false;
                            }
                            else {
                                if (invoice_need == "Need") {
                                    app.helper.showErrorNotification({ 'message': 'Machine Serial Number must be Enter.' });
                                    return false;
                                }

                            }

                        }
                    }
                    if (app.module() == 'Invoice' || app.module() == 'SalesOrder' || app.module() == 'Quotes') {
                        var contact_id = editViewForm.find('[name="contact_id"]').val();
                        var organization_id = editViewForm.find('[name="account_id"]').val();
                    }
                    if ((contact_id == "" || contact_id == 0) && (organization_id == "" || organization_id == 0)) {
                        app.helper.showErrorNotification({ 'message': 'Contact Name or Organization Name must be Enter.' });
                        return false;
                    }
                }
                /*2020-10-21 Thet Phyo Wai Contact and Organization Check MSCRM Ver 1.0 start */

                /*2021-07-01 Myo Min Kyaw Actual Start and Actual End date Validation in Ticket start*/
                var ticketstatus = editViewForm.find('[name="ticketstatus"]').val();

                if (ticketstatus == "Closed") {
                    var actualStartdate = editViewForm.find('[name="actual_start_date"]').val();
                    var actucalEnddate = editViewForm.find('[name="actual_end_date"]').val();

                    if (actualStartdate == "" || actucalEnddate == "") {
                        app.helper.showErrorNotification({ 'message': 'Actual Start Data and End Date must be enter' });
                        return false;
                    }
                }
                /*2021-07-01 Myo Min Kyaw Actual Start and Actual End date Validation in Ticket end*/

                if (e.isDefaultPrevented()) {
                    return false;
                }
                window.onbeforeunload = null;
                editViewForm.find('.saveButton').attr('disabled', true);
                return true;
            }
        });
    },

    /**
    * Function which will register event to prevent form submission on pressing on enter
    * @params - container <jQuery> - element in which auto complete fields needs to be searched
    */
    registerPreventingEnterSubmitEvent: function (container) {
        container.on('keypress', function (e) {
            //Stop the submit when enter is pressed in the form
            var currentElement = jQuery(e.target);
            if (e.which == 13 && (!currentElement.is('textarea'))) {
                e.preventDefault();
            }
        });
    },

    /**
     * Function to register event for setting up picklistdependency
     * for a module if exist on change of picklist value
     */
    registerEventForPicklistDependencySetup: function (container) {
        var picklistDependcyElemnt = jQuery('[name="picklistDependency"]', container);
        if (picklistDependcyElemnt.length <= 0) {
            return;
        }
        var picklistDependencyMapping = JSON.parse(picklistDependcyElemnt.val());

        var sourcePicklists = Object.keys(picklistDependencyMapping);
        if (sourcePicklists.length <= 0) {
            return;
        }

        var sourcePickListNames = "";
        for (var i = 0; i < sourcePicklists.length; i++) {
            if (i != sourcePicklists.length - 1)
                sourcePickListNames += '[name="' + sourcePicklists[i] + '"],';
            else
                sourcePickListNames += '[name="' + sourcePicklists[i] + '"]';
        }
        var sourcePickListElements = container.find(sourcePickListNames);

        sourcePickListElements.on('change', function (e) {
            var currentElement = jQuery(e.currentTarget);
            var sourcePicklistname = currentElement.attr('name');
            var configuredDependencyObject = picklistDependencyMapping[sourcePicklistname];
            var selectedValue = currentElement.val();
            var targetObjectForSelectedSourceValue = configuredDependencyObject[selectedValue];
            var picklistmap = configuredDependencyObject["__DEFAULT__"];

            if (typeof targetObjectForSelectedSourceValue == 'undefined') {
                targetObjectForSelectedSourceValue = picklistmap;
            }

            jQuery.each(picklistmap, function (targetPickListName, targetPickListValues) {
                var targetPickListMap = targetObjectForSelectedSourceValue[targetPickListName];
                if (typeof targetPickListMap == "undefined") {
                    targetPickListMap = targetPickListValues;
                }
                var targetPickList = jQuery('[name="' + targetPickListName + '"]', container);
                if (targetPickList.length <= 0) {
                    return;
                }

                var listOfAvailableOptions = targetPickList.data('availableOptions');
                if (typeof listOfAvailableOptions == "undefined") {
                    listOfAvailableOptions = jQuery('option', targetPickList);
                    targetPickList.data('available-options', listOfAvailableOptions);
                }

                var targetOptions = new jQuery();
                var optionSelector = [];
                optionSelector.push('');
                for (var i = 0; i < targetPickListMap.length; i++) {
                    optionSelector.push(targetPickListMap[i]);
                }
                jQuery.each(listOfAvailableOptions, function (i, e) {
                    var picklistValue = jQuery(e).val();
                    if (jQuery.inArray(picklistValue, optionSelector) != -1) {
                        targetOptions = targetOptions.add(jQuery(e));
                    }
                })
                var targetPickListSelectedValue = '';
                var targetPickListSelectedValue = targetOptions.filter('[selected]').val();
                if (targetPickListMap.length == 1) {
                    var targetPickListSelectedValue = targetPickListMap[0]; // to automatically select picklist if only one picklistmap is present.
                }
                if ((targetPickListName == 'group_id' || targetPickListName == 'assigned_user_id') && jQuery("[name=" + sourcePicklistname + "]").val() == '') {
                    return false;
                }
                targetPickList.html(targetOptions).val(targetPickListSelectedValue).trigger("change");

            })
        });

        //To Trigger the change on load
        sourcePickListElements.trigger('change');
    },

    registerImageChangeEvent: function () {
        var formElement = this.getForm();
        formElement.find('input[name="imagename[]"]').on('change', function () {
            var deleteImageElement = jQuery(this).closest('td.fieldValue').find('.imageDelete');
            if (deleteImageElement.length) deleteImageElement.trigger('click');
        });
    },

    /**
     * Function to register event for image delete
     */
    registerEventForImageDelete: function () {
        var formElement = this.getForm();
        formElement.find('.imageDelete').on('click', function (e) {
            var element = jQuery(e.currentTarget);
            var imageId = element.closest('div').find('img').data().imageId;
            var parentTd = element.closest('td');
            var imageUploadElement = parentTd.find('[name="imagename[]"]');
            element.closest('div').remove();

            if (formElement.find('[name=imageid]').length !== 0) {
                var imageIdValue = JSON.parse(formElement.find('[name=imageid]').val());
                imageIdValue.push(imageId);
                formElement.find('[name=imageid]').val(JSON.stringify(imageIdValue));
            } else {
                var imageIdJson = [];
                imageIdJson.push(imageId);
                formElement.append('<input type="hidden" name="imgDeleted" value="true" />');
                formElement.append('<input type="hidden" name="imageid" value="' + JSON.stringify(imageIdJson) + '" />');
            }

            if (formElement.find('.imageDelete').length === 0 && imageUploadElement.attr('data-rule-required') == 'true') {
                imageUploadElement.removeClass('ignore-validation')
            }
        });
    },

    registerFileElementChangeEvent: function (container) {
        var thisInstance = this;
        container.on('change', 'input[name="imagename[]"],input[name="sentdocument"]', function (e) {
            if (e.target.type == "text") return false;
            var moduleName = jQuery('[name="module"]').val();
            if (moduleName == "Products") return false;
            Vtiger_Edit_Js.file = e.target.files[0];
            var element = container.find('[name="imagename[]"],input[name="sentdocument"]');
            //ignore all other types than file 
            if (element.attr('type') != 'file') {
                return;
            }
            var uploadFileSizeHolder = element.closest('.fileUploadContainer').find('.uploadedFileSize');
            var fileSize = e.target.files[0].size;
            var fileName = e.target.files[0].name;
            var maxFileSize = thisInstance.getMaxiumFileUploadingSize(container);
            if (fileSize > maxFileSize) {
                alert(app.vtranslate('JS_EXCEEDS_MAX_UPLOAD_SIZE'));
                element.val('');
                uploadFileSizeHolder.text('');
            } else {
                if (container.length > 1) {
                    jQuery('div.fieldsContainer').find('form#I_form').find('input[name="filename"]').css('width', '80px');
                    jQuery('div.fieldsContainer').find('form#W_form').find('input[name="filename"]').css('width', '80px');
                } else {
                    container.find('input[name="filename"]').css('width', '80px');
                }
                uploadFileSizeHolder.text(fileName + ' ' + thisInstance.convertFileSizeInToDisplayFormat(fileSize));
            }

            jQuery(e.currentTarget).addClass('ignore-validation');
        });
    },

    /*2020-11-05 Thet Phyo Wai Add Currency in Contact Product MSCRM Ver 1.0 Start*/
    registerCurrencyChangeEvent: function () {
        var formElement = this.getForm();
        var moduleName = (app.getModuleName() == "ContactProduct" || app.getModuleName() == "Products" || app.getModuleName() == "Services") ? app.getModuleName() : formElement.find('input[name="module"]').val();
        if (moduleName == "ContactProduct" || moduleName == "Products" || moduleName == "Services") {
            if (moduleName == "ContactProduct") {
                var priceSymbol = formElement.find('input[name="contract_price"]').closest('div').find('span');
                var currencyField = formElement.find('input[name="contract_price"]');
            } else if (moduleName == "Products" || moduleName == "Services") {
                var priceSymbol = formElement.find('input[name="purchase_cost"]').closest('div').find('span');
                var currencyField = formElement.find('input[name="purchase_cost"]');
            }
            var currency = formElement.find('select[name="currency"]');

            var params = {
                'module': "ContactProduct",
                'action': "CurrencyInfo",
            };

            var currency_symbol = [];
            app.request.post({ 'data': params }).then(
                function (error, data) {
                    currency_symbol = data;
                    var current_currency = currency.val();
                    if (!(current_currency == 0 || current_currency == "" || current_currency == undefined)) {
                        var symbol = currency_symbol[current_currency]['symbol'];
                        priceSymbol.html(symbol);
                    }
                }
            );

            var oldCurrencyId = currency.val();
            currency.on('change', function (e) {
                var currencyId = e.target.value;
                var symbol = currency_symbol[currencyId]['symbol'];
                priceSymbol.html(symbol);


                var oldValue = currencyField.val();
                if (!(oldValue == 0 || oldValue == '')) {
                    var oldRate = currency_symbol[oldCurrencyId]['rate'];
                    var newRate = currency_symbol[currencyId]['rate'];
                    var groupingseparator = jQuery('body').data('user-groupingseparator');
                    var oldvalues = oldValue.split(groupingseparator);
                    var values = '';
                    for (var i = 0; i < oldvalues.length; i++) {
                        values += oldvalues[i];
                    }
                    var newValue = parseFloat(values) * (newRate / oldRate);

                    var numberofDecimal = app.getNumberOfDecimals();
                    var newValue = parseFloat(newValue.toFixed(numberofDecimal));
                    currencyField.val(newValue);
                }
                oldCurrencyId = currencyId;
            });


        }
    },
    /*2020-11-05 Thet Phyo Wai Add Currency in Contact Product MSCRM Ver 1.0 End*/

    /** 
     * Function to register Basic Events
     * @returns {undefined}
     */
    registerBasicEvents: function (form) {
        app.event.on('post.editView.load', function (event, container) {
        });
        /*2020-10-19 Thet Phyo Wai Add Currency in Contact Product MSCRM Ver 1.0 Start*/
        this.registerCurrencyChangeEvent();
        /*2020-10-19 Thet Phyo Wai Add Currency in Contact Product MSCRM Ver 1.0 End*/
        this.registerEventForPicklistDependencySetup(form);
        this.registerFileElementChangeEvent(form);
        this.registerAutoCompleteFields(form);
        this.registerClearReferenceSelectionEvent(form);
        this.registerReferenceCreate(form);
        this.referenceModulePopupRegisterEvent(form);
        this.registerPostReferenceEvent(this.getEditViewContainer());
    },
    proceedRegisterEvents: function () {
        if (jQuery('.recordEditView').length > 0) {
            return true;
        } else {
            return false;
        }
    },

    registerPageLeaveEvents: function () {
        app.helper.registerLeavePageWithoutSubmit(this.getForm());
        app.helper.registerModalDismissWithoutSubmit(this.getForm());
    },

    registerEvents: function (callParent) {
        //donot call parent if registering Events from overlay.
        if (callParent != false) {
            this._super();
        }
        var editViewContainer = this.getEditViewContainer();
        this.registerPreventingEnterSubmitEvent(editViewContainer);
        this.registerBasicEvents(this.getForm());
        this.registerEventForImageDelete();
        this.registerImageChangeEvent();
        this.registerValidation();
        app.event.trigger('post.editView.load', editViewContainer);
        this.registerPageLeaveEvents();
    }
});
