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
    <title>Prestar obra</title>
</head>

<body>

    <?php
    require_once '../app/Config/constantes.php';
    ?>

    <?php
    if ($_SESSION['user']['status'] == 'logout') {
        require_once '../view/require/title.php';
    } else {
        require_once '../view/require/header.php';
    }
    ?>

    <main class='d-flex flex-column justify-content-center'>
        <section class='d-flex flex-column align-items-center' style='margin: 1rem'>
            <h4 class='card d-flex text-center py-2 text-secondary bg-light w-25'>Préstamo <?php echo $data['titulo']; ?></h4>
        </section>

        <section class='d-flex flex-column align-items-center'>
            <form action="" method="post" name='form_loan' class='card w-50 d-flex flex-column text-white align-items-start'>

                <section class='w-100 my-3'>
                    <div class='form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100'>
                        <input name="input_search_book" class="form-control" type="text" placeholder="Buscar usuario" list="userList">
                        <datalist id="userList">
                            <?php
                            foreach ($data['usuarios'] as $key => $value) {
                                echo "<option value='" . $value['nombre'] . " " . $value['apellidos'] . " - " . $value['id'] . "'>";
                            }
                            ?>
                        </datalist>
                        <button type="submit" name="btn_search_user" class="btn btn-primary rounded-pill px-4 my-1 mx-2">Seleccionar</button>
                    </div>
                </section>

                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                    <label for="username" class="text-dark w-25">Nombre usuario</label>
                    <div class="d-flex p-1 justify-content-center align-items-center w-75">
                        <input type="text" class="form-control mx-1" name="username" value='<?php if (isset($data['user_selected'])) {
                                                                                                echo $data['user_selected'];
                                                                                            } ?>' readonly>
                    </div>
                </div>

                <section class='d-flex'>
                    <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                        <label for="password" class="text-dark w-50">Cantidad préstamos</label>
                        <div class="d-flex p-1 justify-content-center align-items-center w-50">
                            <input type="text" class="form-control mx-1" name="cantidad_prestamos" value='<?php if (isset($data['user_loans'])) {
                                                                                                                echo $data['user_loans'];
                                                                                                            } ?>' readonly>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
                        <label for="password" class="text-dark w-50">Fecha entrega</label>
                        <div class="d-flex p-1 justify-content-center align-items-center w-50">
                            <input type="text" class="form-control mx-1" name="fecha_entrega" value="<?php echo getDateInSevenDays(); ?>" readonly>
                        </div>
                    </div>
                </section>
                <?php echo $data['display'] ?>
                <div class="form-group d-flex justify-content-center align-items-center pb-2 w-100 my-3">
                    <button type="submit" class="btn btn-primary" name="btn_loan" style="<?php echo $data['display'] ?>">Prestar</button>
                </div>
            </form>
        </section>
    </main>

</body>

</html>