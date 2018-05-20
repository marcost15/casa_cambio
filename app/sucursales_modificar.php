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

if (!isset($_REQUEST['id'])) ir('sucursales_lista.php');

$f_meta=proc_meta("sucursales");

$id    = $_REQUEST['id'];
$datos = bd_sucursales_datos($id);

$f = new FormHandler('sucursales');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Sucursales');

$f->textField( 'Nombre', 'nombre', FH_STRING, 50, 255 );
$f->textField( 'Direccion', 'direccion', FH_STRING, 50, 255 );
$f->textField( 'Tlf', 'tlf', FH_STRING, 20, 20 );
$f->textField( 'Tlf2', 'tlf2', _FH_STRING, 20, 20 );
$f->selectField('Pais_id','pais_id',bd_paises_opciones() );
$f->textField( 'Persona_contacto', 'persona_contacto', FH_STRING, 50, 255 );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('direccion', $f_meta['direccion']['error']);
$f->setErrorMessage('tlf', $f_meta['tlf']['error']);
$f->setErrorMessage('tlf2', $f_meta['tlf2']['error']);
$f->setErrorMessage('pais_id', $f_meta['pais_id']['error']);
$f->setErrorMessage('persona_contacto', $f_meta['persona_contacto']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('direccion', $f_meta['direccion']['ayuda']);
$f->setHelpText('tlf', $f_meta['tlf']['ayuda']);
$f->setHelpText('tlf2', $f_meta['tlf2']['ayuda']);
$f->setHelpText('pais_id', $f_meta['pais_id']['ayuda']);
$f->setHelpText('persona_contacto', $f_meta['persona_contacto']['ayuda']);

$f->setValue('nombre',$datos['nombre']);
$f->setValue('direccion',$datos['direccion']);
$f->setValue('tlf',$datos['tlf']);
$f->setValue('tlf2',$datos['tlf2']);
$f->setValue('pais_id',$datos['pais_id']);
$f->setValue('persona_contacto',$datos['persona_contacto']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_sucursales_modificar');

function proc_sucursales_modificar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_sucursales_modificar($d);
	ir('mensajev.php?mensaje=Elemento Modificado correctamente');
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('sucursales_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
