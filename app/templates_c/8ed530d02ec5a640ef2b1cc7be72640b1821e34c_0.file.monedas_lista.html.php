<?php /* Smarty version 3.1.27, created on 2017-08-21 06:40:19
         compiled from "C:\AppServ\www\casa_cambio\app\templates\monedas_lista.html" */ ?>
<?php
/*%%SmartyHeaderCode:3296599ab893b33105_22548014%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ed530d02ec5a640ef2b1cc7be72640b1821e34c' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\monedas_lista.html',
      1 => 1502941278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3296599ab893b33105_22548014',
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
  'unifunc' => 'content_599ab893bf59d9_02637801',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599ab893bf59d9_02637801')) {
function content_599ab893bf59d9_02637801 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3296599ab893b33105_22548014';
echo $_smarty_tpl->getSubTemplate ("inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="container">
	<div class="col-sm-6">
		<div class="page-header">
			<h1>Monedas <a class="btn btn-default btn-lg" title="Agregar" href="#"
            onClick='eModal.iframe("monedas_agregar.php","Agregar Monedas")'><i
            class="fa fa-plus"></i></a></h1>

    </div>
    </div>
    <div class="col-sm-6">
    <div class="page-header">
    <form action="monedas_lista.php" method="POST">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1" style="padding:0 12px;"><i class="fa fa-search"></i></span>
                  <input id="p" name="p" type="text" class="form-control" placeholder="Escriba aquí y pulse INTRO para buscar en monedas" aria-describedby="basic-addon1">
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
                value="monedas_lista.php?pag=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
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
<table id="tabla_monedas" style="width:100%;" border="1"
    class="table table-condensed table-hover table-striped table-bordered display">
    <thead>
    <tr>
<th data-column-id="id"><?php echo $_smarty_tpl->tpl_vars['meta']->value['id']['etiqueta'];?>
</th>
<th data-column-id="nombre"><?php echo $_smarty_tpl->tpl_vars['meta']->value['nombre']['etiqueta'];?>
</th>
<th data-column-id="abreviacion"><?php echo $_smarty_tpl->tpl_vars['meta']->value['abreviacion']['etiqueta'];?>
</th>
<th data-column-id="creado"><?php echo $_smarty_tpl->tpl_vars['meta']->value['creado']['etiqueta'];?>
</th>
<th data-column-id="modificado"><?php echo $_smarty_tpl->tpl_vars['meta']->value['modificado']['etiqueta'];?>
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
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['nombre'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['abreviacion'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['creado'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['modificado'];?>
</td>

    <td class="text-center" style="white-space: nowrap;">
        <a style="margin-bottom:3px" class="btn btn-default" title="Ficha de monedas" href="#"
            onClick='eModal.ajax("monedas_ficha.php?id=<?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
","Datos de Monedas")'><i
            class="fa fa-info"></i></a>

        <a style="margin-bottom:3px" class="btn btn-default" title=""Eliminar monedas" href="#"
            onClick='eModal.iframe("monedas_eliminar.php?id=<?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
","Eliminar Elemento de Monedas")'><i
            class="fa fa-trash-o"></i></a>

        <a style="margin-bottom:3px" class="btn btn-default" title="Modificar monedas" href="#"
            onClick='eModal.iframe("monedas_modificar.php?id=<?php echo $_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
","Modificación de Monedas")'><i
            class="fa fa-pencil-square-o"></i></a>

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
                value="monedas_lista.php?pag=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ii']['iteration'];?>
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
<?php echo $_smarty_tpl->getSubTemplate ("final.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>