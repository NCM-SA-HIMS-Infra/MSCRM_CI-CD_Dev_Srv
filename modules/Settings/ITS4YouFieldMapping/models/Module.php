<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

require_once 'modules/com_vtiger_workflow/include.inc';
require_once 'modules/com_vtiger_workflow/expression_engine/VTExpressionsManager.inc';

class Settings_ITS4YouFieldMapping_Module_Model extends Settings_Vtiger_Module_Model
{

    public static $metaVariables = [
        'Current Date' => '(general : (__VtigerMeta__) date) ($_DATE_FORMAT_)',
        'Current Time' => '(general : (__VtigerMeta__) time)',
        'System Timezone' => '(general : (__VtigerMeta__) dbtimezone)',
        'User Timezone' => '(general : (__VtigerMeta__) usertimezone)',
        'CRM Detail View URL' => '(general : (__VtigerMeta__) crmdetailviewurl)',
        'Portal Detail View URL' => '(general : (__VtigerMeta__) portaldetailviewurl)',
        'Site Url' => '(general : (__VtigerMeta__) siteurl)',
        'Portal Url' => '(general : (__VtigerMeta__) portalurl)',
        'Record Id' => '(general : (__VtigerMeta__) recordId)',
        'LBL_HELPDESK_SUPPORT_NAME' => '(general : (__VtigerMeta__) supportName)',
        'LBL_HELPDESK_SUPPORT_EMAILID' => '(general : (__VtigerMeta__) supportEmailid)',
    ];
    public $baseTable = '';
    public $baseIndex = 'id';
    public $listFields = [];
    public $name = 'ITS4YouFieldMapping';

    /**
     * Function to get the url for default view of the module
     * @return <string> - url
     */
    public static function getDefaultUrl()
    {
        return 'index.php?module=ITS4YouFieldMapping&parent=Settings&view=List';
    }

    /**
     * Function to get the url for create view of the module
     * @return <string> - url
     */
    public static function getCreateViewUrl()
    {
        return "javascript:Settings_ITS4YouFieldMapping_List_Js.triggerCreate('index.php?module=ITS4YouFieldMapping&parent=Settings&view=Edit')";
    }

    public static function getCreateRecordUrl()
    {
        return 'index.php?module=ITS4YouFieldMapping&parent=Settings&view=Edit';
    }

    public static function getDetailViewUrl($recordId)
    {
        return "index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId=$recordId";
    }

    public static function getEditRecordUrl($recordId)
    {
        return "index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditRecord&recordId=$recordId";
    }

    public static function getDeleteRecordUrl($recordId)
    {
        return "index.php?module=ITS4YouFieldMapping&parent=Settings&action=Delete&recordId=$recordId";
    }

    public static function getEditMappingUrl($recordId)
    {
        return "index.php?module=ITS4YouFieldMapping&parent=Settings&view=EditMapping&recordId=$recordId";
    }

    public static function getSupportedModules()
    {
        $moduleModels = Vtiger_Module_Model::getAll([0, 2]);
        $supportedModuleModels = [];
        foreach ($moduleModels as $tabId => $moduleModel) {
            if ($moduleModel->isEntityModule() && !in_array($moduleModel->getName(), ['Webmails', 'ModComments', 'PBXManager', 'SMSNotifier'])) {
                $supportedModuleModels[$tabId] = $moduleModel;
            }
        }

        return $supportedModuleModels;
    }

    public static function getExpressions()
    {
        $db = PearDatabase::getInstance();

        $mem = new VTExpressionsManager($db);

        return $mem->expressionFunctions();
    }

    public static function getMetaVariables()
    {
        return self::$metaVariables;
    }

    public function getListFields()
    {
        if (!$this->listFieldModels) {
            $fields = $this->listFields;
            $fieldObjects = [];
            foreach ($fields as $fieldName => $fieldLabel) {
                if ($fieldName == 'module_name' || $fieldName == 'execution_condition') {
                    $fieldObjects[$fieldName] = new Vtiger_Base_Model(['name' => $fieldName, 'label' => $fieldLabel, 'sort' => false]);
                } else {
                    $fieldObjects[$fieldName] = new Vtiger_Base_Model(['name' => $fieldName, 'label' => $fieldLabel]);
                }
            }
            $this->listFieldModels = $fieldObjects;
        }

        return $this->listFieldModels;
    }

    public function getCreatedLinks($recordId, $all = false)
    {
        $adb = PearDatabase::getInstance();
        $layout = Vtiger_Viewer::getDefaultLayoutName();

        $linktype = 'DETAILVIEWBASIC';
        if ('v7' === $layout) {
            $linktype = 'DETAILVIEW';
        }

        $Links = array();
        $InfoAboutRecord = $this->getFieldMappingInfo($recordId);
        $module_to = getTabModuleName($InfoAboutRecord['module_to']);
        $module_from = getTabModuleName($InfoAboutRecord['module_from']);
        $link_sql = 'SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? ';

        if ($all === false) {
            $link_sql .= 'AND linkurl LIKE "%its4youfieldmappingid=' . $recordId . '%"';
        } else {
            $link_sql .= 'AND linkurl LIKE "%its4youfieldmappingid%" AND linkurl LIKE "%module=' . $module_to . '%"';
        }

        $link_res = $adb->pquery($link_sql, array($InfoAboutRecord['module_from'], $linktype));

        while ($link_row = $adb->fetchByAssoc($link_res)) {

            if ($link_row['linklabel']) {
                $convert = true;
                $contain = 'its4youfieldmappingid';
                $mapped = 0;
                $mappedlabel = '';
                $link = html_entity_decode($link_row['linkurl']);
                $parts = parse_url($link);
                parse_str($parts['query']);

                if (isset($its4youfieldmappingid)) {
                    if ($its4youfieldmappingid === $recordId) {
                        $convert = false;
                    } elseif ($its4youfieldmappingid > 0) {
                        $mappedTo = $adb->pquery('SELECT * FROM its4you_fieldmapping WHERE fieldmappingid=?', array($its4youfieldmappingid));
                        $mappedToRow = $adb->fetchByAssoc($mappedTo, 0);
                        $mapped = $mappedToRow['fieldmappingid'];
                        $mappedlabel = $mappedToRow['name'];
                    }
                }

                $link_row['convert'] = $convert;
                $link_row['mapped'] = $mapped;
                $link_row['mappedlabel'] = $mappedlabel;
                $Links[$link_row['linkid']] = $link_row;
            }
        }

        return $Links;
    }

    /**
     * @param $recordId
     *
     * @return array
     */
    public function getFieldMappingInfo($recordId)
    {
        $adb = PearDatabase::getInstance();
        $query = "SELECT * FROM its4you_fieldmapping WHERE fieldmappingid=?";
        $result = $adb->pquery($query, array($recordId));
        $InfoAboutRecord = [];
        if ($adb->num_rows($result) > 0) {
            $row = $adb->fetchByAssoc($result);
            $moduleFrom = getTabModuleName($row['module_from']);
            $moduleTo = getTabModuleName($row['module_to']);
            $info = array(
                'moduleName_from' => $moduleFrom,
                'moduleLabel_from' => vtranslate($moduleFrom, $moduleFrom),
                'moduleName_to' => $moduleTo,
                'moduleLabel_to' => vtranslate($moduleTo, $moduleTo),
            );

            $InfoAboutRecord = array_merge($row, $info);
        }

        return $InfoAboutRecord;
    }

    public function getFieldsIds($recordId)
    {
        $FieldsId = array();
        $adb = PearDatabase::getInstance();
        $query2 = "select fieldid_sourcemodule, fieldid_targetmodule from  its4you_fieldmapping_mapping where fieldmappingid =? order by fieldmapping_mappingid ASC";
        $result2 = $adb->pquery($query2, array($recordId));
        while ($row = $adb->fetchByAssoc($result2)) {
            $target = $row['fieldid_targetmodule'];
            $targetModule = getTabModuleName(self::getTabIdFromFieldInfo($target));
            $targetLabel = self::getFieldLabel($target);

            $source = $row['fieldid_sourcemodule'];
            $sourceModule = getTabModuleName(self::getTabIdFromFieldInfo($source));
            $sourceLabel = self::getFieldLabel($source);

            $FieldsId[] = array(
                'fieldid_targetmodule' => $target,
                'fieldlabel_targetmodule' => vtranslate($targetLabel, $targetModule),
                'fieldid_sourcemodule' => $source,
                'fieldlabel_sourcemodule' => vtranslate($sourceLabel, $sourceModule),
            );
        }

        return $FieldsId;
    }

    public static function getTabIdFromFieldInfo($fieldId)
    {
        return self::getFieldInfoFromFieldId($fieldId, 'tabid');
    }

    public static function getFieldInfoFromFieldId($fieldId, $infoName)
    {
        $return = '';
        $Info = Vtiger_Functions::getModuleFieldInfoWithId($fieldId);
        if (isset($Info[$infoName])) {
            $return = $Info[$infoName];
        } elseif ($fieldId == 0 && $infoName == 'fieldlabel') {
            $return = "Record Id";
        }

        return $return;
    }

    public static function getFieldLabel($fieldId)
    {
        return self::getFieldInfoFromFieldId($fieldId, 'fieldlabel');
    }
}
