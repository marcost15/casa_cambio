<?php /* Smarty version 3.1.27, created on 2017-08-20 03:48:44
         compiled from "C:\AppServ\www\casa_cambio\app\templates\ventana_cliente_recibe.html" */ ?>
<?php
/*%%SmartyHeaderCode:1017059993edc913267_44630118%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a7215d66401e9a8a1d88b33e0089891b4ce66bf' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\ventana_cliente_recibe.html',
      1 => 1503037647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1017059993edc913267_44630118',
  'variables' => 
  array (
    'paginas' => 0,
    'pagina_actual' => 0,
    'n_paginas' => 0,
    'datos_debug' => 0,
    'meta' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59993edca12bc9_47178773',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59993edca12bc9_47178773')) {
function content_59993edca12bc9_47178773 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1017059993edc913267_44630118';
echo $_smarty_tpl->getSubTemplate ("inicio0.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="container">
	<div class="col-sm-6">
		<div class="page-header">
			<h1>Clientes <a class="btn btn-default btn-lg" title="Agregar" href="#"
            onClick='eModal.iframe("clientes_agregar.php","Agregar Clientes")'><i
            class="fa fa-plus"></i></a></h1>

    </div>
    </div>
    <div class="col-sm-6">
    <div class="page-header">
    <form action="ventana_cliente_recibe.php" method="POST">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1" style="padding:0 12px;"><i class="fa fa-search"></i></span>
                  <input id="p" name="p" type="text" class="form-control" placeholder="Escriba aquí y pulse INTRO para buscar en clientes" aria-describedby="basic-addon1">
                </div>
            </form>
    </div>
    </div>
</div>

<div class="tabla">
<div class="mipaginacion">
    <form style="display:inline">
        <select name="ad" onchange="salta(this.form)"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ii'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['name'] = 'ii';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginas']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total']);
?>
            <option <?php if ($_smarty_tpl->tpl_vars['pagina_actual']->value == $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration']) {?>selected="selected"<?php }?>
                value="ventana_cliente_recibe.php?pag=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
&i=<?php echo $_smarty_tpl->tpl_vars['paginas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ii']['index']];?>
">Página <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
</option>
        <?php endfor; endif; ?></select>
    </form> de <?php echo $_smarty_tpl->tpl_vars['n_paginas']->value;?>
.
</div>
<!-- div><?php echo $_smarty_tpl->tpl_vars['datos_debug']->value;?>
</div -->
</p>
<table id="tabla_clientes" style="width:100%;" border="1"
    class="table table-condensed table-hover table-striped table-bordered display">
    <thead>
    <tr>
<th data-column-id="id"><?php echo $_smarty_tpl->tpl_vars['meta']->value['id']['etiqueta'];?>
</th>
<th data-column-id="dni"><?php echo $_smarty_tpl->tpl_vars['meta']->value['dni']['etiqueta'];?>
</th>
<th data-column-id="nombre"><?php echo $_smarty_tpl->tpl_vars['meta']->value['nombre']['etiqueta'];?>
</th>
<th data-column-id="apellido"><?php echo $_smarty_tpl->tpl_vars['meta']->value['apellido']['etiqueta'];?>
</th>
<th data-column-id="tlf"><?php echo $_smarty_tpl->tpl_vars['meta']->value['tlf']['etiqueta'];?>
</th>
<th data-column-id="correo"><?php echo $_smarty_tpl->tpl_vars['meta']->value['correo']['etiqueta'];?>
</th>
<th></th>
    </tr></thead><tbody>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datos']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <tr>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dni'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['nombre'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apellido'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tlf'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['correo'];?>
</td>
   <td class="text-center" style="white-space: nowrap;">
        <a style="margin-bottom:3px" class="btn btn-default" title="Seleccionar" href="javascript:void(0)"
            onClick="actualizar('<?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['nombreape'];?>
');" onmouseout='return nd();'><i class="fa fa-pencil-square-o"></i></a>

    </td>
    </tr>
<?php endfor; endif; ?>
</tbody>
</table>
<div class="mipaginacion">
    <form style="display:inline">
        <select name="ad" onchange="salta(this.form)"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ii'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['name'] = 'ii';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginas']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ii']['total']);
?>
            <option <?php if ($_smarty_tpl->tpl_vars['pagina_actual']->value == $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration']) {?>selected="selected"<?php }?>
                value="ventana_cliente_recibe.php?pag=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
&i=<?php echo $_smarty_tpl->tpl_vars['paginas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ii']['index']];?>
">Página <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
</option>
        <?php endfor; endif; ?></select>
    </form> de <?php echo $_smarty_tpl->tpl_vars['n_paginas']->value;?>
.
</div>
</p>
</div>
<?php echo '<script'; ?>
>
/**
 * Para hacer el salto automático en la paginación
 */
function salta(Sel){
    if (Sel.ad.selectedIndex >= 0){
        document.location=Sel.ad.options[Sel.ad.selectedIndex].value
    }
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("final0.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo '<script'; ?>
>
function actualizar(id,nombreape)
{  
    if (document.forms["transacciones"]=opener.document.forms["transacciones"])
    {
        opener.document.forms["transacciones"].cliente_recibe_id.value=id;
        opener.document.forms["transacciones"].cliente_recibe_nombre.value=nombreape;
    }
    close();
}
<?php echo '</script'; ?>
>
<?php }
}
?>