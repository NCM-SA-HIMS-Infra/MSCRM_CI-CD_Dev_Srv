/*********************************************************************************
 * The content of this file is subject to the Reports 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

Vtiger_Edit_Js("ITS4YouReports_Edit_Js",{
	
	instance : {}
	
},{
	create_adv_filter_div : true, 
	currentInstance : false,
	
	reportsContainer : false,
    
    reporttype_step_li_id : "rtypestep",
    steps_count : 14,
    
	init : function() {
        this.initiateReportType();    
    
        if(jQuery("#mode").val()=="create" && jQuery("#reporttype").val()==""){
            this.registerReportTypesClickEvents();
            // image width_calculation
            var total_width = window.innerWidth;
            
            var is_admin_user = jQuery("#is_admin_user").val();
            var imgs_count = 5;
            if(is_admin_user=="1"){
                imgs_count = 6;
            }
            var one_row_width = (total_width/imgs_count);
            var image_row_width = one_row_width-((one_row_width/100)*30);
            jQuery("#rt1").attr('width',image_row_width+'px');
            jQuery("#rt2").attr('width',image_row_width+'px');
            jQuery("#rt3").attr('width',image_row_width+'px');
            jQuery("#rt4").attr('width',image_row_width+'px');
            if(is_admin_user=="1"){
                jQuery("#rt5").attr('width',image_row_width+'px');
            }
        }else{
            var statusToProceed = this.proceedRegisterEvents();
            if(!statusToProceed){
                    return;
            }
            this.initiate();
        }
	},
	/**
	 * Function to get the container which holds all the reports elements
	 * @return jQuery object
	 */
	getContainer : function() {
		return this.reportsContainer;
	},

	/**
	 * Function to set the reports container
	 * @params : element - which represents the reports container
	 * @return : current instance
	 */
	setContainer : function(element) {
		this.reportsContainer = element;
		return this;
	},
	
	
	/*
	 * Function to return the instance based on the step of the report
	 */
	getInstance : function(step) {
		if(step in ITS4YouReports_Edit_Js.instance ){
			return ITS4YouReports_Edit_Js.instance[step];
		} else {
			var moduleClassName = 'ITS4YouReports_Edit'+step+'_Js' ;
			ITS4YouReports_Edit_Js.instance[step] =  new window[moduleClassName]();
			return ITS4YouReports_Edit_Js.instance[step]
		}
	},
	
	/*
	 * Function to get the value of the step 
	 * returns 1 or 2 or 3
	 */
	getStepValue : function(){
		var container = this.currentInstance.getContainer(); 
		return jQuery('.step',container).val();
	},
	
	/*
	 * Function to initiate the step 1 instance
	 */
	initiate : function(container){
		if(typeof container == 'undefined') {
			container = jQuery('.reportContents');
		}
		if(container.is('.reportContents')) {
			this.setContainer(container);
		}else{
			this.setContainer(jQuery('.reportContents',container));
		}
		this.initiateStep('1');
		this.currentInstance.registerEvents();
	},
	/*
	 * Function to initiate all the operations for a step
	 * @params step value
	 */
	initiateStep : function(stepVal) {
		var step = 'step'+stepVal;
		this.activateHeader(step);
		var currentInstance = this.getInstance(stepVal);
		this.currentInstance = currentInstance;
	},
        
        /*
	 * Function to initiate all the operations for a ReportType settings
	 * @params step value
	 */
	initiateReportType : function() {
	    var reporttype = jQuery("#reporttype").val();
            
        /***
         *
         * 1 -> Report Details
         * 4 -> Specify Grouping
         * 5 -> Select Columns
         * 6 -> Calculations
         * 7 -> Labels
         * 8 -> Filters
         * 9 -> Sharing
         * 10 -> Scheduler
         * 11 -> Graphs
         * 12 -> Dashboards
         * 14 -> Maps
         * reporttype_steps["tabular"] = new Array(1,5,6,7,8,9,10,14);
         * reporttype_steps["summaries"] = new Array(1,4,7,8,9,10,11,12,14);
         * reporttype_steps["summaries_w_details"] = new Array(1,4,5,7,8,9,10,11,12,14);
         * 4 -> odobrat group 2 a 3
         * reporttype_steps["summaries_matrix"] = new Array(1,4,5,6,7,8,9,10,11,12,14);
         * 4 -> podmienka ze aspon jedna group musi byt cols !
         */

        var reporttype_steps = [];
        reporttype_steps["tabular"] = [1, 5, 6, 7, 8, 9, 10, 12, 14,];
        reporttype_steps["summaries"] = [1, 4, 7, 8, 9, 10, 11, 12, 14,];
        reporttype_steps["summaries_w_details"] = [1, 4, 5, 7, 8, 9, 10, 11, 12, 14,];
        reporttype_steps["summaries_matrix"] = [1, 4, 7, 8, 9, 10, 11, 12, 14,];
        reporttype_steps["custom_report"] = [1, 12, 9, 10,];

        var actual_steps = reporttype_steps[reporttype];
        
        for (stepi = 1; stepi <= this.steps_count; stepi++) {
            if ( jQuery("#"+this.reporttype_step_li_id+stepi).length  > 0) {
                if(jQuery.inArray( stepi, actual_steps) < 0){
                    jQuery("#"+this.reporttype_step_li_id+stepi).addClass("hide");
                }
            }
        }
        
        this.initiateAdvReportType();
	},
        
        /*
	 * Function to initiate all the operations for a Additional ReportType settings
	 * @params value
	 */
	initiateAdvReportType : function() {
            var reporttype = jQuery("#reporttype").val();
            
            /*** 
             * 
             * 1 -> Report Details
             * 4 -> Specify Grouping
             * 5 -> Select Columns
             * 6 -> Calculations
             * 7 -> Labels
             * 8 -> Filters
             * 9 -> Sharing
             * 10 -> Scheduler
             * 11 -> Graphs
             * 12 -> Dashboards             
             * reporttype_steps["tabular"] = new Array(1,5,6,7,8,9,10);
             * reporttype_steps["summaries"] = new Array(1,4,7,8,9,10,11,12);
             * reporttype_steps["summaries_w_details"] = new Array(1,4,5,7,8,9,10,11,12);
             * 4 -> odobrat group 2 a 3
             * reporttype_steps["summaries_matrix"] = new Array(1,4,5,6,7,8,9,10,11,12);
             * 4 -> podmienka ze aspon jedna group musi byt cols !
             */
            
            if(reporttype=="summaries_w_details"){
                jQuery("#group2_table_row").addClass("hide");
                jQuery("#group3_table_row").addClass("hide");
            }
            
            jQuery('#reportypetab').find('.marginRight5px').children('a').on('click',function(e){
                var currentAnchor = $(this);
                var activeStepInfo = currentAnchor.attr("id")
                
                jQuery('#reportypeInfoTab').find('.reporttypeInfo').removeClass('visible');
                jQuery('#reportypeInfoTab').find('.reporttypeInfo').addClass('hide');
                // reporttype1 - tabular
                // reporttype2 - summaries
                // reporttype3 - summaries_w_details
                // reporttype4 - summaries_matrix
                var reporttype_steps = new Array();
                reporttype_steps["tabular"] = "reporttype1";
                reporttype_steps["summaries"] = "reporttype2";
                reporttype_steps["summaries_w_details"] = "reporttype3";
                reporttype_steps["summaries_matrix"] = "reporttype4";
                reporttype_steps["custom_report"] = "reporttype5";

                jQuery('#reportypeInfoTab').find('#'+reporttype_steps[activeStepInfo]).removeClass('hide');
                jQuery('#reportypeInfoTab').find('#'+reporttype_steps[activeStepInfo]).addClass('visible');
            })
            
	},
	
	/*
	 * Function to activate the header based on the class
	 * @params class name
	 */
	activateHeader : function(step) {
		var headersContainer = jQuery('#reportBreadCrumbs');
		headersContainer.find('.active').removeClass('active');
		jQuery('.'+step,headersContainer).addClass('active');
	},
	/*
	 * Function to register the click event for next button
	 */
	registerFormSubmitEvent : function(form) {
		var thisInstance = this;
		if(jQuery.isFunction(thisInstance.currentInstance.submit)){
			form.on('submit',function(e){
				var form = jQuery(e.currentTarget);
				var specialValidation = true;
				if(jQuery.isFunction(thisInstance.currentInstance.isFormValidate)){
					var specialValidation =  thisInstance.currentInstance.isFormValidate();
				}
				if ( form.validationEngine('validate') && specialValidation) {
						thisInstance.currentInstance.submit().then(function(data){
							thisInstance.getContainer().append(data);
							var stepVal = thisInstance.getStepValue();
							var nextStepVal = parseInt(stepVal) + 1;
							thisInstance.initiateStep(nextStepVal);
							thisInstance.currentInstance.initialize();
							var container = thisInstance.currentInstance.getContainer();
							thisInstance.registerFormSubmitEvent(container);
							thisInstance.currentInstance.registerEvents();
						});

				}
				e.preventDefault();
			})		
		}
	},
	
	back : function(){
		var step = this.getStepValue();
		var prevStep = parseInt(step) - 1;
		this.currentInstance.initialize();
		var container = this.currentInstance.getContainer();
		container.remove();
		this.initiateStep(prevStep);
		this.currentInstance.getContainer().show();
	},
        
    cancelBtn : function(){
        window.location.href=jQuery("#cancel_btn_url").val();
    },

    /*
    * Function to register the click event for back step
    */
    registerReportTypesClickEvents : function(){
        var buttonBackEl = jQuery('.backStep');
        buttonBackEl.on('click',function(e){
            e.preventDefault();
            window.location.href="index.php?module=ITS4YouReports&view=List";
        });
        var buttonBackEl2 = jQuery('#createReport');
        buttonBackEl2.on('click',function(e){
            e.preventDefault();
            var reporttype = jQuery('#reportypetab').find('.active').children('a').attr("id");
            window.location.href="index.php?module=ITS4YouReports&view=Edit&folder=&reporttype="+reporttype;
        });
    },
        
	/*
	 * Function to register the click event for back step 
	 */
	registerBackStepClickEvent : function(){
		var thisInstance = this;
                
                var buttonBackEl = jQuery('#back_rep_top');
		buttonBackEl.on('click',function(e){
                    thisInstance.changeStepsBack();
                });
                var buttonBackEl2 = jQuery('#back_rep_top2');
		buttonBackEl2.on('click',function(e){
                    thisInstance.changeStepsBack();
                });
	},
        
        /*
	 * Function to register the click event for back step 
	 */
	registerNextStepClickEvents : function(){
		var thisInstance = this;
                var buttonNextEl = jQuery('#next_rep_top');
		buttonNextEl.on('click',function(e){
                    thisInstance.changeStepsNext();
                });
                var buttonNextEl2 = jQuery('#next_rep_top2');
		buttonNextEl2.on('click',function(e){
                    thisInstance.changeStepsNext();
                });
                var savebtn = jQuery('#savebtn');
		savebtn.on('click',function(e){
                    return thisInstance.changeSteps('Save');
                });
                var savebtn2 = jQuery('#savebtn2');
		savebtn2.on('click',function(e){
                    return thisInstance.changeSteps('Save');
                });
                var saverunbtn = jQuery('#saverunbtn');
		saverunbtn.on('click',function(e){
                    return thisInstance.changeSteps('Save&Run');
                });
                var saverunbtn2 = jQuery('#saverunbtn2');
		saverunbtn2.on('click',function(e){
                    return thisInstance.changeSteps('Save&Run');
                });
                var cancelbtn = jQuery('#cancelbtn');
		cancelbtn.on('click',function(e){
                    thisInstance.cancelBtn();
                });
                var cancelbtn2 = jQuery('#cancelbtn2');
		cancelbtn2.on('click',function(e){
                    thisInstance.cancelBtn();
                });
                var cancelbtn0T = jQuery('#cancelbtn0T');
		cancelbtn0T.on('click',function(e){
                    thisInstance.cancelBtn();
                });
                var cancelbtn0B = jQuery('#cancelbtn0B');
		cancelbtn0B.on('click',function(e){
                    thisInstance.cancelBtn();
                });
                
                
	},
        
        displayButtons : function(step){
            var reporttype = jQuery("#reporttype").val();
            var last_step = 12;
            if(reporttype=="tabular" || reporttype=="custom_report"){
                var last_step = 10;
            }
            
            if ((document.getElementById('mode').value != 'create' && document.getElementById('mode').value != '') || step == last_step) {
                document.getElementById('submitbutton').style.display = 'inline';
                document.getElementById('submitbutton2').style.display = 'inline';
                document.getElementById('submitbutton0T').style.display = 'none';
                document.getElementById('submitbutton0B').style.display = 'none';
            } else {
                document.getElementById('submitbutton').style.display = 'none';
                document.getElementById('submitbutton2').style.display = 'none';
                document.getElementById('submitbutton0T').style.display = 'inline';
                document.getElementById('submitbutton0B').style.display = 'inline';
            }
        },
        
        checkEmptyFirstStep : function(step){
            if(document.getElementById('actual_step').value<2){
                var reportname = jQuery('#reportname').val();
                if(reportname==""){
                    alert(app.vtranslate('MISSING_REPORT_NAME'));
                    this.markSelectedTab(document.getElementById('actual_step').value);
                    return false;
                }
                var primarymodule = jQuery('#primarymodule').val();
                if(primarymodule==""){
                    alert(app.vtranslate('MISSING_PRIMARYMODULE')); 
                    this.markSelectedTab(document.getElementById('actual_step').value);
                    return false;
                }
            }
            return true;
        },
        
        changeSteps4U: function(step,stype) {
            
            var thisInstance = this;
            // can not change step while module and name is not defined !
            
            if(stype=="step"){
                if(this.checkEmptyFirstStep(step)==false){
                    return false;
                }
            }
            document.getElementById('actual_step').value = step;
            
            var reporttype = jQuery("#reporttype").val();

            var record = document.NewReport.record.value;
            
            /** ITS4YOU-CR SlOl 6. 2. 2017 8:07:44
             *            
            *   Define Leads not converted as a default condition ! | part 1/2 S
            *               
            */
            var common_step = '';
            if(reporttype!='custom_report' && jQuery('#mode').val()=='create'){
                if(jQuery('#primarymodule').val()=='7' && thisInstance.create_adv_filter_div == true){
                    var common_step = step;
                    step = 8;
                }
            }
            // ITS4YOU-END | part 1/2 E

            if (step == 1) {
                document.getElementById('back_rep_top').disabled = true;
                document.getElementById('back_rep_top2').disabled = true;
            } else {
                document.getElementById('back_rep_top').disabled = false;
                document.getElementById('back_rep_top2').disabled = false;
            }
            
            var gotoStep = "step" + step;
            if (!gotoStep) {
                return false;
            } else if (reporttype=="custom_report" && (gotoStep == "step1" || gotoStep == "step12" )) {
                thisInstance.showTabContainer(gotoStep);
                thisInstance.displayButtons(step);
                return true;
            } else if (gotoStep=="step9" || gotoStep == "step10") {
                if (gotoStep == "step10"){
                    if(jQuery("#mode").val()=="create"){
                        this.getSchedulerGenerateFor();
                    }
                    
                    showRecipientsOptions();
                    if (reporttype=="custom_report"){
                        thisInstance.displayButtons(step);
                    }
                }
                thisInstance.showTabContainer(gotoStep);
                thisInstance.displayButtons(step);
                return true;
            } else {
                var newurl = '';

                var selectedPrimaryModule = jQuery("#primarymodule").val();

                var reportname = jQuery('#reportname').val();
                var reportdesc = jQuery('#reportdesc').val();
                var template_owner = jQuery('#template_owner').val();
                var sharing = jQuery('#sharing').val();

                var selectedFolderIndex = document.getElementById('reportfolder').selectedIndex;
                var selectedFolderValue = document.getElementById('reportfolder').options[selectedFolderIndex].value;
              
                var curl = this.getCurl();
                var lblurl = this.getLabelsurl();

                var limit = jQuery('#limit').val();
                var isReportScheduled = jQuery('#isReportScheduled').is(':checked');
                
                var sharingSelectedStr = this.getUpSelectedSharing();
                
                var postData = {
                    "step": gotoStep,
                    "record": record,
                    "reportmodule": selectedPrimaryModule,
                    "primarymodule": selectedPrimaryModule,
                    "reportname": reportname,
                    "reporttype": reporttype,
                    "reportdesc": reportdesc,
                    "template_owner": template_owner,
                    "sharing": sharing,
                    "sharingSelectedColumns": sharingSelectedStr,
                    "folderid": selectedFolderValue,
                    "curl": curl,
                    "lblurl": lblurl,
                    "limit": limit,
                    "isReportScheduled": isReportScheduled
                }; 
                postData['reporttype'] = jQuery('#reporttype').val();

                var relatedmodules = '';
                if(reporttype!="custom_report"){
                    var all_related_modules_str = document.getElementById('all_related_modules').value;
                    if (all_related_modules_str != '') {
                        var all_related_modules = all_related_modules_str.split(":");
                        for (i = 0; i <= (all_related_modules.length - 1); i++) {
                            var rel_mod_actual = 'relmodule_' + all_related_modules[i];
                            var actual_rel_module = document.getElementById(rel_mod_actual);
                            if (actual_rel_module.checked)
                                relatedmodules += actual_rel_module.value + ':';
                        }
                    }
                }

                postData["relatedmodules"] = relatedmodules;

                formSelectedSummariesString();
                postData["selectedSummariesString"] = jQuery("#selectedSummariesString").val();
 
                for (i = 0; i <= 3; i++) {
                    
                    postData["timeline_column"+i] = this.getGroupTimeLineValue(i);
                    if (i > 1) postData["timeline_type"+i] = this.getGroupTimeLineType(i);
                    
                    var selectedGroup = document.getElementById('Group'+i);
                    if (selectedGroup) {
                        var selectedGroupValue = document.getElementById('Group'+i).options[selectedGroup.selectedIndex].value;
                        postData["group"+i] = selectedGroupValue;
                        //var radioa = document.getElementById('Sort'+i+'a');
                        //var radiod = document.getElementById('Sort'+i+'d');
                        //var return_sort = radioa.checked ? radioa.value : radiod.value;
                        var return_sort = jQuery('#Sort'+i).val();
                        postData["sort"+i] = return_sort;
                    }
                }
                
                postData["x_group"] = jQuery('#x_group').val();
                postData["charttitle"] = jQuery('#charttitle').val();
                
                postData["chartType1"] = jQuery('#chartType1').val();
                postData["data_series1"] = jQuery('#data_series1').val();
                
                postData["chartType2"] = jQuery('#chartType2').val();
                postData["data_series2"] = jQuery('#data_series2').val();
                
                postData["chartType3"] = jQuery('#chartType3').val();
                postData["data_series3"] = jQuery('#data_series3').val();
                
                if (document.getElementById('summaries_orderby_column')) {
                    var summaries_orderby_selectbox = document.getElementById('summaries_orderby_column');
                    var summaries_orderby = summaries_orderby_selectbox.options[summaries_orderby_selectbox.selectedIndex].value;

                    var summaries_orderby_type = "";
                    var summaries_orderby_Radios = document.getElementsByName('summaries_orderby_type');
                    for (var i = 0, length = summaries_orderby_Radios.length; i < length; i++) {
                        if (summaries_orderby_Radios[i].checked) {
                            summaries_orderby_type = summaries_orderby_Radios[i].value;
                            break;
                        }
                    }
                    if (summaries_orderby_type == "") {
                        summaries_orderby_type = "ASC";
                    }

                    postData["summaries_orderby"] = summaries_orderby;
                    postData["summaries_orderby_type"] = summaries_orderby_type;
                }
                
                
                var selectedColumns = document.getElementById('selectedColumns');
                var reporttype = jQuery("#reporttype").val();
                if(reporttype !="custom_report"){
                    var selectedColumnsStr = "";
                    for (i = 0; i < selectedColumns.options.length; i++) {
                        if (selectedColumnsStr != "") {
                            selectedColumnsStr += "<_@!@_>";
                        }
                        selectedColumnsStr += selectedColumns.options[i].value;
                    }
                    selectedColumnsStr = replaceAll("&","@AMPKO@",selectedColumnsStr);
                }
                postData["selectedColumnsStr"] = selectedColumnsStr;
                
                if (gotoStep == 'step5') {
                    var url = 'action=IndexAjax&mode=getStep5Columns&module=ITS4YouReports';
                } else {
                    var url = 'view=Edit&mode=ChangeSteps&module=ITS4YouReports';
                }
                
                // ITS4YOU-CR SlOl 17. 5. 2016 7:04:06
                if(gotoStep=="step6" && jQuery("#step61").html()!=""){
                    postData["cc_populated"] = true;
                }
                // ITS4YOU-END

                var actionParams = {
                    "type": "POST",
                    "url": 'index.php?'+ url,
                    "dataType": "html",
                    "data": postData
                };
                
//alert(JSON.stringify(actionParams));
//index.php?action=IndexAjax&mode=getStep5Columns&module=ITS4YouReports&step=step5&record=74&reportmodule=9&primarymodule=9&reportname=Calendar Invitees Test&reporttype=tabular&reportdesc=&template_owner=1&sharing=public&sharingSelectedColumns=&folderid=1&curl=&lblurl=0_SC_lLbLl_vtiger_activity:subject:Calendar_Subject:subject:V_lLGbGLl_Subject$_@_$1_SC_lLbLl_vtiger_activity:time_end:Calendar_End Time:time_end:T_lLGbGLl_End Time$_@_$2_SC_lLbLl_vtiger_crmentity:smownerid:Calendar_Assigned To:assigned_user_id:V_lLGbGLl_Assigned To$_@_$3_SC_lLbLl_vtiger_activity:activitytype:Calendar_Activity Type:activitytype:V_lLGbGLl_Activity Type&isReportScheduled":false,"relatedmodules=&selectedSummariesString=&group1=none&sort1=Ascending&timeline_type2=rows&group2=none&sort2=Ascending&timeline_type3=rows&group3=none&sort3=Ascending&x_group":null,"charttitle=&chartType1=none&data_series1=none&chartType2=none&data_series2=none&chartType3=none&data_series3=none&summaries_orderby=none&summaries_orderby_type=ASC&selectedColumnsStr=vtiger_activity:subject:Calendar_Subject:subject:V<_@!@_>vtiger_activity:time_end:Calendar_End Time:time_end:T<_@!@_>vtiger_crmentity:smownerid:Calendar_Assigned To:assigned_user_id:V<_@!@_>vtiger_activity:activitytype:Calendar_Activity Type:activitytype:V
//index.php?action=IndexAjax&mode=getStep5Columns&module=ITS4YouReports&step=step5&record=86&reportmodule=13&primarymodule=13&reportname=TT Test&reporttype=tabular&reportdesc=&template_owner=1&sharing=public&sharingSelectedColumns=&folderid=1&curl=&lblurl=0_SC_lLbLl_vtiger_troubletickets:title:HelpDesk_Title:ticket_title:V_lLGbGLl_Title$_@_$1_SC_lLbLl_vtiger_troubletickets:status:HelpDesk_Status:ticketstatus:V_lLGbGLl_Status$_@_$2_SC_lLbLl_vtiger_ticketcf:cf_1047:HelpDesk_Relation ui 10:cf_1047:V_lLGbGLl_Relation ui 10$_@_$3_SC_lLbLl_vtiger_troubletickets:parent_id:HelpDesk_Related To:parent_id:V_lLGbGLl_Organization Name$_@_$4_SC_lLbLl_vtiger_troubletickets:ticket_no:HelpDesk_Ticket No:ticket_no:V_lLGbGLl_Ticket Number$_@_$5_SC_lLbLl_vtiger_troubletickets:update_log:HelpDesk_Update History:update_log:V_lLGbGLl_Update History&isReportScheduled=false&relatedmodules=&selectedSummariesString=&group1=none&sort1=Ascending&timeline_type2=rows&group2=none&sort2=Ascending&timeline_type3=rows&group3=none&sort3=Ascending&x_group=null&charttitle=&chartType1=none&data_series1=none&chartType2=none&data_series2=none&chartType3=none&data_series3=none&summaries_orderby=none&summaries_orderby_type=ASC&selectedColumnsStr=vtiger_troubletickets:title:HelpDesk_Title:ticket_title:V<_@!@_>vtiger_troubletickets:status:HelpDesk_Status:ticketstatus:V<_@!@_>vtiger_ticketcf:cf_1047:HelpDesk_Relation ui 10:cf_1047:V<_@!@_>vtiger_troubletickets:parent_id:HelpDesk_Related To:parent_id:V<_@!@_>vtiger_troubletickets:ticket_no:HelpDesk_Ticket No:ticket_no:V<_@!@_>vtiger_troubletickets:update_log:HelpDesk_Update History:update_log:V
                AppConnector.request(actionParams).then(
                        function(data) {
                            thisInstance.showTabContainer(gotoStep);
                            
                            if (gotoStep == 'step5') {
                                
                                if (document.getElementById('availList'))
                                {
                                    document.getElementById('availList').innerHTML = "";
                                    document.getElementById('availList').options.length = 0;
                                }
                                var step5_result = data.split("(!A#V_M@M_M#A!)");
                                thisInstance.setStep5Columns(step5_result);
                                
                            } else if (gotoStep == 'step8') {
                                var resp_info = data.split("__ADVFTCRI__");

                                var resp_blocks_info = resp_info[0];
                                var criteria_info = JSON.parse(resp_info[1]);
                                document.getElementById("sel_fields").value = resp_info[2];
                                document.getElementById("std_filter_columns").value = resp_info[3];

                                var resp_blocks = resp_blocks_info.split("__BLOCKS__");
                                var FIELD_BLOCKS = resp_blocks[0];
                                // document.getElementById('filter_columns').innerHTML = FIELD_BLOCKS;
                                jQuery("#filter_columns").html(FIELD_BLOCKS);

                                var aviable_fields = FIELD_BLOCKS;
                                var group_fields = FIELD_BLOCKS;
                                //if(!document.getElementById("fcol0") && document.getElementById("mode").value=="create"){
                                if(!document.getElementById("fcol0") && thisInstance.create_adv_filter_div == true){
                                    addNewConditionGroup('adv_filter_div');
                                    thisInstance.create_adv_filter_div = false;
                                }

                                var sum_group_columns = resp_blocks[1];
                                document.getElementById('sum_group_columns').innerHTML = sum_group_columns;

                                //var sortbycolumns = document.getElementById('SortByColumn').innerHTML;
                            }else if(gotoStep=="step6" && jQuery("#step61").html()==""){
                                var resp_info = data.split("|#<&NBX&>#|");
                                var stepTabContainer = jQuery("#"+gotoStep);
                                stepTabContainer.html(resp_info[0]);
                                var step1TabContainer = jQuery("#"+gotoStep+"1");
                                step1TabContainer.html(resp_info[1]);
                            } else {
                                var stepTabContainer = jQuery("#"+gotoStep);
                                stepTabContainer.html(data);
                            }

                            if (gotoStep == "step1"){
                                var primarymodule = jQuery("#primarymodule");
                                if(primarymodule){
                                    app.changeSelectElementView(primarymodule);
                                }
                                
                                var reportfolder = jQuery("#reportfolder");
                                app.changeSelectElementView(reportfolder);
                            }else if (gotoStep == "step4"){
                                thisInstance.setSummariesOrderBy();
                                
                                var reporttype = jQuery("#reporttype").val();
                                //Group1 Group2 Group3
                                if(reporttype=="summaries" || reporttype=="summaries_matrix"){
                                    for (var i = 1; i < 4; i++){
                                        var GroupElement = jQuery("#Group"+i);
                                        app.changeSelectElementView(GroupElement);
                                    }
                                }else if(reporttype=="summaries_w_details"){
                                    var GroupElement = jQuery("#Group1");
                                    app.changeSelectElementView(GroupElement);
                                }
                            }else if(gotoStep == "step6"){
                                jQuery('.cc-new-select').each(function(index,element){
                                    var ccSelectElement = jQuery(element);
                                    app.changeSelectElementView(ccSelectElement);
                                });
                            }else if (gotoStep == "step12"){
                                var allow_in_modules = jQuery("#allow_in_modules");
                                app.changeSelectElementView(allow_in_modules);
                                
                                var primary_search = jQuery("#primary_search");
                                app.changeSelectElementView(primary_search);
                            } else if (gotoStep == "step14"){
                                var pin_title = jQuery("#maps_pin_title");
                                app.changeSelectElementView(pin_title);
                                var pin_description = jQuery("#maps_pin_description");
                                app.changeSelectElementView(pin_description);
                                var street = jQuery("#maps_street");
                                app.changeSelectElementView(street);
                                var city = jQuery("#maps_city");
                                app.changeSelectElementView(city);
                                var state = jQuery("#maps_state");
                                app.changeSelectElementView(state);
                                var zip = jQuery("#maps_zip");
                                app.changeSelectElementView(zip);
                                var country = jQuery("#maps_country");
                                app.changeSelectElementView(country);
                                var zoom = jQuery("#maps_zoom");
                                app.changeSelectElementView(zoom);
                            }
                            
                            thisInstance.initiateAdvReportType();
                            
                            if('step11' === gotoStep) {
                                ChartDataSeries(document.getElementById('x_group'));
                                thisInstance.registerChangeChartTypeEvents();
                            }
                            
                            /** ITS4YOU-CR SlOl 6. 2. 2017 9:13:19
                             *            
                            *   Define Leads not converted as a default condition ! | part 2/2 S
                            *               
                            */
                            if(common_step!='' && common_step!=8){
                                go_to_step = "step"+common_step;
                                
                                jQuery('#fcol0').val('vtiger_leaddetails:converted:Leads_Converted:converted:C');
                                jQuery('#fcol0').trigger("liszt:updated");
                                
                                reports4you_updatefOptions(document.getElementById('fcol0'), 'fop0');
                                addRequiredElements('f',0);
                                updateRelFieldOptions(document.getElementById('fcol0'), 'fval_0');
                                
                                jQuery('#fop0').val('n');
                                jQuery('#fval0').val('1');
                                addRequiredElements('f',0);
                                
                                var changedStep = thisInstance.changeSteps4U(common_step,"step");
                                if(changedStep!=false){
                                    thisInstance.markSelectedTab(go_to_step);
                                }
                                return true;
                            }
                            // ITS4YOU-END | part 2/2 E
                        }
                );
                thisInstance.displayButtons(step);
            }
            
        },
        
        showTabContainer : function(gotoStep){
            var reportTabsEl = jQuery('.reportTab');
            reportTabsEl.each(function(index,element){
                    jQuery(element).addClass("hide");
            });

            jQuery("#"+gotoStep).removeClass("hide");
            if(gotoStep=="step6"){
                jQuery("#step61").removeClass("hide");
            }
        },
        
        registerTabClickEvent : function(){
		var thisInstance = this;
                
                var reportTabsEl = jQuery('#reportTabs').find('li').find('a');
		reportTabsEl.each(function(index,element){
			var chosenTab = jQuery(element);
                        var actual_step = chosenTab.data('step');
                        chosenTab.on('click',function(e){
                            if(thisInstance.checkEmptyFirstStep(actual_step)==false){
                                return false;
                            }else{
                                thisInstance.changeSteps4U(actual_step,"tab");
                            }
                        });
		});
	},
        
        getUpSelectedSharing: function(){
            var sharingSelectedStr = "";
            if(document.getElementById('sharingSelectedColumns')){
                var sharingSelectedColumns = document.getElementById('sharingSelectedColumns');
                var sharingSelectedStr = "";
                for (i = 0; i <= (sharingSelectedColumns.length - 1); i++)
                {
                    sharingSelectedStr += sharingSelectedColumns[i].value + '|';
                }
                document.getElementById('sharingSelectedColumnsString').value = sharingSelectedStr;
            }
            return sharingSelectedStr;
        },
        
        getCurl : function() {
            var c = new Array();
            curl = "";
            c = document.getElementsByTagName('input');
            for (var i = 0; i < c.length; i++)
            {
                if (c[i].type == 'checkbox')
                {
                    Control_Data = c[i].name.split(':');
                    if (Control_Data[0] == "cb" && c[i].checked == true)
                    {
                        if (curl != "") {
                            curl += "$_@_$";
                        }
                        curl += c[i].name;
                    }
                }
            }
            jQuery('#curl_to_go').val(curl);
            return curl;
        },
        
        getLabelsurl : function() {
            var c = new Array();
            var lblurl = "";
            c = document.getElementsByTagName('input');
            for (var i = 0; i < c.length; i++)
            {
                if(c[i]){
                    var id_text = c[i].id;
                    var search_for_lc = "_lLbLl_";
                    if (id_text.indexOf(search_for_lc) > -1 && id_text.indexOf("hidden_") == -1) {
                        if (lblurl != "") {
                            lblurl += "$_@_$";
                        }
                        var str_lblurl = c[i].id + "_lLGbGLl_" + c[i].value;
                        str_lblurl = replaceAll("&","@AMPKO@",str_lblurl);
                        lblurl += str_lblurl;
                    }
                }
            }

            jQuery('#labels_to_go').val(lblurl);
            return lblurl;
        }, 
        
        getGroupTimeLineValue : function(group_i){
            var timeline_frequency = "";
            if(document.getElementsByName('TimeLineColumn_Group'+group_i)){
                //var TimeLineColumnRadios = document.getElementsByName('TimeLineColumn_Group'+group_i);
                timeline_frequency = jQuery("#TimeLineColumn_Group"+group_i).val();
                /*for (var i = 0, length = TimeLineColumnRadios.length; i < length; i++) {
                    if (TimeLineColumnRadios[i].checked) {
                        timeline_frequency = TimeLineColumnRadios[i].value;
                        break;
                    }
                }*/
                
            }
            return timeline_frequency;
        },

        getGroupTimeLineType : function(group_i){
            var timeline_type_val = "";
            if(document.getElementById('timeline_type'+group_i)){
                var timeline_type = document.getElementById('timeline_type'+group_i);
                timeline_type_val = timeline_type.options[timeline_type.selectedIndex].value;
            }
            return timeline_type_val;
        },

        setSummariesOrderBy : function(group_i){
            var summaries_orderby_val = jQuery("#summaries_orderby_val").val();
            setSelSummSortOrder(summaries_orderby_val);
        },

    changedChartTypeEvent: function (chartTypeElm) {
        const chartTypeObj = jQuery(chartTypeElm);
        const selectedOptionObj = chartTypeObj.find('option:selected');
        const iconName = selectedOptionObj.data('icon');
        const dataI = chartTypeObj.data('i');
        const iconObj = jQuery('#iconchtype'+dataI);
        iconObj.removeClass();
        if ('' !== iconName) {
            iconObj.addClass(iconName);
        }
    },

    registerChangeChartTypeEvents: function () {
        const thisInstance = this;

	    if ('undefined' !== typeof jQuery('#chartType1').val()) {
            jQuery('#chartType1').on('change', function(e) {
                thisInstance.changedChartTypeEvent(jQuery(this));
            });
        }
        if ('undefined' !== typeof jQuery('#chartType2').val()) {
            jQuery('#chartType2').on('change', function(e) {
                thisInstance.changedChartTypeEvent(jQuery(this));
            });
        }
        if ('undefined' !== typeof jQuery('#chartType3').val()) {
            jQuery('#chartType3').on('change', function(e) {
                thisInstance.changedChartTypeEvent(jQuery(this));
            });
        }
    },

	registerEvents : function(){
            this.registerTabClickEvent();
            
            setObjects();
            
            this.setSummariesOrderBy();
            
            this.registerBackStepClickEvent();
            
            this.registerHelpinfoTooltip();
            
            this.registerNextStepClickEvents();

            this.registerChangeChartTypeEvents();

            var container = jQuery('#step8');
            app.changeSelectElementView(container);
            this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
            //container.validationEngine();
	}, 
        
        changeStepsBack : function(){
            var actual_step = jQuery("#actual_step").val();
            
            var reporttype = jQuery("#reporttype").val();
            
            var last_step = '';
            
            if(reporttype=="custom_report"){
                if(actual_step==12){
                    last_step = 1;
                }else if(actual_step==9){
                    last_step = 12;
                }else{
                    last_step = actual_step - 1;
                }
            }else{
                last_step = actual_step - 1;
            }
                
            if (actual_step != 1)
            {
                var stop_asi = false;
                
                while( last_step > -1 ){
                    if(jQuery("#"+this.reporttype_step_li_id+last_step).hasClass("hide")){
                        last_step--;
                    }else{
                        break;
                    }
                }

                // ITS4YOU SlOl step 2 and step 3 disabled -2 steps
                if (last_step == 3) {
                    last_step = last_step - 2;
                }
                var changedStep = this.changeSteps4U(last_step,"step");
                if(changedStep!=false){
                    this.markSelectedTab(last_step);
                    if (last_step == 1)
                    {
                        document.getElementById('back_rep_top').disabled = true;
                        document.getElementById('back_rep_top2').disabled = true;
                    }
                }
            }
        },
        
        changeStepsNext : function(){
            var actual_step = eval(jQuery("#actual_step").val());
            
            var reporttype = jQuery("#reporttype").val();
	        if(reporttype === "custom_report") {
				var last_step = 14;
			} else {
				var last_step = 15;
			}
            
            if(reporttype=="custom_report"){
                if(actual_step==1){
                    go_to_step = 12;
                }else if(actual_step==12){
                    go_to_step = 9;
                }else{
                    var go_to_step = actual_step + 1;
                }
            }else{
                var go_to_step = actual_step + 1;
                var stop_asi = false;

                // ITS4YOU SlOl step 2 and step 3 disabled -2 steps
                if (go_to_step == 2) {
                    go_to_step = go_to_step + 2;
                }

                for (asi = go_to_step; asi <= this.steps_count; asi++) {
                    if(asi>=go_to_step && stop_asi!=true){
                        if(jQuery("#"+this.reporttype_step_li_id+asi).hasClass("hide")){
                            go_to_step = go_to_step + 1;
                        }else{
                            stop_asi = true;
                        }

                    }
                }
                if (13 === go_to_step) {
                	go_to_step = go_to_step+1;
				}
            }
            
            if(reporttype=="custom_report" && actual_step==10 && go_to_step == 11){
                this.changeSteps();
            }else if (go_to_step != last_step){
                var changedStep = this.changeSteps4U(go_to_step,"step");
                if(changedStep!=false){
                    this.markSelectedTab(go_to_step);
                }
            }else{
                this.changeSteps();
            }
        },
        
        markSelectedTab : function(step){
            var reportTabsEl = jQuery('#reportTabs').find('li');
            reportTabsEl.each(function(index,element){
                var chosenTab = jQuery(element);
                var reportAEl = chosenTab.find('a');
                var tab_step = reportAEl.data('step');
                if(jQuery("#"+this.reporttype_step_li_id+step).hasClass("hide")!=true){
                    if(tab_step!=step){
                        chosenTab.removeClass("active");
                    }else{
                        chosenTab.addClass("active");
                    }
                }
            });
        },
        
        changeSteps : function(savetype){
            if(!savetype || savetype==""){
                savetype = "Save&Run";
            }
            var report_name_val = jQuery("#reportname").val();

            if (report_name_val == "")
            {
                alert(app.vtranslate('MISSING_REPORT_NAME')); 
                return false;
            }
            else
            {
                var reporttype = jQuery("#reporttype").val();
                
                // ITS4YOU-CR SlOl 9. 9. 2013 13:36:29 scheduler
                var isScheduledObj = getObj("isReportScheduled");
                var selectedRecipientsObj = getObj("selectedRecipients");
                    
                var getGenerateForOptions = this.getGenerateForOptions();
                
                if (isScheduledObj.checked == true) {
                    var err_info = false;
                    var err_message = '';
                    
                    if(jQuery('#scheduledTime').val()==""){
                        err_info = true;
                        err_message += app.vtranslate('JS_SCHEDULEDTIME_CANNOT_BE_EMPTY');
                    }

                    if ('checked' !== jQuery('#scheduledReportFormat_pdf').attr('checked')
                        && 'checked' !== jQuery('#scheduledReportFormat_xls').attr('checked')
                        && 'checked' !== jQuery('#scheduledReportFormat_csv').attr('checked')) {
                        err_info = true;
                        if(err_message!=''){
                            err_message += ' '+app.vtranslate('JS_AND')+' ';
                        }
                        err_message += app.vtranslate('JS_SCHEDULEDFORMAT_CANNOT_BE_EMPTY');
                    }
                    
                    if (selectedRecipientsObj.options.length == 0 && getGenerateForOptions.length == 0) {
                        err_info = true;
                        if(err_message!=''){
                            err_message += ' '+app.vtranslate('JS_AND')+' ';
                        }
                        err_message += app.vtranslate('JS_RECIPIENTS_CANNOT_BE_EMPTY');
                    }
                    
                    if(err_info==true){
                        err_message += ' '+app.vtranslate('CANNOT_BE_EMPTY');
                        
    					app.hideModalWindow();
    					var params = {
    						title : app.vtranslate('JS_SCHEDULER_VALIDATION_TITLE'),
    						text: err_message,
    						animation: 'show',
    						type: 'error'
    					};
                        Vtiger_Helper_Js.showPnotify(params);
                        //alert(err_message);
                        return false;
                    }
                }

                    var selectedUsers = new Array();
                    var selectedGroups = new Array();
                    var selectedRoles = new Array();
                    var selectedRolesAndSub = new Array();
                    for (i = 0; i < selectedRecipientsObj.options.length; i++) {
                        var selectedCol = selectedRecipientsObj.options[i].value;
                        var selectedColArr = selectedCol.split("::");
                        if (selectedColArr[0] == "users")
                            selectedUsers.push(selectedColArr[1]);
                        else if (selectedColArr[0] == "groups")
                            selectedGroups.push(selectedColArr[1]);
                        else if (selectedColArr[0] == "roles")
                            selectedRoles.push(selectedColArr[1]);
                        else if (selectedColArr[0] == "rs")
                            selectedRolesAndSub.push(selectedColArr[1]);
                    }

                    var selectedRecipients = {users: selectedUsers, groups: selectedGroups,
                        roles: selectedRoles, rs: selectedRolesAndSub};
                    var selectedRecipientsJson = JSON.stringify(selectedRecipients);
                    document.NewReport.selectedRecipientsString.value = selectedRecipientsJson;
//alert(selectedRecipientsJson);return false;

                    var scheduledInterval = {scheduletype: document.NewReport.scheduledType.value,
                        month: document.NewReport.scheduledMonth.value,
                        date: document.NewReport.scheduledDOM.value,
                        day: document.NewReport.scheduledDOW.value,
                        time: document.NewReport.scheduledTime.value
                    };

                    var scheduledIntervalJson = JSON.stringify(scheduledInterval);
                    document.NewReport.scheduledIntervalString.value = scheduledIntervalJson;

                    if(reporttype!="custom_report"){
                        var curl = "";
                        c = document.getElementsByTagName('input');
                        for (var i = 0; i < c.length; i++)
                        {
                            if (c[i].type == 'checkbox')
                            {
                                Control_Data = c[i].name.split(':');
                                if (Control_Data[0] == "cb" && c[i].checked == true)
                                {
                                    if (curl != "") {
                                        curl += "$_@_$";
                                    }
                                    curl += c[i].name;
                                }
                            }
                        }
                        document.NewReport.curl_to_go.value = curl;
                    }
                // ITS4YOU-END 9. 9. 2013 13:36:34
                // /* ITS4YOU-CR SlOl | 23.6.2014 15:04  */
                this.getUpSelectedSharing();
                /* ITS4YOU-END 23.6.2014 15:04  */
                // ITS4YOU-CR SlOl 4. 3. 2014 15:58:22
                if (savetype != "") {
                    document.getElementById("SaveType").value = savetype;
                }
                // ITS4YOU-END 4. 3. 2014 15:58:23
        //		jQuery("#newReport").serialize();
                if (this.saveAndRunReport()) {
                    document.NewReport.submit();
                }
            }
        },
        
        saveAndRunReport : function(){
            var reporttype = jQuery("#reporttype").val();
            if(reporttype=="custom_report"){
                return true;
            }
            
            var primarymoduleObj = getObj("primarymodule"); // reportfolder
            var selectedColumn = primarymoduleObj.value;
            document.NewReport.report_primarymodule.value = selectedColumn;

            var selectedColumnsObj = document.getElementById('selectedColumns');
            var selectedSummariesObj = document.getElementById('selectedSummaries');
            
            var selectedGroup1 = document.getElementById('Group1');
            var selectedGroup1Value = document.getElementById('Group1').options[selectedGroup1.selectedIndex].value;
            
            var selectedGroup2 = document.getElementById('Group2');
            var selectedGroup2Value = document.getElementById('Group2').options[selectedGroup2.selectedIndex].value;
            if(selectedGroup2Value=="none"){
                document.getElementById('timeline_type2').options[0].selected =true;
            }

            var selectedGroup3 = document.getElementById('Group3');
            var selectedGroup3Value = document.getElementById('Group3').options[selectedGroup3.selectedIndex].value;
            if(selectedGroup3Value=="none"){
                document.getElementById('timeline_type3').options[0].selected =true;
            }

            var reporttype = jQuery("#reporttype").val();
            if(reporttype=="tabular"){
                if (selectedColumnsObj.length == 0){
                    alert(app.vtranslate('COLUMNS_CANNOT_BE_EMPTY')); 
                    return false;
                }
            }else if(reporttype=="summaries_w_details"){
                if(selectedGroup1Value=="none"){
                    alert(selectedGroup1.name+app.vtranslate('CANNOT_BE_EMPTY'));
                    return false;
                }
                if (selectedColumnsObj.length == 0 && selectedSummariesObj.length == 0){
                    alert(app.vtranslate('COLUMNS_CANNOT_BE_EMPTY')); 
                    return false;
                }
            }else{
                if(selectedGroup1Value=="none"){
                    alert(selectedGroup1.name+app.vtranslate('CANNOT_BE_EMPTY'));
                    return false;
                }
                if (selectedSummariesObj.length == 0){
                    alert(app.vtranslate('COLUMNS_CANNOT_BE_EMPTY')); 
                    return false;
                }    
            }

            var quickFilters = jQuery('#quick_filters').val();
            jQuery('#quick_filters_save').val(quickFilters);

            /*if (selectedColumnsObj.length == 0 && selectedSummariesObj.length == 0 || selectedGroup2Value!="none" && selectedSummariesObj.length==0){
                alert(app.vtranslate('COLUMNS_CANNOT_BE_EMPTY')); 
                return false;
            }*/
            // ITS4YOU-CR SlOl 21. 3. 2016 9:51:58
            /*if(typeof jQuery('#primary_search') != 'undefined' && jQuery('#primary_search').val()!="none"){
                if(jQuery('#allow_in_modules').val() == null || jQuery('#allow_in_modules').val()=='null' || jQuery('#allow_in_modules').val()==''){
                    var ClosestTR = jQuery('#allow_in_modules').closest('tr');
                    var labelName = ClosestTR.find('label').html();
                    alert(labelName+' '+app.vtranslate('CANNOT_BE_EMPTY'));
                    return false;
                }
            }*/
            /** DISABLE MANDATORY MODULE SELECTION if(reporttype!="tabular" && reporttype!="custom_report"){
            if(jQuery('#allow_in_modules').val() == null || jQuery('#allow_in_modules').val()=='null' || jQuery('#allow_in_modules').val()==''){
                var ClosestTR = jQuery('#allow_in_modules').closest('tr');
                var labelName = ClosestTR.find('label').html();
                alert(labelName+' '+app.vtranslate('CANNOT_BE_EMPTY'));
                return false;
            }else{
                jQuery('#allow_in_modules_hidden').val(jQuery('#allow_in_modules').val());
            }
            }*/
            jQuery('#allow_in_modules_hidden').val(jQuery('#allow_in_modules').val());
            // ITS4YOU-END

            var relatedmodules = '';
            var all_related_modules_str = document.getElementById('all_related_modules').value;
            if (all_related_modules_str != '') {
                var all_related_modules = all_related_modules_str.split(":");
                for (i = 0; i <= (all_related_modules.length - 1); i++)
                {
                    var rel_mod_actual = 'relmodule_' + all_related_modules[i];
                    actual_rel_module = document.getElementById(rel_mod_actual);
                    if (actual_rel_module.checked)
                        relatedmodules += actual_rel_module.value + ':';
                }
            }
            document.NewReport.secondarymodule.value = relatedmodules;
            
            if (document.getElementById('summaries_orderby_column')) {
                var summaries_orderby_selectbox = document.getElementById('summaries_orderby_column');
                var summaries_orderby = summaries_orderby_selectbox.options[summaries_orderby_selectbox.selectedIndex].value;

                var summaries_orderby_type = "";
                var summaries_orderby_Radios = document.getElementsByName('summaries_orderby_type');
                for (var i = 0, length = summaries_orderby_Radios.length; i < length; i++) {
                    if (summaries_orderby_Radios[i].checked) {
                        summaries_orderby_type = summaries_orderby_Radios[i].value;
                        break;
                    }
                }
                if (summaries_orderby_type == "") {
                    summaries_orderby_type = "ASC";
                }
                document.getElementById("summaries_orderby_columnString").value = summaries_orderby;
                document.getElementById("summaries_orderby_typeString").value = summaries_orderby_type;
            }


            var escapedOptions = new Array('account_id', 'contactid', 'contact_id', 'product_id', 'parent_id', 'campaignid', 'potential_id', 'assigned_user_id1', 'quote_id', 'accountname', 'salesorder_id', 'vendor_id', 'time_start', 'time_end', 'lastname');

            var conditionColumns = vt_getElementsByName('tr', "conditionColumn");
            var criteriaConditions = [];
            // ITS4YOU-CR SlOl 26. 3. 2014 13:26:01 SELECTBOX VALUES INTO FILTERS
            var sel_fields = JSON.parse(document.getElementById("sel_fields").value);
            for (var i = 0; i < conditionColumns.length; i++) {
                var columnRowId = conditionColumns[i].getAttribute("id");
                var columnRowInfo = columnRowId.split("_");
                var columnGroupId = columnRowInfo[1];
                var columnIndex = columnRowInfo[2];

                if (columnGroupId != "0")
                    ctype = "f";
                else
                    ctype = "g";

                var columnId = ctype + "col" + columnIndex;
                var columnObject = getObj(columnId);
                var selectedColumn = columnObject.value;
                var selectedColumnIndex = columnObject.selectedIndex;
                var selectedColumnLabel = columnObject.options[selectedColumnIndex].text;
                if (columnObject.options[selectedColumnIndex].value != "none") {
                    var comparatorId = ctype + "op" + columnIndex;
                    var comparatorObject = getObj(comparatorId);
                    var comparatorValue = comparatorObject.value;

                    var valueId = ctype + "val" + columnIndex;
                    var valueObject = getObj(valueId);
                    var specifiedValue = valueObject.value;

                    var extValueId = ctype + "val_ext" + columnIndex;
                    var extValueObject = getObj(extValueId);
                    if (extValueObject) {
                        extendedValue = extValueObject.value;
                    }

                    var glueConditionId = ctype + "con" + columnIndex;
                    var glueConditionObject = getObj(glueConditionId);
                    var glueCondition = '';
                    if (glueConditionObject) {
                        glueCondition = glueConditionObject.value;
                    }

                    if(conditionColumns.length>1){
                        if (!emptyCheck4You(columnId, " Column ", "text")){
                            // i < conditionColumns.length
                            return false;
                        }
                        if (!emptyCheck4You(comparatorId, selectedColumnLabel + " Option", "text")){
                            return false;
                        }
                    }

                    var col = selectedColumn.split(":");

                    var std_filter_columns = document.getElementById("std_filter_columns").value;
                    if (typeof std_filter_columns != 'undefined' && std_filter_columns!=""){
                        var std_filter_columns_arr = std_filter_columns.split('<%jsstdjs%>');
                    }else{
                        var std_filter_columns_arr = new Array();
                    }

                    if ('currency_id' === col[1]) {
                        col[4] = 'V';
                    }

                    if (std_filter_columns_arr.indexOf(selectedColumn) > -1) {
                        if(comparatorValue=="custom"){
                            if (!emptyCheck4You("jscal_field_sdate_val_"+columnIndex, " Column ", "text")){
                                return false;
                            }
                        }
                        if(comparatorValue=="custom"){
                            if (!emptyCheck4You("jscal_field_edate_val_"+columnIndex, " Column ", "text")){
                                return false;
                            }
                        }
                        //var start_date = document.getElementById("jscal_field_sdate"+columnIndex).value;
                        //var end_date = document.getElementById("jscal_field_edate"+columnIndex).value;
                        if(comparatorValue=="custom"){
                            var start_date = this.getDbFormatedDateValue(jQuery('#jscal_field_sdate_val_'+columnIndex));
                            var end_date = this.getDbFormatedDateValue(jQuery('#jscal_field_edate_val_'+columnIndex));
	                   	} else {
							var start_date = jQuery("#jscal_field_sdate_val_"+columnIndex).val();
	                        var end_date = jQuery("#jscal_field_edate_val_"+columnIndex).val();
						}
                        var specifiedValue = start_date+"<;@STDV@;>"+end_date;
                        
                    }else{
                        if (escapedOptions.indexOf(col[3]) == -1) {
                            if (col[4] == 'T') {
                                var datime = specifiedValue.split(" ");
                                if (!re_dateValidate(datime[0], selectedColumnLabel + " (Current User Date Time Format)", "OTH"))
                                    return false
                                if (datime.length > 1)
                                    if (!re_patternValidate(datime[1], selectedColumnLabel + " (Time)", "TIMESECONDS"))
                                        return false
                            }
                            else if (col[4] == 'D')
                            {
                                if (!dateValidate(valueId, selectedColumnLabel + " (Current User Date Format)", "OTH"))
                                    return false
                                if (extValueObject) {
                                    if (!dateValidate(extValueId, selectedColumnLabel + " (Current User Date Format)", "OTH"))
                                        return false
                                }
                            } else if (col[4] == 'I')
                            {
                                if (!intValidate(valueId, selectedColumnLabel + " (Integer Criteria)" + i))
                                    return false
                            } else if (col[4] == 'N')
                            {
                                if (!numValidate(valueId, selectedColumnLabel + " (Number) ", "any", true))
                                    return false
                            } else if (col[4] == 'E')
                            {
                                if (!patternValidate(valueId, selectedColumnLabel + " (Email Id)", "EMAIL"))
                                    return false
                            }
                            // ITS4YOU-CR SlOl 28. 3. 2014 8:39:20
                            if (sel_fields[selectedColumn] ) {
                                // fop0
                                // fval0_|_3
                                if(comparatorValue=="e" || comparatorValue=="n"){
                                    var selectElement = jQuery('#s_fval'+columnIndex);
                                    specifiedValue = selectElement.val();
                                }else{
                                    var selectElement = jQuery('#fval'+columnIndex);
                                    specifiedValue = selectElement.val();
                                }
                                /*
                                var sel_fields_array = new Array();
                                var xc = document.getElementsByTagName('input');
                                //var xc = document.getElementsByTagName('li');
                                var m_i = 0;
                                for (var fi = 0; fi < xc.length; fi++)
                                {
                                    if (xc[fi].type == 'checkbox')
                                    {
                                        var sel_field_cb = xc[fi].id;
                                        if (sel_field_cb.substring(0, 8) == "fval" + columnIndex + "_|_") {
                                            if (xc[fi].checked == true) {
                                                sel_fields_array[m_i] = xc[fi].value;
                                                m_i++;
                                            }
                                        }
                                    }
                                }
                                var specifiedValue = sel_fields_array.join();
                                if (!(specifiedValue) || specifiedValue == "") {
                                    alert(selectedColumnLabel + app.vtranslate('CANNOT_BE_NONE'))
                                }
                                var selectElement = jQuery('#s_fval'+columnIndex);
                                specifiedValue = selectElement.val();
                                // fcol fval
                                var form = jQuery('#NewReport');
                                var params = form.serializeFormData();
                                for (var param in params){
                                //for (var fi = 0; fi < params.length; fi++){
                                    alert(param+" -> "+params[param])
                                    if (param.substring(0, 4) == "fval") {
                                        alert(param+" -> "+params[param])
                                    }
                                }
                                */
                                //alert( JSON.stringify(params) );
                                // pokracuj oldo
                                //alert(xc[fi].name+" - "+xc[fi].type);

                            }
                            // ITS4YOU-END 28. 3. 2014 8:39:13
                        }
                    }
                    //Added to handle yes or no for checkbox fields in reports advance filters. 
                    if (col[4] == "C") {
                        if (specifiedValue == "1")
                            specifiedValue = getObj(valueId).value = 'yes';
                        else if (specifiedValue == "0")
                            specifiedValue = getObj(valueId).value = 'no';
                    }
                    if (extValueObject && extendedValue != null && extendedValue != '')
                        specifiedValue = specifiedValue + ',' + extendedValue;
                    
                    var valuehdn = jQuery('#fvalhdn'+columnIndex).val();
                    
                    criteriaConditions[columnIndex] = {"groupid": columnGroupId,
                        "columnname": selectedColumn,
                        "comparator": comparatorValue,
                        "value": specifiedValue,
                        "value_hdn": valuehdn,
                        "column_condition": glueCondition
                    };
                }
            }
            jQuery('#advft_criteria').val(JSON.stringify(criteriaConditions));
            var conditionGroups = vt_getElementsByName('div', "conditionGroup");
            var criteriaGroups = [];
            for (var i = 0; i < conditionGroups.length; i++)
            {
                var groupTableId = conditionGroups[i].getAttribute("id");
                var groupTableInfo = groupTableId.split("_");
                var groupIndex = groupTableInfo[1];

                var groupConditionId = "gpcon" + groupIndex;
                var groupConditionObject = getObj(groupConditionId);
                var groupCondition = '';
                if (groupConditionObject) {
                    groupCondition = groupConditionObject.value;
                }
                criteriaGroups[groupIndex] = {"groupcondition": groupCondition};
            }
            jQuery('#advft_criteria_groups').val(JSON.stringify(criteriaGroups));

            // groupconditioncolumn start
            var GroupconditionColumns = vt_getElementsByName('tr', "groupconditionColumn");
            var GroupcriteriaConditions = [];
            // ITS4YOU-CR SlOl 26. 3. 2014 13:26:01 SELECTBOX VALUES INTO FILTERS
            for (var i = 0; i < GroupconditionColumns.length; i++) {

                var columnRowId = GroupconditionColumns[i].getAttribute("id");
                var columnRowInfo = columnRowId.split("_");
                var columnGroupId = columnRowInfo[1];
                var columnIndex = columnRowInfo[2];

                if (columnGroupId != "0")
                    ctype = "f";
                else
                    ctype = "g";

                var columnId = ctype + "groupcol" + columnIndex;
                var columnObject = getObj(columnId);
                var selectedColumn = columnObject.value;
                var selectedColumnIndex = columnObject.selectedIndex;
                var selectedColumnLabel = columnObject.options[selectedColumnIndex].text;
                if (columnObject.options[selectedColumnIndex].value != "none") {
                    var comparatorId = ctype + "groupop" + columnIndex;
                    var comparatorObject = getObj(comparatorId);
                    var comparatorValue = comparatorObject.value;
                    var valueId = ctype + "groupval" + columnIndex;
                    var valueObject = getObj(valueId);
                    var specifiedValue = valueObject.value;

                    var glueConditionId = ctype + "groupcon" + columnIndex;
                    var glueConditionObject = getObj(glueConditionId);
                    var glueCondition = '';
                    if (glueConditionObject) {
                        glueCondition = glueConditionObject.value;
                    }
                    if(GroupconditionColumns.length>1){
                        if (!emptyCheck4You(columnId, " Column ", "text")){
                            // i < GroupconditionColumns.length
                            return false;
                        }
                        if (!emptyCheck4You(comparatorId, selectedColumnLabel + " Option", "text")){
                            return false;
                        }
                    }

                    var col = selectedColumn.split(":");
                    if (escapedOptions.indexOf(col[3]) == -1) {
                        if (col[4] == 'T') {
                            var datime = specifiedValue.split(" ");
                            if (!re_dateValidate(datime[0], selectedColumnLabel + " (Current User Date Time Format)", "OTH"))
                                return false
                            if (datime.length > 1)
                                if (!re_patternValidate(datime[1], selectedColumnLabel + " (Time)", "TIMESECONDS"))
                                    return false
                        }
                        else if (col[4] == 'D')
                        {
                            if (!dateValidate(valueId, selectedColumnLabel + " (Current User Date Format)", "OTH"))
                                return false
                            if (extValueObject) {
                                if (!dateValidate(extValueId, selectedColumnLabel + " (Current User Date Format)", "OTH"))
                                    return false
                            }
                        } else if (col[4] == 'I')
                        {
                            if (!intValidate(valueId, selectedColumnLabel + " (Integer Criteria)" + i))
                                return false
                        } else if (col[4] == 'N')
                        {
                            if (!numValidate(valueId, selectedColumnLabel + " (Number) ", "any", true))
                                return false
                        } else if (col[4] == 'E')
                        {
                            if (!patternValidate(valueId, selectedColumnLabel + " (Email Id)", "EMAIL"))
                                return false
                        }
                    }
                    //Added to handle yes or no for checkbox fields in reports advance filters. 
                    if (col[4] == "C") {
                        if (specifiedValue == "1")
                            specifiedValue = getObj(valueId).value = 'yes';
                        else if (specifiedValue == "0")
                            specifiedValue = getObj(valueId).value = 'no';
                    }
                    if (extValueObject && extendedValue != null && extendedValue != '')
                        specifiedValue = specifiedValue + ',' + extendedValue;

                    GroupcriteriaConditions[columnIndex] = {"groupid": columnGroupId,
                        "columnname": selectedColumn,
                        "comparator": comparatorValue,
                        "value": specifiedValue,
                        "column_condition": glueCondition
                    };
                }
            }
            jQuery('#groupft_criteria').val(JSON.stringify(GroupcriteriaConditions));
            
            // ITS4YOU-CR SlOl 4. 4. 2016 12:28:04
            getGenerateForOptions = this.getGenerateForOptions();
            generateForOptionsJson = JSON.stringify(getGenerateForOptions);
            jQuery('#selectedGenerateForString').val(generateForOptionsJson);
            // ITS4YOU-END
            
            // groupconditioncolumn end
            
            /*
            var date1 = getObj("startdate")
            var date2 = getObj("enddate")

            if (typeof getObj("stdDateFilter") != 'undefined'){
                var stdNewDateFilterObj = getObj("stdDateFilter");
                var stdNewDateFilterIndex = stdNewDateFilterObj.selectedIndex;
                var stdNewDateFilterValue = stdNewDateFilterObj.options[stdNewDateFilterIndex].value;
                // see this file on top for empty_values definition and ITS4YouReports.php file too
                var go_empty = empty_values.indexOf(stdNewDateFilterValue);
            }else{
                var go_empty = new Array();
            }
            //# validation added for date field validation in final step of report creation
            if (go_empty<0 && (date1.value != ''))
            {
                if (!dateValidate("startdate", "Start Date", "D"))
                    return false;
            }
            if(go_empty<0 && (date2.value != '')){
                if (!dateValidate("enddate", "End Date", "D"))
                    return false;
            }
            if(go_empty<0 && ((date1.value != '') || (date2.value != ''))){
                if (!dateComparison("startdate", 'Start Date', "enddate", 'End Date', 'LE'))
                    return false;
            }
            */

            formSelectedColumnString();
            formSelectedSummariesString();
            // formSelectColumnString();
            getCurl();
            //getQFurl();
            // ITS4YOU-CR SlOl 12. 3. 2014 14:21:47
            getLabelsurl();
            // formSelectQFColumnString();
            if(jQuery('#chartType1').val()!='none' && jQuery('#data_series1').val()=='none'){
                alert(app.vtranslate('Graph1','ITS4YouReports')+" "+app.vtranslate('LBL_CHART_DataSeries','ITS4YouReports')+" "+app.vtranslate('CANNOT_BE_EMPTY','ITS4YouReports'));
                return false;                
            }
            if(jQuery('#chartType2').val()!='none' && jQuery('#data_series2').val()=='none'){
                alert(app.vtranslate('Graph2','ITS4YouReports')+" "+app.vtranslate('LBL_CHART_DataSeries','ITS4YouReports')+" "+app.vtranslate('CANNOT_BE_EMPTY','ITS4YouReports'));
                return false;                
            }
            if(jQuery('#chartType3').val()!='none' && jQuery('#data_series3').val()=='none'){
                alert(app.vtranslate('Graph3','ITS4YouReports')+" "+app.vtranslate('LBL_CHART_DataSeries','ITS4YouReports')+" "+app.vtranslate('CANNOT_BE_EMPTY','ITS4YouReports'));
                return false;
            }
            // ITS4YOU-CR SlOl 17. 5. 2016 14:12:25
            var c_err = false;
            if(jQuery('#cc_td_cell').length>1){
                jQuery('#cc_td_cell').find('.cc_row_class').each(function(index,element){
                    var tdEl = jQuery(element);
                    if(tdEl.find('.cc_row_name').val()==""){
                        alert(app.vtranslate('CalcNameEmptyErr','ITS4YouReports'));
                        c_err = true;
                    }
                    if(tdEl.find('.cc-new-textarea').val()==""){
                        alert(app.vtranslate('CalcExpEmptyErr','ITS4YouReports'));
                        c_err = true;
                    }
                });
            }
            if(c_err==true){
                return false;
            }
            // ITS4YOU-END 17. 5. 2016 14:13:52
            
            return true;
            // document.NewReport.submit();
        },
        
        setStep5Columns : function(step5_result){
            var thisInstance = this;
            var availablemodules = JSON.parse(step5_result[0]);
            var aviable_fields = step5_result[1];

            var avaimodules_sbox = document.getElementById('availModules');
            avaimodules_sbox.innerHTML = "";
            avaimodules_sbox.options.length = 0;
            for (var widgetId in availablemodules)
            {
                if (availablemodules.hasOwnProperty(widgetId))
                {
                    option = availablemodules[widgetId];
                    var oOption = document.createElement("OPTION");
                    oOption.value = option["id"];
                    if (option["checked"] == "checked") {
                        oOption.checked = true;
                        var option_name = option["name"];
                    } else {
                        var option_name = "- " + option["name"];
                    }
                    oOption.appendChild(document.createTextNode(option_name));
                    avaimodules_sbox.appendChild(oOption);
                }
            }
            thisInstance.setAvailableFields(aviable_fields)
        },
        // ITS4YOU-CR SlOl 4. 4. 2016 8:01:23
        getSchedulerGenerateFor : function(){
            var record = document.NewReport.record.value;
            var selectedPrimaryModule = jQuery("#primarymodule").val();
            
            var selectedGenerateFor = jQuery('#generate_for').val();
            
            var postData = {
                "record": record,
                "reportmodule": selectedPrimaryModule,
                "primarymodule": selectedPrimaryModule,
                "selectedGenerateFor": selectedGenerateFor
            };
            
            var actionParams = {
                "type": "POST",
                "url": 'index.php?action=IndexAjax&mode=getSchedulerGenerateFor&module=ITS4YouReports',
                "dataType": "html",
                "data": postData
            };

//alert(JSON.stringify(actionParams));
            AppConnector.request(actionParams).then(
                function(data) {
                    jQuery('#generate_for_div').html(data);
                    app.changeSelectElementView(jQuery('#generate_for'));
                }
            );
        },
        // ITS4YOU-CR SlOl 7. 4. 2016 6:31:19
        getGenerateForOptions : function(){
            var generateForOptions = new Array();
            jQuery('#generate_for').find('option:selected').each(function(index,element){
                var chosenOption = jQuery(element);
                generateForOptions[index] = chosenOption.val();
            });
            return generateForOptions;
        },
        // ITS4YOU-END
        //ITS4You start    
        registerHelpinfoTooltip: function () {
            var thisInstance = this;
            jQuery('.editHelpInfo').each(function (index, element) {
                jQuery(this).mouseenter(function (e) {
                    var currentTarget = jQuery(e.currentTarget);

                    if (!currentTarget.hasClass("tooltipstered")) {
    
                        var text = currentTarget.data('text');
                        var options = {
                            delay: {"show": 100, "hide": 500},
                            title: thisInstance.nl2br(text)
                        };
                        jQuery(currentTarget).tooltip(options).tooltip("show");
                        jQuery(currentTarget).addClass('tooltipstered');
                    }
                });
            });
        },
        nl2br: function (varTest) {
            return varTest.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
        },
	
	    getDbFormatedDateValue : function(dateObj) {
			if(dateObj==""){
		        return dateObj;
		    }
		    if(typeof dateObj !='undefined'){
		        
				var db_date_format = 'dd-mm-yyyy';
		        var from_date_format = dateObj.data('date-format');
		        var from_value = dateObj.val();
		        
				var dateArray = from_value.split('-');
		        var dateArrayDots = from_value.split('.');
		        
		        var formatedDate = "";
		        switch(from_date_format){
		            case 'dd-mm-yyyy':
		                formatedDate = dateArray[2]+'-'+dateArray[1]+'-'+dateArray[0];
		                break;
		            case 'mm-dd-yyyy':
		                formatedDate = dateArray[2]+'-'+dateArray[0]+'-'+dateArray[1];
		                break;
		            case 'yyyy-mm-dd':
		                formatedDate = dateArray[0]+'-'+dateArray[1]+'-'+dateArray[2];
		                break;
		            case 'dd.mm.yyyy':
		                formatedDate = dateArray[2]+'-'+dateArray[1]+'-'+dateArray[0];
		                break;
		        }
		    }    
		    return formatedDate;   
		},
	        //ITS4You end
        setAvailableFields : function(aviable_fields){
            document.getElementById("availModValues").innerHTML = aviable_fields;
            var mod_groups_a2 = aviable_fields.split("(!#_ID@ID_#!)");
            var module_groupid = mod_groups_a2[0];
            var module_name = mod_groups_a2[1];
            var aviable_fields = mod_groups_a2[2];

            var availModules = document.getElementById("availModules");
            var selectedModule = availModules.options[availModules.selectedIndex].value;
            if (module_groupid == selectedModule) {
                document.getElementById('availList').innerHTML = "";

                optgroups = aviable_fields.split("(|@!@|)");
                for (i = 0; i < optgroups.length; i++)
                {

                    var optgroup = optgroups[i].split("(|@|)");

                    if (optgroup[0] != '')
                    {
                        var oOptgroup = document.createElement("OPTGROUP");
                        oOptgroup.label = optgroup[0];

                        var responseVal = JSON.parse(optgroup[1]);
                        for (var widgetId in responseVal)
                        {
                            if (responseVal.hasOwnProperty(widgetId))
                            {
                                option = responseVal[widgetId];
                                var oOption = document.createElement("OPTION");
                                oOption.value = option["value"];
                                oOption.appendChild(document.createTextNode(option["text"]));
                                oOptgroup.appendChild(oOption);
                                document.getElementById('availList').appendChild(oOptgroup);
                            }
                        }
                    }
                }
            }
        }
        
});
