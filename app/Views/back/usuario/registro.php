<div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>

            <form class="bg-success-subtle p-2" action="<?php echo base_url('/enviar_form') ?>" method="POST" id="formulario_registro">
                <?= csrf_field(); ?>
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">* Nombre</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        name="nombre" placeholder="Nombre">
                    <!-- Error -->
                    <?php if ($validation->getError('nombre')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('nombre'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">* Apellido</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2"
                        name="apellido" placeholder="Apellido">
                    <!-- Error -->
                    <?php if ($validation->getError('apellido')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('apellido'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">* Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput3"
                        name="email" placeholder="email@ejemplo.com">
                    <!-- Error -->
                    <?php if ($validation->getError('email')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">* Usuario</label>
                    <input type="usuario" class="form-control" id="exampleFormControlInput4"
                        name="usuario" placeholder="Nombre de usuario">
                    <!-- Error -->
                    <?php if ($validation->getError('usuario')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('usuario'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">* Contraseña</label>
                    <input type="password" id="exampleFormControlInput5" class="form-control"
                        name="pass" placeholder="Contraseña">
                    <!-- Error -->
                    <?php if ($validation->getError('pass')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('pass'); ?>
                        </div>
                    <?php } ?>
                    <!-- Fin Error -->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">* Repetir Contraseña</label>
                    <input type="password" id="exampleFormControlInput5" class="form-control"
                        name="pass_confirm" placeholder="Repetir Contraseña">
                    <!-- Error -->
                    <?php if ($validation->getError('pass_confirm')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('pass_confirm'); ?>
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