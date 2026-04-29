<?php
require_once "Config/db.php";

class AdminController {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "maracumango");

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // 🔒 seguridad rol admin
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
            header("Location: principal.php?controller=cliente&action=dashboard");
            exit();
        }
    }

    // =========================
    // 🔥 DASHBOARD PRINCIPAL
    // =========================
    public function dashboard() {

        $totalProductos = $this->conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc();
        $totalVentas = $this->conn->query("SELECT COUNT(*) as total FROM ventas")->fetch_assoc();
        $totalStock = $this->conn->query("SELECT SUM(stock) as total FROM productos")->fetch_assoc();

        require_once "views/admin/dashboard.php";
    }

    // =========================
    // 🔥 PRODUCTOS
    // =========================
    public function productos() {
        $productos = $this->conn->query("SELECT * FROM productos");
        require_once "views/admin/productos.php";
    }

    public function guardarProducto() {

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $this->conn->query("INSERT INTO productos (nombre, precio, stock, estado)
                            VALUES ('$nombre','$precio','$stock','activo')");

        header("Location: principal.php?controller=admin&action=productos");
    }

    public function eliminarProducto() {

        $id = $_GET['id'];
        $this->conn->query("DELETE FROM productos WHERE id_producto=$id");

        header("Location: principal.php?controller=admin&action=productos");
    }

    // =========================
    // 🔥 VENTAS
    // =========================
    public function ventas() {

        $ventas = $this->conn->query("
            SELECT v.*, u.usuario 
            FROM ventas v
            INNER JOIN usuarios u ON v.id_usuario = u.id_usuario
            ORDER BY v.id_venta DESC
        ");

        require_once "views/admin/ventas.php";
    }

    // =========================
    // 🔥 FACTURA DETALLE
    // =========================
    public function factura() {

        $id = $_GET['id'];

        $venta = $this->conn->query("
            SELECT * FROM ventas WHERE id_venta=$id
        ")->fetch_assoc();

        $detalle = $this->conn->query("
            SELECT d.*, p.nombre
            FROM detalle_venta d
            INNER JOIN productos p ON p.id_producto = d.id_producto
            WHERE d.id_venta=$id
        ");

        require_once "views/admin/factura.php";
    }

    // =========================
    // 🔥 PROVEEDORES
    // =========================
    public function proveedores() {

        $proveedores = $this->conn->query("SELECT * FROM proveedores");

        require_once "views/admin/proveedores.php";
    }

    public function guardarProveedor() {

        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];

        $this->conn->query("INSERT INTO proveedores (nombre, telefono)
                            VALUES ('$nombre','$telefono')");

        header("Location: principal.php?controller=admin&action=proveedores");
    }

    // =========================
    // 🔥 REPORTES
    // =========================
    public function reportes() {

        $ventas = $this->conn->query("
            SELECT DATE(fecha) as dia, SUM(total) as total
            FROM ventas
            GROUP BY DATE(fecha)
            ORDER BY fecha DESC
        ");

        require_once "views/admin/reportes.php";
    }
}