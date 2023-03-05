<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/recetas/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/recetas/assets/js/home.js"></script>
    <title>Test</title>
</head>
<?php
require_once '../app/Config/constantes.php';

use App\Models\Recetas;
use App\Models\Usuarios;
?>

<body>
<a href="<?php echo DIRBASEURL; ?>/logout" class="btn btn-danger rounded-pill px-4 my-1">Salir</a>


<?php

$u = Usuarios :: getInstancia();
$r = Recetas :: getInstancia();
$u->setUsuario("usuario1");
$u->setPsw("usuario1");

foreach($u->getByLogin() as $key => $value){
    //var_dump($value);
}

foreach ($r->getAll() as $key => $value) {
    var_dump($value);
}


?>

</body>

</html>