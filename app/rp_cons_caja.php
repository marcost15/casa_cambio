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

if (!isset($_REQUEST['sucursal_id'])) ir('rp_frm_caja.php');

$sucursal_id=$_REQUEST['sucursal_id'];
$fecha_ini=f2f($_REQUEST['fecha_ini']);
$fecha_fin=f2f($_REQUEST['fecha_fin']);
$fecha_ini= $fecha_ini.' 00:00:00';
$fecha_fin= $fecha_fin.' 23:59:59';

$sucursal_nombre = bd_obt_sucursales($sucursal_id);

$estados = sql2array("SELECT id, nombre FROM estados_operaciones ORDER BY id");
$monedas = sql2array("SELECT id, nombre, abreviacion FROM monedas ORDER BY id");
$cant_monedas = count($monedas);

foreach ($estados as $i=>$c)
{
	$estados[$i]['moneda'] = $monedas;
    foreach ($monedas as $s=>$t)
	{
		$estados[$i]['moneda'][$s]['enviado'] = 0;
		$estados[$i]['moneda'][$s]['recibido'] = 0;
	}
}

foreach ($estados as $i=>$c)
{
	$esta_id = $estados[$i]['id'];
    foreach ($monedas as $s=>$t)
	{
		$mone_id = $estados[$i]['moneda'][$s]['id'];
		//ver($esta_id);
		//ver($mone_id);
		$estados[$i]['monto_envia'][$s] = sql2array("SELECT monto_envia, moneda_envia_id,estado_id,transacciones.creado,transacciones.modificado FROM transacciones INNER JOIN sucursales ON sucursales.id = transacciones.sucursal_envia_id WHERE sucursales.id = '$sucursal_id' AND moneda_envia_id = '$mone_id' AND estado_id = '$esta_id' AND (transacciones.creado between '$fecha_ini' and '$fecha_fin' OR transacciones.modificado between '$fecha_ini' and '$fecha_fin')");
		$estados[$i]['monto_recibe'][$s] = sql2array("SELECT monto_recibe, moneda_recibe_id,estado_id,transacciones.creado,transacciones.modificado FROM transacciones INNER JOIN sucursales ON sucursales.id = transacciones.sucursal_recibe_id WHERE sucursales.id = '$sucursal_id' AND moneda_recibe_id = '$mone_id' AND estado_id = '$esta_id' AND (transacciones.creado between '$fecha_ini' and '$fecha_fin' OR transacciones.modificado between '$fecha_ini' and '$fecha_fin')");
	}
}
foreach ($estados as $i=>$c)
{
	 foreach ($monedas as $s=>$t)
	{
		$cuenta_envios = count($estados[$i]['monto_envia'][$s]);
		$cuenta_recibe = count($estados[$i]['monto_recibe'][$s]);
		for ($j = 0; $j <= $cuenta_envios ; $j++)
		{
			$estados[$i]['moneda'][$s]['enviado'] = $estados[$i]['moneda'][$s]['enviado'] + $estados[$i]['monto_envia'][$s][$j]['monto_envia'];
		}
		for ($j = 0; $j <= $cuenta_recibe ; $j++)
		{
			$estados[$i]['moneda'][$s]['recibido'] = $estados[$i]['moneda'][$s]['recibido'] + $estados[$i]['monto_recibe'][$s][$j]['monto_recibe'];
		}
	}
}

$fecha_ini=$_REQUEST['fecha_ini'];
$fecha_fin=$_REQUEST['fecha_fin'];
$imp=$_REQUEST['imp'];

$smarty->assign('imp',$imp);
$smarty->assign('sucursal_nombre',$sucursal_nombre);
$smarty->assign('sucursal_id',$sucursal_id);
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->assign('datos',$estados);
$smarty->assign('monedas',$monedas);
$smarty->assign('cant_monedas',$cant_monedas+1);


$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display("rp_cons_caja.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
