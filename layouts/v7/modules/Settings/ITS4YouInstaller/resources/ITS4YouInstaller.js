/* * *******************************************************************************
 * The content of this file is subject to the ITS4YouInstaller license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

Vtiger_Index_Js("Settings_ITS4YouInstaller_Extensions_Js", {
    showPopover : function(e) {
        let ele = jQuery(e),
            options = {
                placement : ele.data('position'),
                trigger   : 'hover'
            };

        ele.popover(options);
    }
}, {
    showAlert: function(message, success = true) {

        let type = success ? 'success' : 'error',
            params = {
            type: type,
            title: app.vtranslate(message),
        };

        Vtiger_Helper_Js.showPnotify(params)
    },
    getImportModuleIndexParams: function() {
        return {
            'module': app.getModuleName(),
            'parent': app.getParentModuleName(),
            'view': 'Extensions'
        };
    },
    getImportModuleStepView: function(params) {
        let aDeferred = jQuery.Deferred();
        app.helper.showProgress();
        app.request.post({data: params}).then(
                function(error, data) {
                    app.helper.hideProgress();
                    if(error) {
                        aDeferred.reject(error);
                    }
                    aDeferred.resolve(data);
                }
        );
        return aDeferred.promise();
    },
    getContainer : function() {
        return jQuery('.contentsDiv');
    },
    registerEventsForInstaller: function(container) {
        let thisInstance = this;

        jQuery(container).find('.installExtension, .installPaidExtension').on('click', function(e) {
            thisInstance.installExtension(e);
        });

        jQuery(container).find('.renewButton, .buyButton').on('click',function(e){
                let element = jQuery(e.currentTarget);
                let url = element.data('url');
                window.open(url);
                return;
        });

        jQuery('#logoutInstaller').off().on('click', function(e) {
            app.helper.showConfirmationBox({message:'<b>'+app.vtranslate('JS_ARE_YOU_SURE_LOGOUT')+'?</b>'}).then(function(){
                let params = {
                    'module': app.getModuleName(),
                    'parent': app.getParentModuleName(),
                    'action': 'Basic',
                    'mode': 'logoutITS4YouInstaller'
                };

                app.helper.showProgress();
                app.request.post({data: params}).then(function(error, data) {
                    if (!error) {
                        app.helper.hideProgress();
                        app.helper.showSuccessNotification({"message": data.message});

                        location.reload();
                    }
                });
            });
        });

        jQuery('#logintoInstaller, .logintoInstaller').off().on('click', function(e) {

            let loginAccountModal = jQuery(container).find('.loginAccount').clone(true, true);
            loginAccountModal.removeClass('hide');
            app.helper.showProgress();

            let callBackFunction = function(data) {
                app.helper.hideProgress();

                let form = jQuery(data).find('.loginForm'),
                    keyForm = jQuery(data).find('.loginKeyForm'),
                    modalContent = jQuery(data).find('.modal-content');

                thisInstance.registerLoginModalTabEvents(data);

                jQuery(data).find('#saveButton').on('click', function(e2) {
                    let actualTab = modalContent.data('actual-tab');

                    if (actualTab === "accesskeyDiv") {
                        keyForm.submit();
                    } else {
                        form.submit();
                    }
                });

                let params = {
                    submitHandler : function(form){
                        form = jQuery(form);
                        let formData = form.serializeFormData();

                        app.helper.showProgress();
                        app.request.post({data:formData}).then( function(error,data) {
                            app.helper.hideProgress();
                            if (error) {
                                app.helper.showErrorNotification({"message": error});
                            } else {
                                app.helper.hideModal();

                                if(data.success) {
                                    app.helper.showSuccessNotification({"message": data.message});
                                } else {
                                    app.helper.showErrorNotification({"message": data.message});
                                }

                                location.reload();
                            }
                        });
                    }
                };
                form.vtValidate(params);
                keyForm.vtValidate(params);
            };
            
            app.helper.showModal(loginAccountModal,{cb:callBackFunction});
        });

        jQuery(container).off('click', '.oneclickInstallFree');
        jQuery(container).on('click', '.oneclickInstallFree', function(e) {
            var element = jQuery(e.currentTarget);
            var extensionContainer = element.closest('.extension_container');
            var extensionId = extensionContainer.find('[name="extensionId"]').val();
            var moduleAction = extensionContainer.find('[name="moduleAction"]').val();
            var extensionName = extensionContainer.find('[name="extensionName"]').val();

            if(element.hasClass('loginRequired')){
                var loginError = app.vtranslate('JS_PLEASE_LOGIN_TO_MARKETPLACE_FOR_INSTALLING_EXTENSION');
                app.helper.showErrorNotification({"message": loginError});
                return false;
            }

            var question = 'JS_ARE_YOU_SURE_INSTALL';
            if(element.hasClass('isUpdateBtn')){
                question = 'JS_ARE_YOU_SURE_UPGRADE';
            }

            var params = {
                'module': app.getModuleName(),
                'parent': app.getParentModuleName(),
                'view': 'Extensions',
                'mode': 'oneClickInstall',
                'extensionId': extensionId,
                'moduleAction': moduleAction,
                'extensionName': extensionName
            };

            app.helper.showConfirmationBox({message:'<b>'+app.vtranslate(question)+'?</b>'}).then(function(){

                thisInstance.getImportModuleStepView(params).then(function(installationLogData) {
                    var callBackFunction = function(data) {
                        var installationStatus = jQuery(data).find('[name="installationStatus"]').val();

                        if (installationStatus == "success") {
                            element.closest('span').html('<span class="alert alert-info">' + app.vtranslate('JS_INSTALLED') + '</span>');
                            extensionContainer.find('[name="moduleAction"]').val(app.vtranslate('JS_INSTALLED'));
                        }
                    };

                    var modalData = {
                        cb: callBackFunction
                    };
                    app.helper.showModal(installationLogData, modalData);
                });
            });
        });

        jQuery(container).on('click', '#installLoader', function(e) {
            var extensionLoaderModal = jQuery(container).find('.extensionLoader').clone(true, true);
            extensionLoaderModal.removeClass('hide');

            app.showModalWindow(extensionLoaderModal);
        });
    },
    registerLoginModalTabEvents : function(form) {
        var modalContent = form.find('.modal-content');
        var tabElements = modalContent.find('.nav.nav-pills , .nav.nav-tabs').find('a');

        var loginModalTabOnHide = function(tabElement) {
            var container = form.find('#' + tabElement.attr('data-target'));
            container.addClass('hide');
        };

        var loginModalTabOnShow = function(tabElement) {
            var tabName = tabElement.attr('data-target');
            var container = form.find('#' + tabName);
            container.removeClass('hide');
            modalContent.data('actual-tab', tabName);
        };

        tabElements.on('shown.bs.tab', function(e) {
            var previousTab = jQuery(e.relatedTarget);
            var currentTab = jQuery(e.currentTarget);

            loginModalTabOnHide(previousTab);
            loginModalTabOnShow(currentTab);
        });

        loginModalTabOnHide(tabElements.closest('li').filter(':not(.active)').find('a'));
    },
    installExtension: function(e) {
        var element = jQuery(e.currentTarget);
        var url = element.data('url');

        if(url){
            window.open(url);
        }
    },
    registerExtensionTabs : function(container) {
        var thisInstance = this;
        container.on('click', '.extensionTab', function(e){
            var element = jQuery(e.currentTarget);
            var params = {
                    'module': app.getModuleName(),
                    'parent': app.getParentModuleName(),
                    'view': 'Extensions',
                    'mode': 'getExtensionByType',
                    'type': element.data('type')
            };

            app.helper.showProgress();
            app.request.post({data: params}).then(
                function(error, data) {
                    jQuery('.extensionTab').removeClass('active').removeClass('btn-primary');
                    element.addClass('active').addClass('btn-primary');
                    app.helper.hideProgress();
                    jQuery('#extensionContainer').html(data);
                    thisInstance.registerEventForIndexView();
                }
            );
        });    
    },
    registerIframeTabs : function(container) {
        let thisInstance = this;
        container.on('click', '.customerPortalBtn', function(e){
            let heightContainer = jQuery('#extensionContainer').height();
            jQuery('#customerPortalIframe').height(heightContainer - 50);
        });
    },
    getTrial: function(trial, button) {
        let self = this,
            params = {
            module: app.getModuleName(),
            parent: app.getParentModuleName(),
            action: 'Trial',
            mode: 'getTrial',
            trial: trial,
        };

        app.helper.showProgress();
        app.request.post({data: params}).then(function(error, data) {
            app.helper.hideProgress();
            if(!error) {
                if(data.success && data.license) {

                    let params = {
                        module: app.getModuleName(),
                        parent: 'Settings',
                        view: 'License',
                        mode: 'activate',
                        license: data.license,
                    };

                    self.showActivateLicense(params);
                } else {
                    self.showAlert(data.message, data.success);
                }
            }
        });
    },
    trialButtonActions: function() {
        let self = this;

        jQuery('.trialButton').on('click', function() {
            let button = jQuery(this),
                data = button.data(),
                trial = parseInt(data['trial']);

            if(trial > 0) {
                self.getTrial(trial, button);
            }
        });
    },
    registerEventsForTrial() {
        this.trialButtonActions();
    },
    showActivateLicense(params) {
        app.helper.hideModal();
        app.helper.showProgress();
        app.request.post({data: params}).then(function(error, data) {
            if(!error) {
                app.helper.hideProgress();
                app.helper.showModal(data);
            }
        });
    },
    activateLicense() {
        jQuery('#activateLicense').live('submit', function(e) {
            e.preventDefault();
            let form = jQuery(this),
                formData = form.serializeFormData(),
                license = formData['licensekey'],
                params = {
                    module: app.getModuleName(),
                    license: license,
                    action: 'License',
                    parent: 'Settings',
                    mode: 'activate',
                };

            if('' !== license) {
                app.helper.showProgress();
                app.request.post({data: params}).then(function(error, data) {
                    app.helper.hideProgress();
                     if(!error) {
                         let message = {
                             message: data['message'],
                         };

                         if(true === data['success']) {
                             app.helper.showSuccessNotification(message);
                         } else {
                             app.helper.showErrorNotification(message);
                         }

                         app.helper.hideModal();

                         location.reload();
                     }
                });
            } else {
                jQuery('#licensekey').addClass('input-error');
            }
        });
    },
    activateButton() {
        let self = this;
        jQuery('.activateButton').live('click', function() {
            let params = {
                    module: app.getModuleName(),
                    parent: 'Settings',
                    view: 'License',
                    mode: 'activate',
                };

            self.showActivateLicense(params);
        });
    },
    registerActivateLicenses() {
        this.activateButton();
        this.activateLicense();
    },
    registerLicensesActions() {
        jQuery('.actionLicenses').on('click', function() {
            let button = jQuery(this),
                btnData = button.data(),
                message = 'JS_DEACTIVATE_LICENSES_QUESTION';

            if(btnData.mode === 'update') {
                message = 'JS_UPDATE_LICENSES_QUESTION';
            }

            if(btnData.license) {
                app.helper.showConfirmationBox({message: app.vtranslate(message)}).then(function() {
                    let mode = btnData.mode,
	                    params = {
                            module: app.getModuleName(),
                            parent: 'Settings',
                            action: 'License',
                            mode: mode,
                            license: btnData.license
                        };

                    button.attr('disable', 'disabled');
                    app.helper.showProgress();
                    app.request.post({data: params}).then(function(error, data) {
                        app.helper.hideProgress();
                        if(!error) {
                            let message = '';

                            if(data.message) {
                                message = data.message;
                            }

                            if(data.success) {
                                app.helper.showSuccessNotification({message: message});

                                if(mode === 'deactivate') {
                                    button.parents('tr').hide();
                                }
                            } else {
                                app.helper.showErrorNotification({message: message})
                            }
                        }
                    });
                });
            }
        });
    },
    registerUpdateLicenses: function() {
        let self = this;

        jQuery('.updateButton').on('click', function() {
            let button = jQuery(this),
                message = app.vtranslate('JS_LICENSE_UPDATE_QUESTION'),
                params = {
                    module: app.getModuleName(),
                    parent: 'Settings',
                    action: 'License',
                    mode: 'update',
                };

            app.helper.showConfirmationBox({message: message}).then(function() {
                button.attr('disabled', 'disabled');

                app.helper.showProgress();
                app.request.post({data: params}).then(function(error, data) {
                    app.helper.hideProgress();
                    if(!error) {
                        if(data.message) {
                            self.showAlert(data.message);
                        }
                        button.removeAttr('disabled');
                        location.reload();
                    }
                });
            });
        });
    },
    registerLicensesColors: function() {
        jQuery('.licenseColors').on('click', function() {
            const id = jQuery(this).attr('href');

            jQuery(id)
                .animate({backgroundColor: '#FFEEEE'}, 1000)
                .animate({backgroundColor: '#ffffff'}, 10000);
        });
    },
    registerEvents: function() {
        const container = jQuery('.contentsDiv');
        this._super();
        this.registerEventsForInstaller(container);
        this.registerExtensionTabs(container);
        this.registerIframeTabs(container);
        this.registerEventsForTrial();
        this.registerActivateLicenses();
        this.registerUpdateLicenses();
        this.registerLicensesActions();
        this.registerLicensesColors();
    }
});