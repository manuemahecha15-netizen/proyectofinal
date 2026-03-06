<?php
session_start();

require_once "controllers/UsuariosController.php";
require_once "controllers/Authcontroller.php";
require_once "controllers/productoscontroller.php";
require_once "controllers/ventasController.php";

$controller=$_GET['controller'] ?? null;
$action=$_GET['action'] ?? null; // Se obtiene la acción desde la URL (si existe)

if(!isset($_SESSION['user'])){
    
    if($controller != 'login'){
        $controller='login';
        $action='login';
    }
}
else{
  $controller=$controller ?? 'usuarios';   // Si no se especifica controlador, por defecto será "usuarios"
  $action=$action ?? 'index';   // Si no se especifica acción, por defecto será "index"

}

switch($controller){
  case 'usuarios':
    $controller=new UsuariosController();
   break;

   case 'productos':
    $controller=new productosController();
   break;

    case 'login':
    $controller=new AuthController();
   break;
   case 'ventas':
    $controller=new ventasController();
   break;
   default:
     $controller=new UsuariosController();
   break;

}

if(method_exists($controller,$action)){    // Verifica si el método existe en el controlador
    $controller->$action();
}else{
    echo "la action no esta permitida o no existe";
}

?>