<div class="shadow p-3 mb-5 bg-body-tertiary rounded">
     <?php
        $session = session();
        $nombre = $session->get('nombre');
        $id_usuario = $session->get('id_usuario');
        ?>
     <div class="container p-5">
            <h1>Reservas</h1>
             <a class="btn btn-primary btn-sm" href="<?php echo base_url('/panel') ?>" role="button">Perfil</a>
             <div class="table-responsive">
            <table class="table table-responsive-md table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Paseo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Calificación</th>
                    </tr>
                </thead>
                <tbody>
                     <?php if (!empty($reservas) && is_array($reservas)): ?>
                        <?php foreach ($reservas as $reservas_item): ?>
                            <tr>
                                <td><?= esc($reservas_item["servicio_nombre"]); ?></td>
                                <td><?= esc($reservas_item["fecha"]); ?></td>
                                <td><?= esc($reservas_item["origen"]); ?></td>
                                <td><?= esc($reservas_item["comentario"]); ?></td>
                                <td>
                                <?php if($reservas_item["calificacion"] > 0 ) : ?>    
                                <?php for ($i = 0; $i < $reservas_item["calificacion"]; $i++) : ?>
                                    <span class="fa fa-start">
                                        <i class="icono">
                                            <img src="<?php echo base_url('assets/img/star-fill.svg') ?>" alt="Icono" width="15" height="15">
                                        </i>
                                    </span>
                                <?php endfor; ?>
                                <?php else: ?>
                                     <a class="btn btn-primary btn-sm" 
                                     href="<?php echo base_url('/panel/usuario/comentar_reserva/'.$id_usuario .'/'.$reservas_item['id_reserva']); ?>">
                                     Calificar
                                    </a>
                                 <?php endif; ?>   
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                          <tr>
                           <td colspan="5">No hay reservas</td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
             </div>
        </div>
    </div>