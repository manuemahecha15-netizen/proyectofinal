<h2>Productos</h2>

<form method="POST" action="principal.php?controller=admin&action=guardarProducto">
    <input name="nombre" placeholder="Nombre">
    <input name="precio" placeholder="Precio">
    <input name="stock" placeholder="Stock">
    <button>Guardar</button>
</form>

<table>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
<th>Acción</th>
</tr>

<?php while($p = $productos->fetch_assoc()): ?>
<tr>
<td><?= $p['nombre'] ?></td>
<td><?= $p['precio'] ?></td>
<td><?= $p['stock'] ?></td>
<td>
<a href="principal.php?controller=admin&action=eliminarProducto&id=<?= $p['id_producto'] ?>">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>

</table>si 