<?php /* Smarty version 3.1.27, created on 2017-08-20 05:43:11
         compiled from "C:\AppServ\www\casa_cambio\app\templates\estados_operaciones_ficha.html" */ ?>
<?php
/*%%SmartyHeaderCode:15261599959af452436_63401743%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0ff7e689203d24b6ab5d49f8caac1ebf939372d' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\estados_operaciones_ficha.html',
      1 => 1502635200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15261599959af452436_63401743',
  'variables' => 
  array (
    'meta' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599959af4b5711_76903781',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599959af4b5711_76903781')) {
function content_599959af4b5711_76903781 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15261599959af452436_63401743';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<table class="table table-condensed table-hover table-striped table-bordered display" style="max-width:540px;">
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['nombre']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['nombre'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['descripcion']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['descripcion'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['creado']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['creado'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['modificado']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['modificado'];?>
</td></tr>

</table>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>