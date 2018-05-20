<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('transacciones_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//  ir('negacion_usuario.php');
//}

$miscampos  = array("id","cliente_envia_id","cliente_recibe_id","monto_envia","monto_recibe","moneda_recibe_id","moneda_envia_id","sucursal_envia_id","sucursal_recibe_id","estado_id","personal_id","creado","modificado");
$cantcampos = count($miscampos);

$n_datos            = bd_transacciones_contar();
$n_datos_por_pagina = $config['paginacion']['num_items'];

if( isset( $_REQUEST['pag'] ) ){
    $pagina_actual = $_REQUEST['pag'];
    $i             = $_REQUEST['i'];
} else {
    $pagina_actual = 1;
    $i = 0;
}

if( isset( $_REQUEST['p'] ) ){
    $datos = bd_transacciones_datos21('id,cliente_envia_id,cliente_recibe_id,monto_envia,monto_recibe,moneda_recibe_id,moneda_envia_id,sucursal_envia_id,sucursal_recibe_id,estado_id,personal_id,creado,modificado',$_REQUEST['p'],$n_datos_por_pagina);
} else {
    $datos = bd_transacciones_datos2($i,$n_datos_por_pagina);
}


foreach ($datos as $i=>$c)
{
   $datos[$i]['cliente_envia_id'] = bd_obt_clientes($datos[$i]['cliente_envia_id']);
   $datos[$i]['cliente_recibe_id'] = bd_obt_clientes($datos[$i]['cliente_recibe_id']);
   $datos[$i]['moneda_envia_id'] = bd_obt_monedas($datos[$i]['moneda_envia_id']);
   $datos[$i]['moneda_recibe_id'] = bd_obt_monedas($datos[$i]['moneda_recibe_id']);
   $datos[$i]['sucursal_envia_id'] = bd_obt_sucursales($datos[$i]['sucursal_envia_id']);
   $datos[$i]['sucursal_recibe_id'] = bd_obt_sucursales($datos[$i]['sucursal_recibe_id']);
   $datos[$i]['personal_id'] = bd_obt_personal($datos[$i]['personal_id']);
   $datos[$i]['estado_id'] = bd_obt_estados_operaciones($datos[$i]['estado_id']);
}


# ob_start();
$datos_debug=ob_get_contents();
 ob_end_clean();
$smarty->assign('datos_debug',$datos_debug);

$paginas    = paginar($n_datos,$n_datos_por_pagina,$pagina_actual);

$smarty->assign('cabecera','');
$smarty->assign('pie','');

$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);

$smarty->assign('datos',$datos);
$smarty->assign('paginas',$paginas);
$smarty->assign('pagina_actual',$pagina_actual);
$smarty->assign('n_paginas',count($paginas) );

$smarty->assign('meta',proc_meta("transacciones"));
$smarty->display("transacciones_lista.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
