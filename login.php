<?php
session_start();

     //Enable Errors
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
      
            
            require_once __DIR__.'/Models/FamiliaProducto.php';
            require_once __DIR__.'/Models/Proovedor.php';
            require_once __DIR__.'/Models/Producto.php';
            require_once __DIR__.'/Config/config_SMARTY.php'; 
            require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Classes/class.Conexion.BD.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_DB.php';

{echo ("llegue");}
            
$usuario = $_POST['txtUsu'];
$clave = $_POST['txtPass'];

$conn = new ConexionBD("mysql", SERVIDOR, BASEDATOS, USUARIO, CLAVE);

if($conn->conectar()){
    $sql = "SELECT * FROM Usuarios";
    $sql .= " WHERE usuNom = :nom && usuPass = md5(:pass)";
    
    $parametros = array();
    $parametros[0] = array("nom",$usuario,"string");
    $parametros[1] = array("pass",$clave,"string");
    
    if($conn->consulta($sql, $parametros)){
        if($conn->cantidadRegistros()==1){
            $_SESSION['entro'] = true;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['mensaje'] = "";
            header("Location: principal.php");
        }
        else{
            $_SESSION['mensaje'] = "Credenciales incorrectas!";
            header("Location: index.php");
        }
    }
    else{
        $_SESSION['mensaje'] = "Error Inesperadofjadslfjkadsl!";
        header("Location: index.php");
    }
}
else{
    $_SESSION['mensaje'] = "Error Inesperado!";
    header("Location: index.php");
}

?>