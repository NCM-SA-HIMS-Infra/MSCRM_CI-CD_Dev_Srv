<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_DetailView_View extends Settings_Vtiger_Index_View
{

    public function process(Vtiger_Request $request)
    {
        $recordId = $request->get('recordId');
        $currentModule = $request->get('module');
        $parent = $request->get('parent');
        $qualifiedModule = $request->getModule(false);

        $adb = PearDatabase::getInstance();

        $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $InfoAboutRecord = $mappingModel->getFieldMappingInfo($recordId);
        $FieldsId = $mappingModel->getFieldsIds($recordId);
        $Links = $mappingModel->getCreatedLinks($recordId, true);
        $MappingReady = !empty($mappingModel->getCreatedLinks($recordId));
        $moduleTo = Vtiger_Module_Model::getInstance(getTabModuleName($InfoAboutRecord['module_to']));
        $moduleFrom = Vtiger_Module_Model::getInstance(getTabModuleName($InfoAboutRecord['module_from']));

        $viewer = $this->getViewer($request);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('CURRENT_MODULE', $currentModule);
        $viewer->assign('PARENT', $parent);
        $viewer->assign('INFOABOUTRECORD', $InfoAboutRecord);
        $viewer->assign('RECORDID', $recordId);
        $viewer->assign('FIELDSID', $FieldsId);
        $viewer->assign('LINKS', $Links);
        $viewer->assign('MAPPINGREADY', $MappingReady);
        $viewer->assign('MODULE_TO', $moduleTo);
        $viewer->assign('MODULE_FROM', $moduleFrom);
        $viewer->view('DetailView.tpl', $qualifiedModule);
    }

    public function getHeaderScripts(Vtiger_Request $request)
    {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "modules.Settings.$moduleName.resources.DetailView",
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }

}
