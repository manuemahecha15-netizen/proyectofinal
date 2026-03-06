<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Producto</title>
<link rel="stylesheet" href="assets/css/crearproductos.css">
</head>

<body>

<div class="form-container">

    <h2>Registrar Producto</h2>

    <form action="principal.php?controller=productos&action=crear" method="post" enctype="multipart/form-data">

        <div class="campo">
            <label>Imagen del producto</label>
             <input type="file" name="imagen">
        </div>

        <div class="campo">
            <label>Nombre</label>
            <input type="text" name="nombre">
        </div>

        <div class="campo">
            <label>Descripción</label>
            <input type="text" name="descripcion">
        </div>

        <div class="fila">
            <div class="campo">
                <label>Precio</label>
                <input type="text" name="precio">
            </div>

            <div class="campo">
                <label>Stock</label>
                <input type="number" name="stock">
            </div>
        </div>

        <div class="fila">
            <div class="campo">
                <label>ID Categoría</label>
                <input type="text" name="id_categoria">
            </div>

            <div class="campo">
                <label>Estado</label>
                <input type="text" name="estado">
            </div>
        </div>

        <button type="submit">Guardar Producto</button>

    </form>

</div>

</body>
</html>