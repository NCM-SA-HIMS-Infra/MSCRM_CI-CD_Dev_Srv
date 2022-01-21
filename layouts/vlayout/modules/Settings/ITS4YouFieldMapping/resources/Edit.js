/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

jQuery.Class("Settings_ITS4YouFieldMapping_Edit_Js", {
    registerSubmitButton: function () {
        jQuery('.btn-success').on('click', function (e) {
            var form = jQuery('#EditRecord');
            var data = form.serializeFormData();
        });
    },
    registerLinkLabelChange: function () {
        jQuery('select[name="linkactiontype"]').on('change', function (e) {
            var linkActionType = jQuery(this).val();
            if ('ADDINTO' === linkActionType) {
                jQuery('#addIntoSpan').removeClass('hide');
            } else {
                jQuery('#addIntoSpan').addClass('hide');
            }
        });
    },
    registerEvents: function () {
        this.registerSubmitButton();
        this.registerLinkLabelChange();
    }
});

jQuery(document).ready(function () {
    var editInstance = new Settings_ITS4YouFieldMapping_Edit_Js();
    editInstance.registerEvents();
    jQuery('select[name="linkactiontype"]').trigger("change");
});
