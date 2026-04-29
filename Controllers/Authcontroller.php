<?php
require_once __DIR__."/../models/Auth.php";

class AuthController {

    public function login() {

        if ($_POST) {
            $auth = new Auth();
            $login = $auth->login($_POST['usuario'], $_POST['password']);

            if ($login) {
                $_SESSION['user'] = $login['usuario'];
                $_SESSION['rol'] = $login['nombre_rol'];

                if ($_SESSION['rol'] == 'Administrador') {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: cliente_dashboard.php");
                }
                exit();
            } else {
                header("Location: principal.php?controller=login&action=login&error=1");
                exit();
            }
        }

        require_once __DIR__."/../views/auth/login.php";
    }

    public function registro() {
        require_once __DIR__."/../views/auth/registro.php";
    }

    public function guardar() {

        if ($_POST) {
            $auth = new Auth();

            if ($auth->checkUsuario($_POST['usuario'])) {
                header("Location: principal.php?controller=login&action=registro&error=usuario_existente");
                exit();
            }

            if ($auth->checkCorreo($_POST['correo'])) {
                header("Location: principal.php?controller=login&action=registro&error=correo_existente");
                exit();
            }

            $auth->save(
                $_POST['usuario'],
                $_POST['password'],
                $_POST['correo'],
                $_POST['rol']
            );

            header("Location: principal.php?controller=login&action=login&success=1");
            exit();
        }

        header("Location: principal.php?controller=login&action=registro");
    }

    public function logout() {
        session_destroy();
        header("Location: principal.php?controller=login&action=login");
        exit();
    }
}