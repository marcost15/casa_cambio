<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name("{$config['bd']['bd']}");
session_start();

include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./modelo/bd_modelo.php');


if(!isset($_SESSION['usuario'])){
    ir('index.php');
}

$archivo=$_REQUEST['a'];

unlink("./respaldobd/{$archivo}");
ir('sqlguardar.php')
;