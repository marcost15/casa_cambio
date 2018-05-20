<?php /* Smarty version 3.1.27, created on 2017-08-20 18:43:23
         compiled from "C:\AppServ\www\casa_cambio\app\templates\rp_frm_caja.html" */ ?>
<?php
/*%%SmartyHeaderCode:9769599a108b871586_64430567%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4743087647eec5fc16d5dce9b72400488e5310fd' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\rp_frm_caja.html',
      1 => 1503268919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9769599a108b871586_64430567',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599a108b8bda33_04204564',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a108b8bda33_04204564')) {
function content_599a108b8bda33_04204564 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9769599a108b871586_64430567';
echo $_smarty_tpl->getSubTemplate ("inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("final.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>