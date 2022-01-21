<?php /* Smarty version Smarty-3.1.19, created on 2020-12-02 15:28:59
         compiled from "C:\xampp\htdocs\maintcrm20i15\customerportal\layouts\default\templates\Portal\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53875fc7342b58c602-24261628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5cd775ea4c60d576f17954d6762e5e7bbf7650c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\maintcrm20i15\\customerportal\\layouts\\default\\templates\\Portal\\partials\\DetailContentBefore.tpl',
      1 => 1520231416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53875fc7342b58c602-24261628',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5fc7342b60cd00_19746664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc7342b60cd00_19746664')) {function content_5fc7342b60cd00_19746664($_smarty_tpl) {?>


    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7 detail-header detail-header-row">
      <h3 class="fsmall">
        <detail-navigator>
          <span>
            <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
            </a>
            </span>
        </detail-navigator>{{record[header]}}
        <button ng-if="isEditable" class="btn btn-primary attach-files-ticket" ng-click="editRecord(module,id)">{{'Edit'|translate}} {{ptitle}}</button>
      </h3>
    </div>
</div>

<hr class="hrHeader">
<div class="container-fluid">

<?php }} ?>
