<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Maracumango</title>
    <link rel="stylesheet" href="assets/css/productos.css">
</head>

<body>

    <!-- Barra Superior -->
    <nav class="navbar">
        <ul>
            <li><a href="principal.php?controller=productos&action=index">Nuestros Productos</a></li>
            <li><a href="principal.php?controller=productos&action=crear">crear Productos</a></li>
            <li><a href="metododepago.html">Método de Pago</a></li>
            <li><a href="assets/carrito.html">Carrito</a></li>
            <li><a href="factura.html">Factura</a></li>
            <li><a href="principal?controller=login&action=logout">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <h1 class="titulo">Nuestros Productos</h1>
     <p id='id_usuario' style="visibility: hidden;"><?=$_SESSION['id_user']?></p>
    <div class="contenedor-productos">

        <!-- Producto 1 -->
        
        <?php foreach($datos as $da): ?>
        <div class="card">
            <p style="visibility: hidden;"><?=$da['id_producto']?></p>
            <img src="<?=$da['Ruta_Imagen']?>" alt="<?=$da['nombre']?>">
            <h3><?=$da['nombre']?></h3>
            <p class="precio"><?=$da['precio']?></p>
            <button class="btn-agregar" onclick="agregarCarrito(<?=$da['id_producto']?>,'<?=$da['nombre']?>', <?=$da['precio']?>)">Agregar al carrito</button>

        </div>
        <?php endforeach ?>    
    </div>

    <script>
function agregarCarrito(id,nombre, precio) {
    id_usuario=Number(document.querySelector("#id_usuario").textContent);
    // Convertir precio a número
    id= Number(id);
    precio = Number(precio);

    // Obtener carrito existente
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    // Agregar producto al carrito
    carrito.push({ id, nombre, precio , id_usuario});

    // Guardar en localStorage
    localStorage.setItem("carrito", JSON.stringify(carrito));

    // Redirigir automáticamente al carrito
    window.location.href = "assets/carrito.html";
}
</script>

</body>
</html>
