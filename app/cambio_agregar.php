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
//if (bd_verificar_privilegios('cambio_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$f_meta=proc_meta("cambio");

$f = new FormHandler('cambio',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);


$f -> borderStart('Cambio');
$f->textField( $f_meta['nombre']['etiqueta'], 'nombre', FH_STRING, 50, 255 );
$f->selectField( $f_meta['moneda1_id']['etiqueta'], 'moneda1_id', bd_monedas_opciones() );
#$f->radioButton( $f_meta['moneda1_id']['etiqueta'], 'moneda1_id', bd__opciones() );
$f->textField($f_meta['valor_moneda1']['etiqueta'], 'valor_moneda1');
$f->selectField( $f_meta['moneda2_id']['etiqueta'], 'moneda2_id', bd_monedas_opciones() );
#$f->radioButton( $f_meta['moneda2_id']['etiqueta'], 'moneda2_id', bd__opciones() );
$f->textField($f_meta['valor_moneda2']['etiqueta'], 'valor_moneda2');
$f->selectField( $f_meta['operacion']['etiqueta'], 'operacion', array('MULTIPLICAR','DIVIDIR'), FH_STRING, false );

$f->setErrorMessage('nombre', $f_meta['nombre']['error']);
$f->setErrorMessage('moneda1_id', $f_meta['moneda1_id']['error']);
$f->setErrorMessage('valor_moneda1', $f_meta['valor_moneda1']['error']);
$f->setErrorMessage('moneda2_id', $f_meta['moneda2_id']['error']);
$f->setErrorMessage('valor_moneda2', $f_meta['valor_moneda2']['error']);
$f->setErrorMessage('operacion', $f_meta['operacion']['error']);

$f->setHelpText('nombre', $f_meta['nombre']['ayuda']);
$f->setHelpText('moneda1_id', $f_meta['moneda1_id']['ayuda']);
$f->setHelpText('valor_moneda1', $f_meta['valor_moneda1']['ayuda']);
$f->setHelpText('moneda2_id', $f_meta['moneda2_id']['ayuda']);
$f->setHelpText('valor_moneda2', $f_meta['valor_moneda2']['ayuda']);
$f->setHelpText('operacion', $f_meta['operacion']['ayuda']);

#$f->setValue('nombre', '');
#$f->setValue('moneda1_id', '');
#$f->setValue('valor_moneda1', '');
#$f->setValue('moneda2_id', '');
#$f->setValue('valor_moneda2', '');
#$f->setValue('operacion', '');

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_cambio_agregar');

function proc_cambio_agregar($d)
{
	if ("$d[moneda1_id]" == "$d[moneda2_id]")
	{
		$_SESSION['mensaje']="LAS DOS MONEDAS NO PUEDEN SER IGUALES VERIFIQUE...";
		return false;
	}
	else
	{
		$moneda1_id=$d['moneda1_id'];
		$moneda2_id=$d['moneda2_id'];
		$n=sql2value("SELECT COUNT(*) FROM cambio WHERE moneda1_id LIKE '$moneda1_id' AND moneda2_id  LIKE '$moneda2_id'");
		if ($n==0)
		{   
   			bd_cambio_agregar($d);
    		ir('mensajev.php?mensaje=Elemento Agregado correctamente');
    	}
    	else
    	{
    		$_SESSION['mensaje']="EL CAMBIO YA EXISTE VERIFIQUE...";
			return false;
    	}
    }
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("cambio_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
