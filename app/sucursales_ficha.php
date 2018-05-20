<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('sucursales_ficha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('sucursales_lista.php');
$id=$_REQUEST['id'];
$datos=bd_sucursales_datos($id);
$antsig=bd_sucursales_antsig($id);

$miscampos=array("id","nombre","direccion","tlf","tlf2","pais_id","persona_contacto","creado","modificado");
$cantcampos=count($miscampos);
$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);
$datos['pais_id'] = bd_obt_paises($datos['pais_id']);
$smarty->assign('d',$datos);
$smarty->assign('antsig',$antsig);
$smarty->assign('meta',proc_meta("sucursales"));

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("sucursales_ficha.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
