<?php /* Smarty version 3.1.27, created on 2017-08-20 05:43:04
         compiled from "C:\AppServ\www\casa_cambio\app\templates\estados_operaciones_agregar.html" */ ?>
<?php
/*%%SmartyHeaderCode:19060599959a8a852d2_98407949%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b63a4018e150beb9bbaad334bcdba35383de2eff' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\estados_operaciones_agregar.html',
      1 => 1502639058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19060599959a8a852d2_98407949',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599959a8ae48b5_76436152',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599959a8ae48b5_76436152')) {
function content_599959a8ae48b5_76436152 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19060599959a8a852d2_98407949';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
>
var f1 = new LiveValidation('nombre'); f1.add( Validate.Presence )
var f2 = new LiveValidation('descripcion'); f2.add( Validate.Presence )
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