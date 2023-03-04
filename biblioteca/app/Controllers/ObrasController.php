<?php

namespace App\Controllers;

use App\Models\Obras;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';


class ObrasController extends BaseController
{
    public function obrasAction()
    {

        $data = array();
        $obra = Obras::getInstancia();
        $data['obras_prestamos'] = $obra->getAllWithPrestamoStatus();

        if(isset($_POST['btn_search_book'])){
            $obra->setTitulo(clearData($_POST['input_search_book']));
            $data['obras_prestamos'] = $obra->searchBookWithPrestamoStatus();
        }

        $this->renderHTML('../view/obras.php', $data);

    }

}
