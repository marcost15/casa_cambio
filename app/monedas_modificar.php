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
/*if (bd_verificar_privilegios('monedas_agregar.html.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/

if (!isset($_REQUEST['id'])) ir('monedas_lista.php');

$f_meta=proc_meta("monedas");

$id    = $_REQUEST['id'];
$datos = bd_monedas_datos($id);

$f = new FormHandler('monedas');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Monedas');

$f->textField( 'Nombre', 'nombre', FH_STRING, 50, 255 );
$f->textField( 'Abreviacion', 'abreviacion', FH_STRING, 50, 255 );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('abreviacion', $f_meta['abreviacion']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('abreviacion', $f_meta['abreviacion']['ayuda']);

$f->setValue('nombre',$datos['nombre']);
$f->setValue('abreviacion',$datos['abreviacion']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_monedas_modificar');

function proc_monedas_modificar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_monedas_modificar($d);
	ir('mensajev.php?mensaje=Elemento Modificado Correctamente');
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('monedas_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
