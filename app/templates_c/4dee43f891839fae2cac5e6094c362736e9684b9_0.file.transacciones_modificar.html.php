<?php /* Smarty version 3.1.27, created on 2017-08-21 01:01:00
         compiled from "C:\AppServ\www\casa_cambio\app\templates\transacciones_modificar.html" */ ?>
<?php
/*%%SmartyHeaderCode:5960599a690c270068_85364028%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dee43f891839fae2cac5e6094c362736e9684b9' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\transacciones_modificar.html',
      1 => 1503039383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5960599a690c270068_85364028',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599a690c2f1b90_13777296',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a690c2f1b90_13777296')) {
function content_599a690c2f1b90_13777296 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5960599a690c270068_85364028';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo '<script'; ?>
>
var f1 = new LiveValidation('monto_envia'); f1.add( Validate.Presence );f1.add( Validate.Numericality );
var f2 = new LiveValidation('monto_recibe'); f2.add( Validate.Presence );f2.add( Validate.Numericality );
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