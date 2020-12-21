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
            header('Location:' . base_url);
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
}