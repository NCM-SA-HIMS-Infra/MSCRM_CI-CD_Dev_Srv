 <?php
	/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
	$languageStrings = array(
		// Basic Strings
		'HelpDesk' => 'Tickets',
		'SINGLE_HelpDesk' => 'Ticket',
		'LBL_ADD_RECORD' => 'Add Ticket',
		'LBL_RECORDS_LIST' => 'Ticket List',

		// Blocks
		'LBL_TICKET_INFORMATION' => 'Ticket Information',
		'LBL_TICKET_RESOLUTION' => 'Ticket Resolution',


		//2021-07-01 Myo Min Kyaw add new field in ticket start
		'LBL_ACTUAL_START_DATE' => 'Actual Start Date',
		'LBL_ACTUAL_END_DATE' => 'Actual End Date',
		'LBL_LASTACTIVITY_DATE' => 'Last date of activities',
		//2021-07-01 Myo Min Kyaw add new field in ticket end

		//Field Labels
		'Ticket No' => 'Ticket Number',
		'Severity' => 'Severity',
		'Update History' => 'Update History',
		'Hours' => 'Hours',
		'Days' => 'Days',
		'Title' => 'Title',
		'Solution' => 'Solution',
		'From Portal' => 'From Portal',
		'Related To' => 'Organization Name',
		'Contact Name' => 'Contact Name',
		//Added for existing picklist entries

		'Big Problem' => 'Big Problem',
		'Small Problem' => 'Small Problem',
		'Other Problem' => 'Other Problem',

		'Normal' => 'Normal',
		'High' => 'High',
		'Urgent' => 'Urgent',

		'Minor' => 'Minor',
		'Major' => 'Major',
		'Feature' => 'Feature',
		'Critical' => 'Critical',

		'Open' => 'Open',
		'Wait For Response' => 'Wait For Response',
		'Closed' => 'Closed',
		'LBL_STATUS' => 'Status',
		'LBL_SEVERITY' => 'Severity',
		//DetailView Actions
		'LBL_CONVERT_FAQ' => 'Convert to FAQ',
		'LBL_RELATED_TO' => 'Related To',

		//added to support i18n in ticket mails
		'Ticket ID' => 'Ticket ID',
		'Hi' => 'Hi',
		'Dear' => 'Dear',
		'LBL_PORTAL_BODY_MAILINFO' => 'The Ticket is',
		'LBL_DETAIL' => 'the details are :',
		'LBL_REGARDS' => 'Regards',
		'LBL_TEAM' => 'HelpDesk Team',
		'LBL_TICKET_DETAILS' => 'Ticket Details',
		'LBL_SUBJECT' => 'Subject : ',
		'created' => 'created',
		'replied' => 'replied',
		'reply' => 'There is a reply to',
		'customer_portal' => 'in the "Customer Portal" at VTiger.',
		'link' => 'You can use the following link to view the replies made:',
		'Thanks' => 'Thanks',
		'Support_team' => 'Vtiger Support Team',
		'The comments are' => 'The comments are',
		'Ticket Title' => 'Ticket Title',
		'Re' => 'Re :',

		//This label for customerportal.
		'LBL_STATUS_CLOSED' => 'Closed', //Do not convert this label. This is used to check the status. If the status 'Closed' is changed in vtigerCRM server side then you have to change in customerportal language file also.
		'LBL_STATUS_UPDATE' => 'Ticket status is updated as',
		'LBL_COULDNOT_CLOSED' => 'Ticket could not be',
		'LBL_CUSTOMER_COMMENTS' => 'Customer has provided the following additional information to your reply:',
		'LBL_RESPOND' => 'Kindly respond to above ticket at the earliest.',
		'LBL_SUPPORT_ADMIN' => 'Support Administrator',
		'LBL_RESPONDTO_TICKETID' => 'Respond to Ticket ID',
		'LBL_RESPONSE_TO_TICKET_NUMBER' => 'Response to Ticket Number',
		'LBL_TICKET_NUMBER' => 'Ticket Number',
		'LBL_CUSTOMER_PORTAL' => 'in Customer Portal - URGENT',
		'LBL_LOGIN_DETAILS' => 'Following are your Customer Portal login details :',
		'LBL_MAIL_COULDNOT_SENT' => 'Mail could not be sent',
		'LBL_USERNAME' => 'User Name :',
		'LBL_PASSWORD' => 'Password :',
		'LBL_SUBJECT_PORTAL_LOGIN_DETAILS' => 'Regarding your Customer Portal login details',
		'LBL_GIVE_MAILID' => 'Please give your email id',
		'LBL_CHECK_MAILID' => 'Please check your email id for Customer Portal',
		'LBL_LOGIN_REVOKED' => 'Your login is revoked. Please contact your admin.',
		'LBL_MAIL_SENT' => 'Mail has been sent to your mail id with the customer portal login details',
		'LBL_ALTBODY' => 'This is the body in plain text for non-HTML mail clients',
		'HelpDesk ID' => 'Ticket ID',
		//Portal shortcuts
		'LBL_ADD_DOCUMENT' => "Add Document",
		'LBL_OPEN_TICKETS' => "Open Tickets",
		'LBL_CREATE_TICKET' => "Create Ticket",
		/*2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 Start*/
		'LBL_ISSUE_DATE' => 'Issue Date',
		'LBL_SUPPORT_TYPE' => 'Support Type',
		'LBL_ASSIGNED_USER' => 'Assigned User',
		'LBL_RECEIVED_BY' => 'Received By',
		'LBL_TRAUBLE_CATEGORIES' => 'Trouble Categories',
		'LBL_PLAN_START_DATE' => 'Plan Start Date',
		'LBL_PLAN_END_DATE' => 'Plan End Date',
		'LBL_TIME_START' => 'Time Start',
		'LBL_TIME_END' => 'Time End',
		'LBL_INVOICE_PATTERN' => 'Invoice Pattern',
		'LBL_REASON_FOR_INVOICE' => 'Reason For Invoice',
		'LBL_PLAN_TOTAL_TIME' => 'Plan Total Time (hr)',
		'LBL_TOTAL_SERVICE_HOUR' => 'Total Service Hour',
		'LBL_ACKNOWLEDGE' => 'Acknowledge',
		'LBL_ACKNOWLEDGE_MYANMAR' => 'Acknowledge(Myanmar)',
		'LBL_DESCRIPTION_MYANMAR' => 'Description(Myanmar)',
		'LBL_NOTED_CONFIRMED' => 'Noted Confirmed',
		'LBL_NOTED_CONFIRMED_MYANMAR' => 'Noted Confirmed(Myanmar)',
		'LBL_TICKET_SIGNATURES' => 'Ticket Signatures',
		'LBL_ENGINEER_NAME' => 'Engineer Name',
		'LBL_CUSTOMER_NAME' => 'Customer Name',
		'LBL_MACHINE_SERIAL_NO' => 'Machine Serial No.',
		'LBL_EDIT_LIST_PRICE' => 'Selling Price',
		'LBL_EDIT_QTY' => 'Qty',
		'LBL_ALREADY_GENERATE_INVOICE' => 'Already Generated Invoice',
		/*2020/09/08 Thet Phyo Wai Add Field Ticket Ver 1.0 END*/
		/*2020-12-14 Thet Phyo Wai Add other Assigned User in Ticket MSCRM start*/
		'LBL_OTHER_ASSIGNED_USER' => 'Other Assigned User',
		/*2020-12-14 Thet Phyo Wai Add other Assigned User in Ticket MSCRM End*/
	);

	$jsLanguageStrings = array(
		'LBL_ADD_DOCUMENT' => 'Add Document',
		'LBL_OPEN_TICKETS' => 'Open Tickets',
		'LBL_CREATE_TICKET' => 'Create Ticket'
	);
