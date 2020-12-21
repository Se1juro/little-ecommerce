<?php
$url_action = base_url . "productos/save";
?>
<?php if (isset($edit) && isset($product) && is_object($product)):
    $url_action = base_url . "productos/save&id=" . $product->id;
    ?>
    <h1>Editar Producto <?= $product->nombre ?></h1>
<?php else: ?>
    <h1>Crear Producto</h1>
<?php endif; ?>
<form action="<?= $url_action ?>" method="post" class="mb-3" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre del producto</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
               value="<?= isset($product) && is_object($product) ? $product->nombre : '' ?>"
               placeholder="Ingresa el nombre del producto">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'nombre') : null; ?>
    </div>
    <div class="form-group">
        <label for="id_categoria">Categoria del producto</label>
        <?php $categorias = Utils::showCategorias() ?>
        <select class="form-control" id="id_categoria" name="id_categoria">
            <option value="">Selecciona una opcion</option>
            <?php while ($categoria = $categorias->fetch_object()): ?>
                <option value="<?= $categoria->id ?>"
                    <?= isset($product) && is_object($product) && $categoria->id == $product->id_categoria ? 'selected' : '' ?>><?= $categoria->nombre ?></option>
            <?php endwhile; ?>
        </select> <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'id_categoria') : null; ?>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción del producto</label>
        <textarea class="form-control" id="descripcion" name="descripcion"
                  rows="3">
            <?= isset($product) && is_object($product) ? $product->descripcion : '' ?>
        </textarea>
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'descripcion') : null; ?>
    </div>
    <div class="form-group">
        <label for="precio">Precio del producto</label>
        <input type="number" class="form-control" id="precio" name="precio"
               value="<?= isset($product) && is_object($product) ? $product->precio : '' ?>"
               placeholder="Ingresa el precio del producto">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'precio') : null; ?>
    </div>
    <div class="form-group">
        <label for="stock">Stock del producto</label>
        <input type="number" class="form-control" id="stock" name="stock"
               value="<?= isset($product) && is_object($product) ? $product->stock : '' ?>"
               placeholder="Ingresa el stock del producto">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'stock') : null; ?>
    </div>
    <div class="form-group">
        <label for="oferta">Oferta del producto</label>
        <input type="number" class="form-control" id="oferta" name="oferta"
               placeholder="Ingresa la oferta del producto"
               value="<?= isset($product) && is_object($product) ? $product->oferta : '' ?>">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'oferta') : null; ?>
    </div>
    <div class="form-group">
        <label for="imagen">Imagen del producto</label>
        <?php if (isset($product) && is_object($product) && !empty($product->imagen)): ?>
            <figure>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="w-25" alt="">
            </figure>
        <?php endif; ?>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'imagen') : null; ?>
    </div>
    <button type="submit" class="btn btn-primary btn-orange">Registrar Producto</button>
    <?php Utils::deleteErrors(); ?>
</form>