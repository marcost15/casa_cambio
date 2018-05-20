<?php
include_once './libs/smarty/libs/Smarty.class.php';
# class SmartyLRDTAB extends Smarty {
#    function display($resource_name=NULL, $cache_id = null, $compile_id = null)
#    {
#       if ($resource_name==null)
#       {
#           $resource_name=basename($this->_tpl_vars['SCRIPT_NAME'],'.php').'.html';
#       }
#       $this->fetch($resource_name, $cache_id, $compile_id, true);
#     }
# }
$smarty = new Smarty();
# $smarty -> compile_check = true;
# $smarty -> debugging = true;
# $smarty -> caching = true;