<?php

class Usuario
{
    private $id;
    private $id_role;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $image;
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
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * @param mixed $id_role
     */
    public function setIdRole($id_role): void
    {
        $this->id_role = $id_role;
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
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $this->db->real_escape_string($email);

    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ["cost" => 4]);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $this->db->real_escape_string($image);
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES (null,1,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}',null)";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        //COMPROBAR SI EXISTE EL USUARIO
        $sql = "SELECT * from usuarios where email='$email'";
        $login = $this->db->query($sql);
        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            //Verificar password
            $verify = password_verify($password, $usuario->password);
            unset($usuario->password);
            if ($verify) {
                $result = $usuario;
            } else {
                $_SESSION['error_login'] = 'Las contraseñas no coinciden, verifica bien tus datos';
            }
        } else {
            $_SESSION['error_login'] = 'Usuario no encontrado, por favor verifica bien tus datos';
        }
        return $result;
    }
}