<?php


 // Si NO hay usuario en sesión (no ha iniciado sesión)

if($_SESSION['rol']!='admin'){
   header("Location: principal.php?controller=usuario&&action=index"); 
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
   
     <a href="../../principal.php?controller=productos&action=crearproducto">Crear</a>
    <a href="principal.php?controller=login&action=logout">Cerrar sesion</a>
    <table>
        <thead>
            <th>id_producto</th>
            <th>nombre</th>
            <th>descripcion</th>
            <th>precio</th>
            <th>stock</th>
            <th>id_categoria</th>
            <th>estado</th>

</thead>
<tbody>
    <?php if(!empty($datos)):?>
    <?php foreach($datos as $p): ?>
    <tr>
        <td><?= $p ['id_producto']?></td>
        <td><?= $p ['nombre']?></td>
        <td><?= $p ['descripcion']?></td>
        <td><?= $p ['precio']?></td>
        <td><?= $p ['stock']?></td> 
        <td><?= $p ['id_categoria']?></td> 
        <td><?= $p ['estado']?></td> 
        <td>
            <a href="../../principal.php?controller=productos&action=editar&id=<?=$p['id_producto']?>">editar</a>
            <a href="../../principal.php?controller=productos&action=eliminar&id=<?=$p['id_producto']?>">eliminar</a>
        </td>
    </tr>
    <?php endforeach ?>
    <?php endif; ?>
    </tbody>
    </table>
    
</body>
</html>