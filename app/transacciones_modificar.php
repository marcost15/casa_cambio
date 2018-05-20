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

if (!isset($_REQUEST['id'])) ir('transacciones_lista.php');
$f_meta=proc_meta("transacciones");
$id    = $_REQUEST['id'];
$datos = bd_transacciones_datos($id);
$datos['cliente_envia_nombre'] = bd_obt_clientes($datos['cliente_envia_id']);
$datos['cliente_recibe_nombre'] = bd_obt_clientes($datos['cliente_recibe_id']);


$f = new FormHandler('transacciones');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Transacciones');

$f->hiddenField('cliente_envia_id');
$f->textField($f_meta['cliente_envia_id']['etiqueta'], "cliente_envia_nombre",FH_STRING,50,255,"readonly=readonly onClick=\"window.open('ventana_cliente_envia.php','sopa');\"");

$f->hiddenField('cliente_recibe_id');
$f->textField($f_meta['cliente_recibe_id']['etiqueta'], "cliente_recibe_nombre",FH_STRING,50,255,"readonly=readonly onClick=\"window.open('ventana_cliente_recibe.php','sopa');\"");

$f->selectField('Moneda Envia', 'moneda_envia_id', bd_monedas_opciones() );
$f->textField($f_meta['monto_envia']['etiqueta'], 'monto_envia');

$f->selectField('Moneda Recibe', 'moneda_recibe_id', bd_monedas_opciones() );
$f->textField($f_meta['monto_recibe']['etiqueta'], 'monto_recibe');

$f -> setMask($config['mascaras']['m2'],true);
$f->selectField( $f_meta['sucursal_envia_id']['etiqueta'], 'sucursal_envia_id', bd_sucursales_opciones() );
$f->selectField( $f_meta['sucursal_recibe_id']['etiqueta'], 'sucursal_recibe_id', bd_sucursales_opciones() );
$f -> setMask($config['mascaras']['m1'],true);
$f->selectField( $f_meta['estado_id']['etiqueta'], 'estado_id', bd_estados_operaciones_opciones() );


$f->setErrorMessage('cliente_envia_id', $f_meta['cliente_envia_id']['error']);
$f->setErrorMessage('cliente_recibe_id', $f_meta['cliente_recibe_id']['error']);
$f->setErrorMessage('monto_envia', $f_meta['monto_envia']['error']);
$f->setErrorMessage('monto_recibe', $f_meta['monto_recibe']['error']);
$f->setErrorMessage('moneda_recibe_id', $f_meta['moneda_recibe_id']['error']);
$f->setErrorMessage('moneda_envia_id', $f_meta['moneda_envia_id']['error']);
$f->setErrorMessage('sucursal_envia_id', $f_meta['sucursal_envia_id']['error']);
$f->setErrorMessage('sucursal_recibe_id', $f_meta['sucursal_recibe_id']['error']);
$f->setErrorMessage('estado_id', $f_meta['estado_id']['error']);
$f->setErrorMessage('personal_id', $f_meta['personal_id']['error']);

$f->setHelpText('cliente_envia_id', $f_meta['cliente_envia_id']['ayuda']);
$f->setHelpText('cliente_recibe_id', $f_meta['cliente_recibe_id']['ayuda']);
$f->setHelpText('monto_envia', $f_meta['monto_envia']['ayuda']);
$f->setHelpText('monto_recibe', $f_meta['monto_recibe']['ayuda']);
$f->setHelpText('moneda_recibe_id', $f_meta['moneda_recibe_id']['ayuda']);
$f->setHelpText('moneda_envia_id', $f_meta['moneda_envia_id']['ayuda']);
$f->setHelpText('sucursal_envia_id', $f_meta['sucursal_envia_id']['ayuda']);
$f->setHelpText('sucursal_recibe_id', $f_meta['sucursal_recibe_id']['ayuda']);
$f->setHelpText('estado_id', $f_meta['estado_id']['ayuda']);

$f->setValue('cliente_envia_id',$datos['cliente_envia_id']);
$f->setValue('cliente_recibe_id',$datos['cliente_recibe_id']);
$f->setValue('cliente_envia_nombre',$datos['cliente_envia_nombre']);
$f->setValue('cliente_recibe_nombre',$datos['cliente_recibe_nombre']);
$f->setValue('moneda_recibe_id',$datos['moneda_recibe_id']);
$f->setValue('moneda_envia_id',$datos['moneda_envia_id']);
$f->setValue('monto_envia',$datos['monto_envia']);
$f->setValue('monto_recibe',$datos['monto_recibe']);
$f->setValue('sucursal_envia_id',$datos['sucursal_envia_id']);
$f->setValue('sucursal_recibe_id',$datos['sucursal_recibe_id']);
$f->setValue('estado_id',$datos['estado_id']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_transacciones_modificar');

function proc_transacciones_modificar($d)
{
	if ("$d[cliente_envia_id]" == "$d[cliente_recibe_id]")
	{
		$_SESSION['mensaje']="EL CLIENTE QUE ENVIA Y RECIBE SON LOS MISMOS VERIFIQUE...";
		return false;
	}
	else
	{
		if ("$d[sucursal_envia_id]" == "$d[sucursal_recibe_id]")
		{
			$_SESSION['mensaje']="LA SUCURSAL QUE ENVIA Y RECIBE SON LOS MISMOS VERIFIQUE...";
			return false;
		}
		else
		{
			if ("$d[monto_envia]" <= 0)
			{
				$_SESSION['mensaje']="EL MONTO NO PUEDE SER MENOR O IGUAL A 0 VERIFIQUE...";
				return false;
			}
			else
			{
				$d['id'] = $_REQUEST['id'];
				$d['personal_id'] = $_SESSION['usuario']['id'];
				bd_transacciones_modificar($d);
				ir('mensajev.php?mensaje=Elemento Modificado correctamente');
    		}
    	}
    }
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('transacciones_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
