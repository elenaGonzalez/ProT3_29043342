<div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>
            <?php $session = session(); ?>
            <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/admin/nuevo_servicio') ?>" method="POST" id="nuevo_servicio">
                <?= csrf_field(); ?>
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div class="mb-3">
                    <label for="formControlCrearS" class="form-label">* Titulo</label>
                    <input type="text" class="form-control" id="formControlCrearS"
                        name="titulo" placeholder="Titulo" value="<?= old('titulo', $session->getFlashdata('titulo')) ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('titulo')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('titulo'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="formControlCrearS2" class="form-label">* Descripcion</label>
                     <textarea class="form-control" name="descripcion" placeholder="Describa el servicio brindado" id="formControlCrearS2" value="<?= old('descripcion', $session->getFlashdata('descripcion')) ?>">
                    </textarea>
                    <!-- Error -->
                    <?php if ($validation->getError('descripcion')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('descripcion'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="formControlCrearS3" class="form-label">* Precio</label>
                   <input type="number" name="precio" step="0.01" min="0.00" max="999999.00" id="formControlCrearS3" value="<?= old('precio', $session->getFlashdata('precio')) ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('precio')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('precio'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">    
                    <label for="formControlCrearS4" class="form-label">* Iframe</label>
                    <textarea class="form-control" name="iframe" placeholder="Pegue codigo del video (iframe)" id="formControlCrearS4" value="<?= old('iframe', $session->getFlashdata('iframe')) ?>">
                    </textarea>
                    <!-- Error -->
                    <?php if ($validation->getError('iframe')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('iframe'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                <button type="reset" class="btn btn-sm btn-danger">Cancelar</button>
            </form>
            <!-- FIN -->
    </div>
</div>