/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

Settings_Vtiger_Index_Js("Settings_ITS4YouFieldMapping_DetailView_Js", {
    recordId: jQuery('[name="recordId"]').val(),
    registerEditButtonEvent: function () {
        jQuery('.btn-primary').on('click', function (e) {
            window.location.href = "index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditRecord&recordId=" + jQuery('#recordId').val();
        });
    },
    deleteLink: function () {
        let self = this;

        jQuery('.links .deleteLink').on('click', function () {
            let link = jQuery(this),
                data = link.parents('tr').data(),
                url = 'index.php?module=ITS4YouFieldMapping&parent=Settings&action=DeleteLink&recordId=' + self.recordId + '&linkId=' + data.id;

            Vtiger_Helper_Js.showConfirmationBox({message: app.vtranslate('JS_DELETELINK_QUESTION')}).then(function () {
                window.location.href = url;
            });

        });
    },
    convertLink: function () {
        let self = this;

        jQuery('.links .relationAdd').on('click', function () {
            let link = jQuery(this),
                parent = link.parents('tr'),
                data = parent.data(),
                url = 'index.php?module=ITS4YouFieldMapping&parent=Settings&action=SaveLink&recordId=' + self.recordId + '&linkId=' + data.id;

            Vtiger_Helper_Js.showConfirmationBox({message: app.vtranslate('JS_CONVERLINK_QUESTION')}).then(function () {
                window.location.href = url;
            });
        });
    },
    hideMapping: function () {
        let len = jQuery('.links.convert:visible').length;

        if (len === 0) {
            jQuery('#AddMapping').hide();
        }
    },
    init: function () {
        this.deleteLink();
        this.convertLink();
        this.registerEditButtonEvent();
    }
});
