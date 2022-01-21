/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

Settings_Vtiger_Index_Js("Settings_ITS4YouFieldMapping_List_Js", {

    registerSubmitButton: function () {
        jQuery('.btn-success').on('click', function (e) {
            let form = jQuery('#langAndModulForm'),
                formData = form.serializeFormData();

            window.location.href = "index.php?module=ITS4YouFieldMapping&parent=Settings&view=Edit&lang=" + formData["language"] + "&moduleId=" + formData["module"] + "&block=" + formData["settings_block"] + "&fieldid=" + formData["settings_fieldid"];
        });
    },
    registerDeleteRecord: function () {
        jQuery('.deleteRecordButton').on('click', function () {
            let link = jQuery(this),
                data = link.data(),
                url = {
                    'module': 'ITS4YouFieldMapping',
                    'parent': 'Settings',
                    'action': 'Delete',
                    'record': data.id
                },
                message = {
                    message: app.vtranslate('JS_DELETEMAPPING_QUESTION'),
                };

            app.helper.showConfirmationBox(message).then(function () {
                AppConnector.request(url).then(function (data) {
                    if (data.success) {
                        link.parents('tr').hide();
                        console.log(data);
                        Vtiger_Helper_Js.showPnotify({
                            type: 'success',
                            title: data.result.message,
                        });
                    }
                })
            });
        });
    },
    init: function () {
        this.registerDeleteRecord();
        this.registerSubmitButton();
    }
});