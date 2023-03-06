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
    <title>Mis recetas</title>
</head>
<?php
require_once '../app/Config/constantes.php';
?>

<body class='d-flex flex-column'>

    <?php
    require_once '../view/require/header.php';
    ?>

    <main class='d-flex flex-column justify-content-center align-items-center' style='padding: 2% 8%'>

        <h3 class='d-flex text-center py-2 my-3 mx-5 text-secondary'>Consultar receta</h3>
        <form action="" method="post" class='card w-50 d-flex flex-column text-white align-items-start' style='padding: 1rem'>
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                <label for="username" class="text-dark w-25">Nombre</label>
                <div class="d-flex p-1 justify-content-center align-items-center w-75">
                    <input type="text" class="form-control mx-1" name="name" value='<?php echo $data['usuario']['nombre'];
                                                                                    ?>'>
                </div>
            </div>

            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                <label for="username" class="text-dark w-25">Username</label>
                <div class="d-flex p-1 justify-content-center align-items-center w-75">
                    <input type="text" class="form-control mx-1" name="username" value='<?php echo $data['usuario']['usuario'];
                                                                                        ?>'>
                </div>
            </div>

            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                <label for="username" class="text-dark w-25">Password</label>
                <div class="d-flex p-1 justify-content-center align-items-center w-75">
                    <input type="text" class="form-control mx-1" name="password" value='<?php echo $data['usuario']['password'];
                                                                                        ?>'>
                </div>
            </div>

            <div class="form-group d-flex justify-content-center align-items-center pb-2 w-100 mt-3">
                <button type="submit" class="btn btn-primary" name="btn_edit_user">Modificar</button>
            </div>
        </form>
    </main>
</body>

</html>