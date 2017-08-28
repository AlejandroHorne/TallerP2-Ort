<?php
require('/var/www/TallerP2/Smarty/Smarty.class.php');
define("FOTOS","Fotos");
define("CANTXPAG",7);
    function mkSmarty() {
        $smarty = new Smarty();
        $smarty->setTemplateDir('../Smarty/templates');
	$smarty->setCompileDir('../TallerP2/Smarty/templates_c');
	$smarty->setCacheDir('../TallerP2/Smarty/cache');
	$smarty->setConfigDir('../TallerP2/Smarty/configs');
        return $smarty;
    }
?>