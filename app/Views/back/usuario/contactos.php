<div class="p-5 d-flex align-items-center justify-content-center ">
    <div class="w-50">
        <?php $validation = \Config\Services::validation(); ?>
         <?php $session = session(); ?>
        <form class="bg-success-subtle p-2" action="<?php echo base_url('/validar_contacto') ?>" method="POST" id="formulario_contacto">
        <?=csrf_field();?> 
         <?=csrf_field();?> 
         <?php if(!empty (session()->getFlashdata('fail'))):?>      
         <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
         <?php endif ?>
          <?php if(!empty (session()->getFlashdata('success'))):?>
            <div class="alert alert-warning"> <?= session()->getFlashdata('success')?></div>
         <?php endif ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">* Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"
                    name="nombre" placeholder="Nombre" value="<?= old('nombre', $session->getFlashdata('nombre')) ?>">
                    <!-- Error -->
                     <?php if($validation->getError('nombre')) {?>
                      <div class="text-danger mt-2">
                        <?=$error = $validation->getError('nombre'); ?>
                      </div>
                      <?php } ?>
                <p id="cn" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">* Apellido</label>
                <input type="text" class="form-control" id="exampleFormControlInput2"
                    name="apellido" placeholder="Apellido" value="<?= old('apellido', $session->getFlashdata('apellido')) ?>">
                     <!-- Error -->
                     <?php if($validation->getError('apellido')) {?>
                      <div class="text-danger mt-2">
                        <?=$error = $validation->getError('apellido'); ?>
                      </div>
                      <?php } ?>
                <p id="ca" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="my_select" class="form-label"> Servicio</label>
                <select class="form-select form-select-sm" aria-label="Small select example" name="servicio" id="my_select">
                    <option selected>Seleccione Servicio deseado:</option>
                    <option value="playa">Dia de Playa</option>
                    <option value="esteros">Esteros del Ibera</option>
                    <option value="empedrado">Empedrado</option>
                    <option value="itati">Itati</option>
                </select>
                <p id="cs" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">* Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput4"
                    name="email" placeholder="email@ejemplo.com" autocomplete="email" value="<?= old('email', $session->getFlashdata('email')) ?>">
                    <!-- Error -->
                     <?php if($validation->getError('email')) {?>
                       <div class="text-danger mt-2">
                        <?=$error = $validation->getError('email'); ?>
                       </div>
                       <?php }?>
                <p id="ce" class="text-danger"></p>
                <p id="ce2" class="text-danger"></p>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">* Celular</label>
                <input type="text" class="form-control" id="exampleFormControlInput5"
                    name="celular" placeholder="Numero de celular" value="<?= old('celular', $session->getFlashdata('celular')) ?>">
                    <!-- Error -->
                     <?php if($validation->getError('celular')) {?>
                       <div class="text-danger mt-2">
                        <?=$error = $validation->getError('celular'); ?>
                       </div>
                       <?php }?>

                <p id="cc" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea" class="form-label">* Consulta</label>
                <textarea class="form-control" name="consulta" placeholder="Consulta" id="floatingTextarea" value="<?= old('consulta', $session->getFlashdata('consulta')) ?>"></textarea>
                <p id="cm" class="text-danger"></p>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Consultar</button>
            <button type="reset" class="btn btn-sm btn-danger">Cancelar</button>
        </form>
    </div>
</div>