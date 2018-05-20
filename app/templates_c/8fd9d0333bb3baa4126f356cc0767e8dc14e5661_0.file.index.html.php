<?php /* Smarty version 3.1.27, created on 2017-08-21 04:30:40
         compiled from "C:\AppServ\www\casa_cambio\app\templates\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:22741599a9a302ad0f7_48509332%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fd9d0333bb3baa4126f356cc0767e8dc14e5661' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\index.html',
      1 => 1503184352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22741599a9a302ad0f7_48509332',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599a9a302fd2a3_78141242',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a9a302fd2a3_78141242')) {
function content_599a9a302fd2a3_78141242 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22741599a9a302ad0f7_48509332';
echo $_smarty_tpl->getSubTemplate ("inicio0.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="centro">
	<img src="./imagenes/logo.png" />
	<h1>Sistema Casa de Cambio</h1>
</div>
<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("final0.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>