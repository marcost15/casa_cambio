<?php /* Smarty version 3.1.27, created on 2017-08-21 06:00:51
         compiled from "C:\AppServ\www\casa_cambio\app\templates\negacion_usuario.html" */ ?>
<?php
/*%%SmartyHeaderCode:12327599aaf534d2606_72768546%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2447e4bbd63f65d09e102b5af469e4b942fae7b9' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\negacion_usuario.html',
      1 => 1502997883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12327599aaf534d2606_72768546',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf535170a8_79613953',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf535170a8_79613953')) {
function content_599aaf535170a8_79613953 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12327599aaf534d2606_72768546';
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