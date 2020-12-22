<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] === 'confirmado') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta
        <strong>42424242</strong>
        con el costo del pedido sera procesado y enviado.
    </p>
    <?php if ($pedido) : ?>
        <h3>Datos del pedido</h3>
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
                            <?= $producto->nombre ?>
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
<?php else : ?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>