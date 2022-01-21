<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_Update_Action extends Settings_Vtiger_Basic_Action
{

    public function process(Vtiger_Request $request)
    {
        $active = $request->get('Active');
        if (isset($active)) {
            $active = 1;
        }

        $data = [
            'name' => $request->get('Name')
            ,
            'module_from' => $request->get('sourceModule')
            ,
            'module_to' => $request->get('targetModule')
            ,
            'info' => $request->get('Description')
            ,
            'isactive' => $active
            ,
            'fieldmappingid' => $request->get('recordId')
        ];
        $recordId = ITS4YouFieldMapping_Util_Helper::APISaveMapping($data);

        header("Location:index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId=$recordId");
    }
}
    