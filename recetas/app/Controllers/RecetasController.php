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
        $receipt = Recetas::getInstancia();

        foreach ($receipt->getall() as $key => $value) {
            $data['recetas'][] = $value;
        }

        $this->renderHTML('../view/mis_recetas.php', $data);
    }

    public function publicacionesAction()
    {

        if ($_SESSION['user']['profile'] != 'Admin') {

            $data = array();
            $receta = Recetas::getInstancia();

            if (isset($_POST['btn_search_recipe']) && !empty($_POST['input_search_recipe'])) {
                $receta->setTitulo(clearData($_POST['input_search_recipe']));
                foreach ($receta->searchReceiptBox() as $value) {
                    $data['recetas'][] = $value;
                }
            } else { //All recipes
                if ($receta->getall() != null) { //Show recipes
                    if (count($receta->getall()) <= 5) {
                        $data['recetas'] = $receta->getall();
                    } else {
                        $data['recetas'] = array_slice($receta->getall(), 0, 5);
                    }
                } else { //No recipes
                    echo '<script>alert("No hay recetas disponibles")</script>';
                }
            }

            $this->renderHTML('../view/publicaciones.php', $data);
        } else { //Admin cannot access to this page
            $this->renderHTML('../view/home.php');
        }
    }
}
