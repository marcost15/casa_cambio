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
//if (bd_verificar_privilegios('clientes_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$adjunto = array(
  "path"        => './upload/clientes',
  "type" 	=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);

$f_meta=proc_meta("clientes");

$f = new FormHandler('clientes',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Clientes');

$f->textField( $f_meta['dni']['etiqueta'], 'dni', FH_STRING, 20, 20 );
$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 50, 255 );
$f->textField( $f_meta['apellido']['etiqueta'], 'apellido', FH_STRING, 50, 255 );
$f->textField( $f_meta['direccion']['etiqueta'], 'direccion', FH_STRING, 50, 255 );
$f->selectField( $f_meta['pais_id']['etiqueta'], 'pais_id', bd_paises_opciones() );
#$f->radioButton( $f_meta['pais_id']['etiqueta'], 'pais_id', bd__opciones() );
$f->textField( $f_meta['tlf']['etiqueta'], 'tlf', FH_STRING, 20, 20 );
$f->textField( $f_meta['tlf2']['etiqueta'], 'tlf2', _FH_STRING, 20, 20 );
$f->textField( $f_meta['correo']['etiqueta'], 'correo', FH_EMAIL, 50, 255 );
$f->uploadField($f_meta['adjunto']['etiqueta'], 'adjunto', $adjunto);

$f->setErrorMessage('dni', $f_meta['dni']['error']);
$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('apellido', $f_meta['apellido']['error']);
$f->setErrorMessage('direccion', $f_meta['direccion']['error']);
$f->setErrorMessage('pais_id', $f_meta['pais_id']['error']);
$f->setErrorMessage('tlf', $f_meta['tlf']['error']);
$f->setErrorMessage('tlf2', $f_meta['tlf2']['error']);
$f->setErrorMessage('correo', $f_meta['correo']['error']);
$f->setErrorMessage('adjunto', $f_meta['adjunto']['error']);

$f->setHelpText('dni', $f_meta['dni']['ayuda']);
$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('apellido', $f_meta['apellido']['ayuda']);
$f->setHelpText('direccion', $f_meta['direccion']['ayuda']);
$f->setHelpText('pais_id', $f_meta['pais_id']['ayuda']);
$f->setHelpText('tlf', $f_meta['tlf']['ayuda']);
$f->setHelpText('tlf2', $f_meta['tlf2']['ayuda']);
$f->setHelpText('correo', $f_meta['correo']['ayuda']);
$f->setHelpText('adjunto', $f_meta['adjunto']['ayuda']);


#$f->setValue('dni', '');
#$f->setValue('nombre', '');
#$f->setValue('apellido', '');
#$f->setValue('direccion', '');
#$f->setValue('pais_id', '');
#$f->setValue('tlf', '');
#$f->setValue('tlf2', '');
#$f->setValue('correo', '');
#$f->setValue('adjunto', '');


$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_clientes_agregar');

function proc_clientes_agregar($d)
{
	$dni=$d['dni'];
	$n=sql2value("SELECT COUNT(*) FROM clientes WHERE dni LIKE '$dni'");
	if ($n==0)
	{  
    	bd_clientes_agregar($d);
    	ir('mensajev.php?mensaje=Elemento Agregado correctamente');
    }
    else
    {
    	$_SESSION['mensaje']="EL CLIENTE YA EXISTE VERIFIQUE...";
		return false;
    }
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("clientes_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
