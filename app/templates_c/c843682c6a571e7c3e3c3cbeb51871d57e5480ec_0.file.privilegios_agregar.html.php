<?php /* Smarty version 3.1.27, created on 2017-08-21 06:02:34
         compiled from "C:\AppServ\www\casa_cambio\app\templates\privilegios_agregar.html" */ ?>
<?php
/*%%SmartyHeaderCode:22952599aafbad60020_96036874%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c843682c6a571e7c3e3c3cbeb51871d57e5480ec' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\privilegios_agregar.html',
      1 => 1502995574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22952599aafbad60020_96036874',
  'variables' => 
  array (
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aafbadd2731_12772254',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aafbadd2731_12772254')) {
function content_599aafbadd2731_12772254 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22952599aafbad60020_96036874';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->tpl_vars['f']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



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