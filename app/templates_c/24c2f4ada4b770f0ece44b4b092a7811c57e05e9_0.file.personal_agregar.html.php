<?php /* Smarty version 3.1.27, created on 2017-08-21 05:59:55
         compiled from "C:\AppServ\www\casa_cambio\app\templates\personal_agregar.html" */ ?>
<?php
/*%%SmartyHeaderCode:10693599aaf1b95ddb3_30359503%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c2f4ada4b770f0ece44b4b092a7811c57e05e9' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\personal_agregar.html',
      1 => 1502669944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10693599aaf1b95ddb3_30359503',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf1ba18c71_45856589',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf1ba18c71_45856589')) {
function content_599aaf1ba18c71_45856589 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10693599aaf1b95ddb3_30359503';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
>
    var f1 = new LiveValidation('dni'); f1.add( Validate.Presence );
    var f2 = new LiveValidation('nombre'); f2.add( Validate.Presence ); 
    var f3 = new LiveValidation('apellido'); f3.add( Validate.Presence ); 
    var f4 = new LiveValidation('direccion'); f4.add( Validate.Presence ); 
    var f5 = new LiveValidation('login'); f5.add( Validate.Presence ); f5.add( Validate.Length, { minimum: 6 } );
    var f6 = new LiveValidation('tlf_fijo'); f6.add( Validate.Numericality ); f6.add( Validate.Length, { minimum: 7 } );
    var f7 = new LiveValidation('clave'); f7.add( Validate.Presence ); f7.add( Validate.Length, { minimum: 6 } );
    var f8 = new LiveValidation('clave_ver'); f8.add( Validate.Presence ); f8.add( Validate.Length, { minimum: 6 } ); f8.add( Validate.Confirmation, { match: 'clave' } );
    var f9 = new LiveValidation('correo'); f9.add( Validate.Email );
    var f10 = new LiveValidation('tlf_movil'); f10.add( Validate.Numericality ); f10.add( Validate.Length, { minimum: 7 } );
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