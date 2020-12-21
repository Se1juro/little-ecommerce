<?php
if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete'):?>
    <div class="alert alert-success" role="alert">
        Se ha guardado la categoria exitosamente
    </div>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'failed'): ?>
    <div class="alert alert-danger" role="alert">
        Ha habido un error con el registro, intentalo de nuevo
    </div>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>
<h1>Crear Categoría</h1>
<form action="<?=base_url?>categoria/save" method="post">
    <div class="form-group">
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de la categoria">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'nombre') : null; ?>
    </div>
    <button type="submit" class="btn btn-primary btn-orange">Registrar Categoría</button>
    <?php Utils::deleteErrors(); ?>
</form>