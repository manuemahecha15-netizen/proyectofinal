
<!DOCTYPE html>
<html>
<head>
<title>Registro</title>

<style>
body{
    font-family: Arial;
    background: #ff7e5f;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.form{
    background:white;
    padding:30px;
    border-radius:10px;
    width:300px;
}

input{
    width:100%;
    padding:8px;
    margin:10px 0;
}

button{
    width:100%;
    padding:10px;
    background:#ff7e5f;
    color:white;
    border:none;
    cursor:pointer;
}
</style>

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
