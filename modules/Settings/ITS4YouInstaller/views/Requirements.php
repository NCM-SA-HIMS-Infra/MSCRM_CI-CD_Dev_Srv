<?php
/* * *******************************************************************************
 * The content of this file is subject to the ITS4YouInstaller license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class Settings_ITS4YouInstaller_Requirements_View extends Settings_ITS4YouInstaller_Extensions_View
{
    /**
     * @param Vtiger_Request $request
     */
    public function process(Vtiger_Request $request)
    {
        $qualifiedModule = $request->getModule(false);
        $viewer = $this->getViewer($request);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);

        $requirements = Settings_ITS4YouInstaller_Requirements_Model::getInstance();

        $viewer->assign('REQUIREMENTS', $requirements);

        $viewer->view('Requirements.tpl', $qualifiedModule);

    }

    /**
     * @param Vtiger_Request $request
     * @return array
     */
    public function getHeaderCss(Vtiger_Request $request)
    {
        $layout = Vtiger_Viewer::getDefaultLayoutName();
        $view = $request->get('view');
        $module = $request->getModule();
        $cssFileNames = array(
            '~/layouts/' . $layout . '/modules/Settings/' . $module . '/resources/' . $view . '.css',
        );

        return array_merge(parent::getHeaderCss($request), $this->checkAndConvertCssStyles($cssFileNames));
    }
}