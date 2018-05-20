<?php /* Smarty version 3.1.27, created on 2017-08-20 05:43:19
         compiled from "C:\AppServ\www\casa_cambio\app\templates\estados_operaciones_modificar.html" */ ?>
<?php
/*%%SmartyHeaderCode:18518599959b7c19885_32576698%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8588e3fec0f894fa5d476d10e31c982e3d09d240' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\estados_operaciones_modificar.html',
      1 => 1502639071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18518599959b7c19885_32576698',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599959b7c65d49_48920299',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599959b7c65d49_48920299')) {
function content_599959b7c65d49_48920299 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18518599959b7c19885_32576698';
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