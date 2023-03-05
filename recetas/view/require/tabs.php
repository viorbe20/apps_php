<div class="container d-flex">
    <ul class="navbar-nav p-2 d-flex flex-row">
        <?php
        if ($_SESSION['user']['profile'] != 'admin') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/publicaciones">Publicaciones </a>
            </li><?php
            } else if ($_SESSION['user']['profile'] == 'user') {?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/mis_recetas">Mis recetas</a>
            </li>
        <?php
        } else if ($_SESSION['user']['profile'] == 'admin') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/usuarios">Usuarios</a>
            </li>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/pagos">Pagos</a>
            </li>
        <?php
        } 
?>