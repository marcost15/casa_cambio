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
/*if (bd_verificar_privilegios('{$tabla}_agregar.html.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/

if (!isset($_REQUEST['id'])) ir('niveles_lista.php');
$f_meta=proc_meta("niveles");
$id    = $_REQUEST['id'];
$datos = bd_niveles_datos($id);

$f = new FormHandler('niveles');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Niveles');

$f->textField( 'Nombre', 'nombre', FH_STRING, 50, 255 );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);

$f->setValue('nombre',$datos['nombre']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_niveles_modificar');

function proc_niveles_modificar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_niveles_modificar($d);
	ir('mensajev.php?mensaje=Elemento Modificado correctamente');
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('niveles_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
