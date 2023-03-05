<?php
namespace App\Controllers;

use App\Models\Usuarios;

class BaseController {
    public function renderHTML($fileName, $data=[]) {
        include($fileName);
    }
}