<?php
require_once __DIR__."/../config/db.php";

class Auth {
    private $db;

    public function __construct() {
        $this->db = Database::Conectar();
    }

    public function login($usuario, $password) {
        $sql = "SELECT u.*, r.nombre_rol 
                FROM usuarios u
                INNER JOIN rol_user ru ON ru.id_usuarios = u.id_usuario
                INNER JOIN roles r ON r.id_rol = ru.id_rol
                WHERE u.usuario = ? LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['contraseña'])) {
                return $user;
            }
        }

        return false;
    }

    public function save($usuario, $password, $correo, $rol) {
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO usuarios (usuario, contraseña, correo, estado, fecha_creacion) VALUES (?,?,?,?,NOW())");
        $estado = "activo";
        $stmt->bind_param("ssss", $usuario, $pass, $correo, $estado);
        $stmt->execute();

        $id = $this->db->insert_id;

        $stmt2 = $this->db->prepare("INSERT INTO rol_user (id_rol, id_usuarios) VALUES (?,?)");
        $stmt2->bind_param("ii", $rol, $id);
        $stmt2->execute();
    }

    public function checkUsuario($usuario) {
        $stmt = $this->db->prepare("SELECT id_usuario FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows > 0);
    }

    public function checkCorreo($correo) {
        $stmt = $this->db->prepare("SELECT id_usuario FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows > 0);
    }
}