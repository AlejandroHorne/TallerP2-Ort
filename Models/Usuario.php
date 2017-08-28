<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Classes/class.Conexion.BD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'TallerP2/Config/config_DB.php';

class Usuario {

    public $id;
    public $username;
    public $password;
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
        $sql = "SELECT * FROM Usuario WHERE ID_Usuario = :id";
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        return $this->conn->consulta($sql, $parametros);
    }

    private function setAttributesIfMatchingID($id = 0) {
        $fila = $this->conn->siguienteRegistro();
        if ($fila) {
            if ($fila["ID_Proovedor"] == $id) {
                $this->id = $fila["ID_Usuario"];
                $this->username = $fila["Username"];
                $this->password = $fila["Password"];
            }
        }
    }

    public function set($id, $username, $password) {
        $this->get($id);
        if ($id != $this->id) {
            if ($this->conn->conectar()) {
                if ($this->setQuery($id, $username, $password)) {
//                return 'ALLGUD';
                }
            } else {
                return $this->conn->ultimoError();
            }
        }
    }

    private function setQuery($id, $username, $password) {
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        $parametros[1] = array("username", $username, "string", 200);
        $parametros[2] = array("password", $password, "string", 200);
        $sql = "INSERT INTO Proovedor (ID_Usuario, Username, Password) VALUES (:id, :username, :password)";
        return $this->conn->consulta($sql, $parametros);
    }

    public function getAll() {
        $parametros = array();
        $sql = "SELECT * FROM Proovedor";
        $returnList = array();
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                $arr = $this->conn->restantesRegistros();
                if (count($arr) > 0) {
                    foreach ($arr as $fila) {
                        $proovedor = new Proovedor();
                        $proovedor->id = $fila["ID_Usuario"];
                        $proovedor->username = $fila["Username"];
                        $proovedor->password = $fila["Password"];
                        array_push($returnList, $proovedor);
                    }
                }
            }
        }
        return $returnList;
    }

    public function modify($id, $username, $password) {
        $parametros = array();
        $parametros[0] = array("id", $id, "int", 11);
        $parametros[1] = array("username", $username, "string", 200);
        $parametros[2] = array("password", $password, "string", 200);
        $sql = " UPDATE Proovedor SET Username = :username, Password = :password WHERE ID_Usuario = :id";
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
        $sql = "DELETE FROM Proovedor WHERE ID_Usuario = :id";
        if ($this->conn->conectar()) {
            if ($this->conn->consulta($sql, $parametros)) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function login($username, $password){
        $arr = $this->getAll();
        foreach($arr as $user){
            if($user->username == $username){
                return true;
            }
        }
        return false;
    }

}
