<html>
    <head><title>Familias</title></head>
    <body> 
             <?php
            //Enable Errors
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
                 
            require_once __DIR__.'/Models/FamiliaProducto.php';
            require_once __DIR__.'/Models/Proovedor.php';
            require_once __DIR__.'/Models/Producto.php';
            require_once __DIR__.'/Config/config_SMARTY.php'; 
     
                 
            $familia = new FamiliaProducto();
            $arrayloco = $familia->getAll();           
            if(array_key_exists('delete_id', $_POST)){
                $familia->remove($_POST['delete_id']);
            }
            if(array_key_exists('mod_id', $_POST)){
                $familia->modify($_POST['mod_id'],$_POST['mod_name']);
            }
            if(array_key_exists('id', $_POST)){
                $id = (int)$_POST['id'];
                $nombre = $_POST['nombre'];
                $familia->set($id, $nombre);
            }
            
            
            $prov = new Proovedor();
            $arrayprov = $prov->getAll();       
            if(array_key_exists('delete_id_prov', $_POST)){
                $prov->remove($_POST['delete_id_prov']);
            }
            if(array_key_exists('mod_id_prov', $_POST)){
                $prov->modify($_POST['mod_id_prov'],$_POST['mod_name_prov']);
            }
            if(array_key_exists('id_prov', $_POST)){
                $id = (int)$_POST['id_prov'];
                $nombre = $_POST['nombre_prov'];
                $prov->set($id, $nombre);
            }
            
            
            $prod = new Producto();
            $arrayprod = $prod->getAll();       
            if(array_key_exists('delete_id_prod', $_POST)){
                $prod->remove($_POST['delete_id_prod']);
            }
            
            if(array_key_exists('mod_id_prod', $_POST)){
                $id = (int)$_POST['mod_id_prod'];
                $nombre = $_POST['mod_name_prod'];
                $esDestacado = $_POST['mod_destacado_prod'];
                $proovedor = $_POST['mod_prov_prod'];
                $familia = $_POST['mod_fam_prod'];
                $precio = $_POST['precio_prod'];
                $imagen = $_POST['imagen_prod'];
                $prod->modify($id, $nombre, $esDestacado, $proovedor, $familia, $precio,$imagen);
            }
            if(array_key_exists('id_prod', $_POST)){
                $id = (int)$_POST['id_prod'];
                $nombre = $_POST['name_prod'];
                $esDestacado = $_POST['destacado_prod'];
                $proovedor = $_POST['prov_prod'];
                $familia = $_POST['fam_prod'];
                $precio = $_POST['precio_prod'];
                $imagen = $_POST['imagen_prod'];
                
                $prod->set($id, $nombre, $esDestacado, $proovedor, $familia, $precio,$imagen);
            }                   
 
            $smarty = mkSmarty();
            $smarty->assign("arrayProductos", $arrayprod);
            $smarty->assign("arrayProovedores", $arrayprov);
            $smarty->assign("arrayFamilias", $arrayloco);
            $path = __DIR__.'/Smarty/templates/index.tpl';
            $smarty->display($path);  
             if($conn->consulta($sql, $parametros)){
           
                 $listadoAutores = $conn->restantesRegistros();
             }
          
            $smarty->assign("carpeta", __DIR__.'Fotos/');
            /*$smarty->assign("pagAnt",$pagina-1);
            $smarty->assign("pagProx",$pagina+1);
            $smarty->assign("pagina",$pagina);*/
        ?>
    </body>
</html>