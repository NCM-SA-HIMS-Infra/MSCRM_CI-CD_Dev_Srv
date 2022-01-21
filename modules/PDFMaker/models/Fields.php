<?php
/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_Fields_Model extends Vtiger_Base_Model
{

    public $cu_language = "";
    public $ModuleFields = array();
    public $All_Related_Modules = array();

    public function getAllModuleFields($ModuleIDS)
    {
        foreach ($ModuleIDS as $module => $module_id) {
            $this->setModuleFields($module, $module_id);
        }
    }

    public function getRelatedModules($module)
    {

        return $this->All_Related_Modules[$module];
    }

    public function getSelectModuleFields($module, $forfieldname = "")
    {

        $SelectModuleFields = array();

        if (empty($module)) {
            return $SelectModuleFields;
        }

        $adb = PearDatabase::getInstance();

        $Blocks = $this->getModuleFields($module);

        $cu_model = Users_Record_Model::getCurrentUserModel();
        $this->cu_language = $cu_model->get('language');
        $app_strings_big = Vtiger_Language_Handler::getModuleStringsFromFile($this->cu_language);
        $app_strings = $app_strings_big['languageStrings'];


        $current_mod_strings = $this->getModuleLanguageArray($module);
        $moduleModel = Vtiger_Module_Model::getInstance($module);
        $b = 0;

        if ($forfieldname == "") {
            $forfieldname = $module;
        }
        $forfieldname = strtoupper($forfieldname);

        if ($module == 'Calendar') {
            $b++;
            $SelectModuleFields[vtranslate('Calendar')][$forfieldname . "_CRMID"] = "Record ID";

            $EventModel = Vtiger_Module_Model::getInstance('Events');
        }

        foreach ($Blocks as $block_label => $block_fields) {
            $b++;

            $Options = array();
            $Existing_ModuleFields = array();

            if ($block_label != "TEMP_MODCOMMENTS_BLOCK") {

                $optgroup_value = vtranslate($block_label, $module);

                if ($optgroup_value == $block_label) {
                    $optgroup_value = vtranslate($block_label, 'PDFMaker');
                }

            } else {
                $optgroup_value = vtranslate("LBL_MODCOMMENTS_INFORMATION", 'PDFMaker');
            }

            if (count($block_fields) > 0) {
                $sql1 = "SELECT * FROM vtiger_field WHERE fieldid IN (" . generateQuestionMarks($block_fields) . ") AND presence != '1'";
                $result1 = $adb->pquery($sql1, $block_fields);

                while ($row1 = $adb->fetchByAssoc($result1)) {
                    $fieldname = $row1['fieldname'];
                    $fieldlabel = $row1['fieldlabel'];

                    $fieldModel = Vtiger_Field_Model::getInstance($fieldname, $moduleModel);

                    if (!$fieldModel || !$fieldModel->getPermissions('readonly')) {
                        if ($module == 'Calendar') {
                            $eventFieldModel = Vtiger_Field_Model::getInstance($fieldname, $EventModel);
                            if (!$eventFieldModel || !$eventFieldModel->getPermissions('readonly')) {
                                continue;
                            }
                        } else {
                            continue;
                        }
                    }
                    if ($module == "ITS4YouMultiCompany" && $forfieldname == "COMPANY") {
                        if ($fieldname == "companyname") {
                            $fieldname = "name";
                        } elseif ($fieldname == "street") {
                            $fieldname = "address";
                        } elseif ($fieldname == "code") {
                            $fieldname = "zip";
                        }
                    }
                    $option_key = strtoupper($forfieldname . "_" . $fieldname);

                    if (isset($current_mod_strings[$fieldlabel]) and $current_mod_strings[$fieldlabel] != "") {
                        $option_value = $current_mod_strings[$fieldlabel];
                    } elseif (isset($app_strings[$fieldlabel]) and $app_strings[$fieldlabel] != "") {
                        $option_value = $app_strings[$fieldlabel];
                    } else {
                        $option_value = $fieldlabel;
                    }

                    $option_value = nl2br($option_value);

                    if ($module == 'Calendar') {
                        if ($option_key == 'CALENDAR_ACTIVITYTYPE' || $option_key == 'CALENDAR_DUE_DATE') {
                            $SelectModuleFields[vtranslate('Calendar')][$option_key] = $option_value;
                            continue;
                        } elseif (!isset($Existing_ModuleFields[$option_key])) {
                            $Existing_ModuleFields[$option_key] = $optgroup_value;
                        } else {
                            $SelectModuleFields[vtranslate('Calendar')][$option_key] = $option_value;
                            $Unset_Module_Fields[] = '"' . $option_value . '","' . $option_key . '"';
                            unset($SelectModuleFields['Calendar'][$Existing_ModuleFields[$option_key]][$option_key]);
                            continue;
                        }
                    }
                    $Options[] = '"' . $option_value . '","' . $option_key . '"';
                    $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
                }
            }

            //variable RECORD ID added
            if ($b == 1) {
                $option_value = "Record ID";
                $option_key = strtoupper($module . "_CRMID");
                $Options[] = '"' . $option_value . '","' . $option_key . '"';
                $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
                $option_value = vtranslate('Created Time') . ' (' . vtranslate('Due Date & Time') . ')';
                $option_key = strtoupper($module . "_CREATEDTIME_DATETIME");
                $Options[] = '"' . $option_value . '","' . $option_key . '"';
                $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
                $option_value = vtranslate('Modified Time') . ' (' . vtranslate('Due Date & Time') . ')';
                $option_key = strtoupper($module . "_MODIFIEDTIME_DATETIME");
                $Options[] = '"' . $option_value . '","' . $option_key . '"';
                $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
            }
            //end

            if ($block_label == "LBL_TERMS_INFORMATION" && isset($tacModules[$module])) {
                $option_value = vtranslate("LBL_TAC4YOU", 'PDFMaker');
                $option_key = strtoupper($module . "_TAC4YOU");
                $Options[] = '"' . $option_value . '","' . $option_key . '"';
                $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
            }

            if ($block_label == "LBL_DESCRIPTION_INFORMATION" && isset($desc4youModules[$module])) {
                $option_value = vtranslate("LBL_DESC4YOU", 'PDFMaker');
                $option_key = strtoupper($module . "_DESC4YOU");
                $Options[] = '"' . $option_value . '","' . $option_key . '"';
                $SelectModuleFields[$optgroup_value][$option_key] = $option_value;
            }

            $OptionsRelMod = array();
            if (($block_label == "LBL_DETAILS_BLOCK" || $block_label == "LBL_ITEM_DETAILS") && ($module == "Quotes" || $module == "Invoice" || $module == "SalesOrder" || $module == "PurchaseOrder" || $module == "Issuecards" || $module == "Receiptcards" || $module == "Creditnote" || $module == "StornoInvoice" || is_subclass_of($module . '_Module_Model', 'Inventory_Module_Model'))) {
                //$Set_More_Fields = $More_Fields;

                $Set_More_Fields = $this->getMoreFields($module, $forfieldname);


                foreach ($Set_More_Fields as $variable => $variable_name) {
                    $variable_key = strtoupper($variable);
                    $Options[] = '"' . $variable_name . '","' . $variable_key . '"';
                    $SelectModuleFields[$optgroup_value][$variable_key] = $variable_name;
                    if ($variable_key != "VATBLOCK" && $variable_key != "CHARGESBLOCK") {
                        $OptionsRelMod[] = '"' . $variable_name . '","' . strtoupper($module) . '_' . $variable_key . '"';
                    }
                }
            }
        }

        return $SelectModuleFields;
    }

    public function getModuleFields($module)
    {

        if (!isset($this->ModuleFields[$module])) {
            $module_id = getTabid($module);
            $this->setModuleFields($module, $module_id);
        }

        return $this->ModuleFields[$module];
    }

    public function setModuleFields($module, $module_id, $skip_related = false)
    {

        if (isset($this->ModuleFields[$module])) {
            return false;
        }

        $adb = PearDatabase::getInstance();
        $excludedModules = array('Quotes', 'Invoice', 'SalesOrder', 'PurchaseOrder', 'Issuecards', 'Creditnote', 'Receiptcards', 'StornoInvoice');

        $sql1 = 'SELECT blockid, blocklabel FROM vtiger_blocks ';
        if ($module == 'Calendar') {
            $sql1 .= 'WHERE tabid IN (9,16)';
        } elseif (in_array($module, $excludedModules) || is_subclass_of($module . '_Module_Model', 'Inventory_Module_Model')) {
            $sql1 .= "WHERE tabid=" . $module_id . " AND blocklabel != 'LBL_DETAILS_BLOCK' AND blocklabel != 'LBL_ITEM_DETAILS'";
        } elseif ($module == "Users") {
            $sql1 .= "INNER JOIN vtiger_tab ON vtiger_tab.tabid = vtiger_blocks.tabid WHERE vtiger_tab.name = 'Users' AND (blocklabel = 'LBL_USERLOGIN_ROLE' OR blocklabel = 'LBL_ADDRESS_INFORMATION' )";
        } else {
            $sql1 .= "WHERE tabid=" . $module_id;
        }

        $sql1 .= ' ORDER BY sequence ASC';

        $res1 = $adb->pquery($sql1, array());
        $block_info_arr = array();
        while ($row = $adb->fetch_array($res1)) {
            if ($row['blockid'] == '41' && $row['blocklabel'] == '') {
                $row['blocklabel'] = 'LBL_EVENT_INFORMATION';
            }
            $sql2 = "SELECT fieldid, uitype, columnname, fieldlabel FROM vtiger_field WHERE block= ? AND (displaytype != 3 OR uitype = 55) AND displaytype != 4 AND fieldlabel != 'Add Comment' AND presence != '1' ORDER BY sequence ASC";
            $res2 = $adb->pquery($sql2, array($row['blockid']));
            $num_rows2 = $adb->num_rows($res2);

            if ($num_rows2 > 0) {
                $field_id_array = array();

                while ($row2 = $adb->fetch_array($res2)) {
                    $field_id_array[] = $row2['fieldid'];

                    if (!$skip_related) {
                        $field = Vtiger_Field_Model::getInstance($row2['fieldid']);

                        if ($field) {
                            $references = $field->getReferenceList();

                            if (is_array($references) && !empty($references)) {
                                foreach ($references as $referenceModule) {
                                    if (!empty($referenceModule)) {
                                        if (vtlib_isModuleActive($referenceModule)) {
                                            $this->All_Related_Modules[$module][getTabid($referenceModule)] = array($field->get("column"), vtranslate($field->get("label"), $module), vtranslate($referenceModule, $referenceModule), $referenceModule);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                // ITS4YOU MaJu
                //$block_info_arr[$row['blocklabel']] = $field_id_array;
                if (!empty($block_info_arr[$row['blocklabel']])) {
                    foreach ($field_id_array as $field_id_array_value) {
                        $block_info_arr[$row['blocklabel']][] = $field_id_array_value;
                    }
                } else {
                    $block_info_arr[$row['blocklabel']] = $field_id_array;
                }
                // ITS4YOU-END
            }
        }

        if (in_array($module, $excludedModules) || is_subclass_of($module . '_Module_Model', 'Inventory_Module_Model')) {
            $block_info_arr["LBL_DETAILS_BLOCK"] = array();
        }

        $this->ModuleFields[$module] = $block_info_arr;
    }

    public function getModuleLanguageArray($module)
    {
        if (file_exists("languages/" . $this->cu_language . "/" . $module . ".php")) {
            $current_mod_strings_lang = $this->cu_language;
        } else {
            $current_mod_strings_lang = "en_us";
        }

        $current_mod_strings_big = Vtiger_Language_Handler::getModuleStringsFromFile($current_mod_strings_lang, $module);
        return $current_mod_strings_big['languageStrings'];
    }

    public function getMoreFields($module, $forfieldname = "")
    {

        $Set_More_Fields = array(/* "SUBTOTAL"=>vtranslate("LBL_VARIABLE_SUM",'PDFMaker'), */
            "CURRENCYNAME" => vtranslate("LBL_CURRENCY_NAME", 'PDFMaker'),
            "CURRENCYSYMBOL" => vtranslate("LBL_CURRENCY_SYMBOL", 'PDFMaker'),
            "CURRENCYCODE" => vtranslate("LBL_CURRENCY_CODE", 'PDFMaker'),
            "TOTALWITHOUTVAT" => vtranslate("LBL_VARIABLE_SUMWITHOUTVAT", 'PDFMaker'),
            "TOTALDISCOUNT" => vtranslate("LBL_VARIABLE_TOTALDISCOUNT", 'PDFMaker'),
            "TOTALDISCOUNTPERCENT" => vtranslate("LBL_VARIABLE_TOTALDISCOUNT_PERCENT", 'PDFMaker'),
            "TOTALAFTERDISCOUNT" => vtranslate("LBL_VARIABLE_TOTALAFTERDISCOUNT", 'PDFMaker'),
            "VAT" => vtranslate("LBL_VARIABLE_VAT", 'PDFMaker'),
            "VATPERCENT" => vtranslate("LBL_VARIABLE_VAT_PERCENT", 'PDFMaker'),
            "VATBLOCK" => vtranslate("LBL_VARIABLE_VAT_BLOCK", 'PDFMaker'),
            "CHARGESBLOCK" => vtranslate("LBL_VARIABLE_CHARGES_BLOCK", 'PDFMaker'),
            "DEDUCTEDTAXESBLOCK" => vtranslate("LBL_DEDUCTED_TAXES_BLOCK", 'PDFMaker'),
            "DEDUCTEDTAXESTOTAL" => vtranslate("LBL_DEDUCTED_TAXES_TOTAL", 'PDFMaker'),
            "TOTALWITHVAT" => vtranslate("LBL_VARIABLE_SUMWITHVAT", 'PDFMaker'),
            "SHTAXTOTAL" => vtranslate("LBL_SHTAXTOTAL", 'PDFMaker'),
            "SHTAXAMOUNT" => vtranslate("LBL_SHTAXAMOUNT", 'PDFMaker'),
            "ADJUSTMENT" => vtranslate("LBL_ADJUSTMENT", 'PDFMaker'),
            "TOTAL" => vtranslate("LBL_VARIABLE_TOTALSUM", 'PDFMaker')
        );

        if (!empty($forfieldname)) {
            if ($module == "Invoice") {
                $Set_More_Fields[$forfieldname . "_RECEIVED"] = vtranslate("Received", $module);
            }
            if ($module == "Invoice" || $module == "PurchaseOrder") {
                $Set_More_Fields[$forfieldname . "_BALANCE"] = vtranslate("Balance", $module);
            }
            if ('PurchaseOrder' == $module) {
                $Set_More_Fields[$forfieldname . '_PAID'] = vtranslate('Paid', $module);
            }
        }

        return $Set_More_Fields;
    }

    public function getFilenameFields()
    {
        $filenameFields = array(
            "#TEMPLATE_NAME#" => vtranslate("LBL_PDF_NAME", 'PDFMaker'),
            "#DD-MM-YYYY#" => vtranslate("LBL_CURDATE_DD-MM-YYYY", 'PDFMaker'),
            "#MM-DD-YYYY#" => vtranslate("LBL_CURDATE_MM-DD-YYYY", 'PDFMaker'),
            "#YYYY-MM-DD#" => vtranslate("LBL_CURDATE_YYYY-MM-DD", 'PDFMaker')
        );

        return $filenameFields;
    }
}