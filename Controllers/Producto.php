<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Proovedor.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/FamiliaProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_SMARTY.php';

if (array_key_exists('eliminar_producto', $_POST)) {
    $prod = new Producto();
    $prod->remove($_POST['eliminar_producto']);
    renderAuthAgain(1, '');
}

if (array_key_exists('agregar_producto_nombre', $_POST)) {
    $prod = new Producto();
    $nombre = $_POST['agregar_producto_nombre'];
    $esDestacado = $_POST['agregar__es-productodestacado'];
    $proovedor = $_POST['agregar_producto_proovedor'];
    $familia = $_POST['agregar_producto_familia'];
    $precio = $_POST['agregar_producto_precio'];
    $imagen = $_POST['agregar_producto_imagen'];
    $prod->set($nombre, $esDestacado, $proovedor, $familia, $precio, $imagen);
    renderAuthAgain(1, '');
}
if (isNameFilterRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['currentpage_prod'];
    renderAuthAgain($currentpage, $_POST['namefilter_prod']);
}

if (isNextPageRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['nextpage_prod'];
    renderAuthAgain($currentpage + 1, $_POST['namefilter_prod']);
}

if (isPreviousPageRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['previouspage_prod'];
    renderAuthAgain($currentpage - 1, $_POST['namefilter_prod']);
}

function isNextPageRequest() {
    return array_key_exists('nextpage_prod', $_POST);
}

function isPreviousPageRequest() {
    return array_key_exists('previouspage_prod', $_POST);
}

function isNameFilterRequest() {
    return array_key_exists('namefilter_prod', $_POST) && !(isNextPageRequest() || isPreviousPageRequest());
}

function renderAuthAgain($page, $namefilter) {
    $smarty = mkSmarty();

    $familia = new FamiliaProducto();
    $arrayFamilias = $familia->getAll(10, 0, '');
      $smarty->assign("arrayFamilias", $arrayFamilias);
    $smarty->assign("namefilter_familia",'' );
    $smarty->assign("currentpage_familia", 1);

    $prov = new Proovedor();
    $arrayprov = $prov->getAll(10, 0, '');
    $smarty->assign("arrayProovedores", $arrayprov);
    $smarty->assign("namefilter_prov", '');
    $smarty->assign("currentpage_prov", 1);

    $prod = new Producto();
    $arrayprod = $prod->getAll(10, 10 * $page, $namefilter);
    $smarty->assign("arrayProductos", $arrayprod);
    $smarty->assign("namefilter_prod", $namefilter);
    $smarty->assign("currentpage_prod", $page);
    
    $smarty->assign("namefilter_prov", '');   
    $smarty->assign("currentpage_prov", 1);   
    $smarty->assign("render", 'producto');
    $path = $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Smarty/templates/auth.tpl';
    $smarty->display($path);
}
