<div class="container">
<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
     <?php if(session()->getFlashdata('msg')):?>      
         <div class="alert alert-warning">
            <?= session()->getFlashdata('msg')?>
        </div>
         <?php endif;?> 
    <div class="container p-5">
        <h1>Gestionar Servicios</h1>
        <a class="btn btn-warning" href="<?php echo base_url('/panel') ?>" role="button">Panel</a>
        <a class="btn btn-warning" href="<?php echo base_url('/panel/admin/crear_servicio') ?>" role="button">Crear Servicio</a>
        <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($servicios) && is_array($servicios)): ?>
                        <?php foreach ($servicios as $servicios_item): ?>
                             <?php if ($servicios_item["baja"] == "SI") :?>
                                    <tr class="table-danger">
                                <?php else :?>
                                     <tr>
                                <?php endif ;?>
                                <td><?= esc($servicios_item["id_servicio"]); ?></td>
                                <td><?= esc($servicios_item["titulo"]); ?></td>
                                <td><?= esc($servicios_item["descripcion"]); ?></td>
                                <td><?= esc($servicios_item["precio"]); ?></td>
                                <td>
                                    <a href="<?php echo base_url('/panel/admin/servicios/' . $servicios_item["id_servicio"] . '/editar'); ?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="<?php echo base_url('/panel/admin/servicios/' . $servicios_item["id_servicio"] . '/eliminar'); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                      <?php if($servicios_item["baja"] == 'SI'):?>
                                        <a href="<?php echo base_url('/panel/admin/servicios/' . $servicios_item["id_servicio"] . '/reactivar'); ?>" class="btn btn-sm btn-success">Activar</a>
                                        <?php else: ?>
                                         <button type="button" class="btn btn-secondary btn-sm" disabled>
                                            Activo
                                         </button>
                                         <?php endif ;?>
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