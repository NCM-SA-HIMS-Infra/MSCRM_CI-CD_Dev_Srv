<?php
require_once('modules/Emails/mail.php');
require_once 'libraries/PHPExcel/PHPExcel.php';
require_once 'libraries/PHPExcel/PHPExcel/IOFactory.php';

class Vtiger_ImportProducts_Action extends Vtiger_Action_Controller {

	private $log_file = 'C:\crm\bin\ImportProducts.log';
	private $to_email='crm_support@hirokei.co.jp';
	private $filepath_event_master= "C:\crm\Products.xlsx";//Run File Location
	private $event_list = array();
	
	private $defaultSetting= array(
			'module' => 	"Products",
			'action' => 	"Save",
			'record' => 	null,
			'visibility' => 	"Public",
	);
	
	
	public function checkPermission(Vtiger_Request $request) {

	}

  public function process(Vtiger_Request $request) {
		global $current_user, $adb, $root_directory, $log;
		ini_set('display_errors','on'); error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT );
		ini_set('memory_limit','-1');
		ini_set("max_execution_time",10800);
		
		//ログファイルは毎回上書き
		//unlink($this->log_file);
		$this->logger('[START] Import Products');
		//下記のログを出力する。
		$start_time = "START:" . date(" d-M H:i") . "<br>";
		echo $start_time;
		
		$this->loadEventMaster();
		
		//前処理で読み込んだ対応履歴情報分、下記の処理を実行する。
		$this->importProducts();
		
		//ログを出力する。
		$this->logger('[END] Import Product');
		echo "SUCCESS:" . date(" d-M H:i") ;
	}

	private function importProducts() {
		$userModel = Users_Record_Model::getCurrentUserModel();
		foreach ($this->event_list as $event) {
			$import_event = array();

			foreach($this->defaultSetting as $name => $val) {
				$import_event[$name] = $val;
			}

			$import_event['productname'] = $event[0];
			$import_event['product_part'] = $event[1];
			$import_event['product_number'] = $event[2];
			$import_event['discontinued'] = $event[3];
			$import_event['product_available_status'] = $event[4];
			$import_event['productcategory'] = $event[5];

			$wk_vendor = $this->fetchVendorByName($event[6]);
			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 Start*/
			if($wk_vendor=='NotExitVendorName')
			{
				print_r($event[0]."'s Vendor Name does not Exit in system <br/>");
				$this->logger($event[0]."'s Vendor Name does not Exit in system.");
				continue;
			}
			else
			{				
				if(isset($wk_vendor)) {
					$import_event['vendor_id'] = $wk_vendor['vendorid'];
				}else{
					$import_event['vendor_id'] = $event[6];
				}
			}
			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/

			$import_event['website'] = $event[7];
			$import_event['sales_start_date'] = gmdate('Y-m-d', strtotime($event[8]));
			$import_event['sales_end_date'] = gmdate('Y-m-d', strtotime($event[9]));
			$import_event['manufacturer'] = $event[10];
			$import_event['unit_price'] = $event[11];
			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 Start*/
			if(!($event[12] == 0 || $event[12] == '' || $event[12] == null)){
				$PCurrency= $this->fetcbPurchaseCurrencyAmount($event[12],$userModel->get('currency_id'));
				$import_event['purchase_cost'] = $PCurrency;
			}
			//$import_event['purchase_cost'] = $event[12];
			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/
			//13
			$import_event['commissionrate'] = $event[14];
			$import_event['usageunit'] = $event[15];
			$import_event['reorderlevel'] = $event[16];
			$import_event['qtyinstock'] = $event[17];
			$import_event['min_or_qty'] = $event[18];
			$import_event['description'] = $event[19];
			//20,21,22
			$import_event['assigned_user_id'] = $userModel->id;//対応担当
			
			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 Start*/
			$wk_purchasecurrency = $this->fetchPurchaseCurrencyByCode($event[24]);
			if($wk_purchasecurrency=='NotExitCurrencyName')
			{
				print_r($event[0]."'s Purchase Currency Name does not Exit <br/>");
				$this->logger($event[0]."'s Purchase Currency Name does not Exit.");
				continue;
			}
			else
			{
				if(isset($wk_purchasecurrency)) {
					$import_event['currency'] = $wk_purchasecurrency['id'];
				}else{
					$import_event['currency'] = $event[24];
				}
			}

			$wk_unitpricecurrency = $this->fetchCheckCurrencyByCode($event[23]);
			if($wk_unitpricecurrency == "NotExitUnitPriceCurrency"){
				print_r($event[0]."'s Currency Name does not Exit <br/>");
				$this->logger($event[0]."'s Currency Name does not Exit.");
				continue;
			}

			//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/

			$saveAction = new Vtiger_Save_Action();
			try {
				$obj = $saveAction->saveRecord(new Vtiger_Request($import_event, $import_event));
				$wk_currency = $this->fetchCurrencyByCode($event[23] ,$obj->get('id'),$obj->get('unit_price'),$userModel->get('currency_id'));
			}
			catch (Exception $e) {
				print_r($e->getTraceAsString());
				//例外の詳細情報をログ出力
				$this->logger('[ERROR]Import Products Error '. $e->getMessage());
				$this->logger($e->getTraceAsString());
				continue;
			}
		}
		
	}
	
	private function loadEventMaster() {
		//第1シートから対応履歴マスタデータを抽出する。
		$this->event_list = array();
		$this->event_list= $this->readExcelSheet($this->filepath_event_master, 0, 25, "対応履歴");
	}
	
	private function readExcelSheet($filepath, $sheet_index, $colMax, $sheet_name) {
		
		if(file_exists($filepath) == false) {
			$wk = '[ERROR]Excel File(' . $filepath . '). Does Not Exit. Import Failed!';
			echo $wk. "<br>";
			$this->logger($wk);
			throw new Exception($wk);
		}
		
		//Excelファイルをオープン
		$objReader = PHPExcel_IOFactory::load($filepath);
		
		//シートからデータを抽出する。
		$sheet1 = $objReader->setActiveSheetIndex($sheet_index);
		$rowMax = $sheet1->getHighestRow();
		$records = array();
		
		$err_info = array();
		for($r=2; $r<=$rowMax; $r++) { //１行目はヘッダなのでスキップ
			$tmp = array();
			for($c=0; $c < $colMax; $c++) { //colは0はじまり 0 = Aとなる
				$objCell = $sheet1->getCellByColumnAndRow($c, $r);
				$tmp_cell_value = $this->_getText($objCell);
				$tmp[] = $tmp_cell_value;
			}
			$records[] = $tmp;
		}
		
		//Excelシート読み込み処理で利用したメモリを解放
		$objReader->disconnectWorksheets();
		unset($sheet1);
		unset($objReader);
		
		//セルに空白がある場合はエラーとする
		if(count($err_info) > 0) {
			throw new Exception($err_info);
		}
		return $records;
	}
	
	/** To get the user's data by user_name
	 * @param $user_name -- The user name:: String Type
	 * @returns  $row :: Type array
	 */

	private function fetchVendorByName($name)
	{
		global $log;
		$log->debug("Entering fetchVendorByName(".$name.") method ...");
		global $adb;
		$sql = <<< EOM
SELECT *
FROM vtiger_vendor
INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_vendor.vendorid
WHERE vtiger_vendor.vendorname=? AND vtiger_crmentity.deleted = 0;
EOM;
		
		$result = $adb->pquery($sql, array($name));
		if($adb->num_rows($result) >0){
			$row = $adb->query_result_rowdata($result);
			
			$log->debug("Exiting fetchVendorByName method ...");
			return $row;
		}
		//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 Start*/
		else
		{
			return "NotExitVendorName";
		}
		//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/
	}

	private function fetchCurrencyByCode($code,$productid,$price,$currency_id)
	{
		global $log;
		$log->debug("Entering fetchCurrencyByCode(".$code.") method ...");
		global $adb;

		$sql = <<< EOM
SELECT *
FROM vtiger_currency_info
WHERE currency_code = ? AND currency_status = 'Active';
EOM;
		
		$result = $adb->pquery($sql, array($code));
		if($adb->num_rows($result) >0){
			$row = $adb->query_result_rowdata($result);
			$currency_id = $row['id'];
			$update_sql = <<< EOM
UPDATE vtiger_products
SET currency_id = ?
WHERE productid = ?;
EOM;
			$adb->pquery($update_sql, array($currency_id,$productid));

		}
		$insert_sql = <<< EOM
INSERT INTO vtiger_productcurrencyrel VALUES(?,?,?,?);
EOM;
		$adb->pquery($insert_sql, array($productid,$currency_id,$price,$price));
		$log->debug("Exiting fetchCurrencyByCode method ...");
	}
	
	//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 Start*/
	private function fetchCheckCurrencyByCode($code)
	{
		global $log;
		$log->debug("Entering fetchCheckCurrencyByCode(".$code.") method ...");
		global $adb;

		$sql = <<< EOM
SELECT *
FROM vtiger_currency_info
WHERE currency_code = ? AND currency_status = 'Active';
EOM;
		
		$result = $adb->pquery($sql, array($code));
		if($adb->num_rows($result) >0){
			return "ExitData";
		}
		else
		{
			return "NotExitUnitPriceCurrency";
		}
	}
	
	private function fetchPurchaseCurrencyByCode($PurchaseCost)
	{
		global $log;
		$log->debug("Entering fetchPurchaseCurrencyByCode(".$PurchaseCost.") method ...");
		global $adb;
		$sql = <<< EOM
SELECT *
FROM vtiger_currency_info
WHERE currency_name = ? AND currency_status = 'Active';
EOM;
		
		$result = $adb->pquery($sql, array($PurchaseCost));
		if($adb->num_rows($result) >0){
			$row = $adb->query_result_rowdata($result);
			
			$log->debug("Exiting fetchPurchaseCurrencyByCode method ...");
			return $row;
		}
		else
		{
			return "NotExitCurrencyName";
		}
	}

	private function fetcbPurchaseCurrencyAmount($pcurrency,$usercurrencyid)
	{
		global $log;
		$log->debug("Entering fetcbPurchaseCurrencyAmount(".$pcurrency.") method ...");
		global $adb;
		$sql = <<< EOM
SELECT *
FROM vtiger_currency_info
WHERE id = ? AND currency_status = 'Active';
EOM;
		
		$result = $adb->pquery($sql, array($usercurrencyid));
		
		if($adb->num_rows($result) >0){
			$row = $adb->query_result_rowdata($result);
			$currency_id = $row['conversion_rate'];
			$amount = $pcurrency*$currency_id ;
			
			$log->debug("Exiting fetcbPurchaseCurrencyAmount method ...");
			return $amount;
		}
	}	
	//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/

	function logger($message){
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Rangoon'));
		
		$logmessage = '[' . $date->format('Y-m-d H:i:s') . ']' . mb_convert_encoding($message, "SJIS") . "\r\n";
		file_put_contents($this->log_file, $logmessage, FILE_APPEND | LOCK_EX);
	}


	protected function _getText($objCell = null)
	{
		if (is_null($objCell)) {
			return false;
		}

		$txtCell = "";

		//まずはgetValue()を実行
		$valueCell = $objCell->getFormattedValue();

		if (is_object($valueCell)) {
			//オブジェクトが返ってきたら、リッチテキスト要素を取得
			$rtfCell = $valueCell->getRichTextElements();
			//配列で返ってくるので、そこからさらに文字列を抽出
			$txtParts = array();
			foreach ($rtfCell as $v) {
				$txtParts[] = $v->getText();
			}
			//連結する
			$txtCell = implode("", $txtParts);

		} else {
			if (!empty($valueCell)) {
				$txtCell = $valueCell;
			}
		}

		return $txtCell;
	}

	protected function replaceExcelText($str) {

		$str = str_replace("_x000D_", "", $str);

		return $str;
	}
}
