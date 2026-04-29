<?php
require_once "Config/db.php";

class Venta {

    public static function guardar($id_usuario, $carrito){

        global $conn;

        // 🔥 calcular total
        $total = 0;
        foreach($carrito as $p){
            $total += $p['precio'] * $p['cantidad'];
        }

        // 🔥 guardar venta
        $conn->query("INSERT INTO ventas (id_usuario, total) VALUES ($id_usuario, $total)");

        $id_venta = $conn->insert_id;

        // 🔥 guardar detalle + actualizar stock
        foreach($carrito as $p){

            $conn->query("INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio)
            VALUES ($id_venta, {$p['id']}, {$p['cantidad']}, {$p['precio']})");

            // 🔥 DESCONTAR STOCK
            $conn->query("UPDATE productos 
                          SET stock = stock - {$p['cantidad']} 
                          WHERE id_producto = {$p['id']}");
        }

        return $id_venta;
    }
}
?>