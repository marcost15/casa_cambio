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

$foto = array(
  "path"        => './upload/personal',
  "type" 	=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);

$f_meta=proc_meta("personal");

$f = new FormHandler('personal',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Personal');

$f->textField( $f_meta['dni']['etiqueta'], 'dni', FH_STRING, 35, 35 );
$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 35, 35 );
$f->textField( $f_meta['apellido']['etiqueta'], 'apellido', FH_STRING, 35, 35 );
$f->textField( $f_meta['login']['etiqueta'], 'login', FH_STRING, 30, 30 );
$f->passField($f_meta['clave']['etiqueta'], "clave",FH_PASSWORD,15,20);
$f->passField($f_meta['clave']['etiqueta'], "clave_ver",FH_PASSWORD,15,20);
$f->checkPassword("clave","clave_ver");
$f->selectField( $f_meta['nivel_id']['etiqueta'], 'nivel_id', bd_niveles_opciones() );
$f->selectField( $f_meta['sucursal_id']['etiqueta'], 'sucursal_id', bd_sucursales_opciones() );
$f->selectField( $f_meta['estado']['etiqueta'], 'estado', array('ACTIVO','INACTIVO'), FH_STRING, false );

$f->textField( $f_meta['direccion']['etiqueta'], 'direccion', FH_STRING, 50, 255 );
$f->textField( $f_meta['tlf_fijo']['etiqueta'], 'tlf_fijo', _FH_STRING, 20, 255 );
$f->textField( $f_meta['tlf_movil']['etiqueta'], 'tlf_movil', _FH_STRING, 20, 255 );
$f->textField( $f_meta['correo']['etiqueta'], 'correo', _FH_EMAIL, 50, 50 );
$f->uploadField($f_meta['foto']['etiqueta'], 'foto', $foto);

$f->setErrorMessage('dni', $f_meta['dni']['error']);
$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('apellido', $f_meta['apellido']['error']);
$f->setErrorMessage('login', $f_meta['login']['error']);
$f->setErrorMessage('clave', $f_meta['clave']['error']);
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
$f->setHelpText('login', $f_meta['login']['ayuda']);
$f->setHelpText('clave', $f_meta['clave']['ayuda']);
$f->setHelpText('nivel_id', $f_meta['nivel_id']['ayuda']);
$f->setHelpText('sucursal_id', $f_meta['sucursal_id']['ayuda']);
$f->setHelpText('estado', $f_meta['estado']['ayuda']);

$f->setHelpText('direccion', $f_meta['direccion']['ayuda']);
$f->setHelpText('tlf_fijo', $f_meta['tlf_fijo']['ayuda']);
$f->setHelpText('tlf_movil', $f_meta['tlf_movil']['ayuda']);
$f->setHelpText('correo', $f_meta['correo']['ayuda']);
$f->setHelpText('foto', $f_meta['foto']['ayuda']);

#$f->setValue('dni', '');
#$f->setValue('nombre', '');
#$f->setValue('apellido', '');
#$f->setValue('login', '');
#$f->setValue('clave', '');
#$f->setValue('nivel_id', '');
#$f->setValue('sucursal_id', '');
#$f->setValue('estado', '');

#$f->setValue('personal_id', '');
#$f->setValue('direccion', '');
#$f->setValue('tlf_fijo', '');
#$f->setValue('tlf_movil', '');
#$f->setValue('correo', '');
#$f->setValue('foto', '');

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_personal_agregar');

function proc_personal_agregar($d)
{
	$dni=$d['dni'];
	$n=sql2value("SELECT COUNT(*) FROM personal WHERE dni LIKE '$dni'");
	if ($n==0)
	{
		$login=$d['login'];
		$n=sql2value("SELECT COUNT(*) FROM personal WHERE login LIKE '$login'");
		if ($n==0)
		{
			bd_personal_agregar($d);
			bd_personal_datos_agregar($d);
    		ir('mensajev.php?mensaje=Elemento Agregado correctamente');	
		}
		else
		{
			$_SESSION['mensaje']="EL LOGIN YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
			return false;
		}
	}
	else
	{
		$_SESSION['mensaje']="EL DNI YA EXISTE, POR FAVOR INTRODUZCA UNA NUEVA";
		return false;
	}
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("personal_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
