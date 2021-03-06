{*/*<!--
/*********************************************************************************
 * The content of this file is subject to the Reports 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*/*}

{include file="Header.tpl"|vtemplate_path:$MODULE}
{include file="BasicHeader.tpl"|vtemplate_path:$MODULE}
<div class="bodyContents">
	<div class="mainContainer row-fluid">
		{assign var=LEFTPANELHIDE value=$CURRENT_USER_MODEL->get('leftpanelhide')}
		<div class="span2 row-fluid {if $LEFTPANELHIDE eq '1'} hide {/if} no-print" id="leftPanel" style="min-height:550px;">
			{include file="ListViewSidebar.tpl"|vtemplate_path:$MODULE}
		</div>
		<div class="contentsDiv {if $LEFTPANELHIDE neq '1'} span10 {/if}marginLeftZero" id="rightPanel" style="min-height:550px;">
            <div id="toggleButton" class="toggleButton no-print" title="{vtranslate('LBL_LEFT_PANEL_SHOW_HIDE', 'Vtiger')}">
				<i id="tButtonImage" class="{if $LEFTPANELHIDE neq '1'}icon-chevron-left{else}icon-chevron-right{/if}"></i>
			</div>
