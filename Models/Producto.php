<?php
require_once "Config/db.php";

class Producto {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    /* 🔥 OBTENER TODOS (ADMIN VE TODO) */
    public function getAll() {
        return $this->conn->query("SELECT * FROM productos ORDER BY id_producto DESC");
    }

    /* 🔥 SOLO ACTIVOS (CLIENTE) */
    public function getActivos() {
        return $this->conn->query("SELECT * FROM productos WHERE estado='activo'");
    }

    /* 🔥 BUSCAR PRODUCTOS */
    public function buscar($texto) {
        return $this->conn->query("SELECT * FROM productos 
                                  WHERE nombre LIKE '%$texto%' 
                                  AND estado='activo'");
    }

    /* 🔥 OBTENER UNO */
    public function getById($id) {
        return $this->conn->query("SELECT * FROM productos WHERE id_producto=$id");
    }

    /* 🔥 CREAR PRODUCTO */
    public function save($nombre, $precio, $stock, $img, $categoria = null) {

        $this->conn->query("INSERT INTO productos 
            (nombre, precio, stock, Ruta_Imagen, id_categoria, estado)
            VALUES 
            ('$nombre','$precio','$stock','$img','$categoria','activo')");
    }

    /* 🔥 ACTUALIZAR PRODUCTO */
    public function update($id, $nombre, $precio, $stock, $img = null) {

        if ($img) {
            $this->conn->query("UPDATE productos SET 
                nombre='$nombre',
                precio='$precio',
                stock='$stock',
                Ruta_Imagen='$img'
                WHERE id_producto=$id");
        } else {
            $this->conn->query("UPDATE productos SET 
                nombre='$nombre',
                precio='$precio',
                stock='$stock'
                WHERE id_producto=$id");
        }
    }

    /* 🔥 DESACTIVAR (NO BORRAR) */
    public function desactivar($id) {
        $this->conn->query("UPDATE productos 
                            SET estado='inactivo' 
                            WHERE id_producto=$id");
    }

    /* 🔥 ACTIVAR */
    public function activar($id) {
        $this->conn->query("UPDATE productos 
                            SET estado='activo' 
                            WHERE id_producto=$id");
    }

    /* 🔥 ACTUALIZAR STOCK AUTOMÁTICO */
    public function descontarStock($id, $cantidad) {
        $this->conn->query("UPDATE productos 
                            SET stock = stock - $cantidad 
                            WHERE id_producto=$id");
    }

    /* 🔥 VALIDAR STOCK */
    public function hayStock($id, $cantidad) {
        $res = $this->conn->query("SELECT stock FROM productos WHERE id_producto=$id");
        $data = $res->fetch_assoc();

        return ($data['stock'] >= $cantidad);
    }
}