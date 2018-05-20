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
//if (bd_verificar_privilegios('cambio_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('cambio_lista.php');

$id=$_REQUEST['id'];
$datos=bd_cambio_datos($id);
$datos['moneda1_id'] = bd_obt_monedas($datos['moneda1_id']);
$datos['moneda2_id'] = bd_obt_monedas($datos['moneda2_id']);
$smarty->assign('id',$id);
$smarty->assign('d',$datos);

$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->display("cambio_eliminar.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
