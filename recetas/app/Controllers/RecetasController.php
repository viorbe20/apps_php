<?php

namespace App\Controllers;

use App\Models\Recetas;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

class RecetasController extends BaseController
{
    public function misRecetasAction()
    {

        $data = array();
        $receta = Recetas::getInstancia();

        //Save new recipe
        
        foreach ($receta->getall() as $key => $value) {
            $data['recetas'][] = $value;
        }

        $this->renderHTML('../view/mis_recetas.php', $data);
    }

    public function publicacionesAction()
    {

        $data = array();
        $receta = Recetas::getInstancia();

        //Save new recipe
        
        foreach ($receta->getall() as $key => $value) {
            $data['recetas'][] = $value;
        }

        $this->renderHTML('../view/publicaciones.php', $data);
    }

}
