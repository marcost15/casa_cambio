<?php
session_name('casa_cambio');
session_start();
$_SESSION=array();

$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/fh3.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./configs/validacion.php');
include('./modelo/bd_modelo.php');
$lang=parse_ini_file('./configs/lang/index.inc',false);

$f = new FormHandler('login',NULL,'role="form" style="width:400px; margin:0 auto;"');

$f->useTable( false );
$f->setMask($config['mascaras']['m1'],true);

$f->borderStart($lang['tit']);
$f->textField($lang['lgn'],'id',FH_STRING);
$f->passField($lang['clv'],'clave',FH_STRING);
$f->submitButton($lang['cnt'],'botonSubmit');
$f->borderStop();
$f->setFocus('id');
$f->onCorrect('proc_login');

function proc_login($d){
  if($res=bd_verifica_login($d))
	{
		session_start();
		$_SESSION['usuario']=$res;
 		ir('menu.php');
	}
	else
	{
		ir('negacion_usuario.php');
	}
}

$mensaje=isset($_REQUEST['mensaje'])?$_REQUEST['mensaje']:$lang['msj'];

$smarty->assign('mensaje',$mensaje);

$smarty->assign('cabecera','');
$smarty->assign('pie','');
$smarty->assign('f',$f->flush(true));
$smarty->display('index.html');
if ($config['debug']['debug']=='SI') {echo __FILE__;}
