<?php if (isset($category)): ?>
    <h1>Categoria <?= $category->nombre ?></h1>
    <?php if ($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <div class="row flex-wrap">
            <?php while ($product = $productos->fetch_object()): ?>
                <div class="product col-md-3 col-sm-1 w-50 mb-5">
                    <figure class="text-center h-75">
                        <?php if ($product->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="w-100 h-100"
                                 alt="<?= $product->nombre ?>">
                        <?php else: ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" alt="<?= $product->name ?>">
                        <?php endif; ?>
                    </figure>
                    <h3 style="height: 66px"><?= $product->nombre ?></h3>
                    <p class="price"><?= $product->precio ?></p>
                    <a href="" class="text-decoration-none btn btn-orange">Añadir al carrito</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>
