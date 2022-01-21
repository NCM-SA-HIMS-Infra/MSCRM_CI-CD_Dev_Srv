/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

Settings_Vtiger_Index_Js("Settings_ITS4YouFieldMapping_Edit_Js", {
    name: jQuery('[name="Name"]'),
    registerSubmitButton: function () {
        let self = this,
            name = self.name;
        jQuery('#EditView').on('submit', function (e) {

            if (!name.val()) {
                e.preventDefault();
                name.addClass('input-error');
            }
        });
    },
    nameIsEmpty: function () {
        let self = this,
            name = self.name;

        name.on('input', function () {
            if (!name.val()) {
                name.addClass('input-error');
            } else {
                name.removeClass('input-error');
            }
        });
    },
    registerEvents: function () {
        this._super();
        this.nameIsEmpty();
        this.registerSubmitButton();
    }
});
