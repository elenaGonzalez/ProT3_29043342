<!-- nav  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- logo marca de la empresa -->
            <a class="navbar-brand me-auto barra" href="<?php echo base_url('principal'); ?>">
                <img src="<?php echo base_url('assets/img/tyc_icon.png') ?>"
                    alt="marca" width="50" height="25" class="img-fluid" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php if (session()->id_perfil == 2): ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/panel'); ?>">Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('contactos'); ?>">Contactos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
                    </li>
            </ul>
            <form class="d-flex" method="post" action="<?php echo base_url('/buscar_comentarios'); ?>">
                <input class="form-control me-2" type="search" name="buscar" placeholder="🔍 Buscar comentario" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        <?php else: ?>
            <?php if (session()->id_perfil == 1): ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/panel') ?>">Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
                </li>
                </ul>
                <form class="d-flex" method="post" action="<?php echo base_url('/panel/admin/buscar_reservas'); ?>">
                    <input class="form-control me-2" type="search" name="buscar_admin" placeholder="🔍 Por Fecha" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Reservas</button>
                </form>
            <?php else: ?>
                <!-- USUARIO NO LOGUEADO -->
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="quienes_somos">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acerca_de">Acerca De</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactos">Contactos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="registro">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
                </ul>
                <form class="d-flex" method="post" action="<?php echo base_url('/buscar_comentarios'); ?>">
                    <input class="form-control me-2" type="search" name="buscar" placeholder="🔍 Buscar comentario" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
        <!-- FIN USUARIO NO LOGUEADO -->
        </div>
    </div>
</nav>
<!-- fin nav  -->