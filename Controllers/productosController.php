<?php
require_once __DIR__."/../models/productos.php";
// Se incluye el modelo productos.php para poder usar sus funciones (CRUD)

class productosController{
    // Se define la clase productosController
    // Esta clase controla las acciones relacionadas con los productos

public function index(){  // Método que muestra la lista de productos
    $productos=new productos();         // Se crea un objeto del modelo usuarios

    $dato=$productos->mostrar();  // Se llama al método mostrar() del modelo
        // Trae todos los productos de la base de datos

    require_once __DIR__."/../Views/productos/listar.php";  // Se carga la vista listar.php para mostrar los datos

}
public function crear(){ // Método para crear un nuevo producto
    if($_POST){            // Verifica si se enviaron datos desde un formulario
        $productos=new productos();
        $p=$productos->save(
            $_POST['id_producto'],
            $_POST['nombre'],
            $_POST['descripcion'],
            $_POST['precio'],
            $_POST['stock'],
            $_POST['id_categoria'],
            $_POST['estado'],
    );
    header("Location: principal.php");

    }
     require_once __DIR__."/../Views/producto/crear.php";
}


public function editar(){
    $productos=new productos();
    if($_POST){


    $p=$productos->update(
        $_POST['id_producto'],
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['precio'],
        $_POST['stock'],
        $_POST['id_categoria'],
        $_POST['estado'],

    );

    header("Location: principal.php"); // Redirige después de actualizar

    }
    $productos=$usuarios->GetById($_GET['id']); // Obtiene los datos del producto por ID para mostrarlos en el formulario
    require_once __DIR__. "/../views/productos/editar.php";   // Carga la vista para editar producto


}

public function eliminar(){
    $productos=new productos();
    $p=$productos->delete($_GET['id']);
    header("Location: principal.php");
}
}
?>