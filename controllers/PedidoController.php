<?php
require_once 'models/Pedido.php';
class pedidoController
{
    public function procesar()
    {
        require_once 'views/pedidos/procesar.php';
    }

    public function add()
    {
        if (isset($_POST)) {
            $stats = Utils::statsCarrito();
            $user_id = $_SESSION['user']->id;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion2 = isset($_POST['direccion2']) ? $_POST['direccion2'] : false;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;

            $pedido = new Pedido();
            $result = Validation::validatePedido($pedido, $direccion, $ciudad, $direccion2, $departamento);
            $pedido->setCostoTotal((int)$stats['total']);
            $pedido->setIdUsuario((int)$user_id);

            if ($result) {
                $save = $pedido->save();

                //Guardar producto x pedido
                $saveFactura = $pedido->saveProductoxPedido();
                if ($save && $saveFactura) {
                    $_SESSION['pedido'] = "confirmado";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            }
            unset($_SESSION['carrito']);
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'pedido/confirmado";';
            echo '</script>';
        } else {
            $_SESSION['pedido'] = "failed";
            Utils::redirectIndex();
        }
    }
    public function confirmado()
    {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']->id;
            $pedido = new Pedido();
            $pedido->setIdUsuario($user_id);
            $pedido = $pedido->getOneByUser();
            $pedido_produtos = new Pedido();
            $productos = $pedido_produtos->getProductsByPedido($pedido->id);
        }
        require_once 'views/pedidos/confirmado.php';
    }
    public function mispedidos()
    {
        Utils::isLogged();
        $user_id = $_SESSION['user']->id;

        $pedido = new Pedido();
        $pedido->setIdUsuario($user_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedidos/mis_pedidos.php';
    }
    public function detalle()
    {
        Utils::isLogged();
        if (isset($_GET['id'])) {
            $id_pedido = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id_pedido);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductsByPedido($id_pedido);

            require_once 'views/pedidos/detalle.php';
        } else {
            Utils::redirectIndex();
        }
    }
    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['id_pedido']) && isset($_POST['estado'])) {
            $pedido = new Pedido();
            $pedido->setId($_POST['id_pedido']);
            $pedido->setEstado($_POST['estado']);
            $pedido->updateOne();
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'pedido/detalle&id=' . $_POST['id_pedido'] . '"';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . base_url . 'pedido/mispedidos";';
            echo '</script>';
        }
    }
}
