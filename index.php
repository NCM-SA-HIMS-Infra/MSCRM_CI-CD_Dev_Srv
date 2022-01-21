<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

// HIROKEI CUSTOMIZED START
/*try {
    session_start();
    if (isset($_SESSION['tenant_passcode']) == false) {
        throw new Exception('Passcode is empty.');
    }
} catch (Exception $e) {
    header('location: https://www.baascrm.com/passcode');
//    echo "<b>Please log in below again.</b>";
//    echo "<br />";
//    echo "<a href = 'https://www.baascrm.com/passcode'>https://www.baascrm.com/passcode</a>";
//    echo "<br />";
//    echo "<br />";
//    echo "<u>HIMS Support Center</u>";
//    echo "<br />";
//    echo " Phone : +95-1-538363";
//    echo "<br />";
//    echo " Email : support-center@hirokei-myanmar.com";
    exit;
}
//echo $_SESSION['tenant_passcode'];
//unset($?SESSION['tenant_passcode']);
// HIROKEI CUSTOMIZED END

//Overrides GetRelatedList : used to get related query
//TODO : Eliminate below hacking solution
//include_once 'include/Webservices/Relation.php';
//include_once 'vtlib/Vtiger/Module.php';
//include_once 'includes/main/WebUI.php';

//$webUI = new Vtiger_WebUI();
//$webUI->process(new Vtiger_Request($_REQUEST, $_REQUEST));*/
// Session Setting and Redirect to Passcode by HIMS Start
session_start();

//if (!empty($_SESSION['tenant_passcode']) && ($_SESSION['tenant_passcode'] == 'a7fda0b61e2047f0f1057d1f5f064c272fd5d490961c531f4df64b0dd354683a')){
	include_once 'include/Webservices/Relation.php';
	include_once 'vtlib/Vtiger/Module.php';
	include_once 'includes/main/WebUI.php';

	$webUI = new Vtiger_WebUI();
	$webUI->process(new Vtiger_Request($_REQUEST, $_REQUEST));	
	
//}else{
//	return header("location:http://dev.baascrm.com/passcode/");

//}
// Session Setting and Redirect to Passcode by HIMS End

