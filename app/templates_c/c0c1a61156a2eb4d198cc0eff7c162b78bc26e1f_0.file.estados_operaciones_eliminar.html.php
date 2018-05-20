<?php /* Smarty version 3.1.27, created on 2017-08-20 05:43:14
         compiled from "C:\AppServ\www\casa_cambio\app\templates\estados_operaciones_eliminar.html" */ ?>
<?php
/*%%SmartyHeaderCode:8817599959b272ade8_59423033%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0c1a61156a2eb4d198cc0eff7c162b78bc26e1f' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\estados_operaciones_eliminar.html',
      1 => 1502635200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8817599959b272ade8_59423033',
  'variables' => 
  array (
    'd' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599959b280bef1_51049694',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599959b280bef1_51049694')) {
function content_599959b280bef1_51049694 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8817599959b272ade8_59423033';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="tabla">
<table border="1" class="table table-condensed table-hover table-striped table-bordered display">
<tr><th>id</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td></tr>
<tr><th>nombre</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value['nombre'];?>
</td></tr>
<tr><th>descripcion</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value['descripcion'];?>
</td></tr>
<tr><th>creado</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value['creado'];?>
</td></tr>
<tr><th>modificado</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value['modificado'];?>
</td></tr>

</table>
</div>
<a href="estados_operaciones_eliminar2.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary btn-lg active"> <i class="fa fa-check"></i> Sí, elimínelo</a>
<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>