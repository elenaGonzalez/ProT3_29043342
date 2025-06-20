 <div class="p-5 d-flex align-items-center justify-content-center">
     <div class="w-50">
         <?php $validation = \Config\Services::validation(); ?>
         <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/admin/servicios/update/' . $id_servicio) ?>" method="POST" id="formulario_servicio_edit">
             <?= csrf_field(); ?>
             <?= csrf_field(); ?>
             <?php if (!empty(session()->getFlashdata('fail'))): ?>
                 <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
             <?php endif ?>
             <?php if (!empty(session()->getFlashdata('success'))) : ?>
                 <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
             <?php endif ?>

             <?php if (!empty($servicio)): ?>
                 <?php foreach ($servicio as $servicio_item): ?>
                     <div class="mb-3">
                         <label for="exampleFormInputS" class="form-label">* Titulo</label>
                         <input type="text" class="form-control" id="exampleFormInputS" name="titulo" placeholder="Titulo" value="<?= esc($servicio_item["titulo"]); ?>">
                         <!-- Error -->
                         <?php if ($validation->getError('titulo')) { ?>
                             <div class="text-danger mt-2">
                                 <?= $error = $validation->getError('titulo'); ?>
                             </div>
                         <?php } ?>
                         <!-- Fin Error -->
                     </div>
                     <div class="mb-3">
                         <label for="floatingTextareaS2" class="form-label">* Descripcion</label>
                         <textarea class="form-control" name="descripcion" placeholder="Describa el servicio brindado" id="floatingTextareaS2">
                            <?= esc($servicio_item["descripcion"]); ?>
                         </textarea>
                    <!-- Error -->
                    <?php if ($validation->getError('descripcion')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('descripcion'); ?>
                        </div>
                    <?php } ?>
                </div>
                 <div class="mb-3">
                    <label for="exampleFormInputS3" class="form-label">* Precio</label>
                    <input type="number" name="precio" step="0.01" min="0.00" max="999999.00" id="exampleFormInputS3" value="<?= esc($servicio_item["precio"]); ?>">
                     <?php if ($validation->getError('precio')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('precio'); ?>
                        </div>
                    <?php } ?>
                </div>
                 <div class="mb-3">
                   <label for="floatingTextareaS4" class="form-label">* Iframe</label>
                <textarea class="form-control" name="iframe" placeholder="Pegue codigo del video (iframe)" id="floatingTextareaS4">
                    <?=esc($servicio_item["iframe"]); ?>
                </textarea>

                    <!-- Error -->
                    <?php if ($validation->getError('iframe')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('iframe'); ?>
                        </div>
                    <?php } ?>
                </div>
                  <?php endforeach ?>
                 <?php endif; ?>
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
            </form>
      
        </div>
  </div>