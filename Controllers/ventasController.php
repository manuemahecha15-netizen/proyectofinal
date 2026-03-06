<?php

require_once __DIR__."/../Models/ventas.php";

class ventasController{

public function index(){
 
  $ventas=new ventas();
  $datos=$ventas->mostrar();

  require_once __DIR__."../views/ventas/listar.php";
}

public function guardar(){
    
     if($_POST){
     $ventas=new ventas();
     $id_venta=$ventas->save(
      $_POST['id_usuario'],
      $_POST['total'],
      $_POST['metodo_pago']
     ); 

     $carrito = json_decode($_POST['carrito'],true);

        foreach($carrito as $producto){

        $ventas->guardarDetalle(
        $id_venta,
        $producto['id'],
        1,
        $producto['precio'],
        $producto['precio']
        );
        }

      if($ventas){
            echo json_encode([
                "estado"=>"ok",
                "mensaje"=>"Venta guardada"
            ]);
        }else{
            echo json_encode([
                "estado"=>"error",
                "mensaje"=>"No se pudo guardar"
            ]);
        }   
    }

}
}





?>