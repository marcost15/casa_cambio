<?php /* Smarty version 3.1.27, created on 2017-08-21 05:39:31
         compiled from "C:\AppServ\www\casa_cambio\app\templates\final.html" */ ?>
<?php
/*%%SmartyHeaderCode:14500599aaa530ade37_85375198%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8598735f260c66a1c8dad16a8d3e54a56bdf0ccc' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\final.html',
      1 => 1503308368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14500599aaa530ade37_85375198',
  'variables' => 
  array (
    'pie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaa530eebd0_92490426',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaa530eebd0_92490426')) {
function content_599aaa530eebd0_92490426 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14500599aaa530ade37_85375198';
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