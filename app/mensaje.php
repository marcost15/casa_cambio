<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');

$lang=parse_ini_file('./configs/lang/mensaje.inc',false);

$mensaje=isset($_REQUEST['mensaje'])?$_REQUEST['mensaje']:$lang['bienve'];

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('mensaje',$mensaje);
$smarty->display('mensaje.html');
if ($config['debug']['debug']=='SI') {echo __FILE__;}
