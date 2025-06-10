<!-- nav  --> 
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- logo marca de la empresa -->
            <a class="navbar-brand me-auto barra" href="<?php echo base_url('principal');?>">
                <img src="<?php echo base_url('assets/img/tyc_icon.png') ?>"
                    alt="marca" width="50" height="25" class="img-fluid" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                <?php if(session()->id_perfil == 1 || session()->id_perfil == 2 ): ?>
            <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/panel') ?>">Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactos">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout">Logout</a>
                </li>
        <?php else: ?>
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
            <?php endif; ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-primary" type="submit" onclick="en_construccion()">Buscar</button>
                </div>

            </form>
        </div>
    </div>
</nav>
<!-- fin nav  -->