<?php

class utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function showErrors($errors, $field)
    {
        $alert = '';
        if (isset($errors[$field]) && !empty($field)) {
            $alert = "<div class='alert alert-danger' role='alert'>
                  $errors[$field]
                </div>";
        }
        return $alert;
    }

    public static function deleteErrors()
    {
        if (isset($_SESSION['error_login'])) {
            $_SESSION['error_login'] = null;
            unset($_SESSION['error_login']);
        }
        if (isset($_SESSION['errors'])) {
            $_SESSION['errors'] = null;
            unset($_SESSION['errors']);
        }
        if (isset($_SESSION['complete'])) {
            $_SESSION['complete'] = null;
            unset($_SESSION['complete']);
        }
        return $_SESSION;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . '";';
            echo '</script>';
        }
        return true;
    }

    public static function showCategorias()
    {
        require_once 'models/Categoria.php';

        $categoria = new Categoria();
        $categorias = $categoria->listar();
        return $categorias;
    }

    public static function redirectIndex()
    {
        if (!headers_sent()) {
            header('Location:' . base_url);
            exit;
        } else { //si se han enviado haremos redirect desde javascript
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . '";';
            echo '</script>';
        }
    }

    public static function statsCarrito()
    {
        $stats = array(
            "count" => 0,
            "total" => 0,
        );
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $precio) {
                $stats['total'] += $precio['precio'] * $precio['unidades'];
            }
        }
        return $stats;
    }
    public static function isLogged()
    {
        if (!isset($_SESSION['user'])) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . '";';
            echo '</script>';
        }
        return true;
    }
    public static function showEstadoPedido($estado)
    {
        switch ($estado) {
            case 'confirm':
                return 'Pendiente';
                break;
            case 'preparation':
                return 'En Preparación';
                break;
            case 'ready':
                return 'Preparado para enviar';
                break;
            case 'sended':
                return 'Enviado';
                break;
        }
    }
}
