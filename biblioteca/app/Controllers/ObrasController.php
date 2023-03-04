<?php

namespace App\Controllers;

use App\Models\Obras;

require_once '../app/Config/constantes.php';


class ObrasController extends BaseController
{
    public function obrasAction()
    {

        $data = array();
        $obra = Obras::getInstancia();
        $data['obras'] = $obra->getAll();
        $data['prestamos'] = $obra->getIfPrestamo();
        $data['obras_prestamos'] = $obra->getAllWithPrestamoStatus();

        $this->renderHTML('../view/obras.php', $data);

    }

}
