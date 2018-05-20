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
/*if (bd_verificar_privilegios('estados_operaciones_agregar.html.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/

if (!isset($_REQUEST['id'])) ir('estados_operaciones_lista.php');
$f_meta=proc_meta("estados_operaciones");
$id    = $_REQUEST['id'];
$datos = bd_estados_operaciones_datos($id);

$f = new FormHandler('estados_operaciones');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Estados de Transacciones');

$f->textField( 'Nombre', 'nombre', FH_STRING, 50, 255 );
$f->textField( 'Descripcion', 'descripcion', FH_STRING, 50, 255 );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('descripcion', $f_meta['descripcion']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('descripcion', $f_meta['descripcion']['ayuda']);

$f->setValue('nombre',$datos['nombre']);
$f->setValue('descripcion',$datos['descripcion']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_estados_operaciones_modificar');

function proc_estados_operaciones_modificar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_estados_operaciones_modificar($d);
	ir('mensajev.php?mensaje=Elemento Modificado correctamente');
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('estados_operaciones_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
