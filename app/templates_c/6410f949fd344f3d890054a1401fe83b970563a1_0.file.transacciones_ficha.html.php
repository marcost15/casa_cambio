<?php /* Smarty version 3.1.27, created on 2017-08-20 22:04:52
         compiled from "C:\AppServ\www\casa_cambio\app\templates\transacciones_ficha.html" */ ?>
<?php
/*%%SmartyHeaderCode:15281599a3fc49d7ed5_16482454%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6410f949fd344f3d890054a1401fe83b970563a1' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\transacciones_ficha.html',
      1 => 1503225131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15281599a3fc49d7ed5_16482454',
  'variables' => 
  array (
    'imp' => 0,
    'meta' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599a3fc4a8b382_38196231',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a3fc4a8b382_38196231')) {
function content_599a3fc4a8b382_38196231 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15281599a3fc49d7ed5_16482454';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php if ($_smarty_tpl->tpl_vars['imp']->value == 'SI') {?>
	<td><img src="./imagenes/logo129x50.png" width="400" height="150" /></td>
	<h3>COMPROBANTE DE TRANSACCION</h3>
	
	<?php echo '<script'; ?>
 type="text/javascript">
		window.onload = function() {
			window.print();
  	//funciones a ejecutar
	};
	<?php echo '</script'; ?>
>
	
<?php }?>
<table class="table table-condensed table-hover table-striped table-bordered display" style="max-width:540px;">
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['cliente_envia_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['cliente_envia_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['moneda_envia_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['moneda_envia_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['monto_envia']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['monto_envia'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['sucursal_envia_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['sucursal_envia_id'];?>
</td></tr>

<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['cliente_recibe_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['cliente_recibe_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['moneda_recibe_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['moneda_recibe_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['monto_recibe']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['monto_recibe'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['sucursal_recibe_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['sucursal_recibe_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['estado_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['estado_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['personal_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['personal_id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['imp']->value != 'SI') {?>
 <a style="margin-bottom:3px" class="btn btn-default" title="Imprimir Transaccion" href="transacciones_ficha.php?id=<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&imp=SI" target="_blank"><i class="fa fa-print fa-4x"></i></a>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>