<?php /* Smarty version Smarty-3.1.19, created on 2020-12-02 15:28:59
         compiled from "C:\xampp\htdocs\maintcrm20i15\customerportal\layouts\default\templates\Products\partials\DetailRelatedContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327445fc7342b759896-15254440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b7479686b6b77a2f2f5029c018383cd4d6dcac4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\maintcrm20i15\\customerportal\\layouts\\default\\templates\\Products\\partials\\DetailRelatedContent.tpl',
      1 => 1520231416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327445fc7342b759896-15254440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5fc7342b76a944_52031571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc7342b76a944_52031571')) {function content_5fc7342b76a944_52031571($_smarty_tpl) {?>

<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 rightEditContent">
    
        <ul class="nav nav-tabs" ng-init="tab = 1">
            <li ng-class="{active:tab===1}">
                <a href ng-click="tab = 1"><strong>Updates </strong></a>
            </li>
        </ul>
        
    <br>
    <div class="tab-content">
        <div  ng-show="tab === 1"> 
            <?php echo $_smarty_tpl->getSubTemplate ("Portal/partials/UpdatesContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
</div><?php }} ?>
