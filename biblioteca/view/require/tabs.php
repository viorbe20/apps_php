<div class="container d-flex">
    <ul class="navbar-nav p-2 d-flex flex-row">

        <?php
        if ($_SESSION['user']['profile'] != 'admin') { ?>
        <li class="nav-item px-2 mx-2">
            <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/obras">Obras </a>
        </li>
        <?php
        }
        if ($_SESSION['user']['profile'] == 'user') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/mis_prestamos">Mis prestamos</a>
            </li>
        <?php
        } else if ($_SESSION['user']['profile'] == 'employee') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/prestamos">Prestamos</a>
            </li>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/usuarios">Usuarios</a>
            </li>
        <?php
        } else if ($_SESSION['user']['profile'] == 'admin') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/usuarios">Usuarios</a>
            </li>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/trabajadores">Trabajadores</a>
            </li>
    </ul>
</div>
<?php
        }
?>