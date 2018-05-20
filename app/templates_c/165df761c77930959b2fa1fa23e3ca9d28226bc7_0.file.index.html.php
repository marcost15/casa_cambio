<?php /* Smarty version 3.1.27, created on 2018-05-20 15:31:58
         compiled from "/var/www/html/casa_cambio/app/templates/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:21343742755b01cd2e88ca57_09032560%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165df761c77930959b2fa1fa23e3ca9d28226bc7' => 
    array (
      0 => '/var/www/html/casa_cambio/app/templates/index.html',
      1 => 1503184352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21343742755b01cd2e88ca57_09032560',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b01cd2e96b4e1_72985321',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b01cd2e96b4e1_72985321')) {
function content_5b01cd2e96b4e1_72985321 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21343742755b01cd2e88ca57_09032560';
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