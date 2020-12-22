<?php

class Validation
{
    public static function validateUser($usuario, $nombre, $apellidos, $email, $password)
    {
        $errors = array();
        //VALIDACION PEQUEÑA DE LOS DATOS
        if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $usuario->setNombre($nombre);

        } else {
            $errors['nombre'] = 'El nombre no es valido';
        }
        if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
            $usuario->setApellidos($apellidos);
        } else {
            $errors['apellidos'] = 'El apellido no es valido';
        }
        if (!empty($email) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $usuario->setEmail($email);
        } else {
            $errors['email'] = 'El email no es valido';
        }
        if (strlen($password) >= 5 && !empty($password)) {
            $usuario->setPassword($password);
        } else {
            $errors['password'] = 'La contraseña no es valida';
        }

        //SI NO HAY ERRORES, VERDADERO, SI HAY ERRORES, CREO LA SESSION DE ERRORES
        if (count($errors) == 0) {
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            return false;
        }
    }

    public static function validateCategoria($categoria, $nombre)
    {
        $errors = array();
        //VALIDACION PEQUEÑA DE LOS DATOS
        if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $categoria->setNombre($nombre);

        } else {
            $errors['nombre'] = 'El nombre no es valido';
        }

        //SI NO HAY ERRORES, VERDADERO, SI HAY ERRORES, CREO LA SESSION DE ERRORES
        if (count($errors) == 0) {
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            return false;
        }
    }

    public static function validateProducto($producto, $id_categoria, $nombre, $descripcion, $precio, $stock, $oferta)
    {
        $errors = array();
        if (!empty($id_categoria) && is_numeric($id_categoria)) {
            $producto->setIdCategoria($id_categoria);
        } else {
            $errors['id_categoria'] = 'La categoria no es valida';
        }
        if (!empty($nombre) && !is_numeric($nombre)) {
            $producto->setNombre($nombre);
        } else {
            $errors['nombre'] = 'El nombre no es valido';
        }
        if (!empty($descripcion) && !is_numeric($descripcion)) {
            $producto->setDescripcion($descripcion);
        } else {
            $errors['descripcion'] = 'El nombre no es valido';
        }
        if (!empty($precio) && is_numeric($precio)) {
            $producto->setPrecio($precio);
        } else {
            $errors['precio'] = 'El precio no es valido';
        }
        if (!empty($stock) && is_numeric($stock)) {
            $producto->setStock($stock);
        } else {
            $errors['stock'] = 'El stock no es valido';
        }
        if (is_numeric($oferta)) {
            $producto->setOferta($oferta);
        } else {
            $errors['oferta'] = 'La oferta no es valida';
        }
        if (count($errors) == 0) {
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            return false;
        }
    }

    public static function validatePedido($pedido, $direccion, $ciudad, $direccion2, $departamento)
    {
        $errors = array();
        if (!empty($direccion) && !is_numeric($direccion)) {
            $pedido->setDireccion($direccion);
        } else {
            $errors['direccion'] = 'La dirección no es valida';
        }
        if (!empty($ciudad) && !is_numeric($ciudad)) {
            $pedido->setCiudad($ciudad);
        } else {
            $errors['ciudad'] = 'La ciudad no es valida';
        }
        if (!is_numeric($direccion2)) {
            $pedido->setDireccion2($direccion2);
        } else {
            $errors['direccion2'] = 'La direccion complementaria no es valida';
        }
        if (!empty($departamento) && !is_numeric($departamento)) {
            $pedido->setDepartamento($departamento);
        } else {
            $errors['departamento'] = 'El departamento no es valido';
        }
        if (count($errors) == 0) {
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            return false;
        }
    }
}