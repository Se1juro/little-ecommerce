<div class="container-fluid w-100 pt-4 d-flex h-100 vh-100 flex-column ">
    <!--aside-->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 mb-4 mb-md-0">
            <div class="d-flex flex-column text-center w-100">
                <?php $categorias = Utils::showCategorias(); ?>
                <?php while ($categoria = $categorias->fetch_object()): ?>
                    <a href="<?= base_url ?>categoria/listar&id=<?= $categoria->id ?>"
                       class="text-decoration-none options">
                        <?= $categoria->nombre ?>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <div class=""></div>
        <div class="col-md-9 order-1 order-sm-1 ">