<?php /* Smarty version 3.1.27, created on 2017-08-21 05:06:44
         compiled from "C:\AppServ\www\casa_cambio\app\templates\inicio.html" */ ?>
<?php
/*%%SmartyHeaderCode:29708599aa2a40eaec2_10028866%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6916447c5a326794774214674ac9c43a6f3e2a7b' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\inicio.html',
      1 => 1503306391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29708599aa2a40eaec2_10028866',
  'variables' => 
  array (
    'cabecera' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aa2a4142a95_14916673',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aa2a4142a95_14916673')) {
function content_599aa2a4142a95_14916673 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '29708599aa2a40eaec2_10028866';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head


;
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="Marcos Torrealba (marcost15@gmail.com)" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>Cambio Admin</title>

<?php echo '<script'; ?>
 type="text/javascript" src="./libs/livevalidation.js"><?php echo '</script'; ?>
>
<!-- bootstrap core style css -->
<link href="./libs/bs_tpl/css/bootstrap.css" rel="stylesheet" />
<!-- fontawesome style css -->
<link href="./libs/bs_tpl/css/font-awesome.min.css" rel="stylesheet" />
 <!-- Ionicons -->
<link rel="stylesheet" href="./libs/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style AdminLTE-->
<link rel="stylesheet" href="./libs/AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="./libs/AdminLTE/dist/css/skins/skin-blue.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- custom style css -->
<link href="./libs/bs_tpl/css/style.css" rel="stylesheet" />
<link href="./estilos/layout.css" rel="stylesheet" />
<link href="./estilos/sitio.css" rel="stylesheet" />
<?php echo $_smarty_tpl->tpl_vars['cabecera']->value;?>
</head>
<body >
    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="padding:0;"><img  class="img-responsive"
                    src="./imagenes/logo129x50.png" /></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php echo $_smarty_tpl->getSubTemplate ("../menu/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </div>
        </div>
    </div>
   <!--/.NAVBAR END-->
    <section id="home" class="text-center"></section>
    <section id="intro">
        <div class="container">
        <div class="row" style="min-height:550px;>
            <div class="col-md-12"><?php }
}
?>