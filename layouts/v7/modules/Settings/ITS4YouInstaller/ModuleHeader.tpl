{* *********************************************************************************
 * The content of this file is subject to the ITS4YouInstaller license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ******************************************************************************* *}
{strip}
    <div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop">
		<div class="module-action-content clearfix">
			<div class="col-lg-4 col-md-4">
				<h4 title="{strtoupper(vtranslate($MODULE, $MODULE))}" class="module-title pull-left text-uppercase"> {strtoupper(vtranslate($MODULE, $MODULE))} </h4>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li>
							<button class="btn btn-{$REQUIREMENTS->getButtonType()}" type="button" onclick="window.open('{$MODULE_MODEL->getRequirementsUrl()}', '_blank');">
								{vtranslate('LBL_SYSTEM_REQUIREMENTS', $MODULE)}
							</button>
							&nbsp;
							{if !($PASSWORD_STATUS)}
								<button class="btn btn-default module-buttons" type="button" id="logintoInstaller">
									<div class="fa fa-sign-in" aria-hidden="true"></div>&nbsp;
									{vtranslate('LBL_LOGIN', $QUALIFIED_MODULE)}
								</button>
							{else}
								<button class="btn btn-default module-buttons" type="button" style="text-transform:none">
									{$USER_NAME}
								</button>
								&nbsp;
								<button class="btn btn-danger" type="button" id="logoutInstaller">
								<span class="fa fa-power-off"></span>&nbsp;
                                {vtranslate('LBL_LOGOUT', $QUALIFIED_MODULE)}
								</button>
							{/if}
						</li>
					</ul>
				</div>
			</div>
		</div>
    </div>
{/strip}