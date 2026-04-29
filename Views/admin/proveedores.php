<h2>Proveedores</h2>

<form method="POST" action="principal.php?controller=admin&action=guardarProveedor">
    <input name="nombre" placeholder="Nombre">
    <input name="telefono" placeholder="Teléfono">
    <button>Guardar</button>
</form>

<hr>

<?php while($p = $proveedores->fetch_assoc()): ?>
    <div>
        <?php echo $p['nombre']; ?> - <?php echo $p['telefono']; ?>
    </div>
<?php endwhile; ?>