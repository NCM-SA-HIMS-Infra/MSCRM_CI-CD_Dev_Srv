<?php /* Smarty version Smarty-3.1.7, created on 2020-10-28 13:48:13
         compiled from "F:\Project\MSCRM_Rehearsal\includes\runtime/../../layouts/v7\modules\Vtiger\Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14741772285f99769dafd8c5-92519061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10bb58b0a0c1c195c6a7febbfed3f0a9142312ca' => 
    array (
      0 => 'F:\\Project\\MSCRM_Rehearsal\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\Footer.tpl',
      1 => 1603365870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14741772285f99769dafd8c5-92519061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANGUAGE_STRINGS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f99769db089b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f99769db089b')) {function content_5f99769db089b($_smarty_tpl) {?>

<footer class="app-footer">
	<p>
	
		
		
		Powered by Hirokei Myanmar Systems Co.,Ltd. © 2020 All Rights Reserved. HIMS
		

	</p>
</footer>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div class="modal myModal fade"></div>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>

</html><?php }} ?>