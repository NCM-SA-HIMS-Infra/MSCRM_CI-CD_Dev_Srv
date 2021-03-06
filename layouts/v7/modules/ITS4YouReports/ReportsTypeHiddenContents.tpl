{*/*<!--
/*********************************************************************************
 * The content of this file is subject to the Reports 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*/*}

{assign var="reportTypeClass" value="col-lg-12" }
{assign var="reportTypeStyle" value="text-align:center;float:none;" }

{* Tabular Report *}
<div id="reporttype1" class="reporttypeInfo visible">
    <div class="{$reportTypeClass}" style="{$reportTypeStyle}">
        {vtranslate('LBL_REPORTTYPE1_INFO', $MODULE)}
    </div>
    <div id="reporttype1Image" class="{$reportTypeClass}" style="{$reportTypeStyle}">
      <br>
      <img src="modules/{$MODULE}/chart_types/rtimg1.png" id="rtimg1" style=""/>
    </div>
</div>

{* Summaries Report *}
<div id="reporttype2" class="reporttypeInfo hide">
    <div class="{$reportTypeClass}" style="{$reportTypeStyle}">
        {vtranslate('LBL_REPORTTYPE2_INFO', $MODULE)}
    </div>
    <div id="reporttype2Image" style="{$reportTypeStyle}">
      <br>
      <img src="modules/{$MODULE}/chart_types/rtimg2.png" id="rtimg2" style=""/>
    </div>
</div>

{* Summaries Report with Details *}
<div id="reporttype3" class="reporttypeInfo hide">
    <div class="{$reportTypeClass}" style="{$reportTypeStyle}">
        {vtranslate('LBL_REPORTTYPE3_INFO', $MODULE)}
    </div>
    <div id="reporttype3Image" style="{$reportTypeStyle}">
      <br>
      <img src="modules/{$MODULE}/chart_types/rtimg3.png" id="rtimg3" style=""/>
    </div>
</div>

{* Matrix Report *}
<div id="reporttype4" class="reporttypeInfo hide">
    <div class="{$reportTypeClass}" style="{$reportTypeStyle}">
        {vtranslate('LBL_REPORTTYPE4_INFO', $MODULE)}
    </div>
    <div id="reporttype4Image" style="{$reportTypeStyle}">
      <br>
      <img src="modules/{$MODULE}/chart_types/rtimg4.png" id="rtimg4" style=""/>
    </div>
</div>

{if $IS_ADMIN_USER == "1"}
    {* Custom Report *}
    <div id="reporttype5" class="reporttypeInfo hide">
        <div class="{$reportTypeClass}" style="{$reportTypeStyle}">
            {vtranslate('LBL_REPORTTYPE5_INFO', $MODULE)}
        </div>
    </div>
{/if}
