<?php /* Smarty version 3.1.27, created on 2017-08-20 03:59:38
         compiled from "C:\AppServ\www\casa_cambio\app\templates\mensajev.html" */ ?>
<?php
/*%%SmartyHeaderCode:180275999416af01661_17049934%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cf27f80b53554e1ded7fba05a360ddac846753f' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\mensajev.html',
      1 => 1502635200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180275999416af01661_17049934',
  'variables' => 
  array (
    'mensaje' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5999416b00f424_17431239',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5999416b00f424_17431239')) {
function content_5999416b00f424_17431239 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '180275999416af01661_17049934';
echo $_smarty_tpl->getSubTemplate ("iniciov.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="mensaje">
<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>


<button type="button" class="btn btn-primary" onClick="parent.location.reload(true);">Continuar</button>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("finalv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>