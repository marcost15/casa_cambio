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
/*
if (bd_verificar_privilegios('{$tabla}_agregar.html.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/

if (!isset($_REQUEST['id'])) ir('privilegios_lista.php');

$f_meta=proc_meta("privilegios");

$acceso=array(
'CONCEDER' => 'Conceder el acceso',
'DENEGAR'  => 'Denegar el acceso'
);


$id    = $_REQUEST['id'];
$datos = bd_privilegios_datos($id);

$f = new FormHandler('privilegios');
$f -> useTable( False );
$f -> setMask($config['mascaras']['m1'],true);

$f -> borderStart('Privilegios');

$f->textField($f_meta['pagina']['etiqueta'], 'pagina',FH_STRING,50,255,"readonly=readonly);\"");
$f->radioButton($f_meta['nivel_id']['etiqueta'],'nivel_id',bd_lista_niveles(),FH_NOT_EMPTY,true);
$f->selectField($f_meta['acceso']['etiqueta'],'acceso',$acceso,FH_NOT_EMPTY,true);

$f->setErrorMessage('pagina', $f_meta['pagina']['error']);
$f->setErrorMessage('nivel_id', $f_meta['nivel_id']['error']);
$f->setErrorMessage('acceso', $f_meta['acceso']['error']);

$f->setHelpText('pagina', $f_meta['pagina']['ayuda']);
$f->setHelpText('nivel_id', $f_meta['nivel_id']['ayuda']);
$f->setHelpText('acceso', $f_meta['acceso']['ayuda']);

$f->setValue('pagina',$datos['pagina']);
$f->setValue('nivel_id',$datos['nivel_id']);
$f->setValue('acceso',$datos['acceso']);

$f -> submitButton('Continuar','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_privilegios_modificar');

function proc_privilegios_modificar($d)
{
	$pag1 = $d['pagina'];
	$d['pagina']=array();
	$d['pagina'][0] = $pag1;
	bd_cambiar_privilegios($d);
	ir('mensajev.php?mensaje=Elemento Modificado correctamente'); 
}

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('f',$f->flush(true));
$smarty->display('privilegios_modificar.html');
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
