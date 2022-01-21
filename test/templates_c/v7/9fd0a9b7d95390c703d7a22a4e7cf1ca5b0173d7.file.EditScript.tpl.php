<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 15:14:02
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\ITS4YouReports\EditScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17577823695f998abab8e7f8-53972643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fd0a9b7d95390c703d7a22a4e7cf1ca5b0173d7' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\EditScript.tpl',
      1 => 1602051902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17577823695f998abab8e7f8-53972643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f998ababae6e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f998ababae6e')) {function content_5f998ababae6e($_smarty_tpl) {?>


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