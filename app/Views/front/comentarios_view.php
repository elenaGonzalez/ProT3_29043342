<div class="container p-5">
  <h2 class="text-center"><?php echo ($titulo); ?></h2>
  <?php if (!empty($comentarios) && is_array($comentarios)): ?>
    <div class="row row-cols-1 row-cols-md-4 g-3">
      <?php foreach ($comentarios as $comentarios_item): ?>
        <!--card -->
        <?php if ($comentarios_item['calificacion'] > 0) : ?>
          <div class="col-sm-3 mb-3 d-flex">
            <div class="card">
              <div class="card-body">
                <div class="col-12 text-center">
                  <h5 class="card-title"><?= esc($comentarios_item['usuario_nombre']); ?> <?= esc($comentarios_item['usuario_apellido']); ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= esc($comentarios_item['servicio_nombre']); ?></h6>
                </div>
                <?php for ($i = 0; $i < $comentarios_item["calificacion"]; $i++) : ?>
                  <span class="fa fa-start">
                    <i class="icono">
                      <img src="<?php echo base_url('assets/img/star-fill.svg') ?>" alt="Icono" width="15" height="15">
                    </i>
                  </span>
                <?php endfor; ?>
                <p class="card-text"><?= esc($comentarios_item["comentario"]); ?></p>
              </div>
              <div class="card-footer text-muted">
                <a href="servicios" class="btn btn-primary btn-sm">Ver Servicios</a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="card col-sm-12 mb-12 d-flex justify-content-center">
      <div class="card-body text-center">
         <h5 class="card-title">Comentarios</h5>
          Aun no hay comentarios
      </div>
    </div>
  <?php endif; ?>
</div>