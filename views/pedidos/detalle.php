<h1>Detalles del pedido</h1>

<?php if ($pedido) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST" class="mb-3">
            <input type="hidden" name="id_pedido" value="<?= $pedido->id ?>">
            <select name="estado" id="estado">
                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : '' ?>>
                    Pendiente
                </option>
                <option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : '' ?>>
                    En Preparación
                </option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : '' ?>>
                    Preparado para enviar
                </option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : '' ?>>
                    Enviado
                </option>
            </select>
            <button type="submit" class="btn btn-primary ">Cambiar Estado</button>
        </form>
    <?php endif; ?>
    <h3>Detalles del envio</h3>
    <p> <span class="bold">Dirección de envio: </span><?= $pedido->direccion ?> - <?= $pedido->direccion2 ?></p>
    <p> <span class="bold">Ciudad: </span> <span><?= $pedido->ciudad ?></span> </p>
    <p> <span class="bold">Departamento: </span> <?= $pedido->departamento ?></p>
    <hr>
    <h3>Datos del pedido</h3>
    <p> <span class="bold">Estado: </span><?= Utils::showEstadoPedido($pedido->estado) ?> </p>
    <p> <span class="bold">Número del pedido: </span><?= $pedido->id ?> </p>
    <p> <span class="bold">Total a pagar: </span> <span class="price"><?= $pedido->costo_total ?></span> </p>
    <p> <span class="bold">Productos: </span> </p>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col" class="w-25">Imagen</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Unidades</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($producto = $productos->fetch_object()) : ?>
                <tr>
                    <td>
                        <img class="w-75" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="">
                    </td>
                    <td>
                        <a href="<?= base_url ?>productos/show&id=<?= $producto->id ?>">
                            <?= $producto->nombre ?>
                        </a>
                    </td>
                    <td>
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $producto->unidades ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php endif; ?>