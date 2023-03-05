<header class="d-flex text-white bg-secondary justify-content-between">

    <section class='d-flex align-items-center mx-2'>
        <div class='d-flex'>
        <a class="nav-link active" aria-current="page" style="font-size: larger; font-weight: bold;" href="<?php echo DIRBASEURL; ?>/home">Recetas </a>
        </div>
        <?php require_once 'tabs.php';?>

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