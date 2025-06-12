<div class="container">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="container p-5">
            <h1>Gestionar Usuarios</h1>
            <a class="btn btn-warning" href="<?php echo base_url('/panel') ?>" role="button">Panel</a>
            <?= csrf_field(); ?>
            <?= csrf_field(); ?>
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-responsive-md table-success table-striped">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Id perfil</th>
                            <th scope="col">Dado de Baja</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                            <?php foreach ($usuarios as $usuarios_item): ?>
                                <?php if ($usuarios_item["baja"] == "SI") :?>
                                    <tr class="table-danger">
                                <?php else :?>
                                     <tr>
                                <?php endif ;?>
                                    <td><?= esc($usuarios_item["id_usuario"]); ?></td>
                                    <td><?= esc($usuarios_item["nombre"]); ?></td>
                                    <td><?= esc($usuarios_item["apellido"]); ?></td>
                                    <td><?= esc($usuarios_item["email"]); ?></td>
                                    <td><?= esc($usuarios_item["id_perfil"]); ?></td>
                                     <td><?= esc($usuarios_item["baja"]); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('/panel/admin/usuarios/' . $usuarios_item["id_usuario"] . '/editar'); ?>" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="<?php echo base_url('/panel/admin/usuarios/' . $usuarios_item["id_usuario"] . '/eliminar'); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                        <?php if($usuarios_item["baja"] == 'SI'):?>
                                        <a href="<?php echo base_url('/panel/admin/usuarios/' . $usuarios_item["id_usuario"] . '/reactivar'); ?>" class="btn btn-sm btn-success">Activar</a>
                                        <?php else: ?>
                                         <button type="button" class="btn btn-secondary btn-sm" disabled>
                                            Activo
                                         </button>
                                         <?php endif ;?>
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