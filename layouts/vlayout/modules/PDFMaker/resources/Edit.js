/*********************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
Vtiger_Edit_Js("PDFMaker_Edit_Js",{

    duplicateCheckCache : {},
    advanceFilterInstance : false,
    formElement : false,

    getForm : function(){
        if(this.formElement == false){
                this.setForm(jQuery('#EditView'));
        }
        return this.formElement;
    },
    setForm : function(element){
        this.formElement = element;
        return this;
    },    
    checkDuplicateTemplateName : function(params){        
	var aDeferred = jQuery.Deferred();	
        AppConnector.request(params).then(
                function(data) {
                        var response = data['result'];
                        var result = response['success'];
                        if(result == true) {
                                aDeferred.reject(response);
                        } else {
                                aDeferred.resolve(response);
                        }
                },
                function(error,err){
                        aDeferred.reject();
                }
        );
        return aDeferred.promise();
    },    
    calculateValues : function(){
        if(this.advanceFilterInstance) {
            var advfilterlist = this.advanceFilterInstance.getValues();
            jQuery('#advanced_filter').val(JSON.stringify(advfilterlist));
        }
    },
    registerRecordPreSaveEvent : function(form){
        var thisInstance = this;
        if(typeof form == 'undefined'){
                form = this.getForm();
        }
		
        form.on(Vtiger_Edit_Js.recordPreSave, function(e, data){

            var template_name =jQuery("#filename").val();
            var template_id = jQuery("#templateid").val();
            var error = 0;
            if (template_name == ""){
                alert(app.vtranslate("LBL_PDF_NAME") + app.vtranslate('CANNOT_BE_EMPTY'));
                error++;
            }
            var pdf_module = jQuery("#modulename").val();
            if (pdf_module == ""){
                alert(app.vtranslate("LBL_MODULE_ERROR"));
                error++;
            }
            if (!PDFMaker_EditJs.ControlNumber('margin_top', true) || !PDFMaker_EditJs.ControlNumber('margin_bottom', true) || !PDFMaker_EditJs.ControlNumber('margin_left', true) || !PDFMaker_EditJs.ControlNumber('margin_right', true)){
                error++;
            }
            if (!PDFMaker_EditJs.CheckCustomFormat()){
                error++;
            }
            if (!PDFMaker_EditJs.CheckSharing()){
                error++;
            }
            if (error == 0){       
                moduleName = app.getModuleName();

                var params = {
                'module' : moduleName,
                'action' : "IndexAjax",
                'mode' : "CheckDuplicateTemplateName",
                'templatename' : template_name,
                'templateid' : template_id
                }

                if(!(template_name in thisInstance.duplicateCheckCache)){
                    thisInstance.checkDuplicateTemplateName(params).then(
                        function(data){
                            thisInstance.duplicateCheckCache[template_name] = data['success'];
                            form.submit();
                        },
                        function(data, err){
                            var message = app.vtranslate('LBL_DUPLICATE_TEMPLATE_CREATION_CONFIRMATION');
                                Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                                    function(e){
                                        thisInstance.duplicateCheckCache[template_name] = false;
                                        form.submit();
                                    },
                                    function(error, err) {
                                    }
                                );
                        }
                    );
                } else {
                    if(thisInstance.duplicateCheckCache[template_name] == true){
                            var message = app.vtranslate('LBL_DUPLICATE_TEMPLATE_CREATION_CONFIRMATION');
                            Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                                    function(e) {
                                            thisInstance.duplicateCheckCache[template_name] = false;
                                            form.submit();
                                    },
                                    function(error, err) {

                                    }
                            );
                    } else {
                            delete thisInstance.duplicateCheckCache[template_name];
                            return true;
                    }
                }
            } 
            e.preventDefault();
        })
    },    
    registerBasicEvents: function(container){
        this._super(container);
        this.registerRecordPreSaveEvent();
    },    
    registerSubmitEvent: function(){
        var thisInstance = this;
        var editViewForm = this.getForm();

        editViewForm.submit(function(e){

            //Form should submit only once for multiple clicks also
            if(typeof editViewForm.data('submit') != "undefined"){
                    return false;
            } else {
                thisInstance.calculateValues();
                editViewForm.data('submit', 'true');
                //on submit form trigger the recordPreSave event
                var recordPreSaveEvent = jQuery.Event(Vtiger_Edit_Js.recordPreSave);
                editViewForm.trigger(recordPreSaveEvent, {'value' : 'edit'});
                if(recordPreSaveEvent.isDefaultPrevented()) {
                        //If duplicate record validation fails, form should submit again
                        editViewForm.removeData('submit');
                        e.preventDefault();
                }
            }
        });
    },
    
    registerSelectModuleOption : function() {
        var thisInstance = this;
        var selectElement = jQuery('[name="modulename"]');
        selectElement.on('change', function() {
            
            if (selected_module != '') {
                question = confirm(app.vtranslate("LBL_CHANGE_MODULE_QUESTION"));
                if (question) {
                    var oEditor = CKEDITOR.instances.body;
                    oEditor.setData("");
                    oEditor = CKEDITOR.instances.header_body;
                    oEditor.setData("");
                    oEditor = CKEDITOR.instances.footer_body;
                    oEditor.setData("");
                    jQuery("#nameOfFile").val('');
                } else {
                    selectElement.val(selected_module);
                    
                    app.destroyChosenElement(selectElement);
                    var formElement = thisInstance.getForm();
                    app.changeSelectElementView(formElement); 
                    return;
                }
            }   
            
            var selectedOption = selectElement.find('option:selected');
            var moduleName = selectedOption.val();

            thisInstance.getFields(moduleName,"modulefields","");
            thisInstance.updateModuleConditions(moduleName);
            
            PDFMaker_EditJs.fill_module_lang_array(moduleName);
            PDFMaker_EditJs.fill_related_blocks_array(moduleName);
            PDFMaker_EditJs.fill_module_product_fields_array(moduleName);
        });		
    },
    
    updateModuleConditions : function(moduleName) {
            var params = {
                            module : app.getModuleName(),
                            view : 'IndexAjax',
                            source_module : moduleName,
                            mode : 'getModuleConditions'
            }
            var actionParams = {
                "type": "POST",
                "url": 'index.php',
                "dataType": "html",
                "data": params
            };
            AppConnector.request(actionParams).then(function(data){
                    jQuery('#advanceFilterContainer').html(data);

                    var container = jQuery('#display_div');
                    this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
                    
                    jQuery("#display_tab").show();
            });
    },    
    
    registerSelectRelatedModuleOption : function() {
        var thisInstance = this;
        var selectElement = jQuery('[name="relatedmodulesorce"]');
        selectElement.on('change', function() {
            var selectedOption = selectElement.find('option:selected');
            var moduleName = selectedOption.data('module');
            var fieldName = selectedOption.val();
            
            thisInstance.getFields(moduleName,"relatedmodulefields",fieldName);
        });		
    },
    
    getFields : function(moduleName,selectname,fieldName) {
        var thisInstance = this;
        

        var urlParams = {
            "module": "PDFMaker",
            "formodule" : moduleName,
            "forfieldname" : fieldName,
            "action" : "IndexAjax",
            "mode" : "getModuleFields"            
        }

        AppConnector.request(urlParams).then(
            function(data){
                thisInstance.updateFields(data,selectname);
            }      
        );
    },
    
    updateFields: function(data,selectname){
        var thisInstance = this;
        var response = data['result'];
        var result = response['success'];
        var formElement = this.getForm();
        
        if(result == true) {

            var ModuleFieldsElement = jQuery('#'+selectname);
            ModuleFieldsElement.find('option:not([value=""]').remove();
            
            if (selectname == "filename_fields") {
            
                jQuery.each(response['filename_fields'], function (i, fields) {

                    var optgroup = jQuery('<optgroup/>');
                    optgroup.attr('label',i);

                    jQuery.each(fields, function (key, field) {

                        optgroup.append(jQuery('<option>', { 
                            value: key,
                            text : field 
                        }));
                    })

                    ModuleFieldsElement.append(optgroup);
                });                   
            }
            
            
            jQuery.each(response['fields'], function (i, fields) {

                var optgroup = jQuery('<optgroup/>');
                optgroup.attr('label',i);

                jQuery.each(fields, function (key, field) {

                    optgroup.append(jQuery('<option>', { 
                        value: key,
                        text : field 
                    }));
                })

                ModuleFieldsElement.append(optgroup);
            });

            app.destroyChosenElement(ModuleFieldsElement);

            if (selectname == "modulefields") {                        

                var RelatedModuleSourceElement = jQuery('#relatedmodulesorce');
                RelatedModuleSourceElement.find('option:not([value=""]').remove();
                jQuery.each(response['related_modules'], function (i, item) {

                    RelatedModuleSourceElement.append(jQuery('<option>', { 
                        value: item[0],
                        text : item[2] + " (" + item[1] + ")",
                    }).data("module",item[3]));
                });

                app.destroyChosenElement(RelatedModuleSourceElement);
                
                thisInstance.updateFields(data,"filename_fields");
            } 

            if (selectname != "filename_fields") app.changeSelectElementView(formElement); 
        }
    },
    
    registerEvents: function(){
        var editViewForm = this.getForm();
        var statusToProceed = this.proceedRegisterEvents();
        if(!statusToProceed){
                return;
        }

        var container = jQuery('#display_div');
        if (container.length > 0){
            this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
            container.hide();
        }

        this.registerBasicEvents(this.getForm());
        this.registerSelectModuleOption();
        this.registerSelectRelatedModuleOption();
        this.registerSubmitEvent();

        if (typeof this.registerLeavePageWithoutSubmit == 'function'){
            this.registerLeavePageWithoutSubmit(editViewForm);
        }             
    }
});
if (typeof(PDFMaker_EditJs) == 'undefined') {
    /*
     * Namespaced javascript class for Import
     */
    PDFMaker_EditJs = {
        reportsColumnsList : false,
        advanceFilterInstance : false,
        
        clearRelatedModuleFields: function() {
            second = document.getElementById("relatedmodulefields");
            lgth = second.options.length - 1;
            second.options[lgth] = null;
            if (second.options[lgth])
                optionTest = false;
            if (!optionTest)
                return;
            var box2 = second;
            var optgroups = box2.childNodes;
            for (i = optgroups.length - 1; i >= 0; i--) {
                box2.removeChild(optgroups[i]);
            }

            objOption = document.createElement("option");
            objOption.innerHTML = app.vtranslate("LBL_SELECT_MODULE_FIELD");
            objOption.value = "";
            box2.appendChild(objOption);
        },
        change_relatedmodule: function(first, second_name) {
            second = document.getElementById(second_name);
            optionTest = true;
            lgth = second.options.length - 1;
            second.options[lgth] = null;
            if (second.options[lgth])
                optionTest = false;
            if (!optionTest)
                return;
            var box = first;
            var number = box.options[box.selectedIndex].value;
            if (!number)
                return;
            var box2 = second;
            //box2.options.length = 0;

            var optgroups = box2.childNodes;
            for (i = optgroups.length - 1; i >= 0; i--) {
                box2.removeChild(optgroups[i]);
            }

            if (number == "none") {
                objOption = document.createElement("option");
                objOption.innerHTML = app.vtranslate("LBL_SELECT_MODULE_FIELD");
                objOption.value = "";
                box2.appendChild(objOption);
            } else {
                var tmpArr = number.split('|', 2);
                var moduleName = tmpArr[0];
                number = tmpArr[1];
                var blocks = module_blocks[moduleName];
                for (b = 0; b < blocks.length; b += 2) {
                    var list = related_module_fields[moduleName + '|' + blocks[b + 1]];
                    if (list.length > 0) {

                        optGroup = document.createElement('optgroup');
                        optGroup.label = blocks[b];
                        box2.appendChild(optGroup);
                        for (i = 0; i < list.length; i += 2) {
                            objOption = document.createElement("option");
                            objOption.innerHTML = list[i];
                            var objVal = list[i + 1];
                            var newObjVal = objVal.replace(moduleName.toUpperCase() + '_', number.toUpperCase() + '_');
                            objOption.value = newObjVal;
                            optGroup.appendChild(objOption);
                        }
                    }
                }
            }
        },
        change_acc_info: function(element){            
            jQuery('.au_info_div').css('display','none');            
            switch (element.value){
                case "Assigned":
                    var div_name = 'user_info_div';
                    break;
                case "Logged":
                    var div_name = 'logged_user_info_div';
                    break;
                case "Modifiedby":
                    var div_name = 'modifiedby_user_info_div';
                    break; 
                case "Creator":
                    var div_name = 'smcreator_user_info_div';
                    break; 
                default:
                    var div_name = 'acc_info_div';
                    break;
            }            
            jQuery('#'+div_name).css('display','inline');
        },
        savePDF: function() {

            var error = 0;

            if (!PDFMaker_EditJs.ControlNumber('margin_top', true) || !PDFMaker_EditJs.ControlNumber('margin_bottom', true) || !PDFMaker_EditJs.ControlNumber('margin_left', true) || !PDFMaker_EditJs.ControlNumber('margin_right', true)) {
                error++;
            }

            if (!PDFMaker_EditJs.CheckCustomFormat()) {
                error++;
            }

            if (error > 0)
                return false;
            else
                return true;
        },
        ControlNumber: function(elid, final)
        {
            var control_number = document.getElementById(elid).value;
            var re = new Array();
            re[1] = new RegExp("^([0-9])");
            re[2] = new RegExp("^[0-9]{1}[.]$");
            re[3] = new RegExp("^[0-9]{1}[.][0-9]{1}$");
            if (control_number.length > 3 || !re[control_number.length].test(control_number) || (final == true && control_number.length == 2)) {
                alert(app.vtranslate("LBL_MARGIN_ERROR"));
                document.getElementById(elid).focus();
                return false;
            } else {
                return true;
            }

        },
        showHideTab: function(tabname)
        {
            
            document.getElementById(selectedTab + '_tab').className = "";
            document.getElementById(tabname + '_tab').className = 'active';
            document.getElementById(selectedTab + '_div').style.display = 'none';
            document.getElementById(tabname + '_div').style.display = '';
            var formerTab = selectedTab;
            selectedTab = tabname;
        },
        showHideTab2: function(tabname)
        {
            document.getElementById(selectedTab2 + '_tab2').className = "dvtUnSelectedCell";
            document.getElementById(tabname + '_tab2').className = 'dvtSelectedCell';
            if (tabname == 'body') {
                document.getElementById('body_variables').style.display = '';
                if (document.getElementById('headerfooter_div').style.display == 'block')
                    PDFMaker_EditJs.showHideTab('properties');
            } else {
                document.getElementById('header_variables').style.display = '';
                document.getElementById('body_variables').style.display = 'none';
                if (document.getElementById('headerfooter_div').style.display == 'none')
                    PDFMaker_EditJs.showHideTab('headerfooter');
            }

            document.getElementById(selectedTab2 + '_div2').style.display = 'none';
            document.getElementById(tabname + '_div2').style.display = 'block';
            var module = document.getElementById('modulename').value;
            var formerTab = selectedTab2;
            selectedTab2 = tabname;
        },
        showHideTab3: function(tabname) {
            document.getElementById(selectedTab2 + '_tab2').className = "";
            document.getElementById(tabname + '_tab2').className = 'active';
            if (tabname == 'body') {
                document.getElementById('body_variables').style.display = '';
                if (document.getElementById('headerfooter_div').style.display == 'block')
                    PDFMaker_EditJs.showHideTab('properties');
            } else {
                document.getElementById('header_variables').style.display = '';
                document.getElementById('body_variables').style.display = 'none';
                if (document.getElementById('headerfooter_div').style.display == 'none')
                    PDFMaker_EditJs.showHideTab('headerfooter');
            }

            document.getElementById(selectedTab2 + '_div2').style.display = 'none';
            document.getElementById(tabname + '_div2').style.display = 'block';
            var module = document.getElementById('modulename').value;
            var formerTab = selectedTab2;
            selectedTab2 = tabname;
        },
        
        refresh_related_blocks_array: function(selected)
        {
            var module = document.getElementById('modulename').value;
            PDFMaker_EditJs.fill_related_blocks_array(module, selected);
        },
        CustomFormat: function()
        {
            var selObj;
            selObj = document.getElementById('pdf_format');

            if (selObj.value == 'Custom')
            {
                document.getElementById('custom_format_table').style.display = 'table';
            }
            else
            {
                document.getElementById('custom_format_table').style.display = 'none';
            }
        },
        hf_checkboxes_changed: function(oChck, oType)
        {
            var prefix;
            var optionsArr;
            if (oType == 'header')
            {
                prefix = 'dh_';
                optionsArr = new Array('allid', 'firstid', 'otherid');
            }
            else
            {
                prefix = 'df_';
                optionsArr = new Array('allid', 'firstid', 'otherid', 'lastid');
            }

            var tmpArr = oChck.id.split("_");
            var sufix = tmpArr[1];
            var i;
            if (sufix == 'allid')
            {
                for (i = 0; i < optionsArr.length; i++)
                {
                    document.getElementById(prefix + optionsArr[i]).checked = oChck.checked;
                }
            }
            else
            {
                var allChck = document.getElementById(prefix + 'allid');
                var allChecked = true;
                for (i = 1; i < optionsArr.length; i++)
                {
                    if (document.getElementById(prefix + optionsArr[i]).checked == false)
                    {
                        allChecked = false;
                        break;
                    }
                }
                allChck.checked = allChecked;
            }
        },
        CheckCustomFormat: function() {
            if (document.getElementById('pdf_format').value == 'Custom') {
                var pdfWidth = document.getElementById('pdf_format_width').value;
                var pdfHeight = document.getElementById('pdf_format_height').value;
                if (pdfWidth > 2000 || pdfHeight > 2000 || pdfWidth < 100 || pdfHeight < 100 || isNaN(pdfWidth) || isNaN(pdfHeight)) {
                    alert(app.vtranslate('LBL_CUSTOM_FORMAT_ERROR'));
                    document.getElementById('pdf_format_width').focus();
                    return false;
                }
            }
            return true;
        }
    }    
}