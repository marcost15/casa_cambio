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
/*if (bd_verificar_privilegios('personal_modificar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/
$foto = array(
  "path"        => './upload/personal',
  "type" 	=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);

if (!isset($_REQUEST['id'])) ir('personal_lista.php');
$f_meta=proc_meta("personal");

$id    = $_REQUEST['id'];
$datos = bd_personal_datos($id);
$datos2 = bd_personal_datos_datos($id);

$f = new FormHandler('personal');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Personal');

$f->textField( $f_meta['dni']['etiqueta'], 'dni', FH_STRING, 35, 35 );
$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 35, 35 );
$f->textField( $f_meta['apellido']['etiqueta'], 'apellido', FH_STRING, 35, 35 );
$f->selectField( $f_meta['nivel_id']['etiqueta'], 'nivel_id', bd_niveles_opciones() );
$f->selectField( $f_meta['sucursal_id']['etiqueta'], 'sucursal_id', bd_sucursales_opciones() );
$f->selectField( $f_meta['estado']['etiqueta'], 'estado', array('ACTIVO','INACTIVO'), FH_STRING, false );

$f->textField( $f_meta['direccion']['etiqueta'], 'direccion', FH_STRING, 50, 255 );
$f->textField( $f_meta['tlf_fijo']['etiqueta'], 'tlf_fijo', _FH_STRING, 20, 20 );
$f->textField( $f_meta['tlf_movil']['etiqueta'], 'tlf_movil', _FH_STRING, 20, 20 );
$f->textField( $f_meta['correo']['etiqueta'], 'correo', _FH_EMAIL, 50, 50 );
$f->uploadField($f_meta['foto']['etiqueta'], 'foto', $foto);

$f->setErrorMessage('dni', $f_meta['dni']['error']);
$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('apellido', $f_meta['apellido']['error']);
$f->setErrorMessage('nivel_id', $f_meta['nivel_id']['error']);
$f->setErrorMessage('sucursal_id', $f_meta['sucursal_id']['error']);
$f->setErrorMessage('estado', $f_meta['estado']['error']);

$f->setErrorMessage('direccion', $f_meta['direccion']['error']);
$f->setErrorMessage('tlf_fijo', $f_meta['tlf_fijo']['error']);
$f->setErrorMessage('tlf_movil', $f_meta['tlf_movil']['error']);
$f->setErrorMessage('correo', $f_meta['correo']['error']);
$f->setErrorMessage('foto', $f_meta['foto']['error']);

$f->setHelpText('dni', $f_meta['dni']['ayuda']);
$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('apellido', $f_meta['apellido']['ayuda']);
$f->setHelpText('nivel_id', $f_meta['nivel_id']['ayuda']);
$f->setHelpText('sucursal_id', $f_meta['sucursal_id']['ayuda']);
$f->setHelpText('estado', $f_meta['estado']['ayuda']);

$f->setHelpText('direccion', $f_meta['direccion']['ayuda']);
$f->setHelpText('tlf_fijo', $f_meta['tlf_fijo']['ayuda']);
$f->setHelpText('tlf_movil', $f_meta['tlf_movil']['ayuda']);
$f->setHelpText('correo', $f_meta['correo']['ayuda']);
$f->setHelpText('foto', $f_meta['foto']['ayuda']);

$f->setValue('dni',$datos['dni']);
$f->setValue('nombre',$datos['nombre']);
$f->setValue('apellido',$datos['apellido']);
$f->setValue('nivel_id',$datos['nivel_id']);
$f->setValue('sucursal_id',$datos['sucursal_id']);
$f->setValue('estado',$datos['estado']);

$f->setValue('direccion',$datos2['direccion']);
$f->setValue('tlf_fijo',$datos2['tlf_fijo']);
$f->setValue('tlf_movil',$datos2['tlf_movil']);
$f->setValue('correo',$datos2['correo']);
$f->setValue('foto',$datos2['foto']);


$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_personal_modificar');

function proc_personal_modificar($d)
{
	$d['id'] = $_REQUEST['id'];
	bd_personal_modificar($d);
	bd_personal_datos_modificar($d);
	ir('mensajev.php?mensaje=Elemento Modificado correctamente'); 
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('personal_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
