<?php
require_once "Models/Venta.php";

class VentaController {

    public function pagar() {
        session_start();

        $carrito = json_decode($_POST['carrito'], true);
        $id_usuario = $_SESSION['user']['id_usuario'];

        $id_venta = Venta::guardar($id_usuario, $carrito);

        echo json_encode([
            "status" => "ok",
            "venta" => $id_venta
        ]);
    }

    // 🔥 PANEL ADMIN VENTAS
    public function admin() {

        $ventas = Venta::obtenerVentas();

        require_once "Views/admin/ventas.php";
    }

    // 🔥 VER FACTURA
    public function factura() {

        $id = $_GET['id'];

        $detalle = Venta::detalle($id);

        require_once "Views/admin/factura.php";
    }
}