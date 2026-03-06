<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <table>
        <thead>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Total</th>
            <th>Metodo Pago</th>
            
</thead>
<tbody>
    <?php foreach($datos as $v): ?>
    <tr>
        <td><?= $v ['fecha']?></td>
        <td><?= $v ['id_usuario']?></td>
        <td><?= $v ['total']?></td>
        <td><?= $v ['metodo_pago']?></td>
      
        <td>
            <a href="principal.php?controller=ventas&action=editar&id=<?=$v['id_venta']?>">editar</a>
            <a href="principal.php?controller=ventas&action=eliminar&id=<?=$v['id_venta']?>">eliminar</a>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
    </table>
</body>
</html>