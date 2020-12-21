<?php
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'helpers/validation.php';
include_once './views/layout/header.php';
include_once './views/layout/sidebar.php';

function showError()
{
    $error = new ErrorController();
    $error->index();

}

if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombreControlador = controller_default;
} else {
    showError();
    die();
}
if (class_exists($nombreControlador)) {
    $controlador = new $nombreControlador();
    $action = '';

    if (empty($_GET['action'])) {
        $action = action_default;
    } else {
        $action = $_GET['action'];
    }
    if (!empty($action) && method_exists($controlador, $action)) {
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action = action_default;
        $controlador->$action();
    } else {
        showError();
    }
} else {
    showError();
}
include_once './views/layout/footer.php';