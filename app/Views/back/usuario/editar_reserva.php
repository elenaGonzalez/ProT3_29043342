<div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>  
          <h2> 
            <?= esc($servicio_nombre); ?> - Usuario: <?= esc($nombre_usuario); ?> <?= esc($apellido_usuario); ?>
            </h2> 
            <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/admin/editar_reserva/'.$id_servicio['id_servicio'].'/'.$id_reserva) ?>" method="POST" id="formulario_editar_r">
                <?= csrf_field(); ?>
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                
                <?php if (!empty($reserva )): ?>
                     <?php foreach ($reserva as $reserva_item): ?>
                <div class="mb-3">
                    <label for="exampleFormControlInputR" class="form-label">* Fecha</label>
                    <input type="date" class="form-control" id="exampleFormControlInputR"
                        name="fecha" placeholder="Fecha" value="<?= esc($reserva_item["fecha"]); ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('fecha')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('fecha'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputR2" class="form-label">* Origen</label>
                    <input type="text" class="form-control" id="exampleFormControlInputR2"
                        name="origen" placeholder="Origen" value="<?= esc($reserva_item["origen"]); ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('origen')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('origen'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">* Cantidad de asientos</label>
                    <input type="number" class="form-control" id="exampleFormControlInput4"
                        name="cantidad_asientos" placeholder="Ej: 3" value="<?= esc($reserva_item["cantidad_asientos"]); ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('cantidad_asientos')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('cantidad_asientos'); ?>
                        </div>
                    <?php } ?>
                </div>
                  <?php endforeach ?>
                 <?php endif ;?>
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
            </form>
      
        </div>
  </div>