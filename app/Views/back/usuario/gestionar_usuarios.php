<div class="container">
<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
    <div class="container p-5">
        <h1>Gestionar Usuarios</h1>
        <a class="btn btn-primary" href="<?php echo base_url('/panel') ?>" role="button">Perfil</a>
        <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Id perfil</th>
                         <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                        <?php foreach ($usuarios as $usuarios_item): ?>
                            <tr>
                                <td><?= esc($usuarios_item["id_usuario"]); ?></td>
                                <td><?= esc($usuarios_item["nombre"]); ?></td>
                                <td><?= esc($usuarios_item["apellido"]); ?></td>
                                <td><?= esc($usuarios_item["email"]); ?></td>
                                <td><?= esc($usuarios_item["id_perfil"]); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Editar</button>
                                    <button type="button" class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td class="col-5">No hay usuarios</td>
                        </tr>
                </tbody>
            </table>
        <?php endif ?>
        </tbody>
        </table>
        </div>
    </div>
</div>
</div>