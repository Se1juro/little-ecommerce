<?php
if (isset($_SESSION['user'])) :
?>

    <h1>Procesar Pedido</h1>
    <?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <div class="alert alert-success" role="alert">
            Se ha registrado el pedido exitosamente
        </div>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <div class="alert alert-danger" role="alert">
            Ha habido un error con el registro, intentalo de nuevo
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('register'); ?>
    <a href="<?= base_url ?>carrito/">Ver Carrito</a>

    <form action="<?= base_url ?>pedido/add" method="POST">
        <div class="form-group">
            <label for="direccion">Dirección de entrega</label>
            <input type="text" class="form-control" id="direccion" required name="direccion">
            <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'direccion') : null; ?>

        </div>
        <div class="form-group">
            <label for="direccion2">Dirección complementaria </label>
            <input type="text" class="form-control" id="direccion2" required name="direccion2">
            <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'direccion2') : null; ?>

        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad de entrega</label>
            <input type="text" class="form-control" id="ciudad" required name="ciudad">
            <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'ciudad') : null; ?>

        </div>
        <div class="form-group">
            <label for="departamento">Departamento de entrega</label>
            <input type="text" class="form-control" id="departamento" required name="departamento">
            <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'departamento') : null; ?>

        </div>
        <button type="submit" class="btn btn-primary">Confirmar pedido</button>
        <?php Utils::deleteErrors(); ?>

    </form>

<?php else : ?>
    <h1>Debes iniciar sesión primero.</h1>
<?php endif; ?>