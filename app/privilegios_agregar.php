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
//if (bd_verificar_privilegios('privilegios_agregar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//	ir('negacion_usuario.php');
//}

$f_meta=proc_meta("privilegios");

$tabla=bd_obt_privilegios();
$paginas=array();

foreach($tabla as $p)
{
	$paginas[ $p['pagina'] ] [ $p['nivel_id'] ] = $p['acceso'];
	
}
$tabla=$paginas;
$paginas=array();
foreach($tabla as $p=>$priv)
{
	for($i=1;$i<=$nniveles;$i++)
	{
		$privo[$i-1]=($priv[$i]=='CONCEDER')?'CONCEDER':'DENEGAR';	
	}
	
	$paginas[]=array('pagina'=>$p,'priv'=>$privo);
}


$archivos=array();
$d = dir(".");
while (false !== ($entrada = $d->read())) {
  $entrada2=explode('.',$entrada);
	if($entrada2[1]=='php')
	{
		$archivo=join('.',$entrada2);
		$archivos[$archivo]=$archivo;
	}
}
$d->close();
asort($archivos);  

$acceso=array(
'CONCEDER' => 'Conceder el acceso',
'DENEGAR'  => 'Denegar el acceso'
);


$f = new FormHandler('privilegios',NULL,'role="form"');
$f -> useTable( false );
$f -> setMask($config['mascaras']['m1'],true);
$f -> borderStart('Privilegios');

$f->ListField( $f_meta['pagina']['etiqueta'], "pagina", $archivos,'',true,'SELECCIONADOS','DISPONIBLE',5);
$f->radioButton($f_meta['nivel_id']['etiqueta'],'nivel_id',bd_lista_niveles(),FH_NOT_EMPTY,true);
$f->selectField($f_meta['acceso']['etiqueta'],'acceso',$acceso,FH_NOT_EMPTY,true);

$f->setErrorMessage('pagina', $f_meta['pagina']['error']);
$f->setErrorMessage('nivel_id', $f_meta['nivel_id']['error']);
$f->setErrorMessage('acceso', $f_meta['acceso']['error']);

$f->setHelpText('pagina', $f_meta['pagina']['ayuda']);
$f->setHelpText('nivel_id', $f_meta['nivel_id']['ayuda']);
$f->setHelpText('acceso', $f_meta['acceso']['ayuda']);

$f->submitButton('Aplicar el cambio','botonSubmit');
$f -> borderStop();
$f -> onCorrect('proc_privilegios_agregar');


function proc_privilegios_agregar($d)
{
    bd_cambiar_privilegios($d);
    ir('mensajev.php?mensaje=Privilegios Agregados correctamente');
}

$smarty -> assign('cabecera','');
$smarty -> assign('pie','');
$smarty -> assign('f',$f -> flush(true));
$smarty -> display("privilegios_agregar.html");
unset($_SESSION['mensaje']);
if ($config['debug']['debug']=='SI') {echo __FILE__;}
