<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_EditMapping_View extends Settings_Vtiger_Index_View
{

    public function process(Vtiger_Request $request)
    {

        $recordId = $request->get('recordId');
        $currentModule = $request->get('module');
        $parent = $request->get('parent');
        $qualifiedModule = $request->getModule(false);
        $moduleModel = Vtiger_Module_Model::getInstance($currentModule);

        $adb = PearDatabase::getInstance();

        $query = "select fieldmapping_mappingid, fieldid_sourcemodule, fieldid_targetmodule from  its4you_fieldmapping_mapping where fieldmappingid =? order by fieldmapping_mappingid ASC";
        $result = $adb->pquery($query, array($recordId));
        while ($row = $adb->fetchByAssoc($result)) {
            $FieldsId[$row['fieldmapping_mappingid']] = $row;
        }

        $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $InfoAboutRecord = $mappingModel->getFieldMappingInfo($recordId);

        // tu mas predpripravene veci na fieldy vsetky, uz len to dat do vypisu...
        $moduleModelfrom = Settings_LayoutEditor_Module_Model::getInstance(getTabModuleName($InfoAboutRecord['module_from']));
        $Fieldsmodelsmodulefrom = $moduleModelfrom->getFields();

        $moduleModelto = Settings_LayoutEditor_Module_Model::getInstance(getTabModuleName($InfoAboutRecord['module_to']));
        $Fieldsmodelsmoduleto = $moduleModelto->getFields();
        $settingsModel = Settings_Vtiger_Module_Model::getInstance();
        $menuModels = $settingsModel->getMenus();
        $fieldItem = Settings_Vtiger_Index_View::getSelectedFieldFromModule($menuModels, 'ITS4YouFieldMapping');

        $moduleModel->getFieldsForControll($Fieldsmodelsmodulefrom);
        $moduleModel->getFieldsForControll($Fieldsmodelsmoduleto);
        $fieldControl = $moduleModel->get('controllFields');
        $fieldControl = json_encode($fieldControl);

        $viewer = $this->getViewer($request);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('CURRENT_MODULE', $currentModule);
        $viewer->assign('PARENT', $parent);
        $viewer->assign('INFOABOUTRECORD', $InfoAboutRecord);
        $viewer->assign('FIELDSID', $FieldsId);
        $viewer->assign('MODULEFROMFIELDS', $Fieldsmodelsmodulefrom);
        $viewer->assign('MODULETOFIELDS', $Fieldsmodelsmoduleto);
        $viewer->assign('RECORDID', $recordId);
        $viewer->assign('LINKTOLIST', $moduleModel->getDefaultUrl());
        $viewer->assign('FIELDSCONTROL', $fieldControl);
        $viewer->view('EditMapping.tpl', $qualifiedModule);
    }

    public function getHeaderScripts(Vtiger_Request $request)
    {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "modules.Settings.$moduleName.resources.EditMapping",
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}
