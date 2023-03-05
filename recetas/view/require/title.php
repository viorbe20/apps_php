<header class="d-flex text-white bg-secondary justify-content-between">

    <section class='d-flex align-items-center mx-2'>
        <div class='d-flex'>
        <a class="nav-link active" aria-current="page" style="font-size: larger; font-weight: bold;" href="<?php echo DIRBASEURL; ?>/home">Recetas </a>
        </div>

        <?php if ($_SESSION['user']['profile'] != 'admin') { ?>
        <div class="container d-flex">
            <ul class="navbar-nav p-2 d-flex flex-lg-row">
                <li class="nav-item px-2 mx-2">
                    <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/publicaciones">Publicaciones </a>
                </li>
            </ul>
        </div>
        <?php 
    }?>
    </section>
</header>