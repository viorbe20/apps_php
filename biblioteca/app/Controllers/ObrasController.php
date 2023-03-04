<?php

namespace App\Controllers;

use App\Models\Obras;
use App\Models\Users;
use App\Models\Prestamos;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';


class ObrasController extends BaseController
{
    public function prestarObrasAction($request)
    {
        $data = array();
        $book = Obras::getInstancia();
        $user = Users::getInstancia();
        $loan = Prestamos::getInstancia();


        $rest = explode("/", $request);
        $id = (int)end($rest);
        $book->setId($id);
        $data['user_selected'] = "";
        $data['user_loans'] = "";
        $data['display'] = "display:none";

        foreach ($book->getById() as $key => $value) {
            $data['titulo'] = $value['titulo'];
            $data['id'] = $value['id'];
        }

        foreach ($user->getAll() as $key => $value) {
            $data['usuarios'][] = $value;
        }

        if (isset($_POST['btn_search_user'])) { //Select user
            $user_selected = clearData($_POST['input_search_book']);
            $parts = explode("-", $user_selected);
            $_SESSION['selected_user_id'] = trim(end($parts));

            //Check if user exists
            $user->setId($_SESSION['selected_user_id']);

            if ($user->getById()) {
                $data['display'] = "display:block";
                foreach ($user->getUserLoansById() as $key => $value) {
                    $data['user_selected'] = $value['nombre'] . " " . $value['apellidos'];
                    $data['user_loans'] = $value['cantidad_prestamos'];
                }
            } else {
                echo "<script>alert('El usuario no existe');</script>";
            }
        } else if (isset($_POST['btn_loan'])) { //Loan book

            //Check if user has 3 loans
            $user->setId($_SESSION['selected_user_id']);

            foreach ($user->getUserLoansById() as $key => $value) {
                $data['user_loans'] = $value['cantidad_prestamos'];
            }

            // if ($data['user_loans'] >= 3) {
            //     echo "<script>alert('El usuario no puede tener más de 3 préstamos.');</script>";
            // } else {
            //     $loan->setIdObra($id);
            //     $loan->setIdUsuario($_SESSION['selected_user_id']);
            //     $loan->setFechaDevolucion(getDateInSevenDaysDB());
            //     $loan->set();
            //     echo "<script>alert('Libro prestado.');</script>";
            // }
        }


        $this->renderHTML('../view/prestar_obra.php', $data);
    }

    public function obrasAction()
    {

        $data = array();
        $obra = Obras::getInstancia();
        $data['obras_prestamos'] = $obra->getAllWithPrestamoStatus();

        if (isset($_POST['btn_search_book'])) {
            $obra->setTitulo(clearData($_POST['input_search_book']));
            $data['obras_prestamos'] = $obra->searchBookWithPrestamoStatus();
        }

        $this->renderHTML('../view/obras.php', $data);
    }
}
