<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <script src="<?= base_url ?>assets/js/all.js"></script>
    <title>Tienda - Daniel Morales</title>
</head>
<body>
<!--header!-->
<!--menu-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark ">
    <a class="navbar-brand text-white" href="../">
        <img src="<?= base_url ?>assets/img/camiseta.png" width="30" height="30" class="d-inline-block align-top" alt=""
             loading="lazy">
        Tienda Online
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="d-flex align-items-center nav-item active">
                <a class="nav-link text-white" href="<?=base_url?>">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white ico" href="#" id="navbarDropdownMenuLink" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user "></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                    <?php if (isset($_SESSION['admin'])): ?>
                        <a class="dropdown-item" href="<?= base_url ?>categoria/">Gestionar Categorias</a>
                        <a class="dropdown-item" href="<?= base_url ?>productos/gestion">Gestionar Productos</a>
                        <a class="dropdown-item" href="#">Gestionar Pedidos</a>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION['user'])): ?>
                        <a class="dropdown-item" href="<?= base_url ?>Usuarios/login">Iniciar Sesión</a>
                    <?php else: ?>
                        <a class="dropdown-item" href="#">Mis Pedidos</a>
                        <a class="dropdown-item" href="<?= base_url ?>Usuarios/logout">Cerrar Sesión</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar productos">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>