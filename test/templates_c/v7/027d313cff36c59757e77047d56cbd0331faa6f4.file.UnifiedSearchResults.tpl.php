<?php /* Smarty version Smarty-3.1.7, created on 2020-09-23 09:17:09
         compiled from "/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Vtiger/UnifiedSearchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:763426515f6b1295719cc6-87204009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '027d313cff36c59757e77047d56cbd0331faa6f4' => 
    array (
      0 => '/var/www/html/maintcrm20i15/includes/runtime/../../layouts/v7/modules/Vtiger/UnifiedSearchResults.tpl',
      1 => 1600071935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763426515f6b1295719cc6-87204009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'ADV_SEARCH_FIELDS_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f6b1295757b7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6b1295757b7')) {function content_5f6b1295757b7($_smarty_tpl) {?>



<div id="searchResults-container">
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="col-lg-6">
                <span style="font-size: 24px;"><strong> <?php echo vtranslate('LBL_SEARCH_RESULTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </strong></span>
            </div>
            <div class="col-lg-6">
                <div class="pull-right">
                    <a class="btn btn-default module-buttons" href="javascript:void(0);" id="showFilter"><?php echo vtranslate('LBL_SAVE_MODIFY_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                </div>
            </div>
        </div>
        <div class="row moduleResults-container">
            <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("UnifiedSearchResultsContents.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['ADV_SEARCH_FIELDS_INFO']->value!=null){?>
        <script type="text/javascript">
            var adv_search_uimeta = (function() {
                var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['ADV_SEARCH_FIELDS_INFO']->value;?>
;
                return {
                    field: {
                        get: function(name, property) {
                            if (name && property === undefined) {
                                return fieldInfo[name];
                            }
                            if (name && property) {
                                return fieldInfo[name][property]
                            }
                        },
                        isMandatory: function(name) {
                            if (fieldInfo[name]) {
                                return fieldInfo[name].mandatory;
                            }
                            return false;
                        },
                        getType: function(name) {
                            if (fieldInfo[name]) {
                                return fieldInfo[name].type;
                            }
                            return false;
                        }
                    },
                };
            })();
        </script>
<?php }?>
</div>

<?php }} ?>