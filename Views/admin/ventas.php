<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ventas – Admin</title>

<style>
body {
    font-family: Arial;
    background:#1A1A1A;
    color:white;
    padding:30px;
}

h2 { color:#F5A623; }

table {
    width:100%;
    background:white;
    color:black;
    border-radius:10px;
    overflow:hidden;
}

th, td {
    padding:12px;
    text-align:center;
}

th {
    background:#F5A623;
}

button {
    background:#2E7D32;
    color:white;
    border:none;
    padding:6px 10px;
    border-radius:6px;
    cursor:pointer;
}
</style>
</head>

<body>

<h2>📊 Ventas del sistema</h2>

<table>
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Total</th>
    <th>Fecha</th>
    <th>Acción</th>
</tr>

<?php while($v = $ventas->fetch_assoc()): ?>
<tr>
    <td><?php echo $v['id_venta']; ?></td>
    <td><?php echo $v['usuario']; ?></td>
    <td>$<?php echo $v['total']; ?></td>
    <td><?php echo $v['fecha']; ?></td>
    <td>
        <a href="principal.php?controller=venta&action=factura&id=<?php echo $v['id_venta']; ?>">
            <button>Ver</button>
        </a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>