<?php /* Smarty version Smarty-3.1.19, created on 2021-01-21 16:26:06
         compiled from "F:\Project\MSCRM_Release\customerportal\layouts\default\templates\Quotes\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211339091360094fb68e4303-28082712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b031dbfe600494933646d1ffe16a5be5fd0b620' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\customerportal\\layouts\\default\\templates\\Quotes\\partials\\DetailContentBefore.tpl',
      1 => 1611035624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211339091360094fb68e4303-28082712',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60094fb698e739_29539738',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60094fb698e739_29539738')) {function content_60094fb698e739_29539738($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}</a>
      </span>
    </detail-navigator>
      {{record[header]}}
      <!--2021-01-19 Myo Min Kyaw Remove Accept Quote in Customer Portal MSCRM Start -->
    <!-- <button ng-if="quoteAccepted" translate="Accept Quote" class="btn btn-success close-ticket" ng-click="acceptQuote();"></button> -->
    <!-- 2021-01-19 Myo Min Kyaw Remove Accept Quote in Customer Portal MSCRM End -->
  </h3>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
  <script type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"></script>
  <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
