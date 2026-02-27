<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
   
     <a href="principal.php?controller=productos&action=crear">Crear</a>
    <a href="principal.php?controller=login&action=logout">Cerrar sesion</a>
     <?=$_SESSION['user'] ?>
    <?=$_SESSION['rol'] ?>
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
    <?php foreach($datos as $u): ?>
    <tr>
        <td><?= $u ['id_producto']?></td>
        <td><?= $u ['nombre']?></td>
        <td><?= $u ['descripcion']?></td>
        <td><?= $u ['precio']?></td>
        <td><?= $u ['stock']?></td> 
        <td><?= $u ['id_categoria']?></td> 
        <td><?= $u ['estado']?></td> 
        <td>
            <a href="principal.php?controller=productos&action=editar&id=<?=$u['id_producto']?>">editar</a>
            <a href="principal.php?controller=productos&action=eliminar&id=<?=$u['id_producto']?>">eliminar</a>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    
</body>
</html>