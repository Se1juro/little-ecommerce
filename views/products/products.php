<h1>Algunos de nuestros productos</h1>
<div class="row flex-wrap container-product">
    <?php while ($product = $productos->fetch_object()) : ?>
        <a href="<?= base_url ?>productos/show&id=<?= $product->id ?>">
            <div class="product col-md-3 col-sm-1 w-50 mb-5">
                <figure class="text-center h-75">
                    <?php if ($product->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="w-100 h-100" alt="<?= $product->nombre ?>">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="<?= $product->nombre ?>">
                    <?php endif; ?>
                </figure>
                <h3 style="height: 66px"><?= $product->nombre ?></h3>
                <p class="price"><?= $product->precio ?></p>
                <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="text-decoration-none btn btn-orange">Añadir al carrito</a>
            </div>
        </a>
    <?php endwhile; ?>
</div>