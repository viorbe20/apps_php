<?php

namespace App\Controllers;

use App\Models\Usuarios;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

class AdminController extends BaseController
{

    public function editarUsuarioAction($request)
    {
        //Check if user is admin
        if ($_SESSION['user']['profile'] == "Admin") {
            $data = array();
            $user = Usuarios::getInstancia();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $user->setId($id);
            
            foreach ($user->getById() as $value) {
                $data['usuario'] = $value;
            }

            if(isset($_POST['btn_edit_user'])){
                $user->setNombre(clearData($_POST['name']));
                $user->setUsuario(clearData($_POST['username']));
                $user->setPsw(clearData($_POST['password']));
                $user->editData();
                header('Location: ' . DIRBASEURL . "/usuarios");
            } else {
                $this->renderHTML('../view/editar_usuario.php', $data);
            }
            


        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    public function bloquearUsuarioAction($request)
    {
        //Check if user is admin
        if ($_SESSION['user']['profile'] == "Admin") {

            $data = array();
            $user = Usuarios::getInstancia();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $user->setId($id);

            //Unblock user
            $user->block();

            //Get data and show
            foreach ($user->getOnlyUsers() as $key => $value) {
                $data['usuarios'][] = $value;
            }
            
            //Control number of users to show
            if ($data['usuarios'] == null) {
                echo "<script>alert('No hay usuarios')</sc>";
            } else if (count($data['usuarios']) >= 7) {
                $data['show_users'] = 5;
            } else {
                $data['show_users'] = count($data['usuarios']);
            }

            $this->renderHTML('../view/usuarios.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function desbloquearUsuarioAction($request)
    {
        //Check if user is admin
        if ($_SESSION['user']['profile'] == "Admin") {

            $data = array();
            $user = Usuarios::getInstancia();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $user->setId($id);

            //Unblock user
            $user->unblock();

            //Get data and show
            foreach ($user->getOnlyUsers() as $key => $value) {
                $data['usuarios'][] = $value;
            }
            
            //Control number of users to show
            if ($data['usuarios'] == null) {
                echo "<script>alert('No hay usuarios')</script>";
            } else if (count($data['usuarios']) >= 7) {
                $data['show_users'] = 5;
            } else {
                $data['show_users'] = count($data['usuarios']);
            }

            $this->renderHTML('../view/usuarios.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    public function usuariosAction()
    {

        //Check if user is admin
        if ($_SESSION['user']['profile'] == "Admin") {

            $data = array();
            $user = Usuarios::getInstancia();

            foreach ($user->getOnlyUsers() as $key => $value) {
                $data['usuarios'][] = $value;
            }

            //Control number of users to show
            if ($data['usuarios'] == null) {
                //echo "<script>alert('No hay usuarios')</script>";
                $data['show_users'] = 0;
            } else if (count($data['usuarios']) >= 7) {
                $data['show_users'] = 5;
            } else {
                $data['show_users'] = count($data['usuarios']);
            }

            $this->renderHTML('../view/usuarios.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function pagosAction()
    {

        //Check if user is admin
        if ($_SESSION['user']['profile'] == "Admin") {

            $data = array();


            $this->renderHTML('../view/pagos.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
}
