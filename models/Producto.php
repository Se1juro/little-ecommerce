<?php

class Producto
{
    private $id;
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
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
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta): void
    {
        $this->oferta = $oferta;
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
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen): void
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    /**
     * @return mysqli
     */
    public function getDb(): mysqli
    {
        return $this->db;
    }

    /**
     * @param mysqli $db
     */
    public function setDb(mysqli $db): void
    {
        $this->db = $db;
    }

    public function listar()
    {
        $sql = 'SELECT p.id,
       c.nombre as categoria,
       p.nombre,
       p.descripcion,
       p.precio,
       p.stock,
       p.oferta,
       p.fecha,
       p.imagen
        FROM productos p INNER JOIN categorias c on p.id_categoria = c.id';
        return $this->db->query($sql);
    }

    public function getProductCategory()
    {
        $sql = "SELECT p.id,
       c.nombre as categoria,
       p.nombre,
       p.descripcion,
       p.precio,
       p.stock,
       p.oferta,
       p.fecha,
       p.imagen
        FROM productos p INNER JOIN categorias c on p.id_categoria = c.id WHERE p.id_categoria={$this->getIdCategoria()}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO productos VALUES(null,{$this->getIdCategoria()},'{$this->getNombre()}','{$this->getDescripcion()}',
                             {$this->getPrecio()},{$this->getStock()},{$this->getOferta()},curdate(),'{$this->getImagen()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos where id={$this->id}";
        $delete = $this->db->query($sql);
        return $delete;
    }

    public function getProductById()
    {
        $sql = "SELECT * FROM productos where id={$this->getId()}";
        $product = $this->db->query($sql);
        if ($product->num_rows == 1) {
            return $product->fetch_object();
        }
    }

    public function update()
    {
        $sql = "UPDATE productos set nombre='{$this->getNombre()}',id_categoria={$this->getIdCategoria()}, descripcion='{$this->getNombre()}',
                precio={$this->getPrecio()},stock={$this->getStock()},oferta={$this->getOferta()} ";
        if ($this->getImagen() != null) {
            $sql .= ",imagen='{$this->getImagen()}'";
        }
        $sql .= "WHERE id={$this->getId()}";
        return $this->db->query($sql);
    }

    public function getRandomProducts($limit)
    {
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
        return $this->db->query($sql);
    }
}