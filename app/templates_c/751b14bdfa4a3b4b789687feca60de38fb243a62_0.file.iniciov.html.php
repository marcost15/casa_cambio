<?php /* Smarty version 3.1.27, created on 2017-08-21 05:59:55
         compiled from "C:\AppServ\www\casa_cambio\app\templates\iniciov.html" */ ?>
<?php
/*%%SmartyHeaderCode:32538599aaf1ba2bd99_05242850%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '751b14bdfa4a3b4b789687feca60de38fb243a62' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\iniciov.html',
      1 => 1503306402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32538599aaf1ba2bd99_05242850',
  'variables' => 
  array (
    'cabecera' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf1ba468d7_94899227',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf1ba468d7_94899227')) {
function content_599aaf1ba468d7_94899227 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32538599aaf1ba2bd99_05242850';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<link rel="stylesheet" type="text/css" href="./estilos/layoutprint.css" media="print"/>

<link href="./estilos/sitio.css" rel="stylesheet" />
<?php echo $_smarty_tpl->tpl_vars['cabecera']->value;?>
<style type="text/css" media="screen">
form{
    max-width: 100vh!important;
}
textarea{
 max-width: 100vh!important;
}
</style>
</head>
<body >
        <section id="intro">
            <div class="container">
           <div class="row" >
            <div class="col-md-12">
            	<?php if ($_SESSION['mensaje']) {?>
				</p>
					<div id="mensaje"><?php echo $_SESSION['mensaje'];?>
</div>
				<?php }?>
				</p><?php }
}
?>