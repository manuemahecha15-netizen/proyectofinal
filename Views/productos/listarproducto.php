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
            <li><a href="productos.html">Nuestros Productos</a></li>
            <li><a href="metododepago.html">Método de Pago</a></li>
            <li><a href="carrito.html">Carrito</a></li>
            <li><a href="factura.html">Factura</a></li>
            <li><a href="principal?controller=login&action=logout">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <h1 class="titulo">Nuestros Productos</h1>

    <div class="contenedor-productos">

        <!-- Producto 1 -->
        <div class="card">
            <img src="assets/img/fresas_con_crema.jpg" alt="Fresas con crema">
            <h3>Fresas con Crema</h3>
            <p class="precio">$10.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Fresas con crema', 10000)">Agregar al carrito</button>

        </div>

        <!-- Producto 2 -->
        <div class="card">
            <img src="assets/img/maracumango_tradicional.jpg" alt="Maracumango tradicional">
            <h3>Maracumango Tradicional</h3>
            <p class="precio">$12.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Maracumango tradicional', 10000)">Agregar al carrito</button>

        </div>

        <!-- Producto 3 -->
        <div class="card">
            <img src="assets/img/michelada_aguila.jpg" alt="Michelada Aguila">
            <h3>Michelada Aguila</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Michelada Aguila', 10000)">Agregar al carrito</button>

        </div>

        <!-- Producto 4 -->
        <div class="card">
            <img src="assets/img/michelada_cuatro.jpg" alt="Michelada cuatro">
            <h3>Michelada cuatro</h3>
            <p class="precio">$8.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Michelada cuatro', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/michelada_ginger.jpg" alt="Michelada Ginger">
            <h3>Michelada Ginger</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Michelada Ginger', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/michelada_tamarindo.jpg" alt="Michelada tamarindo">
            <h3>Michelada tamarindo</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Michelada tamarindo', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/chamoyada.jpg" alt="Chamoyada">
            <h3>Chamoyada</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Chamoyada', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/mamoncillas_con_topin.jpg" alt="Mamoncillas con topin">
            <h3>Mamoncillas con topin</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('mamoncillas con topin', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/maracumango_con_mamoncilla.jpg" alt="Maracumango con mamoncilla">
            <h3>Maracumango con Mamoncilla</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Maracumango con mamoncilla', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/granizado_de_milo.jpg" alt="Granizado de milo">
            <h3>Granizado de Milo</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Granizado de milo', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/maracumango_de_mora.jpg" alt="Maracumango de mora">
            <h3>Maracumango de Mora</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Maracumango de mora', 10000)">Agregar al carrito</button>

        </div>

        <div class="card">
            <img src="assets/img/maracumango_mixto.jpg" alt="Maracumango mixto">
            <h3>Maracumango Mixto</h3>
            <p class="precio">$9.000</p>
            <button class="btn-agregar" onclick="agregarCarrito('Maracumango mixto', 10000)">Agregar al carrito</button>

        </div>

    </div>

    <script>
function agregarCarrito(nombre, precio) {
    // Convertir precio a número
    precio = Number(precio);

    // Obtener carrito existente
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    // Agregar producto al carrito
    carrito.push({ nombre, precio });

    // Guardar en localStorage
    localStorage.setItem("carrito", JSON.stringify(carrito));

    // Redirigir automáticamente al carrito
    window.location.href = "carrito.html";
}
</script>

</body>
</html>
