<?php
require_once 'models/Producto.php';
require_once 'models/Categoria.php';

class productosController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandomProducts(12);
        require_once 'views/products/products.php';
    }
    public function show(){
        if (isset($_GET['id'])){
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $product = $producto->getProductById();
            $categoria = new Categoria();
            $categoria->setId($product->id_categoria);
            $category = $categoria->getOne();
            require_once 'views/products/show.php';
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->listar();
        require_once 'views/products/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/products/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (!empty($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $id_categoria = isset($_POST['id_categoria']) ? (int)$_POST['id_categoria'] : false;
            $precio = isset($_POST['precio']) ? (int)$_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? (int)$_POST['stock'] : false;
            $oferta = isset($_POST['oferta']) ? (int)$_POST['oferta'] : false;
            $producto = new Producto();
            $result = Validation::validateProducto($producto, $id_categoria, $nombre, $descripcion, $precio, $stock, $oferta);
            if ($result) {
                //SUBIDA DE IMAGEN
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $nameFile = $file['name'];
                    $typeFile = $file['type'];
                    if ($typeFile == "image/jpg" || $typeFile == "image/jpeg" || $typeFile == "image/png" || $typeFile == "image/gif") {
                        if (!is_dir('uploads/images')) {
                            //EL TRUE INDICA DIRECTORIO RECURSIVO, UNO DENTRO DE OTRO
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $nameFile);
                        $producto->setImagen($nameFile);
                    }
                }
                if (isset($_GET['id'])) {
                    $producto->setId($_GET['id']);
                    $save = $producto->update();
                } else {
                    $save = $producto->save();
                }
                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        if (!headers_sent()) {
            header('Location:' . base_url . 'productos/gestion');
            exit;
        } else {//si se han enviado haremos redirect desde javascript
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'productos/gestion";';
            echo '</script>';
        }
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $producto = new Producto();
            $producto->setId($id);
            $product = $producto->getProductById();
            require_once 'views/products/crear.php';
        }

    }

    public function delete()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $product = $producto->getProductById();
            $imagen = $product->imagen;
            $delete = $producto->delete();
            if ($delete) {
                unlink("uploads/images/$imagen");
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'complete';
        }
        if (!headers_sent()) {
            header('Location:' . base_url . 'productos/gestion');
            exit;
        } else {//si se han enviado haremos redirect desde javascript
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'productos/gestion";';
            echo '</script>';
        }
    }
}