<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Classes/class.Conexion.BD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_DB.php';

class Producto {

    public $id;
    public $nombre;
    public $esDestacado;
    public $proovedor;
    public $familia;
    public $precio;
    public $imagen;
    private $conn;

    function __construct() {
        $this->conn = new ConexionBD('mysql', DBHOST, DBNAME, DBUSER, DBPASS);
    }

    function __destruct() {
        unset($this);
    }

    public function get($id = 0) {
        if ($id != 0) {
            if ($this->conn->conectar()) {
                if ($this->getQuery($id)) {
                    $this->setAttributesIfMatchingID($id);
                } else {
                    echo $this->conn->ultimoError;
                }
            } else {
                echo $this->conn->ultimoError;
            }
        } else {
            echo "Id Vacia";
        }
    }

    private function getQuery($id = 0) {
        $sql = "SELECT * FROM Producto WHERE ID_Producto = :id";
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        return $this->conn->consulta($sql, $parametros);
    }

    private function setAttributesIfMatchingID($id = 0) {
        $fila = $this->conn->siguienteRegistro();
        if ($fila) {
            if ($fila["ID_Producto"] == $id) {
                $this->id = $fila["ID_Producto"];
                $this->nombre = $fila["Nombre"];
                $this->esDestacado = $fila["EsDestacado"];
                $this->proovedor = $fila["Proovedor"];
                $this->familia = $fila["FamiliaProducto"];
                $this->precio = $fila["Precio"];
                $this->imagen = $fila["Foto"];
            }
        }
    }

    public function set($nombre, $esDestacado, $proovedor, $familia, $precio, $imagen) {
        if ($this->conn->conectar()) {
            if ($this->setQuery($nombre, $esDestacado, $proovedor, $familia, $precio, $imagen)) {
                return 'ALLGUD';
            }
        } else {
            return $this->conn->ultimoError();
        }
    }

    private function setQuery($nombre, $esDestacado, $proovedor, $familia, $precio, $imagen) {
        $parametros = array();
        $parametros[0] = array("nombre", $nombre, "string", 200);
        $parametros[1] = array("esDestacado", $esDestacado, "tinyint", 1);
        $parametros[2] = array("proovedor", $proovedor, "int", 11);
        $parametros[3] = array("familia", $familia, "int", 11);
        $parametros[4] = array("precio", $precio, "int", 11);
        $parametros[5] = array("imagen", $imagen, "string", 200);
        $sql = "INSERT INTO Producto (Nombre, Foto, Precio, EsDestacado, Proovedor, FamiliaProducto) VALUES (:nombre, :imagen , :precio, :esDestacado, :proovedor, :familia )";
        return $this->conn->consulta($sql, $parametros);
    }

    public function getAll($limit, $offset, $namefilter) {
        $parametros = array();
        $filter = '%' . $namefilter . '%';
        $parametros[0] = array("namefilter", $filter, "int", 11);
        $parametros[1] = array("limit", $limit, "int", 11);
        $parametros[2] = array("offset", $offset, "int", 11);
        $sql = "SELECT * FROM Producto WHERE Nombre LIKE :namefilter LIMIT :limit OFFSET :offset";
        $returnList = array();
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                $arr = $this->conn->restantesRegistros();
                if (count($arr) > 0) {
                    foreach ($arr as $fila) {
                        $proovedor = new Proovedor();
                        $proovedor->id = $fila["ID_Producto"];
                        $proovedor->nombre = $fila["Nombre"];
                        $proovedor->esDestacado = $fila["EsDestacado"];
                        $proovedor->proovedor = $fila["Proovedor"];
                        $proovedor->familia = $fila["FamiliaProducto"];
                        $proovedor->precio = $fila["Precio"];
                        $proovedor->imagen = $fila["Foto"];
                        array_push($returnList, $proovedor);
                    }
                }
            }
        }
        return $returnList;
    }

    public function getTotalRecords() {
        $parametros = array();
        $parametros[0] = array("limit", $limit, "int", 11);
        $parametros[1] = array("offset", $offset, "int", 11);
        $sql = "SELECT * FROM Producto LIMIT :limit OFFSET :offset";
    }

    public function modify($id, $nombre) {
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        $parametros[1] = array("nombre", $nombre, "string", 200);
        $parametros[2] = array("esDestacado", $esDestacado, "tinyint", 1);
        $parametros[3] = array("proovedor", $proovedor, "int", 11);
        $parametros[4] = array("familia", $familia, "int", 11);
        $parametros[5] = array("precio", $familia, "int", 11);
        $parametros[6] = array("imagen", $familia, "string", 200);
        $sql = " UPDATE Producto SET Nombre = :nombre:, EsDestacado = :esDestacado, Proovedor = :proovedor, FamiliaProducto = :familia, Precio = :precio, Imagen = :imagen WHERE ID_Producto = :id";
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function remove($id) {
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        $sql = "DELETE FROM Producto WHERE ID_Producto = :id";
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                return true;
            } else {
                return false;
            }
        }
    }

}

?>