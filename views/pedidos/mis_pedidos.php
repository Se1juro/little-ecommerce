<?php if (isset($gestion)) : ?>
    <h1>Gestionar Pedidos</h1>
<?php else : ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">N° Pedido</th>
            <th scope="col">Costo del pedido</th>
            <th scope="col">Fecha del pedido</th>
            <th scope="col">Estado</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($pedido = $pedidos->fetch_object()) :
        ?>
            <tr>
                <td>
                    <a href="<?= base_url ?>pedido/detalle&id=<?= $pedido->id ?>">
                        <?= $pedido->id ?>
                    </a>
                </td>
                <td class="price">
                    <?= $pedido->costo_total ?>
                </td>
                <td>
                    <?= $pedido->fecha ?>
                </td>
                <td>
                    <?= Utils::showEstadoPedido($pedido->estado) ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>