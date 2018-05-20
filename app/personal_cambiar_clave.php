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
//if (bd_verificar_privilegios('personal_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

if (!isset($_REQUEST['id'])) ir('personal_lista.php');
$f_meta=proc_meta("personal");
$id    = $_REQUEST['id'];
$datos = bd_personal_datos($id);


$f = new FormHandler('personal',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Cambiar Clave');
$f->textField( $f_meta['login']['etiqueta'], 'login', FH_STRING, 30, 30 );
$f->passField($f_meta['clave']['etiqueta'], "clave",FH_PASSWORD,15,20);
$f->passField($f_meta['clave']['etiqueta'], "clave_ver",FH_PASSWORD,15,20);
$f->checkPassword("clave","clave_ver");

$f->setErrorMessage('login', $f_meta['login']['error']);
$f->setErrorMessage('clave', $f_meta['clave']['error']);

$f->setHelpText('login', $f_meta['login']['ayuda']);
$f->setHelpText('clave', $f_meta['clave']['ayuda']);

$f->setValue('login',$datos['login']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_personal_agregar');

function proc_personal_agregar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_personal_cambio_clave($d);
	ir('mensajev.php?mensaje=Cambio de clave y/o Login correctamente'); 
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("personal_cambiar_clave.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}