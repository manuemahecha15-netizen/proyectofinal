<?php

class Database{
    
    public function Conectar(){
        $conexion=new mysqli(
            "localhost",
            "root",
            "",
            "bd"

        );
        if($conexion->connect_errno){
            die($conexion->connect_error);

        }
        return $conexion;
    }
}


?>