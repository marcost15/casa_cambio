<?php /* Smarty version 3.1.27, created on 2017-08-21 06:00:47
         compiled from "C:\AppServ\www\casa_cambio\app\templates\final0.html" */ ?>
<?php
/*%%SmartyHeaderCode:29414599aaf4f933e50_82345081%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f68b8f7d08e5b10a37cc281a6699cddc016e5352' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\final0.html',
      1 => 1503308365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29414599aaf4f933e50_82345081',
  'variables' => 
  array (
    'pie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf4f93b865_16301345',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf4f93b865_16301345')) {
function content_599aaf4f93b865_16301345 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '29414599aaf4f933e50_82345081';
?>
</div>
            </div>
        </div>
    </section>
    <!--/.INTRO END-->
     <section id="footer-sec" >
        <div class="container">
            <div class="row  pad-bottom" >
                Realizado por Marcos Torrealba </br>
                Todos los derechos reservados IP Sistemas C.A © 2017
            </div>
        </div>
    </section


;
<!-- core jquery  -->
<?php echo '<script'; ?>
 src="./libs/js/jquery/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<!-- bootstrap scripts  -->
<?php echo '<script'; ?>
 src="./libs/bs_tpl/plugins/bootstrap.js"><?php echo '</script'; ?>
>
<!-- eModal.js -->
<?php echo '<script'; ?>
 src="./libs/bootstrap/emodal/dist/eModal.min.js"><?php echo '</script'; ?>
>
<!-- custom scripts  -->
<!-- script src="./libs/bs_tpl/js/custom.js"><?php echo '</script'; ?>
 -->
<?php echo '<script'; ?>
 src="./libs/bootstrap/emodal/dist/eModal.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./libs/AdminLTE/dist/js/adminlte.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="./libs/AdminLTE/bower_components/Chart.js/Chart.js"><?php echo '</script'; ?>
>
<!-- FastClick -->
<?php echo '<script'; ?>
 src="./libs/AdminLTE/bower_components/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./libs/AdminLTE/dist/js/demo.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['pie']->value;?>
</body>
</html><?php }
}
?>