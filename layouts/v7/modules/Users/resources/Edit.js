/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Vtiger_Edit_Js("Users_Edit_Js",{},{
	
	
	duplicateCheckCache : {},
	/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 Start*/
	count : 0,
	userLimits : 20,
	/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 End*/
    
	/**
	 * Function to register recordpresave event
	 */
	registerRecordPreSaveEvent : function(form){
		var thisInstance = this;
		app.event.on(Vtiger_Edit_Js.recordPresaveEvent, function(e, data) {
			var userName = jQuery('input[name="user_name"]').val();
			var newPassword = jQuery('input[name="user_password"]').val();
			var confirmPassword = jQuery('input[name="confirm_password"]').val();
			var record = jQuery('input[name="record"]').val();
            var firstName = jQuery('input[name="first_name"]').val();
            var lastName = jQuery('input[name="last_name"]').val();
            var specialChars = /[<\>\"\,]/;
            if((specialChars.test(firstName)) || (specialChars.test(lastName))) {
                app.helper.showErrorNotification({message :app.vtranslate('JS_COMMA_NOT_ALLOWED_USERS')});
                e.preventDefault();
                return false;
            }
			var firstName = jQuery('input[name="first_name"]').val();
			var lastName = jQuery('input[name="last_name"]').val();
			/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 Start*/
			const count = 0;
			/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 End*/
			if((firstName.indexOf(',') !== -1) || (userName.indexOf(',') !== -1)) {
                app.helper.showErrorNotification({message :app.vtranslate('JS_COMMA_NOT_ALLOWED_USERS')});
				e.preventDefault();
				return false;
			}
			if(record == ''){
				if(newPassword != confirmPassword){
                    app.helper.showErrorNotification({message :app.vtranslate('JS_REENTER_PASSWORDS')});
					e.preventDefault();
				}

                if( !(userName in thisInstance.duplicateCheckCache) ) {//thetphyo
                    e.preventDefault();
                    thisInstance.checkDuplicateUser(userName).then(
                        function(data,error){
                            thisInstance.duplicateCheckCache[userName] = data;

                            /*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 Start*/
                            /*form.submit();*/
                            thisInstance.checkUserLimit().then(
		                		function(data,error){
			                        thisInstance.count = parseInt(data);
			                        if(thisInstance.count >= parseInt(thisInstance.userLimits)){
				                        app.helper.showErrorNotification({message :app.vtranslate('JS_USER_LIMITS')});
				                        e.preventDefault();
			                    	}else{
			                    		form.submit();
			                    	}
			                    }
			                );
			                /*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 End*/

                        }, 
                        function(data){
                            if(data) {
                                thisInstance.duplicateCheckCache[userName] = data;
                                app.helper.showErrorNotification({message :app.vtranslate('JS_USER_EXISTS')});
                            } 
                        }
                    );
                } else {
                    if(thisInstance.duplicateCheckCache[userName] == true){
                        app.helper.showErrorNotification({message :app.vtranslate('JS_USER_EXISTS')});
                        e.preventDefault();
                    } else {
                        delete thisInstance.duplicateCheckCache[userName];
                        /*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 Start*/
                        thisInstance.count = thisInstance.userLimits;
                        /*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 End*/
                        return true;
                    }
                }
            }
        })
	},
	
	checkDuplicateUser: function(userName){
		var aDeferred = jQuery.Deferred();
		var params = {
				'module': app.getModuleName(),
				'action' : "SaveAjax",
				'mode' : 'userExists',
				'user_name' : userName
			}
		app.request.post({data:params}).then(
				function(err,data) {
					if(data){
						aDeferred.resolve(data);
					}else{
						aDeferred.reject(data);
					}
				}
			);
		return aDeferred.promise();
	},

	/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 Start*/
	checkUserLimit: function(){
		var aDeferred = jQuery.Deferred();
		var params = {
				'module': app.getModuleName(),
				'action' : "SaveAjax",
				'mode' : 'userLimits'
			}
		app.request.post({data:params}).then(
				function(err,data) {
					if(data){
						aDeferred.resolve(data);
					}else{
						aDeferred.reject(data);
					}
				}
			);
		return aDeferred.promise();
	},
	/*2020-10-15 Thet Phyo Wai User Limitation MSCRM Ver 1.0 End*/
	
	/**
	 * Function load the ckeditor for signature field in edit view of my preference page.
	 */
	registerSignatureEvent: function(){
		var templateContentElement = jQuery("#Users_editView_fieldName_signature");
		if(templateContentElement.length > 0) {
			var ckEditorInstance = new Vtiger_CkEditor_Js();
			//Customized toolbar configuration for ckeditor  
			//to support basic operations
			var customConfig = {
				toolbar: [
					{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','align','list', 'indent','colors' ,'links'], items: [ 'Bold', 'Italic', 'Underline', '-','TextColor', 'BGColor' ,'-','JustifyLeft', 'JustifyCenter', 'JustifyRight', '-', 'NumberedList', 'BulletedList','-', 'Link', 'Unlink','Image','-','RemoveFormat'] },
					{ name: 'styles', items: ['Font', 'FontSize' ] },
                    {name: 'document', items:['Source']}
				]};
			ckEditorInstance.loadCkEditor(templateContentElement,customConfig);
		}
	},
	
	registerEvents : function() {
        this._super();
		var form = this.getForm();
		this.registerRecordPreSaveEvent(form);
        this.registerSignatureEvent();
        Settings_Users_PreferenceEdit_Js.registerChangeEventForCurrencySeparator();
        
        var instance = new Settings_Vtiger_Index_Js(); 
        instance.registerBasicSettingsEvents();
	}
});

// Actually, Users Module is in Settings. Controller in application.js will check for Settings_Users_Edit_Js 
Users_Edit_Js("Settings_Users_Edit_Js");