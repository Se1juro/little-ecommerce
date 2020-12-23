<?php
$stats = Utils::statsCarrito();
?>
<h1>Carrito de compras</h1>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?php if (isset($carrito) && !empty($carrito)) :
                foreach ($carrito as $index => $elemento) :
                    $producto = $elemento['producto'] ?>
                    <div class="d-flex mb-3">
                        <figure class="w-50" style="margin-right: 1em">
                            <?php if ($producto->imagen != null) : ?>
                                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="w-100 h-100" alt="<?= $producto->nombre ?>">
                            <?php else : ?>
                                <img src="<?= base_url ?>assets/img/camiseta.png" alt="<?= $producto->nombre ?>">
                            <?php endif; ?>
                        </figure>
                        <div class="info">
                            <a href="<?= base_url ?>productos/show&id=<?= $producto->id ?>">
                                <h2><?= $producto->nombre ?></h2>
                            </a>
                            <p><?= $producto->descripcion ?></p>
                            <p class="price"><?= $producto->precio ?></p>
                            <p>
                                <span style="font-weight: bold">Unidades:</span>
                                <?= $elemento['unidades'] ?>
                            </p>
                            <p>
                                <a href="<?= base_url ?>carrito/up&index=<?= $index ?>">Aumentar Cantidad</a>

                            </p>
                            <p>
                                <a href="<?= base_url ?>carrito/down&index=<?= $index ?>">Restar Cantidad</a>

                            </p>
                            <a href="<?= base_url ?>carrito/remove&index=<?= $index ?>" class="btn btn-danger text-white">
                                Eliminar Producto
                            </a>

                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <h3 class="mt-3">No hay productos en tu carrito</h3>
            <?php endif; ?>
        </div>
        <div class="col-sm d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h4>Resumen de tu pedido</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Subtotal: </span>
                        <span class="price"><?= $stats['total'] ?></span>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Envio: </span>
                        <span class="price">0</span>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Total: </span>
                        <span class="price"><?= $stats['total'] ?></span>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= base_url ?>pedido/procesar" class="btn btn-orange btn-block">Procesar Compra</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= base_url ?>carrito/deleteAll" class="btn btn-danger text-white btn-block">
                            Vaciar Carrito
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>