<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();


include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./modelo/bd_modelo.php');

if(!isset($_SESSION['usuario'])){
    ir('index.php');
}

$archivo='./respaldobd/'. date("YmdHis").'.sql';
exec("mysqldump -u{$config['bd']['login']} -p{$config['bd']['clave']} {$config['bd']['bd']} >{$archivo} ");
ir('sqlguardar.php')
;