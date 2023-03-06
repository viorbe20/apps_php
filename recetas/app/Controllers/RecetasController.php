<?php

namespace App\Controllers;

use App\Models\Recetas;
use App\Models\Votacion;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

class RecetasController extends BaseController
{

    public function consultarAction()
    {
        $data = array();
        $receta = Recetas::getInstancia();

        $this->renderHTML('../view/consultar_receta.php', $data);
    }
    public function favAction()
    {
        $data = array();
        $receta = Recetas::getInstancia();

        $this->renderHTML('../view/publicaciones.php', $data);
    }
    public function votarAction($request)
    {
        $data = array();
        $rest = explode("/", $request);
        $id = (int)end($rest);

        $vote = Votacion::getInstancia();
        $vote->setRecetas_id($id);
        $vote->setUsuarios_id($_SESSION['user']['id']);

        $recipe = Recetas::getInstancia();
        $recipe->setId($id);

        foreach ($recipe->getById() as $value) { //Get name
            $data['titulo'] = $value['titulo'];
        }

        if (isset($_POST['btn_vote_recipe'])) {
            $vote->setUsuarios_id($_SESSION['user']['id']);
            $vote->setRecetas_id($id);
            $vote->setPuntuacion((int)$_POST['stars']);

            if (count($vote->getByUserRecipeIds()) == 0) { //Never voted. Create vote
                $vote->set();
                echo '<script>alert("Voto registrado")</script>';
            } else { //Update vote
                $vote->updateVote();
                echo '<script>alert("Voto actualizado")</script>';
            }

            if ($recipe->getall() != null) { //Show recipes
                if (count($recipe->getall()) <= 5) {
                    $data['recetas'] = $recipe->getall();
                } else {
                    $data['recetas'] = array_slice($recipe->getall(), 0, 5);
                }
            } else { //No recipes
                echo '<script>alert("No hay recetas disponibles")</script>';
            }
            $this->renderHTML('../view/publicaciones.php', $data);

        } else { //By default
            if ($vote->getByUserRecipeIds() != null) { //Never voted
                foreach ($vote->getByUserRecipeIds() as $value) {
                    $data['receta'] = $value;
                }
            }
            $this->renderHTML('../view/votar_receta.php', $data);
        }



    }
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
