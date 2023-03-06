<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Usuarios extends DBAbstractModel
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
    private $nombre;
    private $usuario;
    private $psw;
    private $estado;

    public function searchUserBox()
    {
        $this->query = "SELECT * FROM users WHERE nombre LIKE CONCAT('%',:nombre,'%')";
        $this->parametros['nombre'] = $this->nombre;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function editData(){
        $this->query = "UPDATE usuarios SET nombre = :nombre, usuario = :usuario, password = :psw WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
    }

    public function getById(){
        $this->query = "SELECT * FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function delete()
    {
        $this->query = "DELETE FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }
    public function block()
    {
        $this->query = "UPDATE usuarios SET estado = 'Bloqueado' WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function unblock()
    {
        $this->query = "UPDATE usuarios SET estado = 'Activo' WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }
    public function getAll(){
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //get only users with profile users
    public function getOnlyUsers(){
        $this->query = "SELECT usuarios.*, r_usuarios_perfiles.Perfiles_perfil FROM usuarios INNER JOIN r_usuarios_perfiles
        ON usuarios.id = r_usuarios_perfiles.usuarios_id
        WHERE r_usuarios_perfiles.Perfiles_perfil = 'User'";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByLogin(){
        $this->query = "SELECT usuarios.*, r_usuarios_perfiles.Perfiles_perfil FROM usuarios INNER JOIN r_usuarios_perfiles
        ON usuarios.id = r_usuarios_perfiles.usuarios_id
        WHERE usuarios.usuario = :usuario AND usuarios.password = :psw";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByLogin2()
    {
        $this->query = "SELECT  FROM usuarios, r_usuarios_perfiles WHERE usuario=:usuario AND psw=:psw";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }


    //Getters & setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
