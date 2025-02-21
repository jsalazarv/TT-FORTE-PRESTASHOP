<?php
/* Smarty version 4.3.4, created on 2025-02-21 01:41:27
  from '/var/www/html/admin4577/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67b7cbb76ed2b9_62960600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5822032be1c5b2384fe9230ad2a701e1c3b0032' => 
    array (
      0 => '/var/www/html/admin4577/themes/new-theme/template/content.tpl',
      1 => 1718360660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b7cbb76ed2b9_62960600 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>
<div id="content-message-box"></div>


<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
