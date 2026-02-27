<?php

require_once __DIR__."/../config/db.php";

class productos{
    private $db;
    public function __construct(){
        $this->db=Database::conectar();
    }

    public function mostrar(){
           // Método para mostrar todos los productos
        $sql="SELECT* FROM productos";

     $resul=$this->db->query($sql);


     return $resul->fetch_all(MYSQLI_ASSOC);

    }

      public function save($id_producto,$nombre,$descripcion,$precio,$stock,$id_categoria,$estado){
         // Método para insertar un nuevo producto
         $sql="INSERT INTO  (id_producto,nombre,descripcion,precio,stock,id_categoria,estado) VALUES('$id_categoria','$nombre','$descripcion','$precio','$stock','$id_categoria','$estado')";

       return $this->db->query($sql);
    
      }

         public function GetById($id){         // Método para obtener un producto por su ID

        $sql="SELECT* FROM productos WHERE id_producto=$id";
        
        $resul=$this->db->query($sql);

        return $resul->fetch_assoc();

   }

   public function update($id_producto,$nombre,$descripcion,$precio,$stock,$id_categoria,$estado){
    $sql="UPDATE productos SET productos='$productos',nombre='$nombre',descripcion='$descripcion',precio='$precio',stock='$stock',id_categoria='$id_categoria',estado='$estado'WHERE id_usuario=$id";

    return $this->db->query($sql);

   }

   public function DELETE($id){
    $sql="DELETE FROM productos WHERE id_producto=$id";

    return $this->db->query($sql);



   }
       
     


    
}