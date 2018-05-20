<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('personal_ficha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('personal_lista.php');

$id=$_REQUEST['id'];
$datos=bd_personal_datos($id);
$antsig=bd_personal_antsig($id);
$datos2=bd_personal_datos_datos($id);

$miscampos=array("id","nombre","apellido","login","nivel_id","sucursal_id","estado");
$cantcampos=count($miscampos);
$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);
$datos['nivel_id'] = bd_obt_niveles($datos['nivel_id']);
$datos['sucursal_id'] = bd_obt_sucursales($datos['sucursal_id']);

$smarty->assign('d',$datos);
$smarty->assign('d2',$datos2);
$smarty->assign('antsig',$antsig);
$smarty->assign('meta',proc_meta("personal"));

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("personal_ficha.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
