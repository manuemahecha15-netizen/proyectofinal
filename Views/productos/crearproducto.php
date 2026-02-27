<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../principal.php?controller=productos&action=crear" method="post">
        <input type="text" name="id_producto">
        <input type="text" name="nombre">
        <input type="text" name="descripcion">
        <input type="text" name="precio">
        <input type="number" name="stock">
        <input type="text" name="id_categoria">
        <input type="text" name="estado">

        <button type="submit">Guardar</button>
    </form>
</body>
</html>