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
//if (bd_verificar_privilegios('paises_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$f_meta=proc_meta("paises");

$f = new FormHandler('paises',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Paises');

$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 50, 255 );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);

#$f->setValue('nombre', '');
#$f->setValue('creado', '');
#$f->setValue('modificado', '');

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_paises_agregar');

function proc_paises_agregar($d)
{
    bd_paises_agregar($d);
    ir('mensajev.php?mensaje=Elemento Agregado correctamente');
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("paises_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
