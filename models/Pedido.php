<?php


class Pedido
{
    private $id;
    private $id_usuario;
    private $direccion;
    private $ciudad;
    private $direccion2;
    private $departamento;
    private $costo_total;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct()
    {
        $this->db = db::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad): void
    {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    /**
     * @return mixed
     */
    public function getDireccion2()
    {
        return $this->direccion2;
    }

    /**
     * @param mixed $direccion2
     */
    public function setDireccion2($direccion2): void
    {
        $this->direccion2 = $this->db->real_escape_string($direccion2);
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * @param mixed $departamento
     */
    public function setDepartamento($departamento): void
    {
        $this->departamento = $this->db->real_escape_string($departamento);
    }

    /**
     * @return mixed
     */
    public function getCostoTotal()
    {
        return $this->costo_total;
    }

    /**
     * @param mixed $costo_total
     */
    public function setCostoTotal($costo_total): void
    {
        $this->costo_total = $costo_total;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $this->db->real_escape_string($estado);
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora): void
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM pedidos WHERE id={$this->getId()}";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getOneByUser()
    {
        $sql = "SELECT id, costo_total FROM pedidos
                WHERE id_usuario={$this->getIdUsuario()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getProductsByPedido($id)
    {
        $sql = "SELECT pr.*, pp.unidades FROM productos pr 
                INNER JOIN pedidos_productos pp ON pr.id=pp.id_producto 
                WHERE pp.id_pedido={$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllByUser()
    {
        $sql = "SELECT * FROM pedidos
        WHERE id_usuario={$this->getIdUsuario()} ORDER BY id DESC";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES (null,{$this->getIdUsuario()},'{$this->getDireccion()}',
                '{$this->getCiudad()}','{$this->getDepartamento()}','{$this->getDireccion2()}',{$this->getCostoTotal()},
                'confirm',curdate(),curtime())";
        $pedido = $this->db->query($sql);
        return $pedido;
    }
    public function saveProductoxPedido()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        foreach ($_SESSION['carrito'] as $value) {
            $producto = $value['producto'];
            $insert = "INSERT INTO pedidos_productos VALUES (NULL,{$pedido_id},{$producto->id},{$value['unidades']})";
            $save = $this->db->query($insert);
        }
        return $save;
    }
    public function updateOne()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE id={$this->getId()}";
        return $this->db->query($sql);
    }
}
