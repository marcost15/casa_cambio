<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
$lang=parse_ini_file('./configs/lang/menu.inc',false);

$mensaje=isset($_REQUEST['mensaje'])?$_REQUEST['mensaje']:$lang['bienve'];
$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->assign('mensaje',$mensaje);
$smarty->display('menu.html');
if ($config['debug']['debug']=='SI') {echo __FILE__;}
