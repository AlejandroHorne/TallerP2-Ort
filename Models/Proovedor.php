<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Classes/class.Conexion.BD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_DB.php';

class Proovedor {

    public $id;
    public $nombre;
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
        $sql = "SELECT * FROM Proveedor WHERE Id = :id";
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        return $this->conn->consulta($sql, $parametros);
    }

    private function setAttributesIfMatchingID($id = 0) {
        $fila = $this->conn->siguienteRegistro();
        if ($fila) {
            if ($fila["Id"] == $id) {
                $this->id = $fila["Id"];
                $this->nombre = $fila["Nombre"];
            }
        }
    }

    public function set($nombre) {

        if ($this->conn->conectar()) {
            if ($this->setQuery($nombre)) {
//                return 'ALLGUD';
            }
        } else {
            return $this->conn->ultimoError();
        }
    }

    private function setQuery($nombre) {
        $parametros = array();
//        $parametros[0] = array("id", $id, "int", 11);
        $parametros[0] = array("nombre", $nombre, "string", 200);
        $sql = "INSERT INTO Proveedor (Nombre) VALUES (:nombre)";
        return $this->conn->consulta($sql, $parametros);
    }

    public function getAll($limit, $offset, $namefilter) {
        $parametros = array();
        $filter = '%' . $namefilter . '%';
        $parametros[0] = array("namefilter", $filter, "int", 11);
        $parametros[1] = array("limit", $limit, "int", 11);
        $parametros[2] = array("offset", $offset, "int", 11);
        $sql = "SELECT * FROM Proveedor WHERE Nombre LIKE :namefilter LIMIT :limit OFFSET :offset";
        $returnList = array();
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                $arr = $this->conn->restantesRegistros();
                if (count($arr) > 0) {
                    foreach ($arr as $fila) {
                        $proovedor = new Proovedor();
                        $proovedor->id = $fila["Id"];
                        $proovedor->nombre = $fila["Nombre"];
                        array_push($returnList, $proovedor);
                    }
                }
            }
        }
        return $returnList;
    }

    public function modify($id, $nombre) {
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        $parametros[1] = array("nombre", $nombre, "string", 200);
        $sql = " UPDATE Proveedor SET Nombre = :nombre WHERE Id = :id";
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
        $sql = "DELETE FROM Proveedor WHERE Id = :id";
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