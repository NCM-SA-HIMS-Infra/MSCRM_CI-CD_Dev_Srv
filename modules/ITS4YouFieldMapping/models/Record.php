<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class ITS4YouFieldMapping_Record_Model extends Vtiger_Record_Model
{

    /**
     * @var string sourceModule stores the name of source Module of given Mapping
     */
    public $sourceModule;
    /**
     * @var string destinationModule stores the name of destination Module of given Mapping
     */
    public $destinationModule;

    /**
     * function to get Field Mapping ID by Module From and Module To
     *
     * @param int $moduleFrom
     * @param int $moduleTo
     *
     * @return int $fieldMappingId
     * @throws Exception
     */
    public static function getFieldMappingIdByModules($moduleFrom, $moduleTo)
    {

        try {
            if (is_numeric($moduleFrom)) {
                $moduleFrom = vtlib_getModuleNameById($moduleFrom);
            }
            if (is_numeric($moduleTo)) {
                $moduleTo = vtlib_getModuleNameById($moduleTo);
            }
            if (vtlib_isModuleActive($moduleFrom) && vtlib_isModuleActive($moduleTo)) {
                $db = PearDatabase::getInstance();

                $res = $db->pquery('SELECT fieldmappingid 
                                        FROM its4you_fieldmapping 
                                        WHERE isactive=? 
                                          AND module_from = (SELECT tabid 
                                                              FROM vtiger_tab 
                                                              WHERE name=?) 
                                          AND module_to = (SELECT tabid 
                                                              FROM vtiger_tab 
                                                              WHERE name=?)',
                    [1, $moduleFrom, $moduleTo]);
                if ($res) {
                    $fieldMappingId = $db->query_result($res, 0, 'fieldmappingid');
                } else {
                    $errorMsg = 'Following module(s) has no fieldMapping: ' . implode(', ', [$moduleFrom, $moduleTo]);
                }

            } else {
                if (vtlib_isModuleActive($moduleFrom)) {
                    $inActiveModules[] = $moduleFrom;
                }
                if (vtlib_isModuleActive($moduleTo)) {
                    $inActiveModules[] = $moduleTo;
                }
                if (!is_array($inActiveModules)) {
                    $inActiveModules = [$moduleFrom, $moduleTo];
                }
                $errorMsg = 'Following module(s) are not active: ' . implode(', ', $inActiveModules);
            }
            if (isset($errorMsg)) {
                throw new Error($errorMsg);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return (int)$fieldMappingId;
    }

    /**
     * This function takes the array of related products for an entity and removes the used ones
     * For example when converting from Quote to SalesOrder, it takes the related products of the Quote, takes all SalesOrders related to this Quote,
     * and removes products used in SalesOrders from the related products of the Quote.
     *
     * @param int $mappingId id of Mapping
     * @param int $crmId id of source entity
     * @param array $relatedProducts related Products
     */
    public function removeUsedProducts($mappingId, $crmId, &$relatedProducts)
    {
        $mappingModel = new Settings_ITS4YouFieldMapping_Module_Model();
        $MappingData = $mappingModel->getFieldMappingInfo($mappingId);
        $this->sourceModule = getTabModuleName($MappingData['module_from']);
        $this->destinationModule = getTabModuleName($MappingData['module_to']);
        $PrevUsedProductQty = [];
        foreach ($relatedProducts as $prod_key => $Prod_Data) {
            if ($Prod_Data['prod_text' . $prod_key] == '') {
                $used_count = $this->getUsedProductsCount($Prod_Data['lineItemId' . $prod_key], $crmId, $Prod_Data['hdnProductId' . $prod_key], false);

                if (0 != $used_count) {
                    if ('ITS4YouWorkOrder' != $this->sourceModule && isset($PrevUsedProductQty[$Prod_Data['lineItemId' . $prod_key]])) {
                        // in WO lineItemId = workOrderId
                        $used_count -= $PrevUsedProductQty[$Prod_Data['lineItemId' . $prod_key]];
                    }

                    if ($used_count >= $Prod_Data['qty' . $prod_key]) {
                        $PrevUsedProductQty[$Prod_Data['lineItemId' . $prod_key]] = $Prod_Data['qty' . $prod_key];
                        unset($relatedProducts[$prod_key]);
                    } else {
                        $relatedProducts[$prod_key]['qty' . $prod_key] = $Prod_Data['qty' . $prod_key] - $used_count;
                        $PrevUsedProductQty[$Prod_Data['lineItemId' . $prod_key]] = $Prod_Data['qty' . $prod_key] - $used_count;
                    }
                }
            }
        }
    }

    /**
     * For given product id and entity id, this function checks whether the product is used in any related entity
     * For example entity is Quote and our mapping is defined from Quote to SalesOrder, this function takes all SalesOrders related to the Quote
     * and checks whether the product is used. It returns the sum of used products.
     *
     * @param int $productId id of Product
     * @param int $crmId entity id
     * @param bool $considerPositions whether to consider positions or not
     *
     * @return int sum of used products
     * @throws Exception
     */
    public function getUsedProductsCount($lineItemId, $crmId = 0, $productId = 0, $considerPositions = false)
    {
        $return = 0;
        $db = PearDatabase::getInstance();
        $rel_entity_res = $db->pquery("SELECT * FROM vtiger_crmentityrel WHERE (crmid=? AND relmodule=?) OR (relcrmid=? AND module=?)", [$crmId, $this->destinationModule, $crmId, $this->destinationModule]);
        $RelEntity = [];
        while ($rel_entity_row = $db->fetchByAssoc($rel_entity_res)) {
            if ($crmId == $rel_entity_row['crmid']) {
                $RelEntity[] = $rel_entity_row['relcrmid'];
            } else {
                if ($crmId != $rel_entity_row['crmid']) {
                    $RelEntity[] = $rel_entity_row['crmid'];
                }
            }
        }

        $RelEntity = array_unique($RelEntity);

        if (!empty($RelEntity)) {
            $moduleModel = Vtiger_Module::getInstance($this->destinationModule);
            $basetable = $moduleModel->basetable;
            $basetableid = $moduleModel->basetableid;
            $sql = "SELECT SUM(quantity) AS qty FROM vtiger_inventoryproductrel 
                                  INNER JOIN vtiger_crmentity ON crmid=id AND vtiger_crmentity.deleted=0 
                                  INNER JOIN " . $basetable . " ON vtiger_crmentity.crmid=" . $basetable . "." . $basetableid . "
                                WHERE parentlineitem_id=? AND id IN (" . implode(',', $RelEntity) . ") ";
            $status_res = $db->pquery("SELECT columnname FROM vtiger_field WHERE tablename=? AND uitype=15 AND columnname LIKE '%status'", [$basetable]);
            $params = [$lineItemId];

            if (1 == $db->num_rows($status_res)) {
                $status = $db->query_result($status_res, 0, 'columnname');
                $sql .= ' AND ' . $status . ' NOT IN("Cancelled", "Canceled", "Cancel")';
            }

            if ('ITS4YouWorkOrder' == $this->sourceModule) {
                // in WO productId and parentlineitem_id is unique
                $sql .= ' AND productid=?';
                $params[] = $productId;
            }

            $res = $db->pquery($sql, $params);
            if (0 < $db->num_rows($res)) {
                $row = $db->fetchByAssoc($res);
                $return += $row['qty'];
            }
        }
        foreach ($RelEntity AS $id) {
            $rel_entity_res = $db->pquery("SELECT * FROM vtiger_crmentityrel WHERE (relcrmid=? AND module=? AND crmid!=?)", [$id, $this->sourceModule, $crmId]);
            $RelEntity = [];
            while ($rel_entity_row = $db->fetchByAssoc($rel_entity_res)) {
                $RelEntity[] = $rel_entity_row['crmid'];
            }
        }
        if (!empty($RelEntity)) {
            $res = $db->pquery("SELECT SUM(quantity) AS qty FROM vtiger_inventoryproductrel INNER JOIN vtiger_crmentity ON crmid=id AND vtiger_crmentity.deleted=0 WHERE parentlineitem_id=? AND id IN (" . implode(',', $RelEntity) . ")", [$lineItemId]);
            if ($db->num_rows($res) > 0) {
                $row = $db->fetchByAssoc($res);
                $return -= $row['qty'];
            }
        }
        return $return;
    }
}
