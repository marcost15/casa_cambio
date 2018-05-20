<?php /* Smarty version 3.1.27, created on 2018-05-20 15:32:00
         compiled from "/var/www/html/casa_cambio/app/templates/negacion_usuario.html" */ ?>
<?php
/*%%SmartyHeaderCode:12154634435b01cd30bbe6e8_59602658%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1617acedbf64651e19e1e4b5d18276f3b9bab9ac' => 
    array (
      0 => '/var/www/html/casa_cambio/app/templates/negacion_usuario.html',
      1 => 1502997883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12154634435b01cd30bbe6e8_59602658',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b01cd30be8796_06148368',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b01cd30be8796_06148368')) {
function content_5b01cd30be8796_06148368 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12154634435b01cd30bbe6e8_59602658';
echo $_smarty_tpl->getSubTemplate ("inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="mensaje">
<p>NO TIENE LOS PERMISOS NECESARIOS PARA ACCEDER</p> 
<div><center><img src="./imagenes/stop.png" width="150" height="155"/></center></div>
<p>POR FAVOR CONTACTE AL ADMINISTRADOR</p> 
<p>...Espere por favor, será redireccionado en 5 segundos...</p> 
</div>

<?php echo '<script'; ?>
 type="text/javascript"> 
function redireccionar(){ 
  window.location="index.php"; 
}  
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos 
<?php echo '</script'; ?>
> 

<?php echo $_smarty_tpl->getSubTemplate ("final.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>