<div class="container">
    <?php if (isset($product)): ?>
        <div class="row">
            <div class="col-sm d-flex justify-content-center">
                <figure class="text-center w-75">
                    <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="w-100" alt="">
                </figure>
            </div>
            <div class="col-sm">
                <h1><?= $product->nombre ?></h1>
                <h3 class="price"><?= $product->precio ?></h3>
                <p><span style="font-weight: bold">Categoría: </span> <?= $category->nombre ?></p>
                <p><span style="font-weight: bold">Descripción: </span> <?= $product->descripcion ?></p>
                <a href="" class="btn btn-orange">Comprar</a>
            </div>
        </div>
    <?php else: ?>
        <h2>El producto no existe</h2>
    <?php endif; ?>
</div>