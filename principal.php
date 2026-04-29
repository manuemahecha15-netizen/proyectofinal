<?php
session_start();

// 🔥 IMPORTANTE: evitar HTML antes de JSON en acciones AJAX
$controllerName = $_GET['controller'] ?? 'login';
$action = $_GET['action'] ?? 'login';

require_once "Controllers/LoginController.php";
require_once "Controllers/ClienteController.php";
require_once "Controllers/AdminController.php";

switch ($controllerName) {

    case 'cliente':
        $controller = new ClienteController();
        break;

    case 'admin':
        $controller = new AdminController();
        break;

    default:
        $controller = new LoginController();
        break;
}

// 🔥 VALIDACIÓN SEGURA
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo json_encode(["status"=>"error","msg"=>"Acción no existe"]);
}
?>