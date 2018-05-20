<?php /* Smarty version 3.1.27, created on 2017-08-20 03:48:40
         compiled from "C:\AppServ\www\casa_cambio\app\templates\transacciones_agregar.html" */ ?>
<?php
/*%%SmartyHeaderCode:2014259993ed8976556_70680569%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4552d6e0734d9dc8f7109de162b0502295366e1a' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\transacciones_agregar.html',
      1 => 1502662250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2014259993ed8976556_70680569',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59993ed8a2d709_22193825',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59993ed8a2d709_22193825')) {
function content_59993ed8a2d709_22193825 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2014259993ed8976556_70680569';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
>
var f1 = new LiveValidation('monto_envia'); f1.add( Validate.Presence );f1.add( Validate.Numericality );
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