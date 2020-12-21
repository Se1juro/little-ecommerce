<?php

class Categoria
{
    private $id;
    private $nombre;
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

    public function listar()
    {
        $sql = "SELECT * FROM categorias";
        return $this->db->query($sql);
    }

    public function getOne()
    {
        $sql = "SELECT * from categorias where id={$this->getId()}";
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }

    public function save()
    {
        $sql = "INSERT INTO categorias VALUES (null,'{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE from categorias where id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

}