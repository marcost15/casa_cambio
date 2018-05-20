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
//if (bd_verificar_privilegios('privilegios_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('privilegios_lista.php');

$id=$_REQUEST['id'];
$datos=bd_privilegios_datos($id);
$datos['nivel_id'] = bd_obt_niveles($datos['nivel_id']);

$smarty->assign('id',$id);
$smarty->assign('d',$datos);

$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->display("privilegios_eliminar.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
