<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_EditLink_View extends Settings_Vtiger_Index_View
{

    public function process(Vtiger_Request $request)
    {
        $recordId = $request->get('recordId');
        $currentModule = $request->get('module');
        $parent = $request->get('parent');
        $linkId = $request->get('linkId');

        $qualifiedModule = $request->getModule(false);
        $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $InfoAboutRecord = $mappingModel->getFieldMappingInfo($recordId);
        $moduleTo = getTabname($InfoAboutRecord['module_to']);
        $linkLabel = vtranslate('Convert to', $qualifiedModule) . ' ' . vtranslate('SINGLE_' . $moduleTo, $moduleTo);
        $linkActionType = 'STANDARD';
        $layout = Vtiger_Viewer::getDefaultLayoutName();

        if ($layout === 'v7') {
            $linkType = 'DETAILVIEW';
        } else {
            $linkType = 'DETAILVIEWBASIC';
        }

        if ($request->get('linkId') != '') {
            $adb = PearDatabase::getInstance();
            $link_res = $adb->pquery("SELECT * FROM vtiger_links WHERE linkid=?", [$request->get('linkId')]);
            $link_row = $adb->fetchByAssoc($link_res);
            $linkType = $link_row['linktype'];
            $linkLabel = $link_row['linklabel'];
            $linkurl = $link_row['linkurl'];

            if (preg_match('/^javascript:ITS4YouFieldMapping_HS_Js.AddInto/', $linkurl)) {
                $linkActionType = 'ADDINTO';
                $strLenAddInto = strlen(vtranslate('AddInto', $qualifiedModule)) + 1; // +1 = +space
                $linkLabel = substr($linkLabel, $strLenAddInto);
            }
        }

        $viewer = $this->getViewer($request);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('CURRENT_MODULE', $currentModule);
        $viewer->assign('PARENT', $parent);
        $viewer->assign('LINKTYPE', $linkType);
        $viewer->assign('LINKLABEL', $linkLabel);
        $viewer->assign('LINKACTIONTYPE', $linkActionType);
        $viewer->assign('RECORDID', $recordId);
        $viewer->assign('LINKID', $linkId);
        $viewer->assign('ENTITY_MODULES', Vtiger_Module_Model::getEntityModules());

        $addIntoActive = true;
        $moduleFrom = vtlib_getModuleNameById($InfoAboutRecord['module_from']);
        $moduleFromRecordModel = Vtiger_Record_Model::getCleanInstance($moduleFrom);
        if (!$moduleFromRecordModel instanceof Inventory_Record_Model) {
            $addIntoActive = false;
        }
        $moduleTo = vtlib_getModuleNameById($InfoAboutRecord['module_to']);
        $moduleToRecordModel = Vtiger_Record_Model::getCleanInstance($moduleTo);
        if (!$moduleToRecordModel instanceof Inventory_Record_Model) {
            $addIntoActive = false;
        }
        $viewer->assign('ADD_INTO_ACTIVE', $addIntoActive);
        $viewer->view('EditLink.tpl', $qualifiedModule);
    }

    public function getHeaderScripts(Vtiger_Request $request)
    {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = [
            'modules.Vtiger.resources.Vtiger',
            'modules.Settings.Vtiger.resources.Vtiger',
            "modules.Settings.$moduleName.resources.Edit",
        ];

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);

        return $headerScriptInstances;
    }
}
