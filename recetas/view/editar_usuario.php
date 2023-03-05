<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/apps_php/recetas/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Settings usuarios</title>
</head>
<?php
require_once '../app/Config/constantes.php';
?>

<body class='d-flex flex-column'>

    <?php
    if ($_SESSION['user']['status'] == 'logout') {
        require_once '../view/require/title.php';
    } else {
        require_once '../view/require/header.php';
    }
    ?>
    <main class='d-flex flex-column justify-content-center align-items-center' style='padding: 2% 8%'>

        <h3 class='d-flex text-center py-2 my-3 mx-5 text-secondary'>Perfil usuario</h3>

        <?php
        require_once '../view/require/profile_usuario.php';
        ?>
    </main>
</body>

</html>