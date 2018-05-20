<?php /* Smarty version 3.1.27, created on 2017-08-21 05:59:55
         compiled from "C:\AppServ\www\casa_cambio\app\templates\finalv.html" */ ?>
<?php
/*%%SmartyHeaderCode:14923599aaf1ba5d719_98431697%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcc0ab8ccc3f8fb6f3c95389965cf4f02c4cb29a' => 
    array (
      0 => 'C:\\AppServ\\www\\casa_cambio\\app\\templates\\finalv.html',
      1 => 1503308363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14923599aaf1ba5d719_98431697',
  'variables' => 
  array (
    'pie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_599aaf1ba61419_49231865',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599aaf1ba61419_49231865')) {
function content_599aaf1ba61419_49231865 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14923599aaf1ba5d719_98431697';
?>
</div>

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
<?php echo $_smarty_tpl->tpl_vars['pie']->value;?>
<!-- eModal.js -->
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
</body>
</html><?php }
}
?>