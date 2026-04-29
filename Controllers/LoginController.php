<?php
require_once "Config/db.php";

class LoginController {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "maracumango");

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function registro() {
        require_once "views/Auth/registro.php";
    }

    public function login() {
        require_once "views/Auth/login.php";
    }

    public function guardar() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $rol = 2; // cliente

            if (empty($usuario) || empty($correo) || empty($password)) {
                header("Location: principal.php?controller=login&action=registro&error=1");
                exit();
            }

            $check = $this->conn->query("SELECT * FROM usuarios WHERE correo='$correo'");
            if ($check->num_rows > 0) {
                header("Location: principal.php?controller=login&action=registro&error=2");
                exit();
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (usuario, correo, password)
                    VALUES ('$usuario', '$correo', '$passwordHash')";

            if ($this->conn->query($sql)) {

                $id_usuario = $this->conn->insert_id;

                $this->conn->query("INSERT INTO rol_user (id_rol, id_usuarios) VALUES ($rol, $id_usuario)");

                header("Location: principal.php?controller=login&action=login&success=1");
            }
        }
    }

    public function validar() {

        session_start();

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = "SELECT u.*, r.id_rol 
                FROM usuarios u
                INNER JOIN rol_user ru ON ru.id_usuarios = u.id_usuario
                INNER JOIN roles r ON r.id_rol = ru.id_rol
                WHERE u.usuario='$usuario' LIMIT 1";

        $result = $this->conn->query($sql);

        if ($result && $result->num_rows == 1) {

            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {

                $_SESSION['user'] = $user;
                $_SESSION['rol'] = $user['id_rol'];

                // 🔥 REDIRECCIÓN CORRECTA
                if ($user['id_rol'] == 1) {
                    header("Location: principal.php?controller=admin&action=dashboard");
                } else {
                    header("Location: principal.php?controller=cliente&action=dashboard");
                }
                exit();

            } else {
                header("Location: principal.php?controller=login&action=login&error=1");
            }

        } else {
            header("Location: principal.php?controller=login&action=login&error=1");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: principal.php?controller=login&action=login");
    }
}