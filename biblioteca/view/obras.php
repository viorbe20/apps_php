<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/apps_php/biblioteca/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Obras</title>
</head>

<body>

    <?php
    require_once '../app/Config/constantes.php';
    ?>

    <?php
    require_once '../view/require/header.php';
    ?>

    <main class='d-flex flex-column justify-content-center'>
    <section class='d-flex flex-column align-items-center' style='margin: 1rem'>
        <h4 class='card d-flex text-center py-2 text-secondary bg-light w-25'>Obras</h4>
    </section>
            <?php
            require_once '../view/require/search_obra.php';
            require_once '../view/require/tabla_obras.php';
            ?>


    </main>

</body>

</html>