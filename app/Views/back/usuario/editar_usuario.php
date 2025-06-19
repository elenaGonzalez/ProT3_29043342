  <div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>
       <?php if (session()->id_perfil == 1): ?>
            <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/admin/usuarios/update/'.$id_usuario) ?>" method="POST" id="formulario_registro">
                <?php else : ?>
                <form class="bg-success-subtle p-2" action="<?php echo base_url('/panel/usuario/update/'.$id_usuario) ?>" method="POST" id="formulario_registro">
                <?php endif ;?>
                <?= csrf_field(); ?>
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><? session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-warning"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                
                <?php if (!empty($usuario )): ?>
                     <?php foreach ($usuario as $usuario_item): ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">* Nombre</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2"
                        name="nombre" placeholder="Nombre" value="<?= esc($usuario_item["nombre"]); ?>">
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
                    <input type="text" class="form-control" id="exampleFormControlInput3"
                        name="apellido" placeholder="Apellido" value="<?= esc($usuario_item["apellido"]); ?>">
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
                    <input type="email" class="form-control" id="exampleFormControlInput4"
                        name="email" placeholder="email@ejemplo.com" value="<?= esc($usuario_item["email"]); ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('email')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>
                </div>
                  <?php endforeach ?>
                 <?php endif ;?>
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
            </form>
      
        </div>
  </div>