<div class="container">
 <?php if(!empty($servicios) && is_array($servicios)): ?>
  <div id="packages" class="pt-5">
    <div class="pt-2 d-md-flex justify-content-md-end">
      <a class="btn btn-primary" href="comentarios" role="button">Ver Comentarios</a>
    </div>
     <div class="row row-cols-1 row-cols-md-2 g-2">
  <?php foreach ($servicios as $servicios_item): ?>
     <?php if($servicios_item['baja'] == 'NO') :?>
     <div class="col">
        <div class="card h-100">
          <?= ($servicios_item["iframe"]); ?>
          <div class="card-body">
            <h5 class="card-title"><?= esc($servicios_item["titulo"]); ?></h5>
            <p class="card-text">
              <?= esc($servicios_item["descripcion"]); ?>
              <p>
            <a href="contactos" class="btn btn-primary">Consultar</a>
              </p>
          </div>
        </div>
     </div>
     <?php endif ;?>
  <?php endforeach ?>
<?php else : ?>
  No hay registros
<?php endif ?>
  </div>
  </div>