<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/fh3.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./configs/validacion.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('transacciones_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$f = new FormHandler('caja',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Reporte de Caja');
$f->DateField('Fecha Inicio','fecha_ini',FH_NOT_EMPTY,1,'d-m-y',"10:00");
$f->DateField('Fecha Final','fecha_fin',FH_NOT_EMPTY,1,'d-m-y',"10:00");
$f->selectField('Sucursal', 'sucursal_id', bd_sucursales_opciones() );
$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_transacciones_agregar');

function proc_transacciones_agregar($d)
{
	$resp = comparafecha($d['fecha_ini'],$d['fecha_fin']);
	if ($resp == 1)
	{
		$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE INICIO ES MAYOR A LA DE FINAL";
		return false;
	}
	else
	{
		$fecha_ini = $d['fecha_ini'];
		$fecha_fin = $d['fecha_fin'];
		$sucursal_id = $d['sucursal_id'];
		ir("rp_cons_caja.php?fecha_ini=$fecha_ini&fecha_fin=$fecha_fin&sucursal_id=$sucursal_id");
	}
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("rp_frm_caja.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
