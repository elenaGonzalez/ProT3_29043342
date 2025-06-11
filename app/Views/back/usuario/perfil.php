<div class="shadow p-3 mb-5 bg-body-tertiary rounded table-responsive">
    <div class="container p-5">
        <?php
        $session = session();
        $nombre = $session->get('nombre');
        ?>
        <?php if(session()->id_perfil == 1): ?>
            <div>
                <h1>Bienvenid@ Administrador  <?= session('nombre');?></h1>
                 <a class="btn btn-primary btn-sm" href="<?php echo base_url('/panel/admin/gestionar_reservas') ?>" role="button">Reservas</a>
                 <a class="btn btn-primary btn-sm" href="<?php echo base_url('/panel/admin/gestionar_usuarios') ?>" role="button">Usuarios</a>
            </div>
        <?php elseif(session()->id_perfil == 2): ?>
            <div>
                <h1>Bienvenid@ Usuario <?= session('nombre');?></h1>
            </div>
        
         <a class="btn btn-primary" href="<?php echo base_url('/panel/reservas') ?>" role="button">Ver reservas</a>
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
                        <td>Maria</td>
                        <td>Suarez</td>
                        <td>maria_suarez@gml.com</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>