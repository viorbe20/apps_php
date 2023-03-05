<?php

namespace App\Controllers;

use App\Controllers\TemplateController;
use App\Models\Usuarios;
use App\Models\Recetas;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

class DefaultController extends BaseController
{
    public function homeAction()
    {

        $data = array();
        $usuario = Usuarios::getInstancia();
        $receta = Recetas::getInstancia();

        foreach ($receta->getall() as $key => $value) {
            $data['recetas'][] = $value;
        }

        if (isset($_POST['login'])) {

            //Comprobar que el usuario existe
            $usuario->setUsuario(clearData($_POST['username']));
            $usuario->setPsw(clearData($_POST['password']));

            if ($usuario->getByLogin() != null) {

                foreach ($usuario->getByLogin() as $key => $value) {
                    $_SESSION['user']['status'] = "login";
                    $_SESSION['user']['username'] = $value['usuario'];
                    $_SESSION['user']['profile'] = $value['Perfiles_perfil'];
                    $_SESSION['user']['estado'] = $value['estado'];
                }

                if ($_SESSION['user']['profile'] = 'Admin') {
                    header('Location: ' . DIRBASEURL . "/usuarios");
                } else {
                    header('Location: ' . DIRBASEURL . "/publicaciones");
                }
            } else {
                echo '<script>alert("Usuario o contraseña incorrectos")</script>';
                $this->renderHTML('../view/home.php', $data);
            }
        } else { //By default
            $this->renderHTML('../view/home.php', $data);
        }
    }


    public function logoutAction()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        header('Location: ' . DIRBASEURL . "/home");
        //header('location: index.php');
    }

    public function testaction()
    {
        $data = array();
        $this->renderHTML('../view/test.php', $data);
    }
}
