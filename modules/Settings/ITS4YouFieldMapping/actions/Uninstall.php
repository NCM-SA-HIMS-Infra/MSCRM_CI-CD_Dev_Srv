<?php
/* * *******************************************************************************
* The content of this file is subject to the ITS4YouFieldMapping license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
* ****************************************************************************** */

class Settings_ITS4YouFieldMapping_Uninstall_Action extends Settings_Vtiger_Basic_Action
{

    public function process(Vtiger_Request $request)
    {

        $Vtiger_Utils_Log = true;
        include_once('vtlib/Vtiger/Module.php');
        $adb = PearDatabase::getInstance();
        $moduleName = $request->getModule();
        $module = Vtiger_Module::getInstance($moduleName);
        $result = array('success' => false);

        if ($module) {
            $module->delete();

            $adb->pquery('DROP TABLE IF EXISTS its4you_fieldmapping');
            $adb->pquery('DROP TABLE IF EXISTS its4you_fieldmapping_mapping');
            $adb->pquery('DROP TABLE IF EXISTS its4you_fieldmapping_license');
            $adb->pquery('DROP TABLE IF EXISTS its4you_fieldmapping_version');
            $adb->pquery('DELETE FROM vtiger_links WHERE linkurl LIKE "%its4youfieldmappingid%"');

            @shell_exec('rm -r modules/' . $moduleName);
            @shell_exec('rm -r modules/Settings/' . $moduleName);

            @shell_exec('rm -r layouts/vlayout/modules/' . $moduleName);
            @shell_exec('rm -r layouts/vlayout/modules/Settings/' . $moduleName);

            @shell_exec('rm -r layouts/v7/modules/' . $moduleName);
            @shell_exec('rm -r layouts/v7/modules/Settings/' . $moduleName);

            @shell_exec('rm -f languages/ar_ae/' . $moduleName . '.php');
            @shell_exec('rm -f languages/ar_ae/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/cz_cz/' . $moduleName . '.php');
            @shell_exec('rm -f languages/cz_cz/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/de_de/' . $moduleName . '.php');
            @shell_exec('rm -f languages/de_de/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/en_gb/' . $moduleName . '.php');
            @shell_exec('rm -f languages/en_gb/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/en_us/' . $moduleName . '.php');
            @shell_exec('rm -f languages/en_us/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/es_es/' . $moduleName . '.php');
            @shell_exec('rm -f languages/es_es/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/es_mx/' . $moduleName . '.php');
            @shell_exec('rm -f languages/es_mx/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/fr_fr/' . $moduleName . '.php');
            @shell_exec('rm -f languages/fr_fr/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/hi_hi/' . $moduleName . '.php');
            @shell_exec('rm -f languages/hi_hi/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/hu_hu/' . $moduleName . '.php');
            @shell_exec('rm -f languages/hu_hu/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/it_it/' . $moduleName . '.php');
            @shell_exec('rm -f languages/it_it/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/nl_nl/' . $moduleName . '.php');
            @shell_exec('rm -f languages/nl_nl/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/pl_pl/' . $moduleName . '.php');
            @shell_exec('rm -f languages/pl_pl/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/pt_br/' . $moduleName . '.php');
            @shell_exec('rm -f languages/pt_br/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/ro_ro/' . $moduleName . '.php');
            @shell_exec('rm -f languages/ro_ro/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/ru_ru/' . $moduleName . '.php');
            @shell_exec('rm -f languages/ru_ru/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/sk_sk/' . $moduleName . '.php');
            @shell_exec('rm -f languages/sk_sk/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/sv_se/' . $moduleName . '.php');
            @shell_exec('rm -f languages/sv_se/Settings/' . $moduleName . '.php');
            @shell_exec('rm -f languages/tr_tr/' . $moduleName . '.php');
            @shell_exec('rm -f languages/tr_tr/Settings/' . $moduleName . '.php');

            $result = array('success' => true);
        }

        ob_clean();
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }
}
