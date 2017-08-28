<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Proovedor.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Models/FamiliaProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_SMARTY.php';

if (array_key_exists('eliminar_familia', $_POST)) {
    $familia = new FamiliaProducto();
    $familia->remove($_POST['eliminar_familia']);
    renderAuthAgain(1,  '');
}

if (array_key_exists('agregar_familia_nombre', $_POST)) {
    $familia = new FamiliaProducto();
    $familia->set($_POST['agregar_familia_nombre']);
    renderAuthAgain(1, '');
}

if (isNameFilterRequest()) {
    $prod = new FamiliaProducto();
    $currentpage = (int) $_POST['currentpage_familia'];
    renderAuthAgain($currentpage, $_POST['namefilter_familia']);
}

if (isNextPageRequest()) {
    $prod = new FamiliaProducto();
    $currentpage = (int) $_POST['nextpage_familia'];
    renderAuthAgain($currentpage + 1, $_POST['namefilter_familia']);
}

if (isPreviousPageRequest()) {
    $prod = new Producto();
    $currentpage = (int) $_POST['previouspage_familia'];
    renderAuthAgain($currentpage - 1, $_POST['namefilter_familia']);
}

function isNextPageRequest() {
    return array_key_exists('nextpage_familia', $_POST);
}

function isPreviousPageRequest() {
    return array_key_exists('previouspage_familia', $_POST);
}

function isNameFilterRequest() {
    return array_key_exists('namefilter_familia', $_POST) && !(isNextPageRequest() || isPreviousPageRequest());
}

function renderAuthAgain($page, $namefilter) {
    $smarty = mkSmarty();

    $familia = new FamiliaProducto();
    $arrayFamilias = $familia->getAll(10, 10 * ($page - 1), $namefilter);
    $smarty->assign("arrayFamilias", $arrayFamilias);
    $smarty->assign("namefilter_familia",$namefilter );
    $smarty->assign("currentpage_familia", $page);
    $prod = new Producto();

    $arrayprod = $prod->getAll(10, 0, '');
    $smarty->assign("arrayProductos", $arrayprod);
    $smarty->assign("namefilter_prod", '');
    $smarty->assign("currentpage_prod", 1);

    $prov = new Proovedor();
    $arrayprov = $prov->getAll(10, 0, '');
    $smarty->assign("arrayProovedores", $arrayprov);
    $smarty->assign("namefilter_prov", '');
    $smarty->assign("currentpage_prov", 1);


    $smarty->assign("render", 'familia');
    $path = $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Smarty/templates/auth.tpl';
    $smarty->display($path);
}
