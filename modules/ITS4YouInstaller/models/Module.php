<?php
/* * *******************************************************************************
* Description:  ITS4You Installer
* All Rights Reserved.
* Contributor: IT-Solutions4You s.r.o - www.its4you.sk
 * ****************************************************************************** */

class ITS4YouInstaller_Module_Model extends Vtiger_Module_Model {

    /**
     * Funxtion to identify if the module supports quick search or not
     */
    public function isQuickSearchEnabled() {
        return false;
    }
    /**
     * Function to get Settings links
     * @return <Array>
     */
    public function getSettingLinks(){

        $settingsLinks = array();
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        if($currentUserModel->isAdminUser()) {

	        $settingsLinks[] =  array(
		        'linktype' => 'LISTVIEWSETTING',
		        'linklabel' => vtranslate('LBL_EXTENSIONS', 'Settings:ITS4YouInstaller'),
		        'linkurl' => $this->getDefaultUrl(),
		        'linkicon' => ''
	        );

            $settingsLinks[] =  array(
                'linktype' => 'LISTVIEWSETTING',
                'linklabel' => vtranslate('LBL_REQUIREMENTS', 'Settings:ITS4YouInstaller'),
                'linkurl' => 'index.php?module=ITS4YouInstaller&parent=Settings&view=Requirements',
                'linkicon' => ''
            );

            $settingsLinks[] =  array(
                'linktype' => 'LISTVIEWSETTING',
                'linklabel' => vtranslate('LBL_UPGRADE', 'Settings:ITS4YouInstaller'),
                'linkurl' => 'index.php?module=ModuleManager&parent=Settings&view=ModuleImport&mode=importUserModuleStep1',
                'linkicon' => ''
            );

            $settingsLinks[] =  array(
                'linktype' => 'LISTVIEWSETTING',
                'linklabel' => vtranslate('LBL_UNINSTALL', 'Settings:ITS4YouInstaller'),
                'linkurl' => 'index.php?module=ITS4YouInstaller&view=Uninstall&parent=Settings',
                'linkicon' => ''
            );
        }
        return $settingsLinks;
    }

    public function getDefaultUrl() {
	    return 'index.php?module=ITS4YouInstaller&parent=Settings&view=Extensions';
    }

    /**
     * @return string
     */
    public function getRequirementsUrl()
    {
        return 'index.php?module=ITS4YouInstaller&parent=Settings&view=Requirements';
    }
}
