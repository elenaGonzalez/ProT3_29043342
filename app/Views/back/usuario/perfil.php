<div class="shadow p-3 mb-5 bg-body-tertiary rounded table-responsive">
    <div class="container p-5">
        <?php
        $session = session();
        $nombre = $session->get('nombre');
        $id_usuario = $session->get('id_usuario');
        ?>
        <?php if (session()->id_perfil == 1): ?>
            <div>
                <h2>Bienvenid@ Administrador <?= session('nombre'); ?></h2>
                <a class="btn btn-warning btn-sm" href="<?php echo base_url('/panel/admin/usuarios') ?>" role="button">Usuarios</a>
                <a class="btn btn-warning btn-sm" href="<?php echo base_url('/panel/admin/reservas') ?>" role="button">Reservas</a>
                <a class="btn btn-warning btn-sm" href="<?php echo base_url('/panel/admin/servicios') ?>" role="button">Servicios</a>
            </div>
        <?php elseif (session()->id_perfil == 2): ?>
            <div>
                <h1>Bienvenid@ Usuario <?= session('nombre'); ?></h1>
            </div>

            <a class="btn btn-primary btn-sm" href="<?php echo base_url('/panel/reservas/usuario/'. $id_usuario.''); ?>" role="button">Reservas</a>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= session('nombre'); ?></td>
                        <td><?= session('apellido'); ?></td>
                        <td><?= session('email'); ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>