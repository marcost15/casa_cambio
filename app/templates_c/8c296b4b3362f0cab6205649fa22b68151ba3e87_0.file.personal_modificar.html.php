<?php /* Smarty version 3.1.27, created on 2017-08-21 06:00:42
         compiled from "C:\AppServ\www\casa_cambio\app\templates\personal_modificar.html" */ ?>
<?php
/*%%SmartyHeaderCode:23592599aaf4a08f5f4_02153933%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c296b4b3362f0cab6205649fa22b68151ba3e87' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\personal_modificar.html',
      1 => 1502670889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23592599aaf4a08f5f4_02153933',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf4a0fdff8_68474608',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf4a0fdff8_68474608')) {
function content_599aaf4a0fdff8_68474608 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23592599aaf4a08f5f4_02153933';
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
    var f6 = new LiveValidation('tlf_fijo'); f6.add( Validate.Numericality ); f6.add( Validate.Length, { minimum: 7 } );
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