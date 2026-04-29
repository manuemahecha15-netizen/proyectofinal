<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Factura</title>

<style>
body {
    font-family: Arial;
    background:#FAFAF7;
    padding:30px;
}

.box {
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

h2 { color:#F5A623; }

table {
    width:100%;
    margin-top:20px;
}

td {
    padding:10px;
}
</style>
</head>

<body>

<div class="box">
<h2>🧾 Factura #<?php echo $_GET['id']; ?></h2>

<table border="1">
<tr>
    <th>Producto</th>
    <th>Precio</th>
</tr>

<?php while($d = $detalle->fetch_assoc()): ?>
<tr>
    <td><?php echo $d['nombre']; ?></td>
    <td>$<?php echo $d['precio']; ?></td>
</tr>
<?php endwhile; ?>

</table>

</div>

</body>
</html>