<?php
require_once 'models/Producto.php';

class CarritoController
{
    public function index()
    {
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
        }
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            Utils::redirectIndex();
        }
        if (isset($_SESSION['carrito'])) {
            $count = 0;
            foreach ($_SESSION['carrito'] as $index => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$index]['unidades']++;
                    $count++;
                }
            }
        }
        if (!isset($count) || $count == 0) {
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getProductById();

            //Aañadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }


        echo '<script type="text/javascript">';
        echo 'window.location.href="' . base_url . 'carrito/";';
        echo '</script>';
    }

    public function remove()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . base_url . 'carrito/";';
        echo '</script>';
    }

    public function deleteAll()
    {
        unset($_SESSION['carrito']);
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . base_url . 'carrito/";';
        echo '</script>';
    }
    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . base_url . 'carrito/";';
        echo '</script>';
    }
    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            if ($_SESSION['carrito'][$index]['unidades'] == 1) {
                unset($_SESSION['carrito'][$index]);
            } else {
                $_SESSION['carrito'][$index]['unidades']--;
            }
        }
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . base_url . 'carrito/";';
        echo '</script>';
    }
}
