<?php /* Smarty version 3.1.27, created on 2017-08-20 04:47:28
         compiled from "C:\AppServ\www\casa_cambio\app\templates\clientes_ficha.html" */ ?>
<?php
/*%%SmartyHeaderCode:1472659994ca0bfb047_03128702%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95b3e61ae268d64888b858ab13dacb507bc3e108' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\clientes_ficha.html',
      1 => 1503183662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1472659994ca0bfb047_03128702',
  'variables' => 
  array (
    'meta' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59994ca0c939a2_88047584',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59994ca0c939a2_88047584')) {
function content_59994ca0c939a2_88047584 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1472659994ca0bfb047_03128702';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<table class="table table-condensed table-hover table-striped table-bordered display" style="max-width:540px;">
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['dni']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['dni'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['nombre']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['nombre'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['apellido']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['apellido'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['direccion']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['direccion'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['pais_id']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['pais_id'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['tlf']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['tlf'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['tlf2']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['tlf2'];?>
</td></tr>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['correo']['etiqueta'];?>
</th>
<td><?php echo $_smarty_tpl->tpl_vars['d']->value['correo'];?>
</td></tr>
<?php ob_start();
echo $_smarty_tpl->tpl_vars['d']->value['adjunto'];
$_tmp1=ob_get_clean();
if ($_tmp1) {?>
<tr><th><?php echo $_smarty_tpl->tpl_vars['meta']->value['adjunto']['etiqueta'];?>
</th>
<td><a style="margin-bottom:3px" href="#"  onClick='eModal.iframe("./upload/clientes/<?php echo $_smarty_tpl->tpl_vars['d']->value['adjunto'];?>
","Adjunto de Cliente")'><img src="./upload/clientes/<?php echo $_smarty_tpl->tpl_vars['d']->value['adjunto'];?>
" width="120" height="120" /></a></td></tr>
<?php }?>
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