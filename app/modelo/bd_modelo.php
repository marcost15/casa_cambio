<?php

## cambio ##

function bd_cambio_agregar($d){
   $sql = sprintf("INSERT INTO cambio (id, nombre, moneda1_id, valor_moneda1, moneda2_id, valor_moneda2, operacion)
	VALUES ('%s','%s', '%s','%s','%s','%s','%s')",
	$d['id'],
  $d['nombre'],
	$d['moneda1_id'],
	$d['valor_moneda1'],
	$d['moneda2_id'],
	$d['valor_moneda2'],
	$d['operacion']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_cambio_antsig($id){
   $sql  = "SELECT id FROM cambio WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM cambio WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_cambio_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, moneda1_id, valor_moneda1, moneda2_id, valor_moneda2, operacion, creado, modificado
    FROM cambio WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_cambio_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM cambio
   		WHERE $criterio
   	");
}

function bd_cambio_dato($id,$campo){
  $sql="SELECT id, $campo  FROM cambio WHERE id = '$id'";
  return sql2row($sql);
}

function bd_cambio_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, moneda1_id, valor_moneda1, moneda2_id, valor_moneda2, operacion, creado, modificado
        	FROM cambio
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, moneda1_id, valor_moneda1, moneda2_id, valor_moneda2, operacion, creado, modificado
        	FROM cambio
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_cambio_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM cambio
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_cambio_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM cambio
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_cambio_eliminar($id){
   $sql=sql("DELETE FROM cambio WHERE id = '$id'");
}

function bd_cambio_existe($id){
   $sql="SELECT COUNT(*) as n FROM cambio WHERE id = '$id'";
   return sql2value($sql);
}

function bd_cambio_modificar($d){
   $sql=sprintf("UPDATE cambio SET nombre = '%s', moneda1_id = '%s', valor_moneda1 = '%s', moneda2_id = '%s', valor_moneda2 = '%s', operacion = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre'], $d['moneda1_id'], $d['valor_moneda1'], $d['moneda2_id'], $d['valor_moneda2'], $d['operacion']);
   $res=sql($sql);
   return $d['id'];
}

function bd_cambio_opciones(){
  $sql="SELECT id, LEFT(nombre,60)
       FROM cambio
      ORDER BY id ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_cambio_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM cambio
      ORDER BY moneda1_id ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_cambio($id)
{
    return sql2value("SELECT nombre FROM cambio WHERE id = $id");
}

## clientes ##

function bd_clientes_agregar($d){
   $sql = sprintf("INSERT INTO clientes (id, dni, nombre, apellido, direccion, pais_id, tlf, tlf2, correo, adjunto)
	VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
	$d['id'],
	$d['dni'],
	$d['nombre'],
	$d['apellido'],
	$d['direccion'],
	$d['pais_id'],
	$d['tlf'],
	$d['tlf2'],
  $d['correo'],
	$d['adjunto']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_clientes_antsig($id){
   $sql  = "SELECT id FROM clientes WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM clientes WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_clientes_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, dni, nombre, apellido, direccion, pais_id, tlf, tlf2, correo, adjunto, creado, modificado
    FROM clientes WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_clientes_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM clientes
   		WHERE $criterio
   	");
}

function bd_clientes_dato($id,$campo){
  $sql="SELECT id, $campo  FROM clientes WHERE id = '$id'";
  return sql2row($sql);
}

function bd_clientes_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, dni, nombre, apellido, direccion, pais_id, tlf, tlf2, correo, adjunto, creado, modificado, CONCAT(dni, ', ',apellido, ', ', nombre ) AS nombreape
        	FROM clientes
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, dni, nombre, apellido, direccion, pais_id, tlf, tlf2, correo, adjunto, creado, modificado, CONCAT(dni, ', ',apellido, ', ', nombre ) AS nombreape
        	FROM clientes
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_clientes_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT id, dni, nombre, apellido, direccion, pais_id, tlf, tlf2, correo, adjunto, creado, modificado, CONCAT(dni, ', ',apellido, ', ', nombre ) AS nombreape FROM clientes
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_clientes_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM clientes
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_clientes_eliminar($id){
   $sql=sql("DELETE FROM clientes WHERE id = '$id'");
}

function bd_clientes_existe($id){
   $sql="SELECT COUNT(*) as n FROM clientes WHERE id = '$id'";
   return sql2value($sql);
}

function bd_clientes_modificar($d){
  if (empty($d['adjunto']))
  {
   $sql=sprintf("UPDATE clientes SET dni = '%s', nombre = '%s', apellido = '%s', direccion = '%s', pais_id = '%s', tlf = '%s', tlf2 = '%s', correo = '%s' WHERE id = '$d[id]' LIMIT 1",
      $d['dni'], $d['nombre'], $d['apellido'], $d['direccion'], $d['pais_id'], $d['tlf'], $d['tlf2'], $d['correo']);
   $res=sql($sql);
   return $d['id'];
  }
  else
  {
     $sql=sprintf("UPDATE clientes SET dni = '%s', nombre = '%s', apellido = '%s', direccion = '%s', pais_id = '%s', tlf = '%s', tlf2 = '%s', correo = '%s', adjunto = '%s' WHERE id = '$d[id]' LIMIT 1",
      $d['dni'], $d['nombre'], $d['apellido'], $d['direccion'], $d['pais_id'], $d['tlf'], $d['tlf2'], $d['correo'], $d['adjunto']);
   $res=sql($sql);
   return $d['id'];
  }
}

function bd_clientes_opciones(){
   $sql="SELECT id, CONCAT(dni, ', ',apellido, ', ', nombre ) AS nombreape
      FROM clientes
      ORDER BY dni ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_clientes_opcionesb(){
   $sql="SELECT id, LEFT(dni,60)
      FROM clientes
      ORDER BY dni ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_clientes($id)
{
    return sql2value("SELECT CONCAT(dni, ', ',apellido, ', ', nombre ) AS nombreape FROM clientes WHERE id = $id");
}

## estados_operaciones ##

function bd_estados_operaciones_agregar($d){
   $sql = sprintf("INSERT INTO estados_operaciones (id, nombre, descripcion)
	VALUES ('%s','%s','%s')",
	$d['id'],
	$d['nombre'],
	$d['descripcion']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_estados_operaciones_antsig($id){
   $sql  = "SELECT id FROM estados_operaciones WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM estados_operaciones WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_estados_operaciones_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, descripcion, creado, modificado
    FROM estados_operaciones WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_estados_operaciones_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM estados_operaciones
   		WHERE $criterio
   	");
}

function bd_estados_operaciones_dato($id,$campo){
  $sql="SELECT id, $campo  FROM estados_operaciones WHERE id = '$id'";
  return sql2row($sql);
}

function bd_estados_operaciones_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, descripcion, creado, modificado
        	FROM estados_operaciones
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, descripcion, creado, modificado
        	FROM estados_operaciones
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_estados_operaciones_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM estados_operaciones
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_estados_operaciones_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM estados_operaciones
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_estados_operaciones_eliminar($id){
   $sql=sql("DELETE FROM estados_operaciones WHERE id = '$id'");
}

function bd_estados_operaciones_existe($id){
   $sql="SELECT COUNT(*) as n FROM estados_operaciones WHERE id = '$id'";
   return sql2value($sql);
}

function bd_estados_operaciones_modificar($d){
   $sql=sprintf("UPDATE estados_operaciones SET nombre = '%s', descripcion = '%s', creado = '%s', modificado = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre'], $d['descripcion'], $d['creado'], $d['modificado']);
   $res=sql($sql);
   return $d['id'];
}

function bd_estados_operaciones_opciones(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM estados_operaciones
      ORDER BY id ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_estados_operaciones_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM estados_operaciones
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_estados_operaciones($id)
{
    return sql2value("SELECT nombre FROM estados_operaciones WHERE id = $id");
}

## monedas ##

function bd_monedas_agregar($d){
   $sql = sprintf("INSERT INTO monedas (id, nombre, abreviacion)
	VALUES ('%s','%s','%s')",
	$d['id'],
	$d['nombre'],
	$d['abreviacion']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_monedas_antsig($id){
   $sql  = "SELECT id FROM monedas WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM monedas WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_monedas_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, abreviacion, creado, modificado
    FROM monedas WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_monedas_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM monedas
   		WHERE $criterio
   	");
}

function bd_monedas_dato($id,$campo){
  $sql="SELECT id, $campo  FROM monedas WHERE id = '$id'";
  return sql2row($sql);
}

function bd_monedas_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, abreviacion, creado, modificado
        	FROM monedas
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, abreviacion, creado, modificado
        	FROM monedas
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_monedas_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM monedas
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_monedas_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM monedas
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_monedas_eliminar($id){
   $sql=sql("DELETE FROM monedas WHERE id = '$id'");
}

function bd_monedas_existe($id){
   $sql="SELECT COUNT(*) as n FROM monedas WHERE id = '$id'";
   return sql2value($sql);
}

function bd_monedas_modificar($d){
   $sql=sprintf("UPDATE monedas SET nombre = '%s', abreviacion = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre'], $d['abreviacion']);
   $res=sql($sql);
   return $d['id'];
}

function bd_monedas_opciones(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM monedas
      ORDER BY nombre ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_monedas_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM monedas
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_monedas($id)
{
    return sql2value("SELECT nombre FROM monedas WHERE id = $id");
}

## niveles ##

function bd_niveles_agregar($d){
   $sql = sprintf("INSERT INTO niveles (id, nombre)
	VALUES ('%s','%s')",
	$d['id'],
	$d['nombre']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_niveles_antsig($id){
   $sql  = "SELECT id FROM niveles WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM niveles WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_niveles_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, creado, modificado
    FROM niveles WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_niveles_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM niveles
   		WHERE $criterio
   	");
}

function bd_niveles_dato($id,$campo){
  $sql="SELECT id, $campo  FROM niveles WHERE id = '$id'";
  return sql2row($sql);
}

function bd_niveles_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, creado, modificado
        	FROM niveles
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, creado, modificado
        	FROM niveles
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_niveles_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM niveles
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_niveles_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM niveles
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_niveles_eliminar($id){
   $sql=sql("DELETE FROM niveles WHERE id = '$id'");
}

function bd_niveles_existe($id){
   $sql="SELECT COUNT(*) as n FROM niveles WHERE id = '$id'";
   return sql2value($sql);
}

function bd_niveles_modificar($d){
   $sql=sprintf("UPDATE niveles SET nombre = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre']);
   $res=sql($sql);
   return $d['id'];
}

function bd_niveles_opciones(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM niveles
      ORDER BY nombre ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_niveles_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM niveles
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_niveles($id = null)
{
  if($id==NULL)
  {
    return sql2array("SELECT id,nombre FROM niveles ORDER BY nombre ASC");
  }
  else
  {
    return sql2value("SELECT nombre FROM niveles WHERE id = $id LIMIT 1");
  }
}

function bd_lista_niveles()
{
  return sql2options("SELECT id,nombre FROM niveles ORDER BY id ASC");
}

## paises ##

function bd_paises_agregar($d){
   $sql = sprintf("INSERT INTO paises (id, nombre)
	VALUES ('%s','%s')",
	$d['id'],
	$d['nombre']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_paises_antsig($id){
   $sql  = "SELECT id FROM paises WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM paises WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_paises_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, creado, modificado
    FROM paises WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_paises_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM paises
   		WHERE $criterio
   	");
}

function bd_paises_dato($id,$campo){
  $sql="SELECT id, $campo  FROM paises WHERE id = '$id'";
  return sql2row($sql);
}

function bd_paises_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, creado, modificado
        	FROM paises
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, creado, modificado
        	FROM paises
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_paises_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM paises
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_paises_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM paises
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_paises_eliminar($id){
   $sql=sql("DELETE FROM paises WHERE id = '$id'");
}

function bd_paises_existe($id){
   $sql="SELECT COUNT(*) as n FROM paises WHERE id = '$id'";
   return sql2value($sql);
}

function bd_paises_modificar($d){
   $sql=sprintf("UPDATE paises SET nombre = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre']);
   $res=sql($sql);
   return $d['id'];
}

function bd_paises_opciones(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM paises
      ORDER BY nombre ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_paises_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM paises
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_paises($id)
{
    return sql2value("SELECT nombre FROM paises WHERE id = $id");
}

## personal ##

function bd_personal_agregar($d){
   $sql = sprintf("INSERT INTO personal (id, dni, nombre, apellido, login, clave, nivel_id, sucursal_id, estado)
	VALUES ('%s','%s', '%s','%s','%s','%s','%s','%s','%s')",
	$d['id'],
  $d['dni'],
	$d['nombre'],
	$d['apellido'],
	$d['login'],
	MD5($d['clave']),
	$d['nivel_id'],
	$d['sucursal_id'],
	$d['estado']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_personal_antsig($id){
   $sql  = "SELECT id FROM personal WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM personal WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_personal_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, dni, nombre, apellido, login, clave, nivel_id, sucursal_id, estado
    FROM personal WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_personal_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM personal
   		WHERE $criterio
   	");
}

function bd_personal_dato($id,$campo){
  $sql="SELECT id, $campo  FROM personal WHERE id = '$id'";
  return sql2row($sql);
}

function bd_personal_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, dni, nombre, apellido, login, clave, nivel_id, sucursal_id, estado
        	FROM personal
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, dni, nombre, apellido, login, clave, nivel_id, sucursal_id, estado
        	FROM personal
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_personal_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM personal
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_personal_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM personal
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_personal_eliminar($id){
   $sql=sql("DELETE FROM personal WHERE id = '$id'");
}

function bd_personal_existe($id){
   $sql="SELECT COUNT(*) as n FROM personal WHERE id = '$id'";
   return sql2value($sql);
}

function bd_personal_modificar($d){
   $sql=sprintf("UPDATE personal SET dni = '%s', nombre = '%s', apellido = '%s', nivel_id = '%s', sucursal_id = '%s', estado = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['dni'], $d['nombre'], $d['apellido'], $d['nivel_id'], $d['sucursal_id'], $d['estado']);
   $res=sql($sql);
   return $d['id'];
}

function bd_personal_opciones(){
   $sql="SELECT id, CONCAT( apellido, ', ', nombre ) AS nombreape
      FROM personal
      ORDER BY nombreape ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_personal_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM personal
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_personal($id)
{
    return sql2value("SELECT CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal WHERE id = $id");
}

function bd_personal_cambio_clave($d)
{
  $id_usuario=$d['id'];
  $clave=$d['clave'];
  $login = $d['login'];
  sql("
    UPDATE personal 
    SET login = '$login', clave = MD5('$clave') 
    WHERE id = $id_usuario LIMIT 1;"
  );
}

## personal_datos ##

function bd_personal_datos_agregar($d){
  $d['personal_id'] = sql2value("SELECT id FROM personal ORDER BY id DESC LIMIT 1"); 
   $sql = sprintf("INSERT INTO personal_datos (personal_id, direccion, tlf_fijo, tlf_movil, correo, foto)
	VALUES ('%s','%s','%s','%s','%s','%s')",
	$d['personal_id'],
	$d['direccion'],
	$d['tlf_fijo'],
	$d['tlf_movil'],
	$d['correo'],
	$d['foto']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_personal_datos_antsig($id){
   $sql  = "SELECT personal_id FROM personal_datos WHERE personal_id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT personal_id FROM personal_datos WHERE personal_id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_personal_datos_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT personal_id, direccion, tlf_fijo, tlf_movil, correo, foto
    FROM personal_datos WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_personal_datos_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM personal_datos
   		WHERE $criterio
   	");
}

function bd_personal_datos_dato($id,$campo){
  $sql="SELECT personal_id, $campo  FROM personal_datos WHERE id = '$id'";
  return sql2row($sql);
}

function bd_personal_datos_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT personal_id, direccion, tlf_fijo, tlf_movil, correo, foto
        	FROM personal_datos
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT personal_id, direccion, tlf_fijo, tlf_movil, correo, foto
        	FROM personal_datos
        	WHERE personal_id = '$id'
        	LIMIT 1");
    }
}

function bd_personal_datos_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM personal_datos
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_personal_datos_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM personal_datos
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_personal_datos_eliminar($id){
   $sql=sql("DELETE FROM personal_datos WHERE personal_id = '$id'");
}

function bd_personal_datos_existe($id){
   $sql="SELECT COUNT(*) as n FROM personal_datos WHERE id = '$id'";
   return sql2value($sql);
}

function bd_personal_datos_modificar($d){
  if (empty($d['foto']))
  {
      $sql=sprintf("UPDATE personal_datos SET direccion = '%s', tlf_fijo = '%s', tlf_movil = '%s', correo = '%s' WHERE personal_id = '$d[id]' LIMIT 1", $d['direccion'], $d['tlf_fijo'], $d['tlf_movil'], $d['correo']);
   $res=sql($sql);
   return $d['id'];
  }
  else
  {
    $sql=sprintf("UPDATE personal_datos SET direccion = '%s', tlf_fijo = '%s', tlf_movil = '%s', correo = '%s', foto = '%s' WHERE personal_id = '$d[id]' LIMIT 1",$d['direccion'], $d['tlf_fijo'], $d['tlf_movil'], $d['correo'], $d['foto']);
   $res=sql($sql);
   return $d['id'];
  }
   
}

function bd_personal_datos_opciones(){
   $sql="SELECT id, LEFT(direccion,60)
      FROM personal_datos
      ORDER BY direccion ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_personal_datos_opcionesb(){
   $sql="SELECT personal_id, LEFT(direccion,60)
      FROM personal_datos
      ORDER BY direccion ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

## privilegios ##

function bd_obt_privilegios($id=NULL)
{
  if ($id==NULL)
  {
    return sql2array("
      SELECT pagina , nivel_id , acceso
      FROM privilegios
      WHERE acceso LIKE 'CONCEDER'
      ORDER BY pagina ASC, nivel_id ASC
    ");
  }
  else
  {
  
  }
}

function bd_cambiar_privilegios($d)
{
  $pagina = $d['pagina'];
  foreach($pagina as $i=>$m)
  {
    $p = $pagina[$i];
    $sql=" SELECT id,pagina,nivel_id
    FROM privilegios WHERE pagina LIKE '$p' AND nivel_id = $d[nivel_id] LIMIT 1";
    $res=sql2row($sql);
    $id=$res['id'];
    if(!$id)
    {
      $sql = "INSERT INTO privilegios (id,pagina,nivel_id,acceso)
      VALUES ('','$p','$d[nivel_id]','$d[acceso]')";
      $res2=sql($sql);
    }
    else
    {
      $sql=" UPDATE privilegios
      SET acceso ='$d[acceso]' 
      WHERE id = '$id'
      LIMIT 1";
      $res2=sql($sql);
    }
  }
}

function bd_verificar_privilegios($pagina,$nivel_id)
{
  if ($nivel_id=='')
  {
    $nivel_id=-1;
  }
  $sql="
    SELECT acceso
    FROM privilegios
    WHERE pagina LIKE '$pagina'
    AND nivel_id =$nivel_id
    LIMIT 1
  ";
  $resultado=sql2value($sql);
  return $resultado;
}

function bd_privilegios_antsig($id){
   $sql  = "SELECT id FROM privilegios WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM privilegios WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_privilegios_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, pagina, nivel_id, acceso
    FROM privilegios WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_privilegios_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM privilegios
   		WHERE $criterio
   	");
}

function bd_privilegios_dato($id,$campo){
  $sql="SELECT id, $campo  FROM privilegios WHERE id = '$id'";
  return sql2row($sql);
}

function bd_privilegios_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, pagina, nivel_id, acceso
        	FROM privilegios
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, pagina, nivel_id, acceso
        	FROM privilegios
        	WHERE pagina = '$id'
        	LIMIT 1");
    }
}

function bd_privilegios_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM privilegios
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_privilegios_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM privilegios
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_privilegios_eliminar($id){
  $sql=sql("DELETE FROM privilegios WHERE pagina = '$id'");
}

function bd_privilegios_existe($id){
   $sql="SELECT COUNT(*) as n FROM privilegios WHERE id = '$id'";
   return sql2value($sql);
}

function bd_privilegios_modificar($d){
   $sql=sprintf("UPDATE privilegios SET pagina = '%s', nivel_id = '%s', acceso = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['pagina'], $d['nivel_id'], $d['acceso']);
   $res=sql($sql);
   return $d['id'];
}

function bd_privilegios_opciones(){
   $sql="SELECT id, LEFT(pagina,60)
      FROM privilegios
      ORDER BY pagina ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_privilegios_opcionesb(){
   $sql="SELECT id, LEFT(pagina,60)
      FROM privilegios
      ORDER BY pagina ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

## sucursales ##

function bd_sucursales_agregar($d){
   $sql = sprintf("INSERT INTO sucursales (id, nombre, direccion, tlf, tlf2, pais_id, persona_contacto)
	VALUES ('%s','%s','%s','%s','%s','%s','%s')",
	$d['id'],
	$d['nombre'],
	$d['direccion'],
	$d['tlf'],
	$d['tlf2'],
	$d['pais_id'],
	$d['persona_contacto']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_sucursales_antsig($id){
   $sql  = "SELECT id FROM sucursales WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM sucursales WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_sucursales_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, nombre, direccion, tlf, tlf2, pais_id, persona_contacto, creado, modificado
    FROM sucursales WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_sucursales_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM sucursales
   		WHERE $criterio
   	");
}

function bd_sucursales_dato($id,$campo){
  $sql="SELECT id, $campo  FROM sucursales WHERE id = '$id'";
  return sql2row($sql);
}

function bd_sucursales_datos($id=NULL, $orden='id ASC'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, nombre, direccion, tlf, tlf2, pais_id, persona_contacto, creado, modificado
        	FROM sucursales
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, nombre, direccion, tlf, tlf2, pais_id, persona_contacto, creado, modificado
        	FROM sucursales
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_sucursales_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM sucursales
    	ORDER BY $orden ASC
        LIMIT $inicio,$cantidad
    ");
}

function bd_sucursales_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM sucursales
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}

function bd_sucursales_eliminar($id){
   $sql=sql("DELETE FROM sucursales WHERE id = '$id'");
}

function bd_sucursales_existe($id){
   $sql="SELECT COUNT(*) as n FROM sucursales WHERE id = '$id'";
   return sql2value($sql);
}

function bd_sucursales_modificar($d){
   $sql=sprintf("UPDATE sucursales SET nombre = '%s', direccion = '%s', tlf = '%s', tlf2 = '%s', pais_id = '%s', persona_contacto = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['nombre'], $d['direccion'], $d['tlf'], $d['tlf2'], $d['pais_id'], $d['persona_contacto']);
   $res=sql($sql);
   return $d['id'];
}

function bd_sucursales_opciones(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM sucursales
      ORDER BY nombre ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_sucursales_opcionesb(){
   $sql="SELECT id, LEFT(nombre,60)
      FROM sucursales
      ORDER BY nombre ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_obt_sucursales($id)
{
    return sql2value("SELECT nombre FROM sucursales WHERE id = $id");
}

## transacciones ##

function bd_transacciones_agregar($d){
   $sql = sprintf("INSERT INTO transacciones (id, cliente_envia_id, cliente_recibe_id, monto_envia, monto_recibe, moneda_recibe_id, moneda_envia_id, sucursal_envia_id, sucursal_recibe_id, estado_id, personal_id)
	VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
	$d['id'],
	$d['cliente_envia_id'],
	$d['cliente_recibe_id'],
	$d['monto_envia'],
	$d['monto_recibe'],
	$d['moneda_recibe_id'],
	$d['moneda_envia_id'],
	$d['sucursal_envia_id'],
	$d['sucursal_recibe_id'],
	$d['estado_id'],
	$d['personal_id']);
   $res = sql($sql);
   $id  = sql2value("SELECT LAST_INSERT_ID()");
   return $id;
}

function bd_transacciones_antsig($id){
   $sql  = "SELECT id FROM transacciones WHERE id < '$id' ORDER BY id DESC LIMIT 1";
   $sql2 = "SELECT id FROM transacciones WHERE id > '$id' ORDER BY `id` ASC LIMIT 1";
   $res1 = sql2value($sql);
   $res2 = sql2value($sql2);
   return array('a'=>$res1,'s'=>$res2);
}

function bd_transacciones_buscar($criterio,$orden='id ASC',$inicio=0,$cantidad=1){
   return sql2array("
    SELECT id, cliente_envia_id, cliente_recibe_id, monto_envia, monto_recibe, moneda_recibe_id, moneda_envia_id, sucursal_envia_id, sucursal_recibe_id, estado_id, personal_id, creado, modificado
    FROM transacciones WHERE {$criterio}
    ORDER BY $orden
    LIMIT $inicio,$cantidad
   ");
}

function bd_transacciones_contar($criterio='1'){
   	return sql2value("
   		SELECT COUNT(*)
   		FROM transacciones
   		WHERE $criterio
   	");
}

function bd_transacciones_dato($id,$campo){
  $sql="SELECT id, $campo  FROM transacciones WHERE id = '$id'";
  return sql2row($sql);
}

function bd_transacciones_datos($id=NULL, $orden='id Desc'){
    if ($id==NULL)    {
        return sql2array("
        	SELECT id, cliente_envia_id, cliente_recibe_id, monto_envia, monto_recibe, moneda_recibe_id, moneda_envia_id, sucursal_envia_id, sucursal_recibe_id, estado_id, personal_id, creado, modificado
        	FROM transacciones
        	ORDER BY {$orden}");
    }else{
        return sql2row("
        	SELECT id, cliente_envia_id, cliente_recibe_id, monto_envia, monto_recibe, moneda_recibe_id, moneda_envia_id, sucursal_envia_id, sucursal_recibe_id, estado_id, personal_id, creado, modificado
        	FROM transacciones
        	WHERE id = '$id'
        	LIMIT 1");
    }
}

function bd_transacciones_datos2($inicio, $cantidad, $orden='id'){
    return sql2array("
    	SELECT * FROM transacciones
    	ORDER BY $orden Desc
        LIMIT $inicio,$cantidad
    ");
}

function bd_transacciones_clientes2($inicio, $cantidad, $orden='id', $id){
    return sql2array("SELECT * FROM transacciones WHERE cliente_envia_id = '$id' OR cliente_recibe_id = '$id'
      ORDER BY $orden Desc
        LIMIT $inicio,$cantidad
    ");
}

function bd_transacciones_datos21($campos, $palabras,$cantidad){
	$miscampos = explode(',', $campos);
	foreach ($miscampos as $key => $value) {
		$miscampos[$key] .= " LIKE '%{$palabras}%'";
	}

	$condicion = implode(' OR ', $miscampos);
    return sql2array("
    	SELECT * FROM transacciones
    	WHERE $condicion
    	LIMIT $cantidad
        ");
}
function bd_transacciones_clientes21($campos, $palabras,$cantidad, $id){
  $miscampos = explode(',', $campos);
  foreach ($miscampos as $key => $value) {
    $miscampos[$key] .= " LIKE '%{$palabras}%' AND cliente_envia_id = $id OR cliente_recibe_id = $id";
  }

  $condicion = implode(' OR ', $miscampos);
    return sql2array("
      SELECT * FROM transacciones
      WHERE $condicion
      LIMIT $cantidad
        ");
}

function bd_transacciones_eliminar($id){
   $sql=sql("DELETE FROM transacciones WHERE id = '$id'");
}

function bd_transacciones_existe($id){
   $sql="SELECT COUNT(*) as n FROM transacciones WHERE id = '$id'";
   return sql2value($sql);
}

function bd_transacciones_modificar($d){
   $sql=sprintf("UPDATE transacciones SET cliente_envia_id = '%s', cliente_recibe_id = '%s', monto_envia = '%s', monto_recibe = '%s', moneda_recibe_id = '%s', moneda_envia_id = '%s', sucursal_envia_id = '%s', sucursal_recibe_id = '%s', estado_id = '%s', personal_id = '%s' WHERE id = '$d[id]' LIMIT 1",
$d['cliente_envia_id'], $d['cliente_recibe_id'], $d['monto_envia'], $d['monto_recibe'], $d['moneda_recibe_id'], $d['moneda_envia_id'], $d['sucursal_envia_id'], $d['sucursal_recibe_id'], $d['estado_id'], $d['personal_id']);
   $res=sql($sql);
   return $d['id'];
}

function bd_transacciones_opciones(){
   $sql="SELECT id, LEFT(cliente_envia_id,60)
      FROM transacciones
      ORDER BY cliente_envia_id ASC";
   $res=sql2options($sql);
   return $res;
}

function bd_transacciones_opcionesb(){
   $sql="SELECT id, LEFT(cliente_envia_id,60)
      FROM transacciones
      ORDER BY cliente_envia_id ASC";
   $res=sql2options($sql);
    $zz=array();
    $zz['--']='';
    foreach($res as $id=>$valor){
       $zz[$id]=$valor;
   }
   return $zz;
}

function bd_verifica_login($d)
{
  $login=$d['id'];
  $clave=$d['clave'];
  $sql="SELECT id,apellido,nombre,login,nivel_id
      FROM personal 
      WHERE login LIKE '$login' AND clave LIKE MD5('$clave') AND estado = 'ACTIVO'
      LIMIT 0,1";
  return sql2row($sql);
}

