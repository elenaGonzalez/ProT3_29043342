<div class="container">
<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
     <?php if(session()->getFlashdata('msg')):?>      
         <div class="alert alert-warning">
            <?= session()->getFlashdata('msg')?>
        </div>
         <?php endif;?> 
    <div class="container p-5">
        <h1><?php echo $titulo ;?></h1>
        <a class="btn btn-warning" href="<?php echo base_url('/panel') ?>" role="button">Panel</a>
        <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead class ="text-center">
                    <tr>
                        <th scope="col">Reserva</th>
                        <th scope="col">Id servicio</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Asientos</th>
                        <th scope="col">Total</th>
                         <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if (!empty($reservas) && is_array($reservas)): ?>
                        <?php foreach ($reservas as $reservas_item): ?>
                            <tr>
                                <td><?= esc($reservas_item["id_reserva"]); ?></td>
                                <td><?= esc($reservas_item["servicio_nombre"]); ?></td>
                                <td><?= esc($reservas_item["usuario_nombre"]); ?> <?= esc($reservas_item["usuario_apellido"]); ?></td>
                                <td><?= esc($reservas_item["fecha"]); ?></td>
                                <td><?= esc($reservas_item["origen"]); ?></td>
                                <td><?= esc($reservas_item["cantidad_asientos"]); ?></td>
                                 <td>$ <?= esc($reservas_item["total"]); ?></td>
                                <td>
                                     <a class="btn btn-primary btn-sm" href="<?php echo base_url('/panel/admin/editar/reserva/' .$reservas_item["id_reserva"] . '/'. $reservas_item["id_servicio"]); ?>">Editar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td colspan="8">No hay reservas</td>
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