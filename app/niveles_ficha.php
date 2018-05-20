<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('niveles_ficha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('niveles_lista.php');
$id=$_REQUEST['id'];
$datos=bd_niveles_datos($id);
$antsig=bd_niveles_antsig($id);

$miscampos=array("id","nombre","creado","modificado");
$cantcampos=count($miscampos);
$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);
$smarty->assign('d',$datos);
$smarty->assign('antsig',$antsig);
$smarty->assign('meta',proc_meta("niveles"));

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("niveles_ficha.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
