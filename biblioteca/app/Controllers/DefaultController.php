<?php

namespace App\Controllers;

use App\Models\Users;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';


class DefaultController extends BaseController
{
    public function homeAction()
    {

        $data = array();
        $user = Users::getInstancia();
        
        if (isset($_POST['btn_login'])) {
            $user->setUsername(clearData($_POST['username']));
            $user->setPsw(clearData($_POST['psw']));
            $result = $user->getByLogin();
            
            if ($result) {
                
                $_SESSION['user']['status'] = "login"; 
                
                foreach ($result as $key => $value) {
                    $_SESSION['user']['username'] = $value['username'];
                    
                    if ($value['perfil'] == 1) {
                        $_SESSION['user']['profile'] = "admin";
                    } else if ($value['perfil'] == 2) {
                        $_SESSION['user']['profile'] = "employee";
                    } else if ($value['perfil'] == 3) {
                        $_SESSION['user']['profile'] = "user";
                    }   
                }
            } else {
                echo "<script>alert('Datos incorrectos. Vuelve a intentarlo.');</script>";
            }

            $this->renderHTML('../view/home.php', $data);
        } else {
            $this->renderHTML('../view/home.php', $data);
        }



    }

    public function logoutAction()
    {
        session_start();
        unset($_SESSION);
        //Close session
        session_destroy();
        //Redirect to home
        header('Location: ' . DIRBASEURL . "/home");
        //header('location: index.php');
    }

    public function testaction()
    {
        $data = array();
        $this->renderHTML('../view/test.php', $data);
    }
}
