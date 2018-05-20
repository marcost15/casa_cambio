<?php
$_SESSION['mensaje']="";
function paginar($totalpaginas,$rango,$pagina_actual=1){
	$i       = 0;
	$rgo     = $rango;
	$paginas = array();

	do{
		$paginas[] = $i;
		$i+=$rgo;
	}while ( $i < $totalpaginas);

	return $paginas;
}