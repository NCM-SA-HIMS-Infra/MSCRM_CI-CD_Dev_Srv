<?php /* Smarty version Smarty-3.1.19, created on 2021-01-21 16:13:27
         compiled from "F:\Project\MSCRM_Release\customerportal\layouts\default\templates\Portal\partials\UpdatesContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16546141285ffd79dbcff258-26833551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cf72af5b0fd1250f41843f8dde48a4d937fefaf' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\customerportal\\layouts\\default\\templates\\Portal\\partials\\UpdatesContent.tpl',
      1 => 1610349099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16546141285ffd79dbcff258-26833551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ffd79dbd0e768_56793148',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ffd79dbd0e768_56793148')) {function content_5ffd79dbd0e768_56793148($_smarty_tpl) {?>


<div class="row">
	<div class="container-fluid">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="container-fluid updatesContainer">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="container-fluid">
							<div class="row" ng-show="updates === ''">
								<span class="value">No Updates Found.</span>
							</div>
							<div class="row update-row" ng-repeat="update in updates" ng-if="isLanguage(update)">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-repeat="(fieldname,value) in update" ng-if="isLanguage(update)">
									<p ng-if="value.updateStatus=='updated'">
										<span class="update-bullet">&nbsp;</span>
										<strong> {{fieldname}} </strong>
										<span class="value">
											<span ng-if="value.previous!==''">&nbsp;{{'changed from'|translate}}&nbsp;
												<strong class="break" style="white-space:pre-line;">{{value.previous}}&nbsp;</strong>
												<span ng-if="value.current!==''">&nbsp;{{'to'|translate}}&nbsp;</span>
											</span>
										</span>
										<span class="value">
											<span ng-if="value.previous =='' && value.current!==''">&nbsp;{{'changed to'|translate}}&nbsp;</span>
											<strong class="break" style="white-space:pre-line;">{{value.current}}</strong>
										</span>
										<span class="value">
											<span ng-if="value.previous =='' && value.current==''">&nbsp;{{'deleted'|translate}}&nbsp;</span>
										</span>
										<small class="text-muted update-time">{{update.modifiedtime}}</small>
									</p>
									<p ng-if="value.updateStatus=='created'">
										<span class="update-bullet">&nbsp;</span>
										<span>
											<!--2021-01-11 Thet Phyo Wai Remove Created User Name MSCRM Start-->
											<!--<strong>{{update.created.user}}</strong>&nbsp;{{'created'|translate}}</span>-->
											{{'Created'|translate}}</span>
											<!--2021-01-11 Thet Phyo Wai Remove Created User Name MSCRM End-->
										<small class="text-muted update-time">{{update.modifiedtime}}</small>
									</p>
								</div>
							</div>
							<a ng-if="!updatesLoaded && !noUpdates  && created" ng-click="loadHistoryPage(historyPageNo)">{{'more'|translate}}...</a>
							<p ng-if="updatesLoaded && !noUpdates" class="text-muted">{{'No more updates'|translate}}</p>
							<p ng-if="!updatesLoaded && noUpdates" class="text-muted">{{'No updates'|translate}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }} ?>
