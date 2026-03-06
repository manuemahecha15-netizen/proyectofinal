<?php

require_once __DIR__."/../config/db.php";

class ventas{
    private $db;
    public function __construct(){
        $this->db=Database::conectar();
    }

    public function mostrar(){
           // Método para mostrar todos los usuarios
        $sql="SELECT* FROM ventas";

     $resul=$this->db->query($sql);


     return $resul->fetch_all(MYSQLI_ASSOC);

    }

      public function save($id_usuario,$total,$metodo_pago){
      
         // Método para insertar un nuevo usuario
         $sql="INSERT INTO ventas (fecha,id_usuario,total,metodo_pago) VALUES(NOW(),'$id_usuario','$total','$metodo_pago')";

        $this->db->query($sql);

        return $this->db->insert_id;
    
      }

      public function guardarDetalle($id_venta,$id_producto,$cantidad,$precio,$subtotal){

        $sql="INSERT INTO detalle_ventas (id_venta,id_producto,cantidad,precio_unitario,subtotal)
        VALUES('$id_venta','$id_producto','$cantidad','$precio','$subtotal')";

        $this->db->query($sql);

        }


         public function GetById($id){         // Método para obtener un usuario por su ID

        $sql="SELECT* FROM ventas WHERE id_venta=$id";
        
        $resul=$this->db->query($sql);

        return $resul->fetch_assoc();

   }

//    public function update($id,$usuario,$contraseña,$id_rol,$estado,$fecha_creacion){
//     $sql="UPDATE usuarios SET usuario='$usuario',contraseña='$contraseña',id_rol='$id_rol',estado='$estado',fecha_creacion='$fecha_creacion'WHERE id_usuario=$id";

//     return $this->db->query($sql);

//    }

//    public function DELETE($id){
//     $sql="DELETE FROM usuarios WHERE id_usuario=$id";

//     return $this->db->query($sql);



//    }
       
     


    
}

  