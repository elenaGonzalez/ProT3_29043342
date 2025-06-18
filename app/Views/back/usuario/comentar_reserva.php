<div class="p-5 d-flex align-items-center justify-content-center">
    <?php
        $session = session();
        $id_sesion = $session->get('id_usuario');
        ?>
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>
        <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/usuario/comentar_reserva/' . $id_sesion . '/' . $id_reserva) ?>" method="POST" id="formulario_comentario">
            <?= csrf_field(); ?>
            <?= csrf_field(); ?>
            <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>
            <div class="mb-3">
                <label for="floatingTextareaC" class="form-label">* Comentario</label>
                <textarea class="form-control" name="comentario" placeholder="Comentario" id="floatingTextareaC"
                    value="<?= old('comentario', $session->getFlashdata('comentario')) ?>">
            </textarea>
            <!-- Error comentario -->
             <?php if($validation->getError('comentario')) {?>
                       <div class="text-danger mt-2">
                        <?=$error = $validation->getError('comentario'); ?>
                       </div>
                       <?php }?>
                <!-- Fin Error -->
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInputC2" class="form-label">* Calificacion</label>
                <input type="number" class="form-control" id="exampleFormControlInputC2"
                    name="calificacion" placeholder="De 1 a 5" value="<?= old('calificacion', $session->getFlashdata('calificacion')) ?>">
                <!-- Error -->
                <?php if ($validation->getError('calificacion')) { ?>
                    <div class="text-danger mt-2">
                        <?= $error = $validation->getError('calificacion'); ?>
                    </div>
                <?php } ?>
                <!-- Fin Error -->
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
            <button type="reset" class="btn btn-sm btn-danger">Cancelar</button>
        </form>
        <!-- FIN USUARIO NO AUTENTICADO -->

    </div>
</div>