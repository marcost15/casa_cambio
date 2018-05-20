<?php
/**
 * Este archivo tiene las funciones que se cargan por defecto
 * cuando se carga el acceso a la bd
 *
 * */

$m = new mysqli(
	$config['bd']['host'],
	$config['bd']['login'],
	$config['bd']['clave'],
	$config['bd']['bd']
);

/* chequeo de conexión */
if ($m->connect_error) {
	printf("(lrcrud) Falló conexión: %s\n", $mysqli->connect_error);
	exit();
}

$m->query("SET NAMES 'utf8'");

function sql($sql) {
	global $m;
	$resultado = $m->query($sql);
	if ($resultado === FALSE) {
		printf("(lrcrud) %s\n", $m->error);
		exit;
	}
	return $resultado;
}

function sqlerror($sql, $error) {
	return "<html><head></head><body><ul>"
	."<li>Instruccion SQL:<br /><pre>$sql</pre></li>"
	 ."<li>Error SQL: <font color='red'>$error</font></li>"
	 ."</ul></body></html>";
}

function sql2array($sql) {
	global $m;
	if (!$res = $m->query($sql)) {
		echo sqlerror($sql, $m->error);
		exit;
	}
	$r = array();
	while ($temp = $res->fetch_array(MYSQLI_ASSOC)) {
		$r[] = $temp;
	}
	return $r;
}

function sql2row($sql) {
	global $m;
	if (!$res = $m->query($sql)) {
		echo sqlerror($sql, $m->error);
		exit;
	}
	return $res->fetch_array(MYSQLI_ASSOC);
}

function sql2value($sql) {
	global $m;
	if (!$res = $m->query($sql)) {
		echo sqlerror($sql, $m->error);
		exit;
	}
	$p = $res->fetch_array(MYSQLI_NUM);
	return $p[0];
}

function sql2value_mark($sql) {
    global $m;
    if (! $res=mysql_query($sql,$m)){
		echo error_sql($sql,sqlerror());
		exit;
    }			
	$p=mysql_fetch_array($res);
	return $p[0];
}

function sql2options($sql) {
	global $m;
	if (!$res = $m->query($sql)) {
		echo sqlerror($sql, $m->error);
		exit;
	}
	$r = array();
	while ($l = $res->fetch_array(MYSQLI_NUM)) {
		$r[$l[0]] = $l[1];
		;
	}
	return $r;
}

function sqlexist($id, $tabla) {
	global $m;
	$sql = "SELECT COUNT(*) FROM $tabla WHERE id = '$id'";
	if (sql2value($sql) > 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function sqlexistvct($valor, $campo, $tabla) {
	global $m;
	$sql = "SELECT COUNT(*) FROM $tabla WHERE $campo = '$valor'";
	if (sql2value($sql) > 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function cifra_clave($clave) {
	return password_hash($clave, PASSWORD_DEFAULT);
}

function plural_tabla($tabla_id) {
	$camposing   = substr($tabla_id, 0, -3);
	$ultimaletra = substr($camposing, -1);
	switch ($ultimaletra) {
		case 'a':
		case 'e':
		case 'i':
		case 'o':
		case 'u':
			$tablapl = $camposing.'s';
			break;
		default:
			$tablapl = $camposing.'es';
	}
	return $tablapl;
}

function bd_datos($campo_id, $id) {
	$tabla   = plural_tabla($campo_id);
	$funcion = "bd_{$tabla}_datos";
	$datos   = $funcion($id);
	$sql     = "SELECT display_field
            FROM phpmyadmin.pma__table_info
            WHERE table_name = '$tabla'";

	$campo_a_mostrar = sql2value($sql);
	return array('datos' => $datos, 'campo' => $campo_a_mostrar);
}

if (is_readable('./modelo/modelo.d/otros.php')) {include './modelo/modelo.d/otros.php';
}
