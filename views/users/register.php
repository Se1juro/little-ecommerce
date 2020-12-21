<?php
if (isset($_SESSION['user'])){
    header('Location:'.base_url);
}
?>
<h1>Registrar cuenta</h1>
<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <div class="alert alert-success" role="alert">
        Se ha registrado exitosamente
    </div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="alert alert-danger" role="alert">
        Ha habido un error con el registro, intentalo de nuevo
    </div>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form class="mw-100 mt-5" method="POST" id="form-register" action="<?= base_url ?>Usuarios/crear">
    <div class="form-group">
        <label for="nombre">Nombre Completo</label>
        <input type="text" name="nombre" class="form-control" required id="nombre">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'nombre') : null; ?>

    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required id="apellidos">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'apellidos') : null; ?>

    </div>
    <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input type="email" name="email" class="form-control" id="email" required aria-describedby="email">
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu información con terceros.</small>
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'email') : null; ?>

    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" required id="password">
        <?php echo isset($_SESSION['errors']) ? Utils::showErrors($_SESSION['errors'], 'password') : null; ?>

    </div>
    <a href="<?= base_url ?>Usuarios/login" class="form-text text-muted mb-3">¿Ya tienes cuenta? Inicia Sesión aquí</a>

    <input type="submit" class="btn btn-primary btn-block" value="Registrarse">
    <?php Utils::deleteErrors(); ?>
</form>