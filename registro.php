<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="assets/css/registro.css">
</head>
<body>

<div class="form">
<h2>Registro</h2>
<form method="POST" action="principal.php?controller=login&action=guardar">

<input type="text" name="usuario" placeholder="Nombre" required>

<input type="email" name="correo" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit">Registrarse</button>

<button type="button" onclick="window.location.href='views/Auth/login.php'">
Ir a Login
</button>

</form>
</form>



</div>

</body>
</html>