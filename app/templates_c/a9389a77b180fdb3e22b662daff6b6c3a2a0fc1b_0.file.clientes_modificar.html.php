<?php /* Smarty version 3.1.27, created on 2017-08-20 05:09:00
         compiled from "C:\AppServ\www\casa_cambio\app\templates\clientes_modificar.html" */ ?>
<?php
/*%%SmartyHeaderCode:583599951ac4d3f61_36481098%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9389a77b180fdb3e22b662daff6b6c3a2a0fc1b' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\clientes_modificar.html',
      1 => 1503030522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '583599951ac4d3f61_36481098',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599951ac524127_93722564',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599951ac524127_93722564')) {
function content_599951ac524127_93722564 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '583599951ac4d3f61_36481098';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo '<script'; ?>
>
var f1 = new LiveValidation('dni'); f1.add( Validate.Presence )
var f2 = new LiveValidation('nombre'); f1.add( Validate.Presence )
var f3 = new LiveValidation('apellido'); f1.add( Validate.Presence )
var f4 = new LiveValidation('direccion'); f1.add( Validate.Presence )
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