<header class="d-flex text-white bg-secondary justify-content-between">

    <section class='d-flex align-items-center mx-2'>
        <div class='d-flex'>
        <a class="nav-link active" aria-current="page" style="font-size: larger; font-weight: bold;" href="<?php echo DIRBASEURL; ?>/home">Biblioteca </a>
        </div>
        
        <div class="container d-flex">
            <ul class="navbar-nav p-2 d-flex flex-lg-row">
                <li class="nav-item px-2 mx-2">
                    <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/obras">Obras </a>
                </li>
            </ul>
            <div>
            </div>
    </section>

    <section class='d-flex'>
        <?php 
        if($_SESSION['user']['status'] == 'logout') {
            require_once 'login_form.php';
        } else if ($_SESSION['user']['status'] == 'login'){
            require_once 'user_info.php';
            require_once 'logout_btn.php';
        } 
        ?>
    </section>

</header>