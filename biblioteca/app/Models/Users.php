<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Users extends DBAbstractModel
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

    //Propiedades del objeto
    private $id;
    private $dni;
    private $nombre;
    private $apellidos;
    private $perfil;
    private $username;
    private $psw;


    //get all
    public function getall()
    {
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }
    public function getById()
    {
        $this->query = "SELECT * FROM usuarios WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }
    public function getByLogin()
    {
        $this->query = "SELECT * FROM usuarios WHERE username=:username AND psw=:psw";
        $this->parametros['username'] = $this->username;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //Get one user with prestamo quantity of loans
    public function getUserLoansById()
{
    $this->query = "SELECT usuarios.nombre, usuarios.apellidos,
                    COUNT(prestamos.id) AS cantidad_prestamos 
                    FROM usuarios
                    LEFT JOIN prestamos ON usuarios.id = prestamos.id_usuario AND prestamos.estado = 1
                    WHERE usuarios.id = :id
                    GROUP BY usuarios.id";
    $this->parametros['id'] = $this->id;
    $this->get_results_from_query();
    $result = $this->rows;
    return $result;
}


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }


}