<h1>Gestión de productos</h1>
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <div class="alert alert-success" role="alert">
        Se ha guardado el producto exitosamente
    </div>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>
    <div class="alert alert-danger" role="alert">
        Ha habido un error con el registro, intentalo de nuevo
    </div>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
<?php
if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <div class="alert alert-success" role="alert">
        Se ha eliminado la categoria exitosamente
    </div>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <div class="alert alert-danger" role="alert">
        Ha habido un error con el registro, intentalo de nuevo
    </div>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<div class="container">
    <a href="<?= base_url ?>productos/crear" type="button" class="btn btn-orange text-white ">Crear Producto</a>
</div>
<table class="table w-100 mt-5 text-center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Oferta</th>
        <th scope="col">Fecha</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($producto = $productos->fetch_object()): ?>
        <tr>
            <th scope="row"><?= $producto->id ?></th>
            <td><?= $producto->categoria ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->descripcion ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->stock ?></td>
            <td><?= $producto->oferta ?></td>
            <td><?= $producto->fecha ?></td>
            <td>
                <a href="<?= base_url ?>productos/editar&id=<?= $producto->id ?>">
                    <i class="fas fa-pen"></i>
                </a>
                <a href="<?= base_url ?>productos/delete&id=<?= $producto->id ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>

    <?php endwhile; ?>
    </tbody>
</table>