<?php
/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

require_once('include/events/SqlResultIterator.inc');
require_once('modules/com_vtiger_workflow/VTEntityCache.inc');
require_once 'include/Webservices/Utils.php';
require_once("modules/Users/Users.php");
require_once("include/Webservices/VtigerCRMObject.php");
require_once("include/Webservices/VtigerCRMObjectMeta.php");
require_once("include/Webservices/DataTransform.php");
require_once("include/Webservices/WebServiceError.php");
require_once 'include/utils/utils.php';
require_once 'include/Webservices/ModuleTypes.php';
require_once('include/Webservices/Retrieve.php');
require_once('include/Webservices/Update.php');
require_once 'include/Webservices/WebserviceField.php';
require_once 'include/Webservices/EntityMeta.php';
require_once 'include/Webservices/VtigerWebserviceObject.php';
require_once('modules/com_vtiger_workflow/VTWorkflowUtils.php');

class PDFMaker_PDFMaker_Model extends Vtiger_Module_Model
{

    public $log;
    public $db;
    protected $version_type;
    private $basicModules;
    private $pageFormats;
    private $profilesActions;
    private $profilesPermissions;
    private $workflows = array("VTPDFMakerMailTask", "VTPDFMakerTask");

    public function __construct()
    {

        PDFMaker_Debugger_Model::GetInstance()->Init();

        $this->log = LoggerManager::getLogger('account');
        $this->db = PearDatabase::getInstance();

        // array of modules that are allowed for basic version type
        $this->basicModules = array("20", "21", "22", "23");
        // array of action names used in profiles permissions
        $this->profilesActions = array(
            "EDIT" => "EditView", // Create/Edit
            "DETAIL" => "DetailView", // View
            "DELETE" => "Delete", // Delete
            "EXPORT_RTF" => "Export", // Export to RTF
        );
        $this->profilesPermissions = array();

        $this->name = "PDFMaker";
        $this->id = getTabId("PDFMaker");
        $this->moduleModel = Vtiger_Module_Model::getInstance('PDFMaker');

        $_SESSION['KCFINDER']['uploadURL'] = "test/upload";
        $_SESSION['KCFINDER']['uploadDir'] = "../test/upload";
    }

    //Getters and Setters

    public static function getSimpleHtmlDomFile()
    {

        if (!class_exists('simple_html_dom_node')) {
            $pdfmaker_simple_html_dom = "modules/PDFMaker/resources/simple_html_dom/simple_html_dom.php";
            $emailmaker_simple_html_dom = "modules/EMAILMaker/resources/simple_html_dom/simple_html_dom.php";

            if (file_exists($pdfmaker_simple_html_dom)) {
                $file = $pdfmaker_simple_html_dom;
            } elseif (file_exists($emailmaker_simple_html_dom)) {
                $file = $emailmaker_simple_html_dom;
            } else {
                $file = "include/simplehtmldom/simple_html_dom.php";
            }
        }

        if (!empty($file)) {
            require_once $file;
        }
    }

    public function GetPageFormats()
    {
        return $this->pageFormats;
    }

    public function GetBasicModules()
    {
        return $this->basicModules;
    }

    public function GetProfilesActions()
    {
        return $this->profilesActions;
    }

    //PUBLIC METHODS SECTION
    public function GetSearchSelectboxData()
    {

        $Search_Selectbox_Data = array();
        $sql = "SELECT vtiger_pdfmaker_displayed.*, vtiger_pdfmaker.templateid, vtiger_pdfmaker.description, vtiger_pdfmaker.filename, vtiger_pdfmaker.module, vtiger_pdfmaker_settings.owner, vtiger_pdfmaker_settings.sharingtype   
                FROM vtiger_pdfmaker 
                LEFT JOIN vtiger_pdfmaker_settings USING(templateid) 
                LEFT JOIN vtiger_pdfmaker_displayed USING(templateid)";

        $result = $this->db->pquery($sql, array());
        $num_rows = $this->db->num_rows($result);
        for ($i = 0; $i < $num_rows; $i++) {
            $currModule = $this->db->query_result($result, $i, 'module');
            $templateid = $this->db->query_result($result, $i, 'templateid');
            $Template_Permissions_Data = $this->returnTemplatePermissionsData($currModule, $templateid);
            if ($Template_Permissions_Data["detail"] === false) {
                continue;
            }

            $ownerid = $this->db->query_result($result, $i, 'owner');

            if (!isset($Search_Selectbox_Data["modules"][$currModule])) {
                $Search_Selectbox_Data["modules"][$currModule] = vtranslate($currModule, $currModule);
            }

            if (!isset($Search_Selectbox_Data["owners"][$ownerid])) {
                $Search_Selectbox_Data["owners"][$ownerid] = getUserFullName($ownerid);
            }
        }

        return $Search_Selectbox_Data;
    }

    //ListView data

    public function returnTemplatePermissionsData($selected_module, $templateid)
    {
        $current_user = Users_Record_Model::getCurrentUserModel();

        $result = true;

        if (!is_admin($current_user)) {
            if ($selected_module != "" && isPermitted($selected_module, '') != "yes") {
                $result = false;
            } elseif ($templateid != "" && $this->CheckSharing($templateid) === false) {
                $result = false;
            }

            $detail_result = $result;

            if (!$this->CheckPermissions("EDIT")) {
                $edit_result = false;
            } else {
                $edit_result = $result;
            }

            if (!$this->CheckPermissions("DELETE")) {
                $delete_result = false;
            } else {
                $delete_result = $result;
            }

            if ($detail_result === false || $edit_result === false || $delete_result === false) {
                $profileGlobalPermission = false;
                require('user_privileges/user_privileges_' . $current_user->id . '.php');
                require('user_privileges/sharing_privileges_' . $current_user->id . '.php');

                if ($profileGlobalPermission[1] == 0) {
                    $detail_result = true;
                }

                if ($profileGlobalPermission[2] == 0) {
                    $edit_result = true;
                    $delete_result = true;
                }
            }

        } else {
            $detail_result = $edit_result = $delete_result = $result;
        }
        return array("detail" => $detail_result, "edit" => $edit_result, "delete" => $delete_result);
    }

    //DetailView data

    public function CheckSharing($templateid)
    {
        $current_user = Users_Record_Model::getCurrentUserModel();

        $result = $this->db->pquery("SELECT owner, sharingtype FROM vtiger_pdfmaker_settings WHERE templateid = ?", array($templateid));
        $row = $this->db->fetchByAssoc($result);

        $owner = $row["owner"];
        $sharingtype = $row["sharingtype"];

        $result = false;
        if ($owner == $current_user->id) {
            $result = true;
        } else {
            switch ($sharingtype) {
                //available for all
                case "":
                case "public":
                    $result = true;
                    break;
                //available only for superordinate users of template owner, so we get list of all subordinate users of the current user and if template
                //owner is one of them then template is available for current user
                case "private":
                    $subordinateUsers = $this->getSubRoleUserIds($current_user->roleid);
                    if (!empty($subordinateUsers) && count($subordinateUsers) > 0) {
                        $result = in_array($owner, $subordinateUsers);
                    } else {
                        $result = false;
                    }
                    break;
                //available only for those that are in share list
                case "share":
                    $subordinateUsers = $this->getSubRoleUserIds($current_user->roleid);
                    if (!empty($subordinateUsers) && count($subordinateUsers) > 0 && in_array($owner, $subordinateUsers)) {
                        $result = true;
                    } else {
                        $member_array = $this->GetSharingMemberArray($templateid);
                        if (isset($member_array["users"]) && in_array($current_user->id, $member_array["users"])) {
                            $result = true;
                        } elseif (isset($member_array["roles"]) && in_array($current_user->roleid, $member_array["roles"])) {
                            $result = true;
                        } else {
                            if (isset($member_array["rs"])) {
                                foreach ($member_array["rs"] as $roleid) {
                                    $roleAndsubordinateRoles = getRoleAndSubordinatesRoleIds($roleid);
                                    if (in_array($current_user->roleid, $roleAndsubordinateRoles)) {
                                        $result = true;
                                        break;
                                    }
                                }
                            }

                            if ($result == false && isset($member_array["groups"])) {
                                $current_user_groups = explode(",", fetchUserGroupids($current_user->id));
                                $res_array = array_intersect($member_array["groups"], $current_user_groups);
                                if (!empty($res_array) && count($res_array) > 0) {
                                    $result = true;
                                } else {
                                    $result = false;
                                }
                            }

                            if (isset($member_array["companies"])) {
                                foreach ($member_array["companies"] as $companyId) {
                                    if (ITS4YouMultiCompany_Record_Model::isRoleInCompany($companyId, $current_user->roleid)) {
                                        $result = true;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    break;
            }
        }
        return $result;
    }

    //EditView data

    private function getSubRoleUserIds($roleid)
    {
        $subRoleUserIds = array();
        $subordinateUsers = getRoleAndSubordinateUsers($roleid);
        if (!empty($subordinateUsers) && count($subordinateUsers) > 0) {
            $currRoleUserIds = getRoleUserIds($roleid);
            $subRoleUserIds = array_diff($subordinateUsers, $currRoleUserIds);
        }

        return $subRoleUserIds;
    }

    //function for getting the list of available user's templates

    public function GetSharingMemberArray($templateid, $foredit = false)
    {

        $result = $this->db->pquery("SELECT shareid, setype FROM vtiger_pdfmaker_sharing WHERE templateid = ? ORDER BY setype ASC", array($templateid));
        $memberArray = array();
        while ($row = $this->db->fetchByAssoc($result)) {
            $setype = $row["setype"];
            $type = ($setype == "rs" ? "RoleAndSubordinates" : ucfirst($setype));
            if ($foredit) {
                $setype = $type;
            }
            $memberArray[$setype][$type . ":" . $row["shareid"]] = $row["shareid"];
        }

        return $memberArray;
    }

    //function for getting allowed modules for an EditView
    //It returns two variables: array of modulenames
    //                          array of moduleids

    public function CheckPermissions($actionKey)
    {
        $current_user = Users_Record_Model::getCurrentUserModel();
        $profileid = getUserProfile($current_user->id);
        $result = false;

        if ($actionKey == "EXPORT_RTF") {
            $RTF_Activated = $this->isRTFActivated();
            if (!$RTF_Activated) {
                return $result;
            }
        }
        if (isset($this->profilesActions[$actionKey])) {

            $actionid = getActionid($this->profilesActions[$actionKey]);
            $permissions = $this->GetProfilesPermissions();

            if (isset($permissions[$profileid[0]][$actionid]) && $permissions[$profileid[0]][$actionid] == "0") {
                $result = true;
            }
        }

        return $result;
    }

    //function for getting the mPDF object that contains prepared HTML output
    //returns the name of output filename - the file can be generated by calling mPDF->Output(..) method

    public function isRTFActivated()
    {
        return false;
    }

    public function GetProfilesPermissions()
    {
        if (count($this->profilesPermissions) == 0) {
            $profiles = Settings_Profiles_Record_Model::getAll();
            $res = $this->db->pquery("SELECT * FROM vtiger_pdfmaker_profilespermissions", array());
            $permissions = array();
            while ($row = $this->db->fetchByAssoc($res)) {
                //      in case that profile has been deleted we need to set permission only for active profiles
                if (isset($profiles[$row["profileid"]])) {
                    $permissions[$row["profileid"]][$row["operation"]] = $row["permissions"];
                }
            }

            foreach ($profiles as $profileid => $profilename) {
                foreach ($this->profilesActions as $actionName) {
                    $actionId = getActionid($actionName);
                    if (!isset($permissions[$profileid][$actionId])) {
                        $permissions[$profileid][$actionId] = "0";
                    }
                }
            }

            ksort($permissions);
            $this->profilesPermissions = $permissions;
        }
        return $this->profilesPermissions;
    }

    public function GetListviewData($orderby = "templateid", $dir = "asc", $request)
    {

        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');
        $return_data = $PDFMakerModel->GetListviewData($orderby, $dir, $request);

        return $return_data;
    }

    public function GetDetailViewData($templateid)
    {
        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');

        return $PDFMakerModel->GetDetailViewData($templateid);
    }

    public function GetEditViewData($templateid)
    {
        $sql = "SELECT vtiger_pdfmaker_displayed.*, vtiger_pdfmaker.*, vtiger_pdfmaker_settings.*
    			FROM vtiger_pdfmaker
    			LEFT JOIN vtiger_pdfmaker_settings USING(templateid)
                        LEFT JOIN vtiger_pdfmaker_displayed USING(templateid)
    			WHERE vtiger_pdfmaker.templateid=?";

        $result = $this->db->pquery($sql, array($templateid));
        $pdftemplateResult = $this->db->fetch_array($result);

        $data = $this->getUserStatusData($templateid);

        if (count($data) > 0) {
            $pdftemplateResult["is_active"] = $data["is_active"];
            $pdftemplateResult["is_default"] = $data["is_default"];
            $pdftemplateResult["order"] = $data["order"];
        } else {
            $pdftemplateResult["is_active"] = "1";
            $pdftemplateResult["is_default"] = "0";
            $pdftemplateResult["order"] = "1";
        }

        $Template_Permissions_Data = $this->returnTemplatePermissionsData($pdftemplateResult["module"], $templateid);
        $pdftemplateResult["permissions"] = $Template_Permissions_Data;

        return $pdftemplateResult;
    }

    private function getUserStatusData($templateid)
    {
        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');
        return $PDFMakerModel->getUserStatusData($templateid);
    }

    public function GetAvailableTemplates($currModule, $forListView = false, $recordId = false)
    {
        $current_user = Users_Record_Model::getCurrentUserModel();

        $entityCache = new VTEntityCache($current_user);

        $entityData = false;
        $where_lv = "";
        $is_listview = "";
        if ($forListView == false) {
            $where_lv = " AND is_listview=?";
            $is_listview = "0";
        }

        $status_res = $this->db->pquery("SELECT templateid, is_active, is_default, sequence FROM vtiger_pdfmaker_userstatus
                        INNER JOIN vtiger_pdfmaker USING(templateid) WHERE userid=?", array($current_user->id));
        $status_arr = array();
        while ($status_row = $this->db->fetchByAssoc($status_res)) {
            $status_arr[$status_row["templateid"]]["is_active"] = $status_row["is_active"];
            $status_arr[$status_row["templateid"]]["is_default"] = $status_row["is_default"];
            $status_arr[$status_row["templateid"]]["sequence"] = $status_row["sequence"];
        }

        $sql = "SELECT vtiger_pdfmaker_displayed.*, vtiger_pdfmaker.templateid, vtiger_pdfmaker.filename, vtiger_pdfmaker.description            
                FROM vtiger_pdfmaker
                INNER JOIN vtiger_pdfmaker_settings USING(templateid)
                LEFT JOIN vtiger_pdfmaker_displayed USING(templateid)
                WHERE vtiger_pdfmaker.module=?" . $where_lv . "                                    
                ORDER BY vtiger_pdfmaker.filename ASC";

        $params = array($currModule);
        if ($forListView == false) {
            $params = array($currModule, $is_listview);

            if ($recordId) {
                $entityData = VTEntityData::fromEntityId($this->db, $recordId);
            }
        }

        $result = $this->db->pquery($sql, $params);
        $return_array = array();
        while ($row = $this->db->fetchByAssoc($result)) {
            $templateid = $row["templateid"];
            if ($this->CheckTemplatePermissions($currModule, $templateid, false) == false) {
                continue;
            }

            if ($recordId && !$forListView) {
                $PDFMaker_Display_Model = new PDFMaker_Display_Model();
                if ($PDFMaker_Display_Model->CheckDisplayConditions($row, $entityData, $currModule, $entityCache) == false) {
                    continue;
                }
            }

            $pdftemplatearray = array();
            if (isset($status_arr[$templateid])) {
                $pdftemplatearray['status'] = $status_arr[$templateid]["is_active"];
                $pdftemplatearray['is_default'] = $status_arr[$templateid]["is_default"];
                $pdftemplatearray['order'] = $status_arr[$templateid]["sequence"];
            } else {
                $pdftemplatearray['status'] = "1";
                $pdftemplatearray['is_default'] = "0";
                $pdftemplatearray['order'] = "1";
            }

            if ($pdftemplatearray['status'] == "0") {
                continue;
            }

            $return_array[$row["templateid"]]["templatename"] = $row["filename"];
            $return_array[$row["templateid"]]["title"] = $row["description"];
            $return_array[$row["templateid"]]["is_default"] = $pdftemplatearray["is_default"];
            $return_array[$row["templateid"]]["order"] = $pdftemplatearray["order"];
        }
//      when only one template is available for module, then set it as default
        if (count($return_array) == 1) {
            $tmp_arr = $return_array;
            reset($tmp_arr);
            $key = key($tmp_arr);
            $return_array[$key]["templatename"] = $tmp_arr[$key]["templatename"];
            $return_array[$key]["is_default"] = "3";
        }
        return $return_array;
    }

    public function CheckTemplatePermissions($selected_module, $templateid, $die = true)
    {
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = true;
        if (!is_admin($current_user)) {
            if ($selected_module != "" && isPermitted($selected_module, '') != "yes") {
                $result = false;
            } elseif ($templateid != "" && $this->CheckSharing($templateid) === false) {
                $result = false;
            }

            if ($result === false) {
                $profileGlobalPermission = false;
                require('user_privileges/user_privileges_' . $current_user->id . '.php');
                require('user_privileges/sharing_privileges_' . $current_user->id . '.php');

                if ($profileGlobalPermission[1] == 0) {
                    $result = true;
                }
            }

            if ($die === true && $result === false) {
                $this->DieDuePermission();
            }
        }
        return $result;
    }

    public function DieDuePermission()
    {
        throw new AppException(vtranslate('LBL_PERMISSION', 'PDFMaker'));
    }

    public function GetAllModules()
    {
        $Modulenames = array('' => vtranslate("LBL_PLS_SELECT", "PDFMaker"));
        $result = $this->db->pquery("SELECT tabid, name, tablabel FROM vtiger_tab WHERE isentitytype=1 AND presence=0 AND tabid NOT IN (?,?) ORDER BY name ASC", array('10', '28'));
        while ($row = $this->db->fetchByAssoc($result)) {
            if (file_exists("modules/" . $row['name'])) {

                if (isPermitted($row['name'], '') != "yes") {
                    continue;
                }

                if (in_array($row["tabid"], $this->basicModules) == true || $this->getVersionType() == "professional") {
                    $Modulenames[$row['name']] = vtranslate($row['tablabel'], $row['name']);
                }
                $ModuleIDS[$row['name']] = $row['tabid'];
            }
        }
        return array($Modulenames, $ModuleIDS);
    }

    //Method for getting the array of profiles permissions to PDFMaker actions.

    public function getVersionType()
    {
        if (!$this->version_type) {
            $this->version_type = $this->moduleModel->getVersionType();
        }

        return $this->version_type;
    }

    //Method for checking the permissions, whether the user has privilegies to perform specific action on PDF Maker.


    public function AddLinks($modulename)
    {
        require_once('vtlib/Vtiger/Module.php');
        $link_module = Vtiger_Module::getInstance($modulename);
        $link_module->addLink('DETAILVIEWSIDEBARWIDGET', 'PDFMaker', 'module=PDFMaker&view=GetPDFActions&record=$RECORD$');
        if ($modulename != "Events") {
            $link_module->addLink('LISTVIEWMASSACTION', 'PDF Export', 'javascript:PDFMaker_Actions_Js.getPDFListViewPopup2(this,\'$MODULE$\');');
        }


// remove non-standardly created links (difference in linkicon column makes the links twice when updating from previous version)
        global $adb;
        $tabid = getTabId($modulename);
        $res = $adb->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'DETAILVIEWWIDGET', 'PDFMaker', 'module=PDFMaker&action=PDFMakerAjax&file=getPDFActions&record=$RECORD$'));
        $i = 0;
        while ($row = $adb->fetchByAssoc($res)) {
            $i++;
            if ($i > 1) {
                $adb->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
            }
        }
        $res = $adb->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'LISTVIEWMASSACTION', 'PDF Export', 'javascript:getPDFListViewPopup2(this,\'$MODULE$\');'));
        $i = 0;
        while ($row = $adb->fetchByAssoc($res)) {
            $i++;
            if ($i > 1) {
                $adb->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
            }
        }

        if ($modulename == "Calendar") {
            $this->AddLinks('Events');
        }
    }

    public function GetReleasesNotif()
    {
        $notif = "";
        return $notif;
    }

    public function GetCustomLabels()
    {
        require_once("modules/PDFMaker/resources/classes/PDFMakerLabel.class.php");
        $oLblArr = array();
        $languages = array();

        if ($this->getVersionType() == "professional") {
            $sql = "SELECT k.label_id, k.label_key, v.lang_id, v.label_value
                    FROM vtiger_pdfmaker_label_keys AS k
                    LEFT JOIN vtiger_pdfmaker_label_vals AS v
                        USING(label_id)";
            $result = $this->db->pquery($sql, array());

            while ($row = $this->db->fetchByAssoc($result)) {
                if (!isset($oLblArr[$row["label_id"]])) {
                    $oLbl = new PDFMakerLabel($row["label_id"], $row["label_key"]);
                    $oLblArr[$row["label_id"]] = $oLbl;
                } else {
                    $oLbl = $oLblArr[$row["label_id"]];
                }
                $oLbl->SetLangValue($row["lang_id"], $row["label_value"]);
            }

            //getting the langs from vtiger_language
            $result = $this->db->pquery("SELECT * FROM vtiger_language WHERE active = ? ORDER BY id ASC", array('1'));
            while ($row = $this->db->fetchByAssoc($result)) {
                $languages[$row["id"]]["name"] = $row["name"];
                $languages[$row["id"]]["prefix"] = $row["prefix"];
                $languages[$row["id"]]["label"] = $row["label"];

                foreach ($oLblArr as $objLbl) {
                    if ($objLbl->IsLangValSet($row["id"]) == false) {
                        $objLbl->SetLangValue($row["id"], "");
                    }
                }
            }
        }

        return array($oLblArr, $languages);
    }

    public function GetProductBlockFields($select_module = "")
    {
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = array();
        //Product block
        $Article_Strings = array(
            "" => vtranslate("LBL_PLS_SELECT", "PDFMaker"),
            vtranslate("LBL_PRODUCTS_AND_SERVICES", "PDFMaker") => array(
                'PRODUCTBLOC_START' => vtranslate('LBL_ARTICLE_START', 'PDFMaker'),
                'PRODUCTBLOC_END' => vtranslate('LBL_ARTICLE_END', 'PDFMaker'),
                'PRODUCTBLOC_UNIQUE_START' => vtranslate('LBL_PRODUCTBLOCK_UNIQUE_START', 'PDFMaker'),
                'PRODUCTBLOC_UNIQUE_END' => vtranslate('LBL_PRODUCTBLOCK_UNIQUE_END', 'PDFMaker'),
            ),
            vtranslate("LBL_PRODUCTS_ONLY", "PDFMaker") => array(
                "PRODUCTBLOC_PRODUCTS_START" => vtranslate("LBL_ARTICLE_START", "PDFMaker"),
                "PRODUCTBLOC_PRODUCTS_END" => vtranslate("LBL_ARTICLE_END", "PDFMaker")
            ),
            vtranslate("LBL_SERVICES_ONLY", "PDFMaker") => array(
                "PRODUCTBLOC_SERVICES_START" => vtranslate("LBL_ARTICLE_START", "PDFMaker"),
                "PRODUCTBLOC_SERVICES_END" => vtranslate("LBL_ARTICLE_END", "PDFMaker")
            ),
        );
        $result["ARTICLE_STRINGS"] = $Article_Strings;

        //Common fields for product and services
        $Product_Fields = array(
            "PS_CRMID" => vtranslate("LBL_RECORD_ID", "PDFMaker"),
            "PS_NO" => vtranslate("LBL_PS_NO", "PDFMaker"),
            "PRODUCTPOSITION" => vtranslate("LBL_PRODUCT_POSITION", "PDFMaker"),
            "CURRENCYNAME" => vtranslate("LBL_CURRENCY_NAME", "PDFMaker"),
            "CURRENCYCODE" => vtranslate("LBL_CURRENCY_CODE", "PDFMaker"),
            "CURRENCYSYMBOL" => vtranslate("LBL_CURRENCY_SYMBOL", "PDFMaker"),
            "PRODUCTNAME" => vtranslate("LBL_VARIABLE_PRODUCTNAME", "PDFMaker"),
            "PRODUCTTITLE" => vtranslate("LBL_VARIABLE_PRODUCTTITLE", "PDFMaker"),
            "PRODUCTEDITDESCRIPTION" => vtranslate("LBL_VARIABLE_PRODUCTEDITDESCRIPTION", "PDFMaker"),
            "PRODUCTDESCRIPTION" => vtranslate("LBL_VARIABLE_PRODUCTDESCRIPTION", "PDFMaker")
        );

        $result3 = $this->db->query("SELECT tabid FROM vtiger_tab WHERE name='Pdfsettings'");

        if ($this->db->num_rows($result3) > 0) {
            $Product_Fields["CRMNOWPRODUCTDESCRIPTION"] = vtranslate("LBL_CRMNOW_DESCRIPTION", "PDFMaker");
        }

        $Product_Fields["PRODUCTQUANTITY"] = vtranslate("LBL_VARIABLE_QUANTITY", "PDFMaker");
        $Product_Fields["PRODUCTUSAGEUNIT"] = vtranslate("LBL_VARIABLE_USAGEUNIT", "PDFMaker");
        $Product_Fields["PRODUCTLISTPRICE"] = vtranslate("LBL_VARIABLE_LISTPRICE", "PDFMaker");
        $Product_Fields["PRODUCTTOTAL"] = vtranslate("LBL_PRODUCT_TOTAL", "PDFMaker");
        $Product_Fields["PRODUCTDISCOUNT"] = vtranslate("LBL_VARIABLE_DISCOUNT", "PDFMaker");
        $Product_Fields["PRODUCTDISCOUNTPERCENT"] = vtranslate("LBL_VARIABLE_DISCOUNT_PERCENT", "PDFMaker");
        $Product_Fields["PRODUCTSTOTALAFTERDISCOUNT"] = vtranslate("LBL_VARIABLE_PRODUCTTOTALAFTERDISCOUNT", "PDFMaker");
        $Product_Fields["PRODUCTVATPERCENT"] = vtranslate("LBL_PRODUCT_VAT_PERCENT", "PDFMaker");
        $Product_Fields["PRODUCTVATSUM"] = vtranslate("LBL_PRODUCT_VAT_SUM", "PDFMaker");
        $Product_Fields["PRODUCTTOTALSUM"] = vtranslate("LBL_PRODUCT_TOTAL_VAT", "PDFMaker");
        $Product_Fields["PRODUCT_LISTPRICEWITHTAX"] = vtranslate("LBL_PRODUCT_LIST_PRICE_WITH_TAX", "PDFMaker");

        if ($select_module != "") {
            $result1 = $this->db->pquery("SELECT * FROM vtiger_inventorytaxinfo", array());

            while ($row1 = $this->db->fetchByAssoc($result1)) {
                $Taxes[$row1["taxname"]] = $row1["taxlabel"];
            }

            $select_moduleid = getTabid($select_module);
            $result2 = $this->db->pquery("SELECT fieldname, fieldlabel, uitype FROM vtiger_field WHERE tablename = ? AND tabid = ? AND fieldname NOT IN ('productid','quantity','listprice','comment','discount_amount','discount_percent')", array("vtiger_inventoryproductrel", $select_moduleid));

            while ($row2 = $this->db->fetchByAssoc($result2)) {

                if ($row2["uitype"] == "83") {

                    $label = vtranslate("Tax");
                    $label .= " (";
                    $label .= vtranslate($Taxes[$row2["fieldname"]], $select_module);
                    $label .= ")";
                } else {
                    $label = vtranslate($row2["fieldlabel"], $select_module);
                }
                $Product_Fields["PRODUCT_" . strtoupper($row2["fieldname"])] = $label;
            }
        }

        $result["SELECT_PRODUCT_FIELD"] = $Product_Fields;

        //Available fields for products
        $prod_fields = $serv_fields = array();

        $in = getTabId('Products');
        $in .= ', ' . getTabId('Services');

        $sql = "SELECT  t.tabid, t.name,
                        b.blockid, b.blocklabel,
                        f.fieldname, f.fieldlabel
                FROM vtiger_tab AS t
                INNER JOIN vtiger_blocks AS b USING(tabid)
                INNER JOIN vtiger_field AS f ON b.blockid = f.block
                WHERE t.tabid IN (" . $in . ")
                    AND (f.displaytype != 3 OR f.uitype = 55)
                ORDER BY t.name ASC, b.sequence ASC, f.sequence ASC, f.fieldid ASC";
        $res = $this->db->pquery($sql, array());
        while ($row = $this->db->fetchByAssoc($res)) {
            $module = $row["name"];
            $fieldname = $row["fieldname"];
            if (getFieldVisibilityPermission($module, $current_user->id, $fieldname) != '0') {
                continue;
            }

            $trans_field_nam = strtoupper($module) . "_" . strtoupper($fieldname);
            switch ($module) {
                case "Products":
                    $trans_block_lbl = vtranslate($row["blocklabel"], 'Products');
                    $trans_field_lbl = vtranslate($row["fieldlabel"], 'Products');
                    $prod_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                    break;

                case "Services":
                    $trans_block_lbl = vtranslate($row["blocklabel"], 'Services');
                    $trans_field_lbl = vtranslate($row["fieldlabel"], 'Services');
                    $serv_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                    break;

                default:
                    continue;
            }
        }

        $result["PRODUCTS_FIELDS"] = $prod_fields;
        $result["SERVICES_FIELDS"] = $serv_fields;

        return $result;
    }

    public function GetRelatedBlocks($select_module, $select_too = true)
    {
        $Related_Blocks = array();
        if ($select_too) {
            $Related_Blocks[""] = vtranslate("LBL_PLS_SELECT", "PDFMaker");
        }
        if ($select_module != "") {
            $Related_Modules = PDFMaker_RelatedBlock_Model::getRelatedModulesList($select_module);

            if (count($Related_Modules) > 0) {
                $sql = "SELECT * FROM vtiger_pdfmaker_relblocks
                        WHERE secmodule IN(" . generateQuestionMarks($Related_Modules) . ")
                            AND deleted = 0
                        ORDER BY relblockid";
                $result = $this->db->pquery($sql, $Related_Modules);
                while ($row = $this->db->fetchByAssoc($result)) {
                    if ($row["module"] == "PriceBooks" && $row["module"] != $select_module) {
                        $csql = "SELECT * FROM vtiger_pdfmaker_relblockcol WHERE relblockid = ? AND columnname LIKE ?";
                        $cresult = $this->db->pquery($csql, array($row["relblockid"], "vtiger_pricebookproductreltmp%"));
                        if ($this->db->num_rows($cresult) > 0) {
                            continue;
                        }
                    }
                    $Related_Blocks[$row["relblockid"]] = $row["name"];
                }
            }
        }

        return $Related_Blocks;
    }

    public function GetUserSettings($userid = "")
    {
        $current_user = Users_Record_Model::getCurrentUserModel();
        $userid = ($userid == "" ? $current_user->id : $userid);

        $result = $this->db->pquery("SELECT * FROM vtiger_pdfmaker_usersettings WHERE userid = ?", array($userid));

        $settings = array();
        if ($this->db->num_rows($result) > 0) {
            while ($row = $this->db->fetchByAssoc($result)) {
                $settings["is_notified"] = $row["is_notified"];
            }
        } else {
            $settings["is_notified"] = "0";
        }

        return $settings;
    }

    /**
     * Function to get the Quick Links for the module
     * @param <Array> $linkParams
     * @return <Array> List of Vtiger_Link_Model instances
     */
    public function getSideBarLinks($linkParams)
    {
        $currentUserModel = Users_Record_Model::getCurrentUserModel();

        $type = "SIDEBARLINK";
        $quickLinks = array();


        if ($linkParams["ACTION"] == "ProfilesPrivilegies") {
            $quickSLinks = array(
                'linktype' => "SIDEBARLINK",
                'linklabel' => "LBL_RECORDS_LIST",
                'linkurl' => "index.php?module=PDFMaker&view=List",
                'linkicon' => ''
            );

            $links["SIDEBARLINK"][] = Vtiger_Link_Model::getInstanceFromValues($quickSLinks);
        } elseif ($linkParams["ACTION"] == "IndexAjax" && $linkParams["MODE"] == "showSettingsList") {

            if ($currentUserModel->isAdminUser()) {
                $SettingsLinks = $this->GetAvailableSettings();

                foreach ($SettingsLinks as $stype => $sdata) {

                    $quickLinks[] = array(
                        'linktype' => 'SIDEBARLINK',
                        'linklabel' => $sdata["label"],
                        'linkurl' => $sdata["location"],
                        'linkicon' => ''
                    );
                }
            }
        } else {
            $linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
            $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

            $quickLinks[] = array(
                'linktype' => 'SIDEBARLINK',
                'linklabel' => 'LBL_RECORDS_LIST',
                'linkurl' => $this->getListViewUrl(),
                'linkicon' => '',
            );

            if (vtlib_isModuleActive("ITS4YouStyles")) {
                $quickLinks[] = array(
                    'linktype' => 'SIDEBARLINK',
                    'linklabel' => 'LBL_STYLES_LIST',
                    'linkurl' => "index.php?module=ITS4YouStyles&view=List",
                    'linkicon' => '',
                );
            }
        }

        if (count($quickLinks) > 0) {
            foreach ($quickLinks as $quickLink) {
                $links[$type][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
            }
        }

        if ($currentUserModel->isAdminUser() && $linkParams["ACTION"] != "Edit" && $linkParams["ACTION"] != "Detail") {
            $quickS2Links = array(
                'linktype' => "SIDEBARWIDGET",
                'linklabel' => "LBL_SETTINGS",
                'linkurl' => "module=PDFMaker&view=IndexAjax&mode=showSettingsList&pview=" . $linkParams["ACTION"],
                'linkicon' => ''
            );
            $links["SIDEBARWIDGET"][] = Vtiger_Link_Model::getInstanceFromValues($quickS2Links);
        }

        return $links;
    }

    public function GetAvailableSettings()
    {
        $menu_array = array();
        return $menu_array;
    }

    public function getListViewLinks($linkParams)
    {
        $currentUserModel = Users_Record_Model::getCurrentUserModel();

        $linkTypes = array('LISTVIEWMASSACTION', 'LISTVIEWSETTING');
        $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

        if ($this->CheckPermissions("DELETE")) {
            $massActionLink = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_DELETE',
                'linkurl' => 'javascript:PDFMaker_ListJs.massDeleteTemplates();',
                'linkicon' => ''
            );

            $links['LISTVIEWMASSACTION'][] = Vtiger_Link_Model::getInstanceFromValues($massActionLink);
        }

        $quickLinks = array();
        if ($this->CheckPermissions("EDIT")) {
            $quickLinks [] = array(
                'linktype' => 'LISTVIEW',
                'linklabel' => 'LBL_IMPORT',
                'linkurl' => 'index.php?module=PDFMaker&view=ImportPDFTemplate',
                'linkicon' => ''
            );
        }

        if ($this->CheckPermissions("EDIT")) {
            $quickLinks [] = array(
                'linktype' => 'LISTVIEW',
                'linklabel' => 'LBL_EXPORT',
                'linkurl' => 'javascript:ExportTemplates();',
                'linkicon' => ''
            );
        }

        foreach ($quickLinks as $quickLink) {
            $links['LISTVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
        }

        if ($currentUserModel->isAdminUser()) {

            $settingsLinks = $this->getSettingLinks();
            foreach ($settingsLinks as $settingsLink) {
                $links['LISTVIEWSETTING'][] = Vtiger_Link_Model::getInstanceFromValues($settingsLink);
            }

            $SettingsLinks = $this->GetAvailableSettings();

            foreach ($SettingsLinks as $stype => $sdata) {
                $s_parr = array(
                    'linktype' => 'LISTVIEWSETTING',
                    'linklabel' => $sdata["label"],
                    'linkurl' => $sdata["location"],
                    'linkicon' => ''
                );

                $links['LISTVIEWSETTING'][] = Vtiger_Link_Model::getInstanceFromValues($s_parr);
            }
        }

        return $links;
    }

    public function createPDFAndSaveFile($request, $templates, $focus, $Records, $file_name, $moduleName, $language)
    {

        $cu = Users_Record_Model::getCurrentUserModel();
        $dl = Vtiger_Language_Handler::getLanguage();

        $date_var = date("Y-m-d H:i:s");
        //to get the owner id
        $ownerid = $focus->column_fields["assigned_user_id"];
        if (!isset($ownerid) || $ownerid == "") {
            $ownerid = $cu->id;
        }

        $current_id = $this->db->getUniqueID("vtiger_crmentity");

        if (is_array($templates)) {
            $Templateids = $templates;
        } else {
            $templates = rtrim($templates, ";");

            //workflow - in case that value 'none' in selectbox has been selected, because it was only one value due to permission restrictions
            if ($templates != "0") {
                $Templateids = explode(";", $templates);
            } else {
                $Templateids = array();
            }
        }

        if (!$language || $language == "") {
            $language = $dl;
        }

        $preContent = array();
        $mode = $request->get('mode');
        $module = $request->get('module');
        if (isset($mode) && $mode == "edit" && isset($module) && $module == "PDFMaker") {
            foreach ($Templateids as $templateid) {
                $preContent["header" . $templateid] = $request->get("header" . $templateid);
                $preContent["body" . $templateid] = $request->get("body" . $templateid);
                $preContent["footer" . $templateid] = $request->get("footer" . $templateid);
            }
        }
        //called function GetPreparedMPDF returns the name of PDF and fill the variable $mpdf with prepared HTML output
        $mpdf = "";

        $name = $this->GetPreparedMPDF($mpdf, $Records, $Templateids, $moduleName, $language, $preContent, true);
        $name = $this->generate_cool_uri($name);

        $upload_file_path = decideFilePath();

        if ($name != "") {
            $file_name = $name . ".pdf";
        }

        $mpdf->Output($upload_file_path . $current_id . "_" . $file_name);

        $filesize = filesize($upload_file_path . $current_id . "_" . $file_name);
        $filetype = "application/pdf";

        $params1 = array($current_id, $cu->id, $ownerid, "Documents Attachment", $focus->column_fields["description"], $this->db->formatDate($date_var, true), $this->db->formatDate($date_var, true));

        $this->db->pquery("insert into vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) values(?, ?, ?, ?, ?, ?, ?)", $params1);
        if (defined('STORAGE_ROOT')) {
            $upload_file_path = str_replace(STORAGE_ROOT, '', $upload_file_path);
        }

        if (PDFMaker_PDFMaker_Model::isStoredName()) {
            $this->db->pquery("insert into vtiger_attachments(attachmentsid, name, storedname, description, type, path) values(?, ?, ?, ?, ?, ?)", array($current_id, $file_name, $file_name, $focus->column_fields["description"], $filetype, $upload_file_path));
        } else {
            $this->db->pquery("insert into vtiger_attachments(attachmentsid, name, description, type, path) values(?, ?, ?, ?, ?)", array($current_id, $file_name, $focus->column_fields["description"], $filetype, $upload_file_path));
        }

        $this->db->pquery('insert into vtiger_seattachmentsrel values(?,?)', array($focus->id, $current_id));

        $this->db->pquery("UPDATE vtiger_notes SET filesize=?, filename=? WHERE notesid=?", array($filesize, $file_name, $focus->id));

        if (vtlib_isModuleActive('ModTracker')) {
            require_once 'modules/ModTracker/ModTracker.php';
            ModTracker::linkRelation($moduleName, $focus->parentid, "Documents", $focus->id);
        }

        return true;
    }

    public function GetPreparedMPDF(&$mpdf, $records, $templates, $module, $language, $preContent = array(), $set_password = true)
    {
        require_once("modules/PDFMaker/resources/pdfjs.php");

        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');

        $focus = CRMEntity::getInstance($module);
        $TemplateContent = array();
        $PDFPassword = $name = '';
        foreach ($records as $record) {
            foreach ($focus->column_fields as $cf_key => $cf_value) {
                $focus->column_fields[$cf_key] = '';
            }
            if ($module == 'Calendar') {
                $cal_res = $this->db->pquery("select activitytype from vtiger_activity where activityid=?", array($record));
                $cal_row = $this->db->fetchByAssoc($cal_res);
                if ($cal_row['activitytype'] == 'Task') {
                    $focus->retrieve_entity_info($record, $module);
                } else {
                    $focus->retrieve_entity_info($record, 'Events');
                }
            } else {
                $focus->retrieve_entity_info($record, $module);
            }
            $focus->id = $record;

            foreach ($templates as $templateid) {
                $PDFContent = $this->GetPDFContentRef($templateid, $module, $focus, $language);
                $Settings = $PDFContent->getSettings();

                //if current template is not available for current user then set the content
                if ($this->CheckTemplatePermissions($module, $templateid, false) == false) {
                    $header_html = "";
                    $body_html = vtranslate("LBL_PERMISSION", "PDFMaker");
                    $footer_html = "";
                } else {
                    if (!empty($preContent)) {
                        //we need to call getContent method in order to fill bridge2mpdf array
                        $PDFContent->getContent();
                        $header_html = $preContent["header" . $templateid];
                        $body_html = $preContent["body" . $templateid];
                        $footer_html = $preContent["footer" . $templateid];
                    } else {
                        $pdf_content = $PDFContent->getContent();
                        $header_html = $pdf_content["header"];
                        $body_html = $pdf_content["body"];
                        $footer_html = $pdf_content["footer"];

                    }

                    if ($name == "") {
                        $name = $PDFContent->getFilename();
                    }

                }

                // we need to set orientation for mPDF constructor in case of Custom format (array(width, length)) as well as we need to
                // set orientation for <pagebreak ... /> contruction
                if ($Settings["orientation"] == "landscape") {
                    $orientation = "L";
                } else {
                    $orientation = "P";
                }

                $format = $Settings["format"];  // variable $format used in mPDF constructor
                $formatPB = $format;            // variable $formatPB used in <pagebreak ... /> contruction
                if (strpos($format, ";") > 0) {
                    $tmpArr = explode(";", $format);
                    $format = array($tmpArr[0], $tmpArr[1]);
                    $formatPB = $format[0] . "mm " . $format[1] . "mm";
                } elseif ($Settings["orientation"] == "landscape") {
                    $format .= "-L";
                    $formatPB .= "-L";
                }

                $ListViewBlocks = array();
                if (strpos($body_html, "#LISTVIEWBLOCK_START#") !== false && strpos($body_html, "#LISTVIEWBLOCK_END#") !== false) {
                    preg_match_all("|#LISTVIEWBLOCK_START#(.*)#LISTVIEWBLOCK_END#|sU", $body_html, $ListViewBlocks, PREG_PATTERN_ORDER);
                }

                if (count($ListViewBlocks) > 0) {
                    $TemplateContent[$templateid] = $pdf_content;
                    $TemplateSettings[$templateid] = $Settings;

                    $num_listview_blocks = count($ListViewBlocks[0]);
                    for ($i = 0; $i < $num_listview_blocks; $i++) {
                        $ListViewBlock[$templateid][$i] = $ListViewBlocks[0][$i];
                        $ListViewBlockContent[$templateid][$i][$record][] = $ListViewBlocks[1][$i];
                    }
                } else {
                    if (!is_object($mpdf)) {
                        $mpdf = new ITS4You_PDFMaker_JavaScript('', $format, '', '', $Settings["margin_left"], $Settings["margin_right"], 0, 0, $Settings["margin_top"], $Settings["margin_bottom"], $orientation);

                        $mpdf->actualizeTTFonts();

                        if (mPDF_VERSION == 5.6) {
                            $mpdf->SetAutoFont();
                        }
                        $this->mpdf_preprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                        $this->mpdf_prepare_header_footer_settings($mpdf, $templateid, $Settings);
                        @$mpdf->SetHTMLHeader($header_html);
                    } else {
                        $this->mpdf_preprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                        @$mpdf->SetHTMLHeader($header_html);
                        @$mpdf->WriteHTML('<pagebreak sheet-size="' . $formatPB . '" orientation="' . $orientation . '" margin-left="' . $Settings["margin_left"] . 'mm" margin-right="' . $Settings["margin_right"] . 'mm" margin-top="0mm" margin-bottom="0mm" margin-header="' . $Settings["margin_top"] . 'mm" margin-footer="' . $Settings["margin_bottom"] . 'mm" />');
                    }

                    $Settings["watermark"]["text"] = $PDFContent->getWatermarkText();

                    $this->setWatemark($mpdf, $Settings["watermark"]);

                    @$mpdf->SetHTMLFooter($footer_html);

                    $PDFMakerModel->addAwesomeStyle($body_html);

                    if (vtlib_isModuleActive("ITS4YouStyles")) {
                        $ITS4YouStylesModuleModel = new ITS4YouStyles_Module_Model();
                        $body_html = $ITS4YouStylesModuleModel->addStyles($body_html, $templateid, "PDFMaker");
                    }
                    @$mpdf->WriteHTML($body_html);

                    if ($PDFPassword == "" && $set_password) {
                        $PDFPassword = $PDFContent->getPDFPassword();
                        if (!empty($PDFPassword)) {
                            $mpdf->SetProtection(array(), $PDFPassword, $PDFPassword, '128');
                        }
                    }

                    $this->mpdf_postprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                }
            }
        }
        if (count($TemplateContent) > 0) {
            foreach ($TemplateContent as $templateid => $TContent) {
                $header_html = $TContent["header"];
                $body_html = $TContent["body"];
                $footer_html = $TContent["footer"];
                $Settings = $TemplateSettings[$templateid];

                foreach ($ListViewBlock[$templateid] as $id => $text) {
                    $cridx = 1;
                    $groupsContents = $recordsContents = [];
                    $groupBy = '';

                    foreach ($records as $record) {
                        $recordContent = implode("", $ListViewBlockContent[$templateid][$id][$record]);
                        $recordContent = str_ireplace('$CRIDX$', $cridx++, $recordContent);

                        if (strpos($recordContent, '[LISTVIEWGROUPBY|') !== false) {
                            $explode = explode('[LISTVIEWGROUPBY|', $recordContent);

                            if (isset($explode[1])) {
                                $explode2 = explode('|LISTVIEWGROUPBY]', $explode[1]);
                                $groupBy = $explode2[0];

                                $groupReplace = !isset($groupsContents[$groupBy]) ? $groupBy : '';
                                $recordContent = str_replace('[LISTVIEWGROUPBY|' . $explode2[0] . '|LISTVIEWGROUPBY]', $groupReplace, $recordContent);
                            }
                        }

                        $groupsContents[$groupBy][] = $recordContent;
                    }

                    foreach ($groupsContents as $groupsContent) {
                        $recordsContents[] = implode('', $groupsContent);
                    }

                    $replace = implode('', $recordsContents);
                    $body_html = str_replace($text, $replace, $body_html);
                }

                // we need to set orientation for mPDF constructor in case of Custom format (array(width, length)) as well as we need to
                // set orientation for <pagebreak ... /> contruction
                if ($Settings["orientation"] == "landscape") {
                    $orientation = "L";
                } else {
                    $orientation = "P";
                }

                $format = $Settings["format"];  // variable $format used in mPDF constructor
                $formatPB = $format;            // variable $formatPB used in <pagebreak ... /> contruction
                if (strpos($format, ";") > 0) {
                    $tmpArr = explode(";", $format);
                    $format = array($tmpArr[0], $tmpArr[1]);
                    $formatPB = $format[0] . "mm " . $format[1] . "mm";
                } elseif ($Settings["orientation"] == "landscape") {
                    $format .= "-L";
                    $formatPB .= "-L";
                }

                if (!is_object($mpdf)) {
                    $mpdf = new ITS4You_PDFMaker_JavaScript('', $format, '', '', $Settings["margin_left"], $Settings["margin_right"], 0, 0, $Settings["margin_top"], $Settings["margin_bottom"], $orientation);
                    //autoScriptToLang();
                    if (mPDF_VERSION == 5.6) {
                        $mpdf->SetAutoFont();
                    }
                    $this->mpdf_preprocess($mpdf, $templateid);
                    $this->mpdf_prepare_header_footer_settings($mpdf, $templateid, $Settings);
                    @$mpdf->SetHTMLHeader($header_html);
                } else {
                    $this->mpdf_preprocess($mpdf, $templateid);
                    @$mpdf->SetHTMLHeader($header_html);
                    @$mpdf->WriteHTML('<pagebreak sheet-size="' . $formatPB . '" orientation="' . $orientation . '" margin-left="' . $Settings["margin_left"] . 'mm" margin-right="' . $Settings["margin_right"] . 'mm" margin-top="0mm" margin-bottom="0mm" margin-header="' . $Settings["margin_top"] . 'mm" margin-footer="' . $Settings["margin_bottom"] . 'mm" />');
                }
                @$mpdf->SetHTMLFooter($footer_html);
                @$mpdf->WriteHTML($body_html);
                $this->mpdf_postprocess($mpdf, $templateid);
            }
        }

        //check in case of some error when $mpdf object is not set it is caused by lack of permissions - i.e. when workflow template is 'none'
        if (!is_object($mpdf)) {
            @$mpdf = new ITS4You_PDFMaker_JavaScript();
            @$mpdf->WriteHTML(vtranslate("LBL_PERMISSION", "PDFMaker"));
        }

        if ($name == "") {
            $name = $this->GenerateName($records, $templates, $module);
        }
        $name = str_replace(array(' ', '/', ','), array('-', '-', '-'), $name);
        return $name;
    }

    public function GetPDFContentRef($templateid, $module, $focus, $language)
    {
        return new PDFMaker_PDFContent_Model($templateid, $module, $focus, $language);
    }

    private function mpdf_preprocess(&$mpdf, $templateid, $bridge = '')
    {
        if ($bridge != '' && is_array($bridge)) {
            $mpdf->PDFMakerRecord = $bridge["record"];
            $mpdf->PDFMakerTemplateid = $bridge["templateid"];

            if (isset($bridge["subtotalsArray"])) {
                $mpdf->PDFMakerSubtotalsArray = $bridge["subtotalsArray"];
            }
        }

        $this->mpdf_processing($mpdf, $templateid, 'pre');
    }

    private function mpdf_processing(&$mpdf, $templateid, $when)
    {
        $path = 'modules/PDFMaker/resources/mpdf_processing/';
        switch ($when) {
            case "pre":
                $filename = 'preprocessing.php';
                $functionname = 'pdfmaker_mpdf_preprocessing';
                break;
            case "post":
                $filename = 'postprocessing.php';
                $functionname = 'pdfmaker_mpdf_postprocessing';
                break;
        }
        if (is_file($path . $filename) && is_readable($path . $filename)) {
            require_once($path . $filename);
            $functionname($mpdf, $templateid);
        }
    }

    private function mpdf_prepare_header_footer_settings(&$mpdf, $templateid, &$Settings)
    {
        $mpdf->PDFMakerTemplateid = $templateid;

        $disp_header = $Settings["disp_header"];
        $disp_optionsArr = array("dh_first", "dh_other");
        $disp_header_bin = str_pad(base_convert($disp_header, 10, 2), 2, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($disp_optionsArr); $i++) {
            if (substr($disp_header_bin, $i, 1) == "1") {
                $mpdf->PDFMakerDispHeader[$disp_optionsArr[$i]] = true;
            } else {
                $mpdf->PDFMakerDispHeader[$disp_optionsArr[$i]] = false;
            }
        }

        $disp_footer = $Settings["disp_footer"];
        $disp_optionsArr = array("df_first", "df_last", "df_other");
        $disp_footer_bin = str_pad(base_convert($disp_footer, 10, 2), 3, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($disp_optionsArr); $i++) {
            if (substr($disp_footer_bin, $i, 1) == "1") {
                $mpdf->PDFMakerDispFooter[$disp_optionsArr[$i]] = true;
            } else {
                $mpdf->PDFMakerDispFooter[$disp_optionsArr[$i]] = false;
            }
        }
    }

    public function setWatemark(&$mpdf, $Watermark)
    {

        if ($Watermark["type"] == "image" && !empty($Watermark["img_id"])) {
            $Data = $this->getWatemarkImageData($Watermark["img_id"]);

            if ($Data) {
                $mpdf->SetWatermarkImage($Data["image_path"]);
                $mpdf->showWatermarkImage = true;
                $mpdf->watermarkImageAlpha = $Watermark["alpha"];
            }
        } elseif ($Watermark["type"] == "text" && !empty($Watermark["text"])) {
            $mpdf->SetWatermarkText($Watermark["text"]);
            $mpdf->showWatermarkText = true;
            $mpdf->watermarkTextAlpha = $Watermark["alpha"];
        }
    }

    public function getWatemarkImageData($watermark_img_id)
    {

        $Data = false;

        $adb = PearDatabase::getInstance();
        $result = $adb->pquery("SELECT * FROM vtiger_attachments WHERE attachmentsid = ?", array($watermark_img_id));
        $num_rows = $adb->num_rows($result);

        if ($num_rows == '1') {
            $Data = $adb->fetchByAssoc($result, 0);

            $fileName = html_entity_decode($Data["name"], ENT_QUOTES, vglobal('default_charset'));
            $Data["file_name"] = $fileName;
            $savedFile = $Data["attachmentsid"] . "_" . $fileName;

            $Data["image_path"] = $Data["path"] . $savedFile;
        }

        return $Data;
    }

    private function mpdf_postprocess(&$mpdf, $templateid, $bridge = '')
    {
        $this->mpdf_processing($mpdf, $templateid, 'post');
    }

    public function GenerateName($records, $templates, $module)
    {
        $focus = CRMEntity::getInstance($module);
        $focus->retrieve_entity_info($records[0], $module);

        if (count($records) > 1) {
            $name = "BatchPDF";
        } else {
            $module_tabid = getTabId($module);
            $result = $this->db->pquery("SELECT fieldname FROM vtiger_field WHERE uitype=? AND tabid=?", array('4', $module_tabid));
            $fieldname = $this->db->query_result($result, 0, "fieldname");
            if (isset($focus->column_fields[$fieldname]) && $focus->column_fields[$fieldname] != "") {
                $name = $this->generate_cool_uri($focus->column_fields[$fieldname]);
            } else {
                //        $name = $_REQUEST["commontemplateid"].$_REQUEST["record"].date("ymdHi");
                $templatesStr = implode("_", $templates);
                $recordsStr = implode("_", $records);
                $name = $templatesStr . $recordsStr . date("ymdHi");
            }
        }

        return $name;
    }

    public function generate_cool_uri($name)
    {
        $Search = array("$", "€", "&", "%", ")", "(", ".", " - ", "/", " ", ",", "ľ", "š", "č", "ť", "ž", "ý", "á", "í", "é", "ó", "ö", "ů", "ú", "ü", "ä", "ň", "ď", "ô", "ŕ", "Ľ", "Š", "Č", "Ť", "Ž", "Ý", "Á", "Í", "É", "Ó", "Ú", "Ď", "\"", "°", "ß");
        $Replace = array("", "", "", "", "", "", "-", "-", "-", "-", "-", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "o", "u", "u", "u", "a", "n", "d", "o", "r", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "u", "d", "", "", "ss");
        $return = str_replace($Search, $Replace, $name);
        return $return;
    }

    public static function isStoredName()
    {
        return (7.2 <= (float)vglobal('vtiger_current_version'));
    }

    public function controlWorkflows()
    {

        $adb = PearDatabase::getInstance();
        $control = 0;

        $Workflows = $this->GetWorkflowsList();

        foreach ($Workflows as $name) {
            $dest1 = "modules/com_vtiger_workflow/tasks/" . $name . ".inc";
            $dest2 = "layouts/v7/modules/Settings/Workflows/Tasks/" . $name . ".tpl";
            if (file_exists($dest1) && file_exists($dest2)) {
                $result1 = $adb->pquery("SELECT * FROM com_vtiger_workflow_tasktypes WHERE tasktypename = ?", array($name));
                if ($adb->num_rows($result1) > 0) {
                    $control++;
                }
            }
        }

        if (count($Workflows) == $control) {
            return true;
        } else {
            return false;
        }
    }

    public function GetWorkflowsList()
    {
        return $this->workflows;
    }

    public function isTemplateDeleted($templateid)
    {
        $result = $this->db->pquery("SELECT * FROM vtiger_pdfmaker WHERE templateid = ? AND deleted = ?", array($templateid, "1"));

        if ($this->db->num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDetailViewLinks($templateid = '')
    {
        $linkTypes = array('DETAILVIEWTAB');
        $detail_url = 'index.php?module=PDFMaker&view=Detail&templateid=' . $templateid . '&record=t' . $templateid;

        $detailViewLinks = array(
            array(
                'linktype' => 'DETAILVIEWTAB',
                'linklabel' => vtranslate('LBL_PROPERTIES', 'PDFMaker'),
                'linkurl' => $detail_url,
                'linkicon' => ''
            )
        );
        if (vtlib_isModuleActive("ITS4YouStyles")) {
            $detailViewLinks[] = array(
                'linktype' => 'DETAILVIEWTAB',
                'linklabel' => vtranslate('LBL_STYLES_LIST', 'ITS4YouStyles'),
                'linkurl' => $detail_url . '&relatedModule=ITS4YouStyles&mode=showRelatedList',
                'linkicon' => ''
            );
        }
        foreach ($detailViewLinks as $detailViewLink) {
            $linkModelList['DETAILVIEWTAB'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
        }

        return $linkModelList;
    }
}