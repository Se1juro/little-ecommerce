<h1>Gestionar Categorías</h1>
<div class="container">
    <a href="<?= base_url ?>categoria/crear" type="button" class="btn btn-orange text-white ">Crear Categoria</a>
</div>
<table class="table w-50 mt-5 text-center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($categoria = $categorias->fetch_object()): ?>
        <tr>
            <th scope="row"><?= $categoria->id ?></th>
            <td><?= $categoria->nombre ?></td>
            <td>
                <a href="<?= base_url ?>categoria/delete&id=<?= $categoria->id ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>

    <?php endwhile; ?>
    </tbody>
</table>

