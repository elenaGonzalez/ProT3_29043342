<div class="container">
<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
    <div class="container p-5">
        <h1>Gestionar Servicios</h1>
        <a class="btn btn-warning" href="<?php echo base_url('/panel') ?>" role="button">Panel</a>
        <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($servicios) && is_array($servicios)): ?>
                        <?php foreach ($servicios as $servicios_item): ?>
                            <tr>
                                <td><?= esc($servicios_item["id_servicio"]); ?></td>
                                <td><?= esc($servicios_item["titulo"]); ?></td>
                                <td><?= esc($servicios_item["descripcion"]); ?></td>
                                <td><?= esc($servicios_item["costo"]); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Editar</button>
                                    <button type="button" class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td class="col-5">No hay servicios</td>
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