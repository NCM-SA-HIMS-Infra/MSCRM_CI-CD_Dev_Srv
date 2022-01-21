<?php
require_once('modules/Emails/mail.php');
require_once 'libraries/PHPExcel/PHPExcel.php';
require_once 'libraries/PHPExcel/PHPExcel/IOFactory.php';

class Vtiger_ImportServices_Action extends Vtiger_Action_Controller {

	private $log_file = 'C:\crm\bin\ImportServices.log';
	// private $to_email='crm_support@hirokei.co.jp';
	private $filepath_event_master= "C:\crm\Services.xlsx";//対応履歴マスタファイルパス
	private $event_list = array();
	
	private $defaultSetting= array(
			'module' => 	"Services",
			'action' => 	"Save",
			'record' => 	null,
			'visibility' => 	"Public",//NULLでもよいのか？
	);
	
	
	public function checkPermission(Vtiger_Request $request) {

	}

  public function process(Vtiger_Request $request) {
		global $current_user, $adb, $root_directory, $log;
		ini_set('display_errors','on'); error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT );
		ini_set('memory_limit','-1');
		ini_set("max_execution_time",10800);
		
		//ログファイルは毎回上書き
		// unlink($this->log_file);
		$this->logger('[START] Import Services');
		//$this->logger('インポートバッチ処理開始');
		//下記のログを出力する。
		$start_time = "START:" . date(" d-M H:i") . "<br>";
		//$start_time = "START:" . date("n月j日 H時i分") . "<br>";
		echo $start_time;
		
		$this->loadEventMaster();
		
		//前処理で読み込んだ対応履歴情報分、下記の処理を実行する。
		$this->importServices();
		
		//ログを出力する。
		$this->logger('[END] Import Product');
		echo "SUCCESS:" . date(" d-M H:i") ;
		//$this->logger('インポートバッチ処理完了');
		//echo "SUCCESS:" . date("n月j日 H時i分");
	}

	private function importServices() {
		$userModel = Users_Record_Model::getCurrentUserModel();
		foreach ($this->event_list as $event) {
			$import_event = array();
			
			foreach($this->defaultSetting as $name => $val) {
				$import_event[$name] = $val;
			}
			

			$import_event['servicename'] = $event[0];
			$import_event['service_no'] = $event[1];
			$import_event['service_usageunit'] = $event[2];
			$import_event['discontinued'] = $event[3];
			$import_event['qty_per_unit'] = $event[4];
			$import_event['website'] = $event[5];
			$import_event['servicecategory'] = $event[6];
			$import_event['sales_start_date'] = $event[7];
			$import_event['sales_end_date'] = $event[8];
			$import_event['start_date'] = $event[9];
			$import_event['expiry_date'] = $event[10];
			$import_event['unit_price'] = $event[11];
			$import_event['commissionrate'] = $event[12];
			$import_event['taxclass'] = $event[13];

			if(!($event[14] == 0 || $event[14] == '' || $event[14] == null)){
				$PCurrency= $this->fetcbPurchaseCurrencyAmount($event[14],$userModel->get('currency_id'));
				$import_event['purchase_cost'] = $PCurrency;
			}
			
			$import_event['description'] = $event[15];
			//16,17,18

			$wk_purchasecurrency = $this->fetchPurchaseCurrencyByCode($event[20]);
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
					$import_event['currency'] = $event[20];
				}
			}

			$wk_unitpricecurrency = $this->fetchCheckCurrencyByCode($event[19]);
			if($wk_unitpricecurrency == "NotExitUnitPriceCurrency"){
				print_r($event[0]."'s Currency Name does not Exit <br/>");
				$this->logger($event[0]."'s Currency Name does not Exit.");
				continue;
			}

			$saveAction = new Vtiger_Save_Action();
			try {
				$obj = $saveAction->saveRecord(new Vtiger_Request($import_event, $import_event));
				$wk_currency = $this->fetchCurrencyByCode($event[19] ,$obj->get('id'),$obj->get('unit_price'),$userModel->get('currency_id'));
				//$wk_currency = $this->fetchCurrencyByCode($event[19] ,$obj->get('id'));
			}
			catch (Exception $e) {
				//例外の詳細情報をログ出力
				$this->logger('[ERROR]Import Products Error '. $e->getMessage());
				//$this->logger('[エラー]データ保存処理失敗 '. $e->getMessage());
				$this->logger($e->getTraceAsString());
				continue;
			}
		}
		
	}
	
	private function loadEventMaster() {
		//第1シートから対応履歴マスタデータを抽出する。
		$this->event_list = array();
		$this->event_list= $this->readExcelSheet($this->filepath_event_master, 0, 21, "対応履歴");
	}
	
	private function readExcelSheet($filepath, $sheet_index, $colMax, $sheet_name) {
		
		if(file_exists($filepath) == false) {
			$wk = '[ERROR]Excel File(' . $filepath . '). Does Not Exit. Import Failed!';
			//$wk = '[エラー]Excelファイル(' . $filepath . ')が存在しません。インポート処理が異常終了しました。';
			$this->logger($wk);
// 			$this->sendmail($wk);
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
				// 				if($tmp_cell_value== '' || $tmp_cell_value== null) {
				// 					$wk = "[エラー][シート:" . $sheet_name ."]" . $r . "行,". ($c+1) . "列に空白セルが存在";
				// 					$this->logger($wk);
				// 					$err_info[] = $wk;
				// 				}
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
			$this->sendmail($err_info);
			throw new Exception($err_info);
		}
		
		return $records;
	}


	private function fetchCurrencyByCode($code,$sreviceid,$price,$currency_id)
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
UPDATE vtiger_service
SET currency_id = ?
WHERE serviceid = ?;
EOM;
			$adb->pquery($update_sql, array($currency_id,$sreviceid));
		}

		$insert_sql = <<< EOM
INSERT INTO vtiger_productcurrencyrel VALUES(?,?,?,?);
EOM;
		$adb->pquery($insert_sql, array($sreviceid,$currency_id,$price,$price));
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
			$currency_rate= $row['conversion_rate'];
			$amount = $pcurrency*$currency_rate ;
			
			$log->debug("Exiting fetcbPurchaseCurrencyAmount method ...");
			return $amount;
		}
	}	
	
	//*2020-12-18 Pyae Phyo Mon Manual Import Repair for Purchase Cost Ver 1.0 End*/
	
	function logger($message){
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Rangoon'));
		//$date->setTimezone(new DateTimeZone('Asia/Tokyo'));
		
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
