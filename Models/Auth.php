<?php
require_once __DIR__."/../Config/db.php";

class Auth{   // Esta clase se encarga de la autenticación (inicio de sesión)
      private $db;  // Se declara una variable privada para guardar la conexión a la base de datos
    public function __construct(){
        $this->db=Database::Conectar(); 
          // Se llama al método Conectar() de la clase Database
        // Y se guarda la conexión en la variable $db

    }
    public function login($user,$pass){
        $sql="SELECT* from roles as r INNER JOIN usuarios as u ON r.id_rol=u.id_rol WHERE u.usuario='$user' AND u.contraseña='$pass'";
        $resul=$this->db->query($sql);
           // Consulta SQL:
        // Busca un usuario que coincida con el usuario y contraseña
        // Hace un INNER JOIN para traer también el rol del usuario

        if($resul->num_rows>0){
            $datos=$resul->fetch_assoc();
            return $datos;
        }
        else{
            return false;
        }


}

    public function save($usuario,$contraseña,$correo){
      $errores=[];
       $id_rol='3';
       $estado='activo';
       $fecha_creacion='2026-03-05 10:57:28';
      if(strlen($usuario)<=5){
         $errores[]= "el usuario debe de tener mas de 6 caracteres";
         
      }
         // Método para insertar un nuevo usuario
         $sql="INSERT INTO usuarios (usuario,contraseña,id_rol,estado,fecha_creacion,correo) VALUES('$usuario','$contraseña','$id_rol','$estado','$fecha_creacion','$correo')";

       return $this->db->query($sql);
    
      }


}
?>