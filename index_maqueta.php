<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <script src="./assets/js/all.js"></script>
    <title>Tienda - Daniel Morales</title>
</head>
<body>
<!--header!-->
<!--menu-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark ">
    <a class="navbar-brand text-white" href="#">
        <img src="./assets/img/camiseta.png" width="30" height="30" class="d-inline-block align-top" alt=""
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
                <a class="nav-link text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white ico" href="#" id="navbarDropdownMenuLink" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user "></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="views/users/login.php">Iniciar Sesión</a>
                    <a class="dropdown-item" href="#">Mis Pedidos</a>
                    <a class="dropdown-item" href="#">Gestionar Pedidos</a>
                    <a class="dropdown-item" href="#">Gestionar Categorias</a>
                    <a class="dropdown-item" href="#">Gestionar Productos</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar productos">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>


<div class="container-fluid w-100 pt-4">
    <!--aside-->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 mb-4 mb-md-0">
            <div class="d-flex flex-column text-center ">
                <a href="" class="text-decoration-none options">Categoria 1</a>
                <a href="" class="text-decoration-none options">Categoria 2</a>
                <a href="" class="text-decoration-none options">Categoria 3</a>
            </div>
        </div>
        <div class=""></div>
        <div class="col-md-9 order-1 order-sm-1 ">
            <div class="row flex-wrap">
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center">
                        <img src="assets/img/camiseta.png" alt="Producto Name">
                    </figure>
                    <h3>Camiseta Azul Ancha</h3>
                    <p>$89.000,00</p>
                    <a href="" class="text-decoration-none">Añadir al carrito</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<!-- Footer -->
<footer class="page-footer font-small blue pt-4 mt-5 bg-dark text-white">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase">Tienda Online - Daniel Morales <?= date('Y') ?></h5>
                <p>Desarrollado por Daniel Morales - <?= date('Y') ?></p>
                <p>Con ❤</p>
                <p>Hecho en Colombia</p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">Contacto</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Linkdin</a>
                    </li>
                    <li>
                        <a href="#!">Email</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© <?= date('Y') ?> Copyright:
        <a href="https://se1juro.github.com/"> Se1juro.github.io</a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>
</html>