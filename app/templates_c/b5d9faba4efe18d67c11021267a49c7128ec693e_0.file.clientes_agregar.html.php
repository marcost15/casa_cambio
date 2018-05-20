<?php /* Smarty version 3.1.27, created on 2017-08-21 06:38:27
         compiled from "C:\AppServ\www\casa_cambio\app\templates\clientes_agregar.html" */ ?>
<?php
/*%%SmartyHeaderCode:23267599ab823aa9bc2_47245976%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5d9faba4efe18d67c11021267a49c7128ec693e' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\clientes_agregar.html',
      1 => 1503030515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23267599ab823aa9bc2_47245976',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599ab823b0ceb6_39701460',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599ab823b0ceb6_39701460')) {
function content_599ab823b0ceb6_39701460 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23267599ab823aa9bc2_47245976';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
>
var f1 = new LiveValidation('dni'); f1.add( Validate.Presence )
var f2 = new LiveValidation('nombre'); f2.add( Validate.Presence )
var f3 = new LiveValidation('apellido'); f3.add( Validate.Presence )
var f4 = new LiveValidation('direccion'); f4.add( Validate.Presence )
var f5 = new LiveValidation('tlf'); f5.add( Validate.Presence );f5.add( Validate.Numericality );f5.add( Validate.Length, { minimum: 7 } );
var f6 = new LiveValidation('tlf2'); f6.add( Validate.Numericality );f6.add( Validate.Length, { minimum: 7 } );
var f7 = new LiveValidation('correo'); f7.add( Validate.Presence ); f7.add( Validate.Email );
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
$(document).ready(function() {
     var max = 0;
     $(".etiqueta1").each(function(){
         if ($(this).width() > max)
             max = $(this).width();
     });


     $(".etiqueta1").width(max + 10);
     $(".fila_form:odd").addClass('form_impar');

     var max2 = 0;
     $(".campo1").each(function(){
         if ($(this).width() > max2)
             max2 = $(this).width();
     });

     $(".campo1").width(max2 + 10);

 });
<?php echo '</script'; ?>
>
<?php }
}
?>