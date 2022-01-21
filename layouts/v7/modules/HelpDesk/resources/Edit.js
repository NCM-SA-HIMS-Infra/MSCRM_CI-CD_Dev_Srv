/*2020-09-21 Thet Phyo Wai Update Ticket Module MSCRM Ver 1.0 Add Edit.js*/
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Vtiger_Edit_Js("HelpDesk_Edit_Js", {} ,{

    registerEventForOnSite : function() {
        var thisInstance = this;
        var form = this.getForm();
        var supportType = form.find('[name="support_type"]');
        var ticketStatus = form.find('[name="ticketstatus"]');
        var fieldNamesForValidation = new Array('engineer_name','customer_name');
        var selectors = new Array();
        for(var index in fieldNamesForValidation) {
            selectors.push('[name="'+fieldNamesForValidation[index]+'"]');
        }
        var selectorString = selectors.join(',');
        var validationToggleFields = form.find(selectorString);
        supportType.on('change',function(e){
            var element = jQuery(e.currentTarget);
            var addValidation;
            if(element.val() == "On Site" && ticketStatus.val() == "Closed"){
                addValidation = true;
            }else{
                addValidation = false;
            }
            
            //If validation need to be added for new elements,then we need to detach and attach validation
            //to form
            if(addValidation){
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
            }else{
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
            }
        })
        ticketStatus.on('change',function(e){
            var element = jQuery(e.currentTarget);
            var addValidation;
            if(supportType.val() == "On Site" && element.val() == "Closed"){
                addValidation = true;
            }else{
                addValidation = false;
            }
            
            //If validation need to be added for new elements,then we need to detach and attach validation
            //to form
            if(addValidation){
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
            }else{
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
            }
        })
        if(supportType.val() == "On Site" && ticketStatus.val() == "Closed"){
            thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
        }else{
            thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
        }
    },

    registerEventForWIPAndClose : function() {
        var thisInstance = this;
        var form = this.getForm();
        var ticketstatus = form.find('[name="ticketstatus"]');
        var fieldNamesForValidation = new Array('machine_serial_no_display');
        var selectors = new Array();
        for(var index in fieldNamesForValidation) {
            selectors.push('[name="'+fieldNamesForValidation[index]+'"]');
        }
        var selectorString = selectors.join(',');
        var validationToggleFields = form.find(selectorString);
        ticketstatus.on('change',function(e){
            var element = jQuery(e.currentTarget);
            var addValidation;
            if(element.val() == "WIP"  || element.val() == "Closed"){
                addValidation = true;
            }else{
                addValidation = false;
            }
            
            //If validation need to be added for new elements,then we need to detach and attach validation
            //to form
            if(addValidation){
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
            }else{
                thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
            }
        })
        if(ticketstatus.val() == "WIP" || ticketstatus.val() == "Closed"){
            thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
        }else{
            thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
        }
    },

    AddOrRemoveRequiredValidation : function(dependentFieldsForValidation, addValidation) {
        jQuery(dependentFieldsForValidation).each(function(key,value){
            var relatedField = jQuery(value);
            if(addValidation) {
                relatedField.removeClass('ignore-validation').data('rule-required', true);
            } else if(!addValidation) {
                relatedField.addClass('ignore-validation').removeAttr('data-rule-required');
                relatedField.removeClass('input-error');
            }
        });
    },

    /*2020-12-07 Thet Phyo Wai Machine Serail No Readonly After Remove MSCRM Start*/
    registerMachineSerialNoClearEvent : function(container) {
         container.on('click', '.clearReferenceSelection',function(e){  
            var element = jQuery(e.currentTarget);
            var parentTdElement = element.closest('td');
            var inputElement = parentTdElement.find('.inputElement');
            var fieldName = parentTdElement.find('.sourceField').attr("name");
            if(fieldName == "machine_serial_no"){
                inputElement.attr('readonly', true);
            }
        });
    },
    /*2020-12-07 Thet Phyo Wai Machine Serail No Readonly After Remove MSCRM End*/
    
    registerBasicEvents : function(container) {
        this._super(container);
        this.registerEventForOnSite();
        this.registerEventForWIPAndClose();
        /*2020-12-07 Thet Phyo Wai Machine Serail No Readonly After Remove MSCRM Start*/
        this.registerMachineSerialNoClearEvent(container);
        /*2020-12-07 Thet Phyo Wai Machine Serail No Readonly After Remove MSCRM End*/
    },
});


