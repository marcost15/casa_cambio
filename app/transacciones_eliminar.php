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
//if (bd_verificar_privilegios('transacciones_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('transacciones_lista.php');

$id=$_REQUEST['id'];
$datos=bd_transacciones_datos($id);
   $datos['cliente_envia_id'] = bd_obt_clientes($datos['cliente_envia_id']);
   $datos['cliente_recibe_id'] = bd_obt_clientes($datos['cliente_recibe_id']);
   $datos['moneda_envia_id'] = bd_obt_monedas($datos['moneda_envia_id']);
   $datos['moneda_recibe_id'] = bd_obt_monedas($datos['moneda_recibe_id']);
   $datos['sucursal_envia_id'] = bd_obt_sucursales($datos['sucursal_envia_id']);
   $datos['sucursal_recibe_id'] = bd_obt_sucursales($datos['sucursal_recibe_id']);
   $datos['personal_id'] = bd_obt_personal($datos['personal_id']);
   $datos['estado_id'] = bd_obt_estados_operaciones($datos['estado_id']);
   
$smarty->assign('id',$id);
$smarty->assign('d',$datos);

$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->display("transacciones_eliminar.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
