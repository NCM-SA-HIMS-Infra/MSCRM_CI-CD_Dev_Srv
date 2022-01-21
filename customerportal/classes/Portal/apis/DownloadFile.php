<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.2
 * ("License.txt"); You may not use this file except in compliance with the License
 * The Original Code is: Vtiger CRM Open Source
 * The Initial Developer of the Original Code is Vtiger.
 * Portions created by Vtiger are Copyright (C) Vtiger.
 * All Rights Reserved.
 * ***********************************************************************************/

class Portal_DownloadFile_API extends Portal_Default_API {

	public function process(Portal_Request $request) {
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM start
		$servername = Portal_Config::get('servername');
		$username = Portal_Config::get('username');
		$password = Portal_Config::get('password');
		$database = Portal_Config::get('database');

		// Create connection
		$adb = new mysqli($servername, $username, $password,$database);

		// Check connection
		if ($adb->connect_error) {
  		die("Connection failed: " . $adb->connect_error);
		}
		echo "Connected successfully";

		$id_str = $request->get('recordId', array());
		$id_str = substr($id_str,3)+1;

		$filepathQuery = 'SELECT attachmentsid,path,name,storedname FROM vtiger_attachments WHERE attachmentsid = '.$id_str;
		$fileres = $adb->query($filepathQuery);
		while($row = $fileres->fetch_assoc()) {
    		$filepath = $row["path"];
			$filename = $row["storedname"];
			$attachmentId = $row["attachmentsid"];
  		}		

		$filenamewithpath = "F:/Project/MSCRM_Release/".$filepath.$attachmentId."_".$filename;
		if(file_exists($filenamewithpath)){
			$filesize = filesize($filenamewithpath);
		}
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM end

		$module = $request->getModule();
		$parentId = $request->get('parentId');
		// Required attachment Id incase if module is modcomments
		// to support multiple attachment
		$attachmentId = $request->get('attachmentId');
		$parentModule = $request->get('parentModule');
		
		$result = Vtiger_Connector::getInstance()->downloadFile($module, $request->get('recordId', array()), $parentId, $parentModule, $attachmentId);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Content-type: '.$result['filetype']);
		header('Content-Disposition: attachment; filename='.$result['filename']);
		header('Expires: 0');
		header('Pragma: public');
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM start
		// header('Content-Length: '.$result['filesize']);
		header('Content-Length: '.$filesize);
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM end
		ob_clean();
		flush();
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM start
		// echo base64_decode($result['filecontents']);
		print_r(file_get_contents($filenamewithpath));
		// 2020/11/11 Su Latt Customer portal document download problem MSCRM end
	}

}
