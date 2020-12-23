<?php
require 'models/Usuarios.php';

class usuariosController
{
    public function index()
    {
        echo "Controlador usuarios accion index";
    }

    public function login()
    {
        require_once 'views/users/login.php';
    }

    public function register()
    {
        require_once 'views/users/register.php';
    }

    public function crear()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $usuario = new Usuario();
            //Validacion para evitar tener tanta logica en el controlador
            $result = Validation::validateUser($usuario, $nombre, $apellidos, $email, $password);
            if ($result) {
                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="' . base_url . 'usuarios/register";';
                    echo '</script>';
                } else {
                    $_SESSION['register'] = "failed";
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="' . base_url . 'usuarios/register";';
                    echo '</script>';
                }
            } else {
                $_SESSION['register'] = "failed";
                echo '<script type="text/javascript">';
                echo 'window.location.href="' . base_url . 'usuarios/register";';
                echo '</script>';
            }
        } else {
            $_SESSION['register'] = "failed";
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'usuarios/register";';
            echo '</script>';
        }
    }

    public function signin()
    {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();
            if ($identity && is_object($identity)) {
                $_SESSION['user'] = $identity;
                if ($identity->id_role == 2) {
                    $_SESSION['admin'] = true;
                }
                if (!headers_sent()) {
                    header('Location:' . base_url);
                    exit;
                } else { //si se han enviado haremos redirect desde javascript
                    Utils::redirectIndex();
                }
            } else {
                if (!headers_sent()) {
                    header('Location:' . base_url . 'Usuarios/login');
                    exit;
                } else { //si se han enviado haremos redirect desde javascript
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="' . base_url . 'usuarios/login";';
                    echo '</script>';
                }
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            if (isset($_SESSION['admin'])) unset($_SESSION['admin']);
            session_destroy();
            if (!headers_sent()) {
                Utils::redirectIndex();
                exit;
            } else { //si se han enviado haremos redirect desde javascript
                Utils::redirectIndex();
            }
        }
    }
}
