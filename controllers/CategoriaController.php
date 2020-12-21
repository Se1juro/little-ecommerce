<?php
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class categoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->listar();
        require_once 'views/categorias/index.php';
    }

    public function listar()
    {
        if (isset($_GET['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $category = $categoria->getOne();
            //Get productos
            $producto = new Producto();
            $producto->setIdCategoria($_GET['id']);
            $productos = $producto->getProductCategory();
        }
        require_once 'views/categorias/listar.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $categoria = new Categoria();
            $result = Validation::validateCategoria($categoria, $nombre);
            if ($result) {
                $save = $categoria->save();
                if ($save) {
                    $_SESSION['categoria'] = "complete";
                } else {
                    $_SESSION['categoria'] = "failed";
                }
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        if (!headers_sent()) {
            header('Location:' . base_url . 'categoria/crear');
            exit;
        } else {//si se han enviado haremos redirect desde javascript
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'categoria/crear";';
            echo '</script>';
        }
    }

    public function delete()
    {
        var_dump($_GET);
    }
}