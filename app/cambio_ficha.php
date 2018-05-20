<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('cambio_ficha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('cambio_lista.php');
$id=$_REQUEST['id'];
$datos=bd_cambio_datos($id);
$antsig=bd_cambio_antsig($id);

$miscampos=array("id","moneda1_id","valor_moneda1","moneda2_id","valor_moneda2","operacion","creado","modificado");
$cantcampos=count($miscampos);
$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);
$datos['moneda1_id'] = bd_obt_monedas($datos['moneda1_id']);
$datos['moneda2_id'] = bd_obt_monedas($datos['moneda2_id']);

$smarty->assign('d',$datos);
$smarty->assign('antsig',$antsig);
$smarty->assign('meta',proc_meta("cambio"));

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("cambio_ficha.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
