
<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="public/css/registro.css">
</head>
<body>

<div class="form">
<h2>Registro</h2>

<form method="POST">
<input type="text" name="nombre" placeholder="Nombre" required>
<input type="text" name="apellido" placeholder="Apellido" required>
<input type="text" name="correo" placeholder="Correo" required>
<input type="text" name="usuario" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit">Registrarse</button>
</form>

<a href="Views/Auth/login.php">Ir a Login</a>
</div>

</body>
</html>
