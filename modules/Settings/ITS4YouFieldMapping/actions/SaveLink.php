<?php
/*********************************************************************************
 * The content of this file is subject to the FieldMapping 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * *******************************************************************************/

class Settings_ITS4YouFieldMapping_SaveLink_Action extends Settings_Vtiger_Index_Action
{

    public function process(Vtiger_Request $request)
    {

        $recordId = $request->get('recordId');
        $data = $request->getAll();
        $data['mappingid'] = $recordId;
        $data['linkid'] = $data['linkId'];

        ITS4YouFieldMapping_Util_Helper::APISaveMappingLink($data);

        header("Location:index.php?module=ITS4YouFieldMapping&parent=Settings&view=DetailView&recordId=$recordId");
    }
}
