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
//if (bd_verificar_privilegios('sucursales_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$f_meta=proc_meta("sucursales");

$f = new FormHandler('sucursales',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Sucursales');

$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 50, 255 );
$f->textField( $f_meta['direccion']['etiqueta'], 'direccion', FH_STRING, 50, 255 );
$f->textField( $f_meta['tlf']['etiqueta'], 'tlf', FH_STRING, 20, 20 );
$f->textField( $f_meta['tlf2']['etiqueta'], 'tlf2', _FH_STRING, 20, 20 );
$f->selectField( $f_meta['pais_id']['etiqueta'], 'pais_id', bd_paises_opciones() );
#$f->radioButton( $f_meta['pais_id']['etiqueta'], 'pais_id', bd_paises_opciones() );
$f->textField( $f_meta['persona_contacto']['etiqueta'], 'persona_contacto', FH_STRING, 50, 255 );

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

#$f->setValue('nombre', '');
#$f->setValue('direccion', '');
#$f->setValue('tlf', '');
#$f->setValue('tlf2', '');
#$f->setValue('pais_id', '');
#$f->setValue('persona_contacto', '');

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_sucursales_agregar');

function proc_sucursales_agregar($d)
{

    bd_sucursales_agregar($d);
    ir('mensajev.php?mensaje=Elemento Agregado correctamente');
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("sucursales_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
