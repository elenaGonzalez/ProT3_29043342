<div class="p-5 d-flex align-items-center justify-content-center">
    <?php
    $session = session();
    ?>
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>
        <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/admin/usuarios/reservar/'.$id_usuario) ?>" method="POST" id="formulario_registro">
            <?= csrf_field(); ?>
            <?= csrf_field(); ?>
            <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>
            
            <div class="mb-3">
                <label for="mis_servicios" class="form-label"> Servicio</label>
                <select class="form-select form-select-sm" aria-label="Small select example" name="id_servicio" id="mis_servicios">
                    <?php if (!empty($servicios) && is_array($servicios)): ?>

                        <?php foreach ($servicios as $servicios_item): ?>
                            <option value=<?= esc($servicios_item["id_servicio"]); ?>>
                                <?= esc($servicios_item["titulo"]); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="Sin servicios">Sin servicios registrados</option>
                    <?php endif; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('servicio')) { ?>
                    <div class="text-danger mt-2">
                        <?= $error = $validation->getError('servicio'); ?>
                    </div>
                <?php } ?>
                <!-- Fin Error -->
            </div>
            <div class="mb-3">
                <label for="exampleFormDate" class="form-label">* Fecha</label>
                <input type="date" class="form-control" id="exampleFormDate"
                    name="fecha" placeholder="Fecha" value="<?= old('fecha', $session->getFlashdata('fecha')) ?>">
                <!-- Error -->
                <?php if ($validation->getError('fecha')) { ?>
                    <div class="text-danger mt-2">
                        <?= $error = $validation->getError('fecha'); ?>
                    </div>
                <?php } ?>
                <!-- Fin Error -->
            </div>
            <div class="mb-3">
                <label for="exampleFormCInput3" class="form-label">* Cantidad de Asientos</label>
                <input type="number" class="form-control" id="exampleFormCInput3"
                    name="cantidad_asientos" placeholder="cantidad de asientos" value="<?= old('cantidad_asientos', $session->getFlashdata('cantidad_asientos')) ?>">
                <!-- Error -->
                <?php if ($validation->getError('cantidad_asientos')) { ?>
                    <div class="text-danger mt-2">
                        <?= $error = $validation->getError('cantidad_asientos'); ?>
                    </div>
                <?php } ?>
                <!-- Fin Error -->
            </div>
            <div class="mb-3">
                <label for="formOrigen" class="form-label">* Origen</label>
                <input type="text" class="form-control" id="formOrigen"
                    name="origen" placeholder="Origen. Ej: Bajada del puente" value="<?= old('origen', $session->getFlashdata('origen')) ?>">
                    <!-- Error -->
                     <?php if($validation->getError('origen')) {?>
                       <div class="text-danger mt-2">
                        <?=$error = $validation->getError('origen'); ?>
                       </div>
                       <?php }?>
            </div>            
            <button type="submit" class="btn btn-sm btn-primary">Reservar</button>
            <button type="reset" class="btn btn-sm btn-danger">Cancelar</button>
        </form>
        <!-- FIN  -->

    </div>
</div>