<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name("{$config['bd']['bd']}");
session_start();

include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/fh3.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./configs/validacion.php');
include('./modelo/bd_modelo.php');

if(!isset($_SESSION['usuario'])){
    ir('index.php');
}

$archivos=array();
$tams=array();

$datos = dir("./respaldobd");
while (false !== ($entry = $datos->read())) {
    $archi=pathinfo($entry);
    if ($archi['extension']=='sql'){
        $archi['a']=substr($archi['filename'],0,4);
        $archi['mes']=substr($archi['filename'],4,2);
        $archi['d']=substr($archi['filename'],6,2);
        $archi['h']=substr($archi['filename'],8,2);
        $archi['m']=substr($archi['filename'],10,2);
        $archi['s']=substr($archi['filename'],12,2);
        $archivos[$archi['filename']]=$archi;
	$tams[$archi['filename']]=strlen(file_get_contents('./respaldobd/'.$archi['basename']));
    }
}
krsort($archivos);
krsort($tams);
$aa=array();
$bb=array();

$n_datos=count($archivos);

if( isset( $_REQUEST['pag'] ) ){
    $pagina_actual = $_REQUEST['pag'];
    $i = $_REQUEST['i'];
} else {
    $pagina_actual = 1;
    $i = 0;
}

$paginas=paginar($n_datos,$config['paginacion']['num_items'],$pagina_actual);

foreach($archivos as $miarch){
    $aa[]=$miarch;
}
foreach($tams as $miarch){
    $bb[]=$miarch;
}

$datos->close();

$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';

$smarty->assign('mensaje',$m);
$smarty->assign('a',$aa);
$smarty->assign('b',$bb);
$smarty->assign('paginas',$paginas);
$smarty->assign('pagina_actual',$pagina_actual);
$smarty->assign('n_paginas',count($paginas) );
$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->display('sqlguardar.html');
if ($config['debug']['debug']=='SI') {echo __FILE__;}
