<?php
$config=parse_ini_file('./configs/config.inc',true);
session_name('casa_cambio');
session_start();
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./configs/smarty.php');
include('./modelo/bd_modelo.php');
//if (bd_verificar_privilegios('privilegios_eliminar.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
//{
//  ir('negacion_usuario.php');
//}

if(isset($_REQUEST))
{
    switch($_REQUEST['accion'])
    {
        case 'eliminar':
            sql("DELETE FROM privilegios WHERE pagina = '$_REQUEST[id]';");
            ir('privilegios_lista.php');
            break;
    }
}

$miscampos  = array("id","pagina","nivel_id","acceso");
$cantcampos = count($miscampos);

$n_datos            = bd_privilegios_contar();
$n_datos_por_pagina = $config['paginacion']['num_items'];

//$datos = bd_privilegios_datos2(0,$n_datos_por_pagina);

$entrada2=array();
$entrada=array();
$niveles=bd_obt_niveles();
$nniveles=count($niveles);

$tabla=bd_obt_privilegios();
$paginas=array();

foreach($tabla as $p)
{
    $paginas[ $p['pagina'] ] [ $p['nivel_id'] ] = $p['acceso'];
    
}
$tabla=$paginas;
$paginas=array();
foreach($tabla as $p=>$priv)
{
    for($i=1;$i<=$nniveles;$i++)
    {
        $privo[$i-1]=($priv[$i]=='CONCEDER')?'CONCEDER':'DENEGAR';  
    }
    
    $paginas[]=array('pagina'=>$p,'priv'=>$privo);
}


$archivos=array();
$d = dir(".");
while (false !== ($entrada = $d->read())) {
  $entrada2=explode('.',$entrada);
    if($entrada2[1]=='php')
    {
        $archivo=join('.',$entrada2);
        $archivos[$archivo]=$archivo;
    }
}
$d->close();
asort($archivos); 


$ids = sql2array("SELECT DISTINCT pagina FROM privilegios WHERE acceso LIKE 'CONCEDER' ORDER BY pagina ASC, nivel_id ASC");

# ob_start();
$datos_debug=ob_get_contents();
 ob_end_clean();
$smarty->assign('datos_debug',$datos_debug);


$smarty->assign('c',$miscampos);
$smarty->assign('n',$cantcampos);
//$smarty->assign('datos',$datos);
$smarty->assign('pagina_actual',$pagina_actual);
$smarty->assign('n_paginas',count($paginas) );

$smarty->assign('nniveles',$nniveles);
$smarty->assign('niveles',$niveles);
$smarty->assign('tabla',$paginas);
$smarty->assign('ids',$ids);
$smarty->assign('meta',proc_meta("privilegios"));
$smarty->display("privilegios_lista.html");
if ($config['debug']['debug']=='SI') {echo __FILE__;}
