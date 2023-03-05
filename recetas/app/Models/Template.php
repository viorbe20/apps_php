<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Template extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    // public function getByLogin(){
    //     $this->query = "SELECT usuarios.*, r_usuarios_perfiles.Perfiles_perfil FROM usuarios INNER JOIN r_usuarios_perfiles
    //     ON usuarios.id = r_usuarios_perfiles.usuarios_id
    //     WHERE usuarios.usuario = :usuario AND usuarios.password = :psw";
    //     $this->parametros['usuario'] = $this->usuario;
    //     $this->parametros['psw'] = $this->psw;
    //     $this->get_results_from_query();
    //     $result = $this->rows;
    //     return $result;
    // }
}
