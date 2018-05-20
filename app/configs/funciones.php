<?php

date_default_timezone_set('America/Caracas');
function bs2cts($monto)
{
    return round($monto*100,0);
}

function cts2bs($monto)
{
    return round($monto/100,2);
}

function myValidator2( $value ) {
	$permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ/-_;.@ ";
		for ($i=0; $i<strlen($value); $i++){ 
		if (strpos($permitidos, substr($value,$i,1))===false){
			return "No ingreso un valor correcto para este campo!";
		} 
	}
	
if( strLen( $value ) == 0) {
	return "No ingreso Datos a este campo!";
} else {
	return true;
}
}

function dinero($string){
   $sep='.';
   $partes=explode('.',$string);

   //Trabajando la parte decimal
   if(count($partes)==1){
      $partes[1]='00';
   }
   if(strlen($partes[1])<2){
      $partes[1]=substr(trim($partes[1].'00'),0,2);
   }
   //trabajando la parte entera

   $s1=strrev($partes[0]);
   $s2='';
   while(strlen($s1)>3){
      $s3=substr($s1,0,3);
      $s2.=$s3.$sep;
      $s1=substr($s1,3);
   }
   $partes[0]=strrev($s2.$s1);
   $string2=join(',',$partes);
   return ($string2);
}

function fecha_larga($fecha){
   $f=explode('-',$fecha);
   $meses=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo',
   '04'=>'Abril','05'=>'Mayo','06'=>'Junio',
   '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre',
   '10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
   return $f[2].' de '.$meses[$f[1]].' de '.$f[0];
}

function validafecha($fecha)//Cambio en la validacion por marcos
{
	if ($fecha == NULL)
	{
		return 'Ingrese Fecha';
	}
	else
	{
		$fecha=explode('-',$fecha);
		$d = count($fecha);
		if ($d == 3)
		{
			$hoy=date('Y-m-d');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100+$hoy[2];
			$fecha=$fecha[2]*10000+$fecha[1]*100+$fecha[0];			
		}
		else
		{
			$hoy=date('Y-m');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100;
			$fecha=$fecha[1]*10000+$fecha[0]*100;
		}	
		if ($hoy<$fecha)
		{
			return 'Revise la fecha';
		}
		return true;
	}
}
function _validafecha($fecha)
{
	if ($fecha == NULL)
	{
		return true;
	}
	else
	{
		$fecha=explode('-',$fecha);
		$d = count($fecha);
		if ($d <> 2)
		{
			$hoy=date('Y-m-d');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100+$hoy[2];
			$fecha=$fecha[2]*10000+$fecha[1]*100+$fecha[0];			
		}
		else
		{
			$hoy=date('Y-m');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100;
			$fecha=$fecha[1]*10000+$fecha[0]*100;
		}	
		if ($hoy<$fecha)
		{
			return 'Revise la fecha';
		}
		return true;
	}
} //Cambio en la validacion por marcos

function comparafecha($fechad,$fechah) 
{
	$fechad=explode('-',$fechad);
	$fechah=explode('-',$fechah);
	$desde = count($fechad);
	$hasta = count($fechah);
	if ($desde AND $hasta === 3)
	{
		$fechad=$fechad[2]*10000+$fechad[1]*100+$fechad[0];
		$fechah=$fechah[2]*10000+$fechah[1]*100+$fechah[0];
		if ($fechad > $fechah)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function funcion_ip() 
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	return $_SERVER['HTTP_CLIENT_IP'];
	
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	return $_SERVER['HTTP_X_FORWARDED_FOR'];
	
	return $_SERVER['REMOTE_ADDR'];
}

function sesion(){
   if (!$_SESSION['nombre']){
      echo "
<html>
<head></head>
<body>
<div style=\"\">
Lo siento. No est&#225;s autorizado para ingresar aqu&#237;
<a href=\"login.php\">Continuar</a>
</div>
</body>
</html>
      ";
      return false;
   }else{
      return true;
   }
}

function validafechareversa($fecha)//Cambio en la validacion por marcos
{
	if ($fecha == NULL)
	{
		return 'Ingrese Fecha';
	}
	else
	{
		$fecha=explode('-',$fecha);
		$d = count($fecha);
		if ($d == 3)
		{
			$hoy=date('Y-m-d');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100+$hoy[2];
			$fecha=$fecha[2]*10000+$fecha[1]*100+$fecha[0];			
		}
		else
		{
			$hoy=date('Y-m');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100;
			$fecha=$fecha[1]*10000+$fecha[0]*100;
		}	
		if ($hoy>$fecha)
		{
			return 'Revise la fecha';
		}
		return true;
	}
}
function _validafechareversa($fecha)
{
	if ($fecha == NULL)
	{
		return true;
	}
	else
	{
		$fecha=explode('-',$fecha);
		$d = count($fecha);
		if ($d <> 2)
		{
			$hoy=date('Y-m-d');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100+$hoy[2];
			$fecha=$fecha[2]*10000+$fecha[1]*100+$fecha[0];			
		}
		else
		{
			$hoy=date('Y-m');
			$hoy=explode('-',$hoy);
			$hoy=$hoy[0]*10000+$hoy[1]*100;
			$fecha=$fecha[1]*10000+$fecha[0]*100;
		}	
		if ($hoy>$fecha)
		{
			return 'Revise la fecha';
		}
		return true;
	}
}
function tiempo_transcurrido($fecha_nacimiento, $fecha_control) 
{ 
   $fecha_actual = $fecha_control; 
    
   if(!strlen($fecha_actual)) 
   { 
      $fecha_actual = date('d/m/Y'); 
   } 
   // separamos en partes las fechas  
   $array_nacimiento = explode ( "-", $fecha_nacimiento );  
   $array_actual = explode ( "-", $fecha_actual );  
 
   $anos =  $array_actual[2] - $array_nacimiento[2]; // calculamos años  
   $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses  
   $dias =  $array_actual[0] - $array_nacimiento[0]; // calculamos días  
 
   //ajuste de posible negativo en $días  
   if ($dias < 0)  
   {  
      --$meses;  
 
      //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual  
      switch ($array_actual[1]) {  
         case 1:  
            $dias_mes_anterior=31; 
            break;  
         case 2:      
            $dias_mes_anterior=31; 
            break;  
         case 3:   
            if (bisiesto($array_actual[2]))  
            {  
               $dias_mes_anterior=29; 
               break;  
            }  
            else  
            {  
               $dias_mes_anterior=28; 
               break;  
            }  
         case 4: 
            $dias_mes_anterior=31; 
            break;  
         case 5: 
            $dias_mes_anterior=30; 
            break;  
         case 6: 
            $dias_mes_anterior=31; 
            break;  
         case 7: 
            $dias_mes_anterior=30; 
            break;  
         case 8: 
            $dias_mes_anterior=31; 
            break;  
         case 9: 
            $dias_mes_anterior=31; 
            break;  
         case 10: 
            $dias_mes_anterior=30; 
            break;  
         case 11: 
            $dias_mes_anterior=31; 
            break;  
         case 12: 
            $dias_mes_anterior=30; 
            break;  
      }  
      $dias=$dias + $dias_mes_anterior; 
 
      if ($dias < 0) 
      { 
         --$meses; 
         if($dias == -1) 
         { 
            $dias = 30; 
         } 
         if($dias == -2) 
         { 
            $dias = 29; 
         } 
      } 
   } 
   //ajuste de posible negativo en $meses  
   if ($meses < 0)  
   {  
      --$anos;  
      $meses=$meses + 12;  
   } 
   $tiempo[0] = $anos; 
   $tiempo[1] = $meses; 
   $tiempo[2] = $dias; 
 
   return $tiempo; 
} 
function bisiesto($anio_actual){  
   $bisiesto=false;  
   //probamos si el mes de febrero del año actual tiene 29 días  
     if (checkdate(2,29,$anio_actual))  
     {  
      $bisiesto=true;  
   }  
   return $bisiesto;  
}

// Calcula la edad (formato: año/mes/dia)
function edad($edad){
list($anio,$mes,$dia) = explode("-",$edad);
$anio_dif = date("Y") - $anio;
$mes_dif = date("m") - $mes;
$dia_dif = date("d") - $dia;
if ($dia_dif < 0 || $mes_dif < 0)
	$anio_dif--;
return $anio_dif;
}

function proc_meta($tabla) {
	$d      = parse_ini_file('./configs/campos.inc', true);
	$d      = $d[$tabla];
	$salida = array();
	foreach ($d['campo'] as $id => $campo) {
		$salida[$campo]['campo']    = $d['campo'][$id];
		$salida[$campo]['etiqueta'] = $d['etiqueta'][$id];
		$salida[$campo]['ayuda']    = $d['ayuda'][$id];
		$salida[$campo]['error']    = $d['error'][$id];
		/* TODO Para el futuro
	$salida[$campo]['lista']     = $d['lista'][$id];
	$salida[$campo]['ver']       = $d['ver'][$id];
	$salida[$campo]['crear']     = $d['crear'][$id];
	$salida[$campo]['modificar'] = $d['modificar'][$id];
	$salida[$campo]['buscar']    = $d['buscar'][$id];
	$salida[$campo]['borrar']    = $d['borrar'][$id];
	 */
	}
	return $salida;
}

function f2f($fecha) {
	$fecha           = ($fecha == "")?date("d-m-Y"):$fecha;
	list($d, $m, $a) = explode('-', $fecha);
	return "$a-$m-$d";
}

function ir($direccion) {
	header("Location: $direccion");
	exit();
}

function cadenaaleatoria($n = 10) {
	$letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$cadena = '';
	$nl     = strlen($letras);
	while ($n--) {
		$cadena .= $letras[mt_rand(0, $nl-1)];
	}
	return $cadena;
}
///////
function ver2($matriz) {
	$estilo = 'style="font-size:8pt;font-family:arial;"';
	$salida = '<table border="1" cellspacing="3" cellpadding="3"  '
	.$estilo
	.' rules="cols">';
	if (!is_array($matriz)) {
		var_dump($matriz);
		return $matriz;
	}
	foreach ($matriz as $key => $value) {
		if (count($value) > 0) {
			if (is_array($value) || is_object($value)) {
				$salida .= "<tr><td valign='top'>$key</td><td>";
				$salida .= ver2($value);
				$salida .= "</td></tr>";
			} else {
				$salida .= "<tr><td valign='top'>$key</td><td>$value</td></tr>";
			}
		}
	}
	$salida .= '</table>';
	return $salida;
}

function ver($ss) {
	if (!(is_array($ss) || is_object($ss))) {
		echo $ss;
	} else {
		echo ver2($ss);
	}
}

function vq($a) {
	echo ('//------------//--------------//<br />');
	ver($a);
	echo ('//------------//--------------//<br />');
	die('.');
}

function v() {
	echo <<<LRDTAB
<table border="1">
   <tr>
       <td>SESSION
       </td>
       <td>REQUEST
       </td>
   </tr>
   <tr>
       <td>
LRDTAB

	;

	ver($_SESSION);
	echo <<<LRDTAB
</td>
       <td>REQUEST
LRDTAB

	;

	ver($_REQUEST);
	echo <<<LRDTAB
</td>
   </tr>
    </table>
LRDTAB

	;

}

function s2hms($s) {
	$h = 0;
	$m = 0;
	while ($s >= 3600) {
		$h++;
		$s -= 3600;
	}
	while ($s >= 60) {
		$m++;
		$s -= 60;
	}

	$hms = str_pad($h, 2, '0', STR_PAD_LEFT)
	.':'.str_pad($m, 2, '0', STR_PAD_LEFT)
	.':'.str_pad($s, 2, '0', STR_PAD_LEFT);

	return array('h' => $h, 'm' => $m, 's' => $s, 'hms' => $hms);
}
