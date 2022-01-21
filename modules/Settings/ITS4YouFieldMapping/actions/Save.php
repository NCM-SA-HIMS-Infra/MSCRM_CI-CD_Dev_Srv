<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

require_once('vtlib/Vtiger/Link.php');

class Settings_ITS4YouFieldMapping_Save_Action extends Settings_Vtiger_Basic_Action
{

    public function process(Vtiger_Request $request)
    {
        $data = [
            'name' => $request->get('Name'),
            'module_from' => $request->get('sourceModule'),
            'module_to' => $request->get('targetModule'),
            'info' => $request->get('Description'),
            'isactive' => $request->get('Active'),
            'fieldmappingid' => $request->get('recordId')
        ];
        $recordId = ITS4YouFieldMapping_Util_Helper::APISaveMapping($data);

        //exit;
        header("Location:index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId=$recordId");
    }

}

