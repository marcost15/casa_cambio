<?php /* Smarty version 3.1.27, created on 2017-08-20 18:42:21
         compiled from "C:\AppServ\www\casa_cambio\app\menu\menu.html" */ ?>
<?php
/*%%SmartyHeaderCode:18648599a104d79f899_00388113%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0e6692a5907d3ec4e8d0edbf1a156b9a92ff4d2' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\menu\\menu.html',
      1 => 1503268939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18648599a104d79f899_00388113',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599a104d7d8c21_71608922',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a104d7d8c21_71608922')) {
function content_599a104d7d8c21_71608922 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18648599a104d79f899_00388113';
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