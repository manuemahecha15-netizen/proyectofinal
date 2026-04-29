<?php
class ClienteController {

private $conn;

public function __construct() {
$this->conn = new mysqli("localhost","root","","maracumango");

if ($this->conn->connect_error) {
die("Error DB: " . $this->conn->connect_error);
}
}

// ─────────────────────────────
// DASHBOARD
// ─────────────────────────────
public function dashboard() {

if (!isset($_SESSION['user'])) {
header("Location: principal.php?controller=login&action=login");
exit();
}

$productos = $this->conn->query("
SELECT * FROM productos WHERE estado='activo'
");

require_once "Views/cliente/dashboard.php";
}

// ─────────────────────────────
// 💳 PAGAR FINAL FUNCIONAL
// ─────────────────────────────
public function pagar() {

header('Content-Type: application/json; charset=utf-8');
error_reporting(0);

try {

if (!isset($_SESSION['user'])) {
echo json_encode(["status"=>"error","msg"=>"sin sesión"]);
exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['productos']) || !is_array($data['productos'])) {
echo json_encode(["status"=>"error","msg"=>"productos inválidos"]);
exit();
}

$total = (float)($data['total'] ?? 0);
$productos = $data['productos'];

$id_usuario = (int)($_SESSION['user']['id_usuario'] ?? 0);

if ($id_usuario <= 0) {
echo json_encode(["status"=>"error","msg"=>"usuario inválido"]);
exit();
}

// ─────────────────────────────
// INSERT VENTA
// ─────────────────────────────
$sqlVenta = "
INSERT INTO ventas (id_usuario, total)
VALUES ($id_usuario, $total)
";

if (!$this->conn->query($sqlVenta)) {
throw new Exception("Error venta: " . $this->conn->error);
}

$id_venta = $this->conn->insert_id;

// ─────────────────────────────
// DETALLE + STOCK
// ─────────────────────────────
foreach ($productos as $p) {

$id = isset($p['id']) ? (int)$p['id'] : 0;
$cantidad = isset($p['cantidad']) ? (int)$p['cantidad'] : 0;
$precio = isset($p['precio']) ? (float)$p['precio'] : 0;

if ($id <= 0 || $cantidad <= 0) {
continue;
}

// detalle venta (TU TABLA REAL)
$sqlDetalle = "
INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio)
VALUES ($id_venta, $id, $cantidad, $precio)
";

if (!$this->conn->query($sqlDetalle)) {
throw new Exception("Error detalle: " . $this->conn->error);
}

// actualizar stock
$this->conn->query("
UPDATE productos
SET stock = stock - $cantidad
WHERE id_producto = $id
");
}

// ─────────────────────────────
// RESPUESTA OK
// ─────────────────────────────
echo json_encode([
"status" => "ok",
"venta" => $id_venta
]);

exit();

} catch (Exception $e) {

echo json_encode([
"status" => "error",
"msg" => $e->getMessage()
]);

exit();
}
}
}
?>