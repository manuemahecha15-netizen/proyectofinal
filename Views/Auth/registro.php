<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="../../assets/css/registro.css">
</head>
<body>

<div class="form">
<h2>Registro</h2>
<form method="POST" action="../../principal.php?controller=login&action=guardar">

<input type="text" name="usuario" placeholder="Nombre" required>

<input type="email" name="correo" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit">Registrarse</button>

<a href="../../principal.php?controller=login&action=login">ir al login</a>

</form>
</form>



</div>

</body>
</html>