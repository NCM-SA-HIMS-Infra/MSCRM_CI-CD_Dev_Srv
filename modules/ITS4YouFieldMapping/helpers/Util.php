<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class ITS4YouFieldMapping_Util_Helper
{

    /**
     * @param int $record
     * @param string $sourceModule
     * @param string $destinationModule
     *
     * @return array
     */
    public static function prepareColumnFields($record, $sourceModule, $destinationModule)
    {
        $recordInstance = Vtiger_DetailView_Model::getInstance($sourceModule, $record);
        $recordModel = $recordInstance->getRecord();
        $destModuleInstance = Vtiger_Record_Model::getCleanInstance($destinationModule);
        $columnFields = $destModuleInstance->entity->column_fields;

        $db = PearDatabase::getInstance();
        $sql = "SELECT its4you_fieldmapping_mapping.*, source_field.fieldname AS source_fieldname, target_field.fieldname AS target_fieldname,
				source_field.uitype AS source_uitype, target_field.uitype AS target_uitype 
			FROM its4you_fieldmapping_mapping
				LEFT JOIN vtiger_field AS source_field ON source_field.fieldid=fieldid_sourcemodule
				LEFT JOIN vtiger_field AS target_field ON target_field.fieldid=fieldid_targetmodule
			WHERE fieldmappingid=(SELECT fieldmappingid FROM  its4you_fieldmapping WHERE module_from=? AND module_to=? AND isactive=1)";
        $res = $db->pquery($sql, [Vtiger_Functions::getModuleId($sourceModule), Vtiger_Functions::getModuleId($destinationModule)]);
        while ($row = $db->fetchByAssoc($res)) {
            if (isset($columnFields[$row['target_fieldname']]) && isset($columnFields[$row['source_fieldname']])) {
                $columnFields[$row['target_fieldname']] = $recordModel->entity->column_fields[$row['source_fieldname']];
            } elseif ($row['fieldid_sourcemodule'] == 0) {
                $columnFields[$row['target_fieldname']] = $record;
            }
        }

        return $columnFields;
    }

    /**
     * This method gets the reference id from request.
     *
     * @param Vtiger_Request $request
     *
     * @return mixed
     * @throws Exception
     */
    public static function decideReferenceId(Vtiger_Request $request)
    {
        $Records = self::getRecordsFromRequest($request);
        $referenceId = $Records[0];

        return $referenceId;
    }

    /**
     * This method gets the array of (source) records from request, testing possible options.
     *
     * @param Vtiger_Request $request
     *
     * @return array
     */
    public static function getRecordsFromRequest(Vtiger_Request $request)
    {
        $Records = [];
        if ('' !== $request->get('getidsfromsuffix')) {
            $Records = [];
            $prefix = $request->get('getidsfromsuffix');
            $requestArray = $request->getAll();
            foreach ($requestArray as $key => $value) {
                if ($prefix . '_' === substr($key, 0, strlen($prefix) + 1) && 2 === substr_count($key, '_')) {
                    $Exploded = explode('_', $key);
                    if (!in_array($Exploded[1], $Records)) {
                        $Records[] = $Exploded[1];
                    }
                }
            }
        } else {
            if ($request->get('idlist') != '' && $request->get('idlist') != 'undefined') {
                $Records = explode(',', $request->get('idlist'));
            } else {
                $Records[] = $request->get('sourceRecord');
            }
        }

        if (empty($Records)) {
            throw new Exception('Unknown reference id');
        }

        return $Records;
    }

    /**
     * This method saves the mapping - creates a new one or update on existing one
     *
     * @param array $data - Mandatory fields [all strings]: name, module_from, module_to; Optional fields: fieldmappingid, info, isactive, fieldmapping4you_attention, special_action
     *
     * @return int mapping id on success
     * @throws Exception if mandatory fields are missing or messy
     *
     */
    public static function APISaveMapping($data)
    {
        if (empty($data) || !is_array($data)) {
            throw new Exception('No reasonable data provided.');
        }
        $tableName = 'its4you_fieldmapping';
        $tableIndex = 'fieldmappingid';
        $mandatoryFields = ['name', 'module_from', 'module_to'];
        $optionalFields = ['fieldmappingid', 'info', 'isactive', 'fieldmapping4you_attention', 'special_action'];
        self::APICheckMandatoryFields($data, $mandatoryFields);
        self::APICheckModule($data, 'module_from');
        self::APICheckModule($data, 'module_to');

        return self::APISaveRoutine($data, $tableName, $tableIndex, $mandatoryFields, $optionalFields);
    }

    /**
     * This method checks whether all mandatory fields exist within the $data.
     *
     * @param array $data
     * @param array $mandatoryFields
     *
     * @throws Exception
     */
    private static function APICheckMandatoryFields($data, $mandatoryFields)
    {
        foreach ($mandatoryFields as $fieldName) {
            if (empty($data[$fieldName])) {
                throw new Exception('Incomplete datase: ' . $fieldName . ' is missing.');
            }
        }
    }

    /**
     * This method checks whether the provided module is correct. If it was provided as int, it tries to convert it to module name.
     * If the given module (or module id) does not exist, it throws an Exception.
     *
     * @param array $data
     * @param string $module
     *
     * @throws Exception
     */
    private static function APICheckModule($data, $module)
    {
        if (is_numeric($data[$module])) {
            $old_module = $data[$module];
            $data[$module] = getTabModuleName($data[$module]);
            if (empty($data[$module])) {
                throw new Exception('Incorrect ' . $module . ': ' . $old_module . '.');
            }
        }
        $tabId = Vtiger_Functions::getModuleId($data[$module]);
        if (empty($tabId)) {
            throw new Exception('Incorrect ' . $module . ': ' . $data[$module] . '.');
        }
    }

    /**
     * General saving routine for mapping tables
     *
     * @param array $data
     * @param string $tableName
     * @param string $tableIndex
     * @param array $mandatoryFields
     * @param array $optionalFields
     *
     * @return int id
     * @throws Exception
     */
    private static function APISaveRoutine($data, $tableName, $tableIndex, $mandatoryFields, $optionalFields)
    {
        $db = PearDatabase::getInstance();
        if (isset($data[$tableIndex]) && is_numeric($data[$tableIndex])) {
            // update
            $mappingId = $data[$tableIndex];
            $checkRes = $db->pquery('SELECT * FROM ' . $tableName . ' WHERE ' . $tableIndex . '=?', [$data[$tableIndex]]);
            if (0 == $db->num_rows($checkRes)) {
                throw new Exception('No such ' . $tableIndex . ': ' . $data[$tableIndex]);
            }
            $sql = 'UPDATE ' . $tableName . ' SET ';
            $params = [];
            $iterator = 0;
            foreach ($mandatoryFields as $fieldName) {
                if ($fieldName != $tableIndex) {
                    $iterator++;
                    if ($iterator > 1) {
                        $sql .= ', ';
                    }
                    $sql .= $fieldName . '=?';
                    $params[] = $data[$fieldName];
                }
            }
            foreach ($optionalFields as $fieldName) {
                if ($fieldName != $tableIndex) {
                    $sql .= ', ' . $fieldName . '=?';
                    $params[] = isset($data[$fieldName]) ? $data[$fieldName] : '';
                }
            }
            $sql .= ' WHERE ' . $tableIndex . '=?';
            $params[] = $mappingId;
            $db->pquery($sql, $params);
        } else {
            // insert
            $sql = 'INSERT INTO ' . $tableName;
            $sql .= '(' . trim(implode(',', $mandatoryFields) . ',' . implode(',', $optionalFields), ',');
            $sql .= ') VALUES (';
            $sql .= trim(str_repeat(',?', count($mandatoryFields) + count($optionalFields)), ',');
            $sql .= ')';
            $params = [];
            foreach ($mandatoryFields as $fieldName) {
                $params[] = $data[$fieldName];
            }
            foreach ($optionalFields as $fieldName) {
                $params[] = isset($data[$fieldName]) ? $data[$fieldName] : '';
            }
            $db->pquery($sql, $params);
            $mappingId = $db->getLastInsertID();
        }

        return $mappingId;
    }

    /**
     * This method saves the link for given mapping.
     *
     * @param array $data
     *
     * @throws Exception
     */
    public static function APISaveMappingLink($data)
    {
        $db = PearDatabase::getInstance();
        $layout = Vtiger_Viewer::getDefaultLayoutName();

        if ('' !== $data['linkid']) {
            $linkData = $db->pquery("SELECT * FROM vtiger_links WHERE linkid=?", [$data['linkid']]);
            $linkRow = $db->fetchByAssoc($linkData, 0);
            foreach ($linkRow as $linkVar => $linkValue) {
                if (empty($data[$linkVar])) {
                    $data[$linkVar] = $linkValue;
                }
            }

            $db->pquery("DELETE FROM vtiger_links WHERE linkid=?", [$data['linkid']]);
        }

        $mandatoryFields = ['mappingid', 'linklabel'];
        self::APICheckMandatoryFields($data, $mandatoryFields);

        $moduleName = $data['module'];
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
        $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $InfoAboutRecord = $mappingModel->getFieldMappingInfo($data['mappingid']);
        $moduleTo = getTabModuleName($InfoAboutRecord['module_to']);
        $moduleFrom = getTabModuleName($InfoAboutRecord['module_from']);
        $linklabel = $data['linklabel'];
        $linkUrl = 'index.php?module=' . $moduleTo . '&view=Edit&sourceModule=$MODULE$&sourceRecord=$RECORD$&its4youfieldmappingid=' . $InfoAboutRecord['fieldmappingid'];
        $referenceField = $moduleModel->getParentRelatedField($moduleFrom, $moduleTo);
        $relatedMapField = $moduleModel->getRelatedMapFields();

        if ($referenceField || isset($relatedMapField[$moduleFrom])) {
            if (!$referenceField) {
                $referenceField = $relatedMapField[$moduleFrom];
            }
            $linkUrl .= '&' . $referenceField . '=$RECORD$';
        }

        if ('v7' === $layout) {
            $linkType = 'DETAILVIEW';
        } else {
            $linkType = 'DETAILVIEWBASIC';
        }

        require_once 'vtlib/Vtiger/Module.php';
        $moduleInstance = Vtiger_Module::getInstance($moduleFrom);
        $moduleInstance->addLink($linkType, $linklabel, $linkUrl);
    }

    /**
     * This method saves the fields for mapping.
     *
     * @param array $data expected in format ['mapping_1' => ['firstModule' => fieldid1, 'secondModule' => fieldid2], 'mapping_2' => ['firstModule' => fieldid3, 'secondModule' => fieldid4], ... ]
     *
     * @throws Exception
     */
    public static function APISaveMappingFields($data)
    {
        $db = PearDatabase::getInstance();
        $mandatoryFields = ['mappingid'];
        self::APICheckMandatoryFields($data, $mandatoryFields);
        $sql = "DELETE FROM its4you_fieldmapping_mapping WHERE fieldmappingid=?";
        $db->pquery($sql, [$data['mappingid']]);
        foreach ($data as $key => $info) {
            $rest = trim(substr($key, 0, 8));
            $rest1 = trim(substr($key, 0, 10));
            if (($rest == "mapping_" || $rest1 == 'mappingID_') && is_array($info)) {
                if (isset($info['deletable'])) {
                    continue;
                }
                $sourceModuleFieldId = $info['firstModule'];
                $targetModuleFieldId = $info['secondModule'];

                $query = "INSERT INTO its4you_fieldmapping_mapping(fieldmappingid, fieldid_sourcemodule, fieldid_targetmodule) VALUES(?,?,?)";
                $db->pquery($query, [$data['mappingid'], $sourceModuleFieldId, $targetModuleFieldId]);
            }
        }
    }
}
