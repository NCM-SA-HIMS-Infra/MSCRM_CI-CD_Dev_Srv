<?php
/* * *******************************************************************************
 * The content of this file is subject to the ITS4YouInstaller license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class Settings_ITS4YouInstaller_Uninstall_Action extends Settings_Vtiger_Basic_Action
{
    /**
     * @param Vtiger_Request $request
     */
    function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    /**
     * @param Vtiger_Request $request
     */
    public function process(Vtiger_Request $request)
    {
        include_once('vtlib/Vtiger/Module.php');

        $adb = PearDatabase::getInstance();
        $moduleName = $request->getModule();
        $module = Vtiger_Module::getInstance($moduleName);
        if ($module) {

            $module->delete();

            @shell_exec('rm -r modules/' . $moduleName);
            @shell_exec('rm -r modules/Settings/' . $moduleName);
            @shell_exec('rm -r layouts/v7/modules/' . $moduleName);
            @shell_exec('rm -r layouts/v7/modules/Settings/' . $moduleName);

            $languages = array('en_us', 'sk_sk', 'cz_cz');
            foreach ($languages as $lang) {
                @shell_exec('rm -f languages/' . $lang . '/' . $moduleName . '.php');
                @shell_exec('rm -f languages/' . $lang . '/Settings/' . $moduleName . '.php');
            }
            $adb->pquery("DROP TABLE IF EXISTS its4you_installer_user", array());
            $adb->pquery("DROP TABLE IF EXISTS its4you_installer_license", array());
            $adb->pquery("DROP TABLE IF EXISTS its4you_installer_alert", array());

            $adb->pquery("DELETE FROM vtiger_settings_field WHERE name= ?", array("ITS4You Installler"));
            $adb->pquery("DELETE FROM vtiger_settings_field WHERE name= ?", array("ITS4YouInstaller"));

            $result = array('success' => true);
        } else {
            $result = array('success' => false);
        }

        ob_clean();
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }
}
