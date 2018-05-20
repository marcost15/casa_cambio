<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('transacciones_ficha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('transacciones_lista.php');
$id=$_REQUEST['id'];
$datos=bd_transacciones_datos($id);
$antsig=bd_transacciones_antsig($id);

$miscampos=array("id","cliente_envia_id","cliente_recibe_id","monto_envia","monto_recibe","moneda_recibe_id","moneda_envia_id","sucursal_envia_id","sucursal_recibe_id","estado_id","personal_id","creado","modificado");
$cantcampos=count($miscampos);
$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);

   $datos['cliente_envia_id'] = bd_obt_clientes($datos['cliente_envia_id']);
   $datos['cliente_recibe_id'] = bd_obt_clientes($datos['cliente_recibe_id']);
   $datos['moneda_envia_id'] = bd_obt_monedas($datos['moneda_envia_id']);
   $datos['moneda_recibe_id'] = bd_obt_monedas($datos['moneda_recibe_id']);
   $datos['sucursal_envia_id'] = bd_obt_sucursales($datos['sucursal_envia_id']);
   $datos['sucursal_recibe_id'] = bd_obt_sucursales($datos['sucursal_recibe_id']);
   $datos['personal_id'] = bd_obt_personal($datos['personal_id']);
   $datos['estado_id'] = bd_obt_estados_operaciones($datos['estado_id']);

$imp=$_REQUEST['imp'];

$smarty->assign('imp',$imp);
$smarty->assign('d',$datos);
$smarty->assign('antsig',$antsig);
$smarty->assign('meta',proc_meta("transacciones"));

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("transacciones_ficha.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
