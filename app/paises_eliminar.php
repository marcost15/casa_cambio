<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/fh3.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./configs/validacion.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('paises_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('paises_lista.php');

$id=$_REQUEST['id'];
$datos=bd_paises_datos($id);

$smarty->assign('id',$id);
$smarty->assign('d',$datos);

$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->display("paises_eliminar.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
