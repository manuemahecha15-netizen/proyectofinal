<?php
require_once __DIR__."/../models/usuarios.php";
// Se incluye el modelo usuarios.php para poder usar sus funciones (CRUD)

class UsuariosController{
    // Se define la clase UsuariosController
    // Esta clase controla las acciones relacionadas con los usuarios

public function index(){  // Método que muestra la lista de usuarios
    $usuarios=new usuarios();         // Se crea un objeto del modelo usuarios

    $datos=$usuarios->mostrar();  // Se llama al método mostrar() del modelo
        // Trae todos los usuarios de la base de datos

    require_once __DIR__."/../Views/usuario/listar.php";  // Se carga la vista listar.php para mostrar los datos

}
public function crear(){ // Método para crear un nuevo usuario
    if($_POST){            // Verifica si se enviaron datos desde un formulario
        $usuarios=new usuarios();
        $u=$usuarios->save(
            $_POST['usuario'],
            $_POST['contraseña'],
            $_POST['id_rol'],
            $_POST['estado'],
            $_POST['fecha_creacion'],
    );
    header("Location: principal.php");

    }
     require_once __DIR__."/../Views/usuario/crear.php";
}


public function editar(){
    $usuarios=new usuarios();
    if($_POST){


    $u=$usuarios->update(
        $_POST['id'],
        $_POST['usuario'],
        $_POST['contraseña'],
        $_POST['id_rol'],
        $_POST['estado'],
        $_POST['fecha_creacion'],

    );

    header("Location: principal.php"); // Redirige después de actualizar

    }
    $datos=$usuarios->GetById($_GET['id']); // Obtiene los datos del usuario por ID para mostrarlos en el formulario
    require_once __DIR__. "/../views/usuario/editar.php";   // Carga la vista para editar usuario


}

public function eliminar(){
    $usuarios=new usuarios();
    $u=$usuarios->delete($_GET['id']);
    header("Location: principal.php");
}
}
?>