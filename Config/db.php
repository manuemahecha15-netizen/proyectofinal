<?php

class Database{
    
    public static function Conectar(){
        $conexion=new mysqli(
            "localhost",  // Servidor donde está la base de datos
            "root", // usuario de la base de datos
            "",
            "maracumango"

        );
        //se verifica si ocurrio un error en la conexion
        if($conexion->connect_errno){
            //si hay error, se detiene el programa
            die($conexion->connect_error);

        }
        //si no hay error, se retorna la conexion establecida
        return $conexion;
    }
}


?>