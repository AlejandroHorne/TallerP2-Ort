<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/Models/FamiliaProducto.php';
require_once __DIR__ . '/Models/Proovedor.php';
require_once __DIR__ . '/Models/Producto.php';
require_once __DIR__ . '/Config/config_SMARTY.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

initPage();

function initPage() {
    $smarty = mkSmarty();

    $familia = new FamiliaProducto();
    $arrayFamilias = $familia->getAll(10, 0, '');
    $smarty->assign("arrayFamilias", $arrayFamilias);
    $smarty->assign("namefilter_familia", '');
    $smarty->assign("currentpage_familia", 1);

    $prov = new Proovedor();
    $arrayprov = $prov->getAll(10, 0, '');
    $smarty->assign("arrayProovedores", $arrayprov);
    $smarty->assign("namefilter_prov", '');
    $smarty->assign("currentpage_prov", 1);

    $prod = new Producto();
    $arrayprod = $prod->getAll(10, 0, '');
    $smarty->assign("namefilter_prod", '');
    $smarty->assign("currentpage_prod", 1);

    $smarty->assign("arrayProductos", $arrayprod);

    $smarty->assign("render", '');
    $path = __DIR__ . '/Smarty/templates/auth.tpl';
    $smarty->display($path);
}
