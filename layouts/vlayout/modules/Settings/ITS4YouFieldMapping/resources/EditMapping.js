/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

Settings_Vtiger_Index_Js("Settings_ITS4YouFieldMapping_EditMapping_Js", {}, {
    fieldsForControl: jQuery('#fieldsControl').data('value'),

    deleteMapping: function (mappingId) {
        let recordId = jQuery("#recordId").val(),
            actionParams = {
                'module': 'ITS4YouFieldMapping',
                'action': 'DeleteMapping',
                'parent': 'Settings',
                'mappingId': mappingId,
                'recordId': recordId,
            };

        AppConnector.request(actionParams).then(function (data) {
            if (true === data.success) {
                let result = data.result;

                if (true === result.result) {
                    Vtiger_Helper_Js.showPnotify({title: result.message});
                }
            }
        });
    },
    registerEventForAddingNewMapping: function () {
        let self = this;

        jQuery('#addMapping').on('click', function (e) {
            let convertMappingTable = jQuery('#convertFieldMapping'),
                lastSequenceNumber = convertMappingTable.find('tr:last[sequence-number]').attr('sequence-number');

            if (lastSequenceNumber === undefined)
                lastSequenceNumber = 1;

            let newSequenceNumber = parseInt(lastSequenceNumber) + 1,
                newMapping = jQuery('.newMapping').clone(true, true);

            newMapping.attr('sequence-number', newSequenceNumber);
            newMapping.find('select.firstModuleFields.newSelect').attr("name", 'mapping_' + newSequenceNumber + '[firstModule]');
            newMapping.find('select.secondModuleFields.newSelect').attr("name", 'mapping_' + newSequenceNumber + '[secondModule]');
            newMapping.removeClass('hide newMapping');
            newMapping.appendTo(convertMappingTable);
            newMapping.find('.newSelect').removeClass('newSelect').addClass('select2');

            let select2Elements = newMapping.find('.select2');
            app.showSelect2ElementView(select2Elements);
            jQuery('select.secondModuleFields.select2', newMapping).trigger('change', false);
        });
    },

    registerEventToDeleteMapping: function () {
        let self = this,
            form = jQuery('#editMappingForm');

        form.on('click', '.deleteMapping', function (e) {
            let del = jQuery(this),
                id = del.data('id'),
                message = app.vtranslate('LBL_DELETE_CONFIRMATION');

            Vtiger_Helper_Js.showConfirmationBox({'message': message}).then(function () {

                let element = jQuery(e.currentTarget),
                    mappingContainer = element.closest('tr');

                if (id) {
                    self.deleteMapping(id);
                }

                mappingContainer.remove();
                self.alertControl();
            });
        });
    },
    rowControl: function (tr) {
        let self = this,
            types = false,
            selects = tr.find('select'),
            /*source uitype - target uitype*/
            allowedUi = ['2551', '551', '211', '851', '717', '117', '3316', '242', '7172', '7271'],
            allowedPopUp = ['10', '51', '57', '58', '59', '66', '68', '73', '75', '76', '78', '80', '81',],
            allowedDate = ['5', '23'],
            allowedAll = ['1', '2', '19', '21', '24', '55', '85', '255',],
            allowedTypes = ['IV1010', 'DD523'],
            deniedTypes = ['NV717', 'IV717'];

        if (selects.length === 2) {
            let source = jQuery(selects).filter('.sourceFields'),
                target = jQuery(selects).filter('.targetFields'),
                value0 = jQuery(target).val(),
                value1 = jQuery(source).val(),
                fields = self.fieldsForControl,
                field0 = fields[value0],
                field1 = fields[value1];

            if (field0 && field1) {
                let type1 = field0.typeofdata[0],
                    type2 = field1.typeofdata[0],
                    ui1 = field0.uitype,
                    ui2 = field1.uitype;

                let deniedControl = deniedTypes.indexOf(type1 + type2 + ui1 + ui2) + 1,
                    allowedControl = allowedTypes.indexOf(type1 + type2 + ui1 + ui2) + 1,
                    controlAll = allowedAll.indexOf(ui1) + 1,
                    controlUi = allowedUi.indexOf(ui1 + ui2) + 1,
                    controlPopUp1 = allowedPopUp.indexOf(ui1) + 1,
                    controlPopUp2 = allowedPopUp.indexOf(ui2) + 1,
                    controlDate1 = allowedDate.indexOf(ui1) + 1,
                    controlDate2 = allowedDate.indexOf(ui2) + 1;

                if (deniedControl) {
                    types = true;
                } else if (allowedControl || controlAll || controlUi) {
                } else if (controlDate1 && controlDate2) {
                } else if (controlPopUp2 && controlPopUp1) {
                } else if (ui1 === ui2 && type1 === type2) {
                } else {
                    types = true;
                }

                if (types) {
                    console.log(type1 + type2 + ui1 + ui2);
                }
            }

            if (types) {

                jQuery(tr).find('.select2-choice').addClass('input-error');
            }
        }

        return types;
    },
    duplicateOptions: function () {
        let result = false,
            options = jQuery('.duplicateControl').find('.targetFields option:selected'),
            values = [];

        console.log(options);

        jQuery('.select2-container').removeClass('input-error');
        options.each(function () {
            let value = jQuery(this).val();

            if (values[value]) {
                if (value) {
                    options.filter('[value="' + value + '"]').parents('td').find('.select2-container').addClass('input-error');
                    result = true;
                }
            } else {
                values[value] = true;
            }
        });

        return result;
    },
    fieldsControl: function () {
        let result = false,
            self = this;

        jQuery('.select2-choice').removeClass('input-error');
        jQuery('tbody .listViewEntries').each(function () {
            let tr = jQuery(this);

            if (self.rowControl(tr)) {
                result = true;
            }
        });

        return result;
    },
    alertControl: function () {
        let self = this,
            result = false,
            title = '';

        if (self.duplicateOptions()) {
            title += app.vtranslate('JS_DUPLICATE_FIELDS') + '<br>';
        }
        if (self.fieldsControl()) {
            title += app.vtranslate('JS_DIFERENT_DATATYPES') + '<br>';
        }
        if (title) {
            result = true;
            Vtiger_Helper_Js.showPnotify({
                type: 'error',
                title: title,
            });
        }

        return result;
    },
    registerEventOnChangeSelect: function () {
        let self = this;
        self.alertControl();

        jQuery('.select2').on('change', function () {
            self.alertControl();
        });
    },
    registerSubmitEvent: function () {
        let self = this;

        jQuery('#editMappingForm').on('submit', function (e) {
            if (self.alertControl()) {
                e.preventDefault();
            }
        });
    },
    registerEvents: function () {

        this.registerEventForAddingNewMapping();
        this.registerEventToDeleteMapping();
        this.registerEventOnChangeSelect();
        this.registerSubmitEvent();
    }
}, {});