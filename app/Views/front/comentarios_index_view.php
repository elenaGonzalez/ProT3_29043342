 <div class="container p-5">
   <?php if (!empty($comentarios) && is_array($comentarios)): ?>
     <div class="row row-cols-md-5 g-3">
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
                 <a href="servicios" class="btn btn-primary btn-sm align-items-center">Ver Servicios</a>
               </div>
             </div>
           </div>
         <?php endif; ?>
       <?php endforeach; ?>
     </div>
   <?php endif; ?>
 </div>

 <div class="d-grid col-6 mx-auto p-1 mb-1">
   <a class="btn btn-primary" href="comentarios" role="button">Ver Comentarios</a>
 </div>