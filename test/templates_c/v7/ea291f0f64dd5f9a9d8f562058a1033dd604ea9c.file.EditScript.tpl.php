<?php /* Smarty version Smarty-3.1.7, created on 2021-06-24 10:11:31
         compiled from "F:\Project\MSCRM_Release\includes\runtime/../../layouts/v7\modules\ITS4YouReports\EditScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4734578325f9fc1a1d909e0-12508179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea291f0f64dd5f9a9d8f562058a1033dd604ea9c' => 
    array (
      0 => 'F:\\Project\\MSCRM_Release\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouReports\\EditScript.tpl',
      1 => 1624506040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4734578325f9fc1a1d909e0-12508179',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9fc1a1dadf7',
  'variables' => 
  array (
    'RECORD_ID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9fc1a1dadf7')) {function content_5f9fc1a1dadf7($_smarty_tpl) {?>


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