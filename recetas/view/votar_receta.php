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
    <title>Votar receta</title>
</head>
<?php
require_once '../app/Config/constantes.php';
?>

<body class='d-flex flex-column'>

    <?php
    require_once '../view/require/header.php';
    //var_dump($data);
    ?>

    <main class='d-flex flex-column justify-content-center align-items-center' style='padding: 2% 8%'>


        <h3 class='d-flex text-center py-2 my-3 mx-5 text-secondary'>Votar receta: <?php echo $data['titulo'] ?></h3>
        
        <form action="" method="post" class='card w-50 d-flex flex-column text-white align-items-start' style='padding: 1rem'>

            <section class='d-flex flex-column align-items-start justify-content-between w-100'>
                <div class='d-flex'>
                    <input type="radio" name="stars" id="star1" value="1" <?php if(isset($data['receta'])){echo ($data['receta']['puntuacion'] == 1) ? 'checked' : ''; }?>>
                    <label for="star1"><span style="font-size: 50px; color: #FEDD20;">★</span></label>
                </div>
                <div class='d-flex'>
                    <input type="radio" name="stars" id="star2" value="2" <?php if(isset($data['receta'])){echo ($data['receta']['puntuacion'] == 2) ? 'checked' : ''; }?>>
                    <label for="star2"><span style="font-size: 50px; color: #FEDD20;">★★</span></label>
                </div>
                <div class='d-flex'>
                    <input type="radio" name="stars" id="star3" value="3" <?php if(isset($data['receta'])){echo ($data['receta']['puntuacion'] == 3) ? 'checked' : ''; }?>>
                    <label for="star3"><span style="font-size: 50px; color: #FEDD20;">★★★</span></label>
                </div>
                <div class='d-flex'>
                    <input type="radio" name="stars" id="star4" value="4" <?php if(isset($data['receta'])){echo ($data['receta']['puntuacion'] == 4) ? 'checked' : ''; }?>>
                    <label for="star4"><span style="font-size: 50px; color: #FEDD20;">★★★★</span></label>
                </div>
                <div class='d-flex'>
                    <input type="radio" name="stars" id="star5" value="5" <?php if(isset($data['receta'])){echo ($data['receta']['puntuacion'] == 5) ? 'checked' : ''; }?>>
                    <label for="star5"><span style="font-size: 50px; color: #FEDD20;">★★★★★</span></label>
                </div>
            </section>


            <section class='w-100'>
                <div class="form-group d-flex justify-content-center align-items-center pb-2 w-100 mt-3">
                    <button type="submit" class="btn btn-primary" name="btn_vote_recipe">Votar</button>
                </div>

            </section>

        </form>


    </main>
</body>

</html>