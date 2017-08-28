<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Proovedor.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/FamiliaProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_SMARTY.php';

if (array_key_exists('eliminar_prov', $_POST)) {
    $prov = new Proovedor();
    $prov->remove($_POST['eliminar_prov']);
    renderAuthAgain(1, '');
}

if (array_key_exists('agregar_prov_nombre', $_POST)) {
    $prov = new Proovedor();
    $prov->set($_POST['agregar_prov_nombre']);
    renderAuthAgain(1, '');
}

if (isNameFilterRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['currentpage_prov'];
    renderAuthAgain($currentpage, $_POST['namefilter_prov']);
}

if (isNextPageRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['nextpage_prov'];
    renderAuthAgain($currentpage + 1, $_POST['namefilter_prov']);
}

if (isPreviousPageRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['previouspage_prov'];
    renderAuthAgain($currentpage - 1, $_POST['namefilter_prov']);
}

function isNextPageRequest() {
    return array_key_exists('nextpage_prov', $_POST);
}

function isPreviousPageRequest() {
    return array_key_exists('previouspage_prov', $_POST);
}

function isNameFilterRequest() {
    return array_key_exists('namefilter_prov', $_POST) && !(isNextPageRequest() || isPreviousPageRequest());
}

function renderAuthAgain($page, $namefilter) {
    $smarty = mkSmarty();

    $familia = new FamiliaProducto();
    $arrayFamilias = $familia->getAll(10, 0, '');
    $smarty->assign("arrayFamilias", $arrayFamilias);
    $smarty->assign("namefilter_familia", '');
    $smarty->assign("currentpage_familia", 1);
    $prod = new Producto();
    $arrayprod = $prod->getAll(10, 0, '');
    $smarty->assign("arrayProductos", $arrayprod);
    $smarty->assign("namefilter_prod", '');
    $smarty->assign("currentpage_prod", 1);

    $prov = new Proovedor();
    $arrayprov = $prov->getAll(10, 10 * ($page - 1), $namefilter);
    $smarty->assign("arrayProovedores", $arrayprov);
    $smarty->assign("namefilter_prov", $namefilter);
    $smarty->assign("currentpage_prov", $page);


    $smarty->assign("render", 'proovedor');
    $path = $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Smarty/templates/auth.tpl';
    $smarty->display($path);
}
