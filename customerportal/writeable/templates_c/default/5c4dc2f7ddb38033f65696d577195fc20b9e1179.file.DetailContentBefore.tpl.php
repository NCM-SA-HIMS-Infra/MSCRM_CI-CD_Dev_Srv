<?php /* Smarty version Smarty-3.1.19, created on 2021-01-12 17:17:02
         compiled from "F:\Project\MSCRM_Release\customerportal\layouts\default\templates\Portal\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1866617315ffd7e26189f30-29872314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c4dc2f7ddb38033f65696d577195fc20b9e1179' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\customerportal\\layouts\\default\\templates\\Portal\\partials\\DetailContentBefore.tpl',
      1 => 1520231416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1866617315ffd7e26189f30-29872314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ffd7e261c9fc9_67310847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ffd7e261c9fc9_67310847')) {function content_5ffd7e261c9fc9_67310847($_smarty_tpl) {?>


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
