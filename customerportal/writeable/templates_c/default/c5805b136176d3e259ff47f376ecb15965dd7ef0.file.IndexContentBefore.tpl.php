<?php /* Smarty version Smarty-3.1.19, created on 2021-01-21 16:09:20
         compiled from "F:\Project\MSCRM_Release\customerportal\layouts\default\templates\HelpDesk\partials\IndexContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16721792725ffd346b8ac677-89223145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5805b136176d3e259ff47f376ecb15965dd7ef0' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\customerportal\\layouts\\default\\templates\\HelpDesk\\partials\\IndexContentBefore.tpl',
      1 => 1610605403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16721792725ffd346b8ac677-89223145',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ffd346b8c5f42_75776949',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ffd346b8c5f42_75776949')) {function content_5ffd346b8c5f42_75776949($_smarty_tpl) {?>


<div class="navigation-controls-row">
<div ng-if="checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}
</div>
</div>
    <div class="row portal-controls-row">
        <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8">
        <div ng-if="!checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}</div>
            <div class="btn-group btn-group-justified" ng-if="checkRecordsVisibility(filterPermissions)">
                <div class="btn-group">
                    <button type="button" translate="Mine"
                            ng-class="{'btn btn-default btn-primary':searchQ.onlymine, 'btn btn-default':!searchQ.onlymine}" ng-click="searchQ.onlymine=true">Mine</button>
                </div>
                <div class="btn-group">
                    <button type="button" translate="All"
                            ng-class="{'btn btn-default btn-primary':!searchQ.onlymine, 'btn btn-default':searchQ.onlymine}" ng-click="searchQ.onlymine=false">All</button>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="btn-group addbtnContainer" ng-if="isCreatable">
                <button type="button" translate= "New Ticket" class="btn btn-primary" ng-click="create()"></button>
            </div>
        </div>
        <!--<div class="hidden-md hidden-lg" style="height: 20px;"></div>-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="row" ng-if="activateStatus">
                <hp-selectric items="ticketStatus" ng-model="searchQ.ticketstatus"></hp-selectric>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <!--2021-01-12 Thet Phyo Wai Customer Portal Export With Permission MSCRM Start-->
          <!--<button ng-if="records" class="btn btn-primary" ng-csv="exportRecords(module)" csv-header="csvHeaders" add-bom="true" filename="{{filename}}.csv">{{'Export'|translate}}&nbsp;{{ptitle}}</button>-->
          <button ng-if="records" class="btn btn-primary" ng-csv="exportRecords(module)" csv-header="csvHeaders" add-bom="true" ng-hide="exportEnabled===false" filename="{{filename}}.csv">{{'Export'|translate}}&nbsp;{{ptitle}}</button>
          <!--2021-01-12 Thet Phyo Wai Customer Portal Export With Permission MSCRM End-->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pagination-holder">
            <div class="pull-right">
                <div class="text-center">
                    <pagination
                        total-items="totalPages" max-size="3" ng-model="currentPage" ng-change="pageChanged(currentPage)" boundary-links="true">
                    </pagination>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="table-header" ng-show="pageInitialized"><h4>Tickets {{searchQ.type}</h4></div> -->
      <input name="visited" type="hidden" ng-init="beforeRefresh='0'" ng-model="beforeRefresh">

<?php }} ?>
