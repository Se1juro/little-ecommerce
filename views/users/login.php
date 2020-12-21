<?php
if (isset($_SESSION['user'])){
    header('Location:'.base_url);
}
?>
<h1>Iniciar Sesión</h1>
<?php if (isset($_SESSION['error_login'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error_login']; ?>
    </div>
<?php endif; ?>
<form class="mw-100 mt-5" method="POST" action="<?= base_url ?>Usuarios/signin">
    <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu información con terceros.</small>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <a href="<?= base_url ?>Usuarios/register" class="form-text text-muted mb-3">¿No tienes cuenta? Registrate aquí</a>

    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
    <?php Utils::deleteErrors(); ?>
</form>
