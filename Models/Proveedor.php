<?php
require_once "Config/db.php";

class Proveedor {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM proveedores");
    }

    public function save($nombre, $telefono) {
        $this->conn->query("INSERT INTO proveedores (nombre, telefono)
                            VALUES ('$nombre','$telefono')");
    }

    public function delete($id) {
        $this->conn->query("DELETE FROM proveedores WHERE id=$id");
    }
}