<?php /* Smarty version 3.1.27, created on 2018-05-20 15:32:00
         compiled from "/var/www/html/casa_cambio/app/menu/menu.html" */ ?>
<?php
/*%%SmartyHeaderCode:11507386545b01cd30d19b66_98345792%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56751a02ed991f00e9611bd60bd7dfd2e626461c' => 
    array (
      0 => '/var/www/html/casa_cambio/app/menu/menu.html',
      1 => 1503268939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11507386545b01cd30d19b66_98345792',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b01cd30d1dc84_31421000',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b01cd30d1dc84_31421000')) {
function content_5b01cd30d1dc84_31421000 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11507386545b01cd30d19b66_98345792';
?>
<ul class='nav navbar-nav navbar-right'>

<li><a href="menu.php">Inicio</a></li>
<li><a href="clientes_lista.php">Clientes</a></li>
<li><a href="transacciones_lista.php">Transacciones</a></li>
<li><a href="personal_lista.php">Personal</a></li>
<li><a href="rp_frm_caja.php">Caja</a></li>
<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
		<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="cambio_lista.php">Cambio</a></li>
			<li><a href="estados_operaciones_lista.php">Estados Operaciones</a></li>
			<li><a href="monedas_lista.php">Monedas</a></li>
			<li><a href="paises_lista.php">Paises</a></li>
			<li><a href="sucursales_lista.php">Sucursales</a></li>
		</ul>
</li>
<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenimiento
		<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="niveles_lista.php">Niveles</a></li>
			<li><a href="privilegios_lista.php">Privilegios</a></li>
			<li><a href="sqlguardar.php">Respaldo</a></li>
		</ul>
</li>
<li><a href="index.php">Salir</a></li>
</ul>
<?php }
}
?>