<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('sucursales_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//  ir('negacion_usuario.php');
//}

$miscampos  = array("id","nombre","direccion","tlf","tlf2","pais_id","persona_contacto","creado","modificado");
$cantcampos = count($miscampos);

$n_datos            = bd_sucursales_contar();
$n_datos_por_pagina = $config['paginacion']['num_items'];

if( isset( $_REQUEST['pag'] ) ){
    $pagina_actual = $_REQUEST['pag'];
    $i             = $_REQUEST['i'];
} else {
    $pagina_actual = 1;
    $i = 0;
}

if( isset( $_REQUEST['p'] ) ){
    $datos = bd_sucursales_datos21('sucursales.id,sucursales.nombre,paises.nombre,direccion,tlf,tlf2,pais_id,persona_contacto,sucursales.creado,sucursales.modificado',$_REQUEST['p'],$n_datos_por_pagina);
} else {
    $datos = bd_sucursales_datos2($i,$n_datos_por_pagina);
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
foreach ($datos as $i=>$c)
{
    $datos[$i]['pais_id'] = bd_obt_paises($datos[$i]['pais_id']);
}
$smarty->assign('datos',$datos);
$smarty->assign('paginas',$paginas);
$smarty->assign('pagina_actual',$pagina_actual);
$smarty->assign('n_paginas',count($paginas) );

$smarty->assign('meta',proc_meta("sucursales"));
$smarty->display("sucursales_lista.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
