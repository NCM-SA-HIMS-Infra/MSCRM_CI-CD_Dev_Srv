<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

require_once 'modules/Webforms/model/WebformsModel.php';
require_once 'include/Webservices/DescribeObject.php';

class ITS4YouFieldMapping
{

    protected static $moduleDescribeCache = array();
    public $LBL_MODULE_NAME = 'FieldMapping 4 You';

    // Cache to speed up describe information store
    public $LBL_MODULE_NAME_OLD = 'FieldMapping 4 You';

    public function __construct()
    {
        global $log, $currentModule;

        $this->db = PearDatabase::getInstance();
        $this->log = $log;
    }

    public static function checkAdminAccess($user)
    {

    }

    public static function getModuleDescribe($module)
    {

    }

    public static function getFieldInfo($module, $fieldname)
    {

    }

    public static function getFieldInfos($module)
    {

    }

    /**
     * Decide whether the link should be displayed or not.
     *
     * @param Vtiger_LinkData $linkData
     *
     * @return bool
     */
    public static function isLinkPermitted(Vtiger_LinkData $linkData)
    {
        // actual module
        //$moduleName = $linkData->getModule();
        // actual record id
        //$recordId = $linkData->getInputParameter('record');
        // link object
        $link = $linkData->getLink();
        $linkUrl = $link->linkurl;
        $linkType = $link->linktype;
        //ADDINTO - start
        if (preg_match('/^javascript:ITS4YouFieldMapping_HS_Js.AddInto/', $link->linkurl)) {
            $linkActionType = '';
            $linkArray = explode("', '", $link->linkurl);
            $lk = count($linkArray) - 1;
            $mappingId = trim($linkArray[$lk], "');");
            $forModule = self::getForModuleFromMapping($mappingId);

            return self::getPermissionForModule($linkData, $forModule);
            //STANDARD - start
        } else {
            switch ($linkType) {
                case 'DETAILVIEWBASIC':
                    list($index, $params) = explode('?', $linkUrl);
                    $Params = explode('&', $params);
                    $mappingId = '';
                    $forModule = '';
                    foreach ($Params as $param) {
                        list($par, $val) = explode('=', $param);
                        if ($par == 'its4youfieldmappingid') {
                            $mappingId = $val;
                        }
                        if ($par == 'module') {
                            $forModule = $val;
                        }
                    }
                    if ($mappingId != '' && is_numeric($mappingId)) {
                        $forModule = self::getForModuleFromMapping($mappingId);
                    }

                    return self::getPermissionForModule($linkData, $forModule);
                case 'LISTVIEWMASSACTION':
                    if (strpos($linkUrl, 'ITS4YouFieldMapping_HS_Js.CreateFromList') !== false) {
                        list($throw, $linkPart) = explode('(', $linkUrl);
                        list($linkPart, $throw) = explode(')', $linkPart);
                        list($firstModule, $secondModule, $mappingId) = explode(',', $linkPart);
                        $mappingId = str_replace(["'", '"'], ['', ''], $mappingId);
                        $forModule = self::getForModuleFromMapping($mappingId);

                        return self::getPermissionForModule($linkData, $forModule);
                    }
                    break;
            }
        }

        return false;
    }

    /**
     * Get module name of target module for mapping
     *
     * @param int $mappingId
     *
     * @return string module name
     */
    public static function getForModuleFromMapping($mappingId)
    {
        $forModule = '';
        if ($mappingId != '' && is_numeric($mappingId)) {
            $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
            $InfoAboutRecord = $mappingModel->getFieldMappingInfo($mappingId);
            $forModule = getTabModuleName($InfoAboutRecord['module_to']);
        }

        return $forModule;
    }

    /**
     * Decide whether the user has permission to create a new record for given module
     *
     * @param string $moduleName
     *
     * @return bool
     */
    private static function getPermissionForModule(Vtiger_LinkData $linkData, $forModuleName)
    {
        $isPermited = false;
        if ($forModuleName != '') {
            if (isPermitted($forModuleName, 'Edit') == 'yes') {
                $isPermited = true;
            }
            $link = $linkData->getLink();
            $linkType = $link->linktype;

            if ('DETAILVIEWBASIC' == $linkType) {
                $moduleName = $linkData->getModule();
                $recordId = $linkData->getInputParameter('record');
                $recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
                if (method_exists($recordModel, 'getPermisionLink')) {
                    $isPermited = $recordModel->getPermisionLink($forModuleName);
                }
            }
        }
        return $isPermited;
    }

    /**
     * Get module name of source module for mapping
     *
     * @param int $mappingId
     *
     * @return string module name
     */
    public static function getFromModuleFromMapping($mappingId)
    {
        $fromModule = '';
        if ($mappingId != '' && is_numeric($mappingId)) {
            $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
            $InfoAboutRecord = $mappingModel->getFieldMappingInfo($mappingId);
            $fromModule = getTabModuleName($InfoAboutRecord['module_from']);
        }

        return $fromModule;
    }

    public function vtlib_handler($moduleName, $eventType)
    {

        $module = Vtiger_Module::getInstance($moduleName);
        $layout = Vtiger_Viewer::getDefaultLayoutName();
        $this->link = array(
            'type' => 'HEADERSCRIPT',
            'label' => 'ITS4YouFieldMappingsHS',
            'link' => 'layouts/' . $layout . '/modules/ITS4YouFieldMapping/resources/ITS4YouFieldMappingHS.js',
        );

        if ($eventType == 'module.postinstall') {
            $this->addCustomLinks($module);
        } else {
            if ($eventType == 'module.disabled') {
                $this->deleteCustomLinks($module);
            } else {
                if ($eventType == 'module.enabled') {
                    $this->addCustomLinks($module);
                } else {
                    if ($eventType == 'module.preuninstall') {
                        $this->deleteCustomLinks($module);
                    } else {
                        if ($eventType == 'module.preupdate') {

                        } else {
                            if ($eventType == 'module.postupdate') {
                                $this->addCustomLinks($module);
                            }
                        }
                    }
                }
            }
        }
    }

    public function addCustomLinks($module)
    {
        $image = '';
        $description = 'Map fields for converting from one module to another';
        $linkto = 'index.php?module=ITS4YouFieldMapping&parent=Settings&view=List';

        $result1 = $this->db->pquery('SELECT 1 FROM vtiger_settings_field WHERE name=?', [$this->LBL_MODULE_NAME_OLD]);
        if ($this->db->num_rows($result1)) {
            $this->db->pquery('UPDATE vtiger_settings_field SET name=?, iconpath=?, description=?, linkto=? WHERE name=?', [$this->LBL_MODULE_NAME, $image, $description, $linkto, $this->LBL_MODULE_NAME_OLD]);
        }

        $result2 = $this->db->pquery('SELECT 1 FROM vtiger_settings_field WHERE name=?', [$this->LBL_MODULE_NAME]);
        if (!$this->db->num_rows($result2)) {

            $fieldid = $this->db->getUniqueID('vtiger_settings_field');
            $blockid = getSettingsBlockId('LBL_OTHER_SETTINGS');
            $seq_res = $this->db->pquery("SELECT max(sequence) AS max_seq FROM vtiger_settings_field WHERE blockid = ?", [$blockid]);
            if ($this->db->num_rows($seq_res) > 0) {
                $cur_seq = $this->db->query_result($seq_res, 0, 'max_seq');
                if ($cur_seq != null) {
                    $seq = $cur_seq + 1;
                }
            }

            $this->db->pquery('INSERT INTO vtiger_settings_field(fieldid, blockid, name, iconpath, description, linkto, sequence) VALUES (?,?,?,?,?,?,?)', [$fieldid, $blockid, $this->LBL_MODULE_NAME, $image, $description, $linkto, $seq]);
        }

        $module->addLink($this->link['type'], $this->link['label'], $this->link['link']);
        $this->db->pquery('UPDATE vtiger_settings_field SET active= 0  WHERE  name= ?', [$this->LBL_MODULE_NAME]);
    }

    public function deleteCustomLinks($module)
    {
        $this->db->pquery('UPDATE vtiger_settings_field SET active= 1  WHERE  name= ?', [$this->LBL_MODULE_NAME]);
        $module->deleteLink($this->link['type'], $this->link['label'], $this->link['link']);
    }
}
