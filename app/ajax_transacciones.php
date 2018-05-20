<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./modelo/bd_modelo.php');

$texto = $_REQUEST['term'];

$results_array=bd_transacciones_datos_ajax($texto,20);


$json=json_encode( $results_array );

header('Content-Type: application/json');
echo $json;
exit
;