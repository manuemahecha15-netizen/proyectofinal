<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="id_producto" placeholder="" value="<?=$datos['id_producto']?>"><br>
        <input type="text" name="descripcion" placeholder="descripcion" value="<?=$datos['descripcion']?>"><br>
        <input type="text" name="precio" placeholder="precio" value="<?=$datos['precio']?>"><br>
        <input type="number" name="stock" placeholder="stock" value="<?=$datos['stock']?>"><br>
        <input type="text" name="id_categoria" placeholder="id_categoria" value="<?=$datos['id_categoria']?>"><br>
        <input type="date" name="estado" placeholder="estado" value="<?=$datos['estado']?>"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>