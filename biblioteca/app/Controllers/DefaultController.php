<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';


class DefaultController extends BaseController
{
    public function homeAction()
    {

        $data = array();

        $this->renderHTML('../view/home.php', $data);

    }

    public function loginAction()
    {
        
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
