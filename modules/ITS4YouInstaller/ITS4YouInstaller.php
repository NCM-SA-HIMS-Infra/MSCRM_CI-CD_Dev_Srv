<?php
/* * *******************************************************************************
* Description:  ITS4You Installer
* All Rights Reserved.
* Contributor: IT-Solutions4You s.r.o - www.its4you.sk
 * ****************************************************************************** */

class ITS4YouInstaller {

    public $LBL_SETTINGS_NAME ='ITS4YouInstaller';
    public $LBL_MODULE_NAME = 'ITS4YouInstaller';
	public $db;
	public $log;
	public $moduleInstance;
	public $moduleName = 'ITS4YouInstaller';
	public $layout;

    function __construct() {
        global $log, $currentModule;

        $this->db = PearDatabase::getInstance();
        $this->log = $log;
    }

    function vtlib_handler($moduleName, $eventType) {
	    require_once('include/utils/utils.php');
	    require_once('vtlib/Vtiger/Module.php');

	    $this->layout = Vtiger_Viewer::getDefaultLayoutName();
	    $this->moduleInstance = Vtiger_Module::getInstance($moduleName);

        switch($eventType) {
	        case 'module.postupdate':
	        case 'module.enabled':
	        case 'module.postinstall':
		        $this->addCustomLinks();
	        	break;
	        case 'module.preuninstall':
	        case 'module.preupdate':
	        case 'module.disabled':
	            $this->deleteCustomLinks();
	        	break;
        }
    }

    static function checkAdminAccess($user) {

    }

    static function getModuleDescribe($module) {

    }

    static function getFieldInfo($module, $fieldname) {

    }

    static function getFieldInfos($module) {

    }

    public function addCustomLinks($enabled = true) {

        $name = $this->LBL_SETTINGS_NAME;
        $image = '';
        $description = '';
        $linkto = 'index.php?module=ITS4YouInstaller&parent=Settings&view=Extensions';

        $result1=$this->db->pquery('SELECT 1 FROM vtiger_settings_field WHERE name=?',array($name));
        if(!$this->db->num_rows($result1)){
            if ($enabled) {
                $fieldid = $this->db->getUniqueID('vtiger_settings_field');
                $blockid = getSettingsBlockId('LBL_EXTENSIONS');
                if (!$blockid) {
                    $blockid = getSettingsBlockId('LBL_INTEGRATION');
                }
                $seq_res = $this->db->pquery("SELECT max(sequence) AS max_seq FROM vtiger_settings_field WHERE blockid = ?", array($blockid));
                if ($this->db->num_rows($seq_res) > 0) {
                    $cur_seq = $this->db->query_result($seq_res, 0, 'max_seq');
                    if ($cur_seq != null)	$seq = $cur_seq + 1;
                }

                $this->db->pquery('INSERT INTO vtiger_settings_field(fieldid, blockid, name, iconpath, description, linkto, sequence) VALUES (?,?,?,?,?,?,?)', array($fieldid, $blockid, $name, $image, $description, $linkto, $seq));
            }
        } else {
            $this->db->pquery('UPDATE vtiger_settings_field SET active= ?  WHERE  name= ?',array(($enabled?"0":"1"),$name));
        }

	    $this->moduleInstance->addLink('HEADERSCRIPT', $this->moduleName, 'layouts/'.$this->layout.'/modules/Settings/'.$this->moduleName.'/resources/'.$this->moduleName.'_HS.js');

        $this->db->pquery('ALTER TABLE vtiger_cron_task MODIFY COLUMN id INT auto_increment ');
	    Vtiger_Cron::register(
		    $this->moduleName, "modules/$this->moduleName/cron/$this->moduleName.service", 86400, $this->moduleName, 1, 0, "Recommended frequency for actualize $this->moduleName is 1 day"
	    );

	    $this->db->pquery('ALTER TABLE its4you_installer_user ADD userid INT NOT NULL FIRST');
    }

    public function deleteCustomLinks(){
        $links = ['ITS4You Installler', 'ITS4You Installer', $this->LBL_SETTINGS_NAME];

        foreach($links as $link) {
	        $this->db->pquery('DELETE FROM vtiger_settings_field  WHERE name= ?',array($link));
        }

	    $this->moduleInstance->deleteLink('HEADERSCRIPT', $this->moduleName, 'layouts/'.$this->layout.'/modules/Settings/'.$this->moduleName.'/resources/'.$this->moduleName.'_HS.js');
	    Vtiger_Cron::deregister($this->moduleName);
    }

	public function getNonAdminAccessControlQuery($module, $user, $scope = '') {

	}
}

