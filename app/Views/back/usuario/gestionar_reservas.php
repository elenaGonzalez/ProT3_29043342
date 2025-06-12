<div class="container">
<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
    <div class="container p-5">
        <h1>Gestionar Reservas</h1>
        <a class="btn btn-warning" href="<?php echo base_url('/panel') ?>" role="button">Panel</a>
        <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Reserva</th>
                        <th scope="col">Id servicio</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Asientos</th>
                         <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($reservas) && is_array($reservas)): ?>
                        <?php foreach ($reservas as $reservas_item): ?>
                            <tr>
                                <td><?= esc($reservas_item["id_reserva"]); ?></td>
                                <td><?= esc($reservas_item["id_servicio"]); ?></td>
                                <td><?= esc($reservas_item["id_usuario"]); ?></td>
                                <td><?= esc($reservas_item["fecha"]); ?></td>
                                <td><?= esc($reservas_item["origen"]); ?></td>
                                <td><?= esc($reservas_item["cantidad_asientos"]); ?></td>
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