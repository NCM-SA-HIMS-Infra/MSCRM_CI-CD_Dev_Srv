<?php /* Smarty version Smarty-3.1.7, created on 2020-10-07 08:45:18
         compiled from "/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/EditScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16975735695f7d801ec2bfc3-52100020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9774ed1e939a607021c0234c94320f8b7a4ee488' => 
    array (
      0 => '/var/www/html/maintcrm20i28/includes/runtime/../../layouts/v7/modules/ITS4YouReports/EditScript.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16975735695f7d801ec2bfc3-52100020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f7d801ec2f63',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7d801ec2f63')) {function content_5f7d801ec2f63($_smarty_tpl) {?>


<input type="hidden" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" />
<script>
/*Sharing functions*/
function sharing_changed(){
    var selectedValue = jQuery('#sharing').val();
    if(selectedValue !== 'share')
    {
        jQuery('#sharing_share_div').hide();
    }
    else
    {
        jQuery('#sharing_share_div').show();
    }
}

jQuery( document ).ready(function(){
    sharing_changed();
});
/*Sharing Ends*/
</script>
<?php }} ?>