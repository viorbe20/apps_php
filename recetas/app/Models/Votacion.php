<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Votacion extends DBAbstractModel
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
    private $usuarios_id;
    private $recetas_id;
    private $puntuacion;

    public function updateVote(){
        $this->query = "UPDATE r_usuarios_recetas_votacion SET puntuacion = :puntuacion 
        WHERE usuarios_id = :usuarios_id AND recetas_id = :recetas_id";
        $this->parametros['usuarios_id'] = $this->usuarios_id;
        $this->parametros['recetas_id'] = $this->recetas_id;
        $this->parametros['puntuacion'] = $this->puntuacion;
        $this->get_results_from_query();
    }
    public function set(){
        $this->query = "INSERT INTO r_usuarios_recetas_votacion (usuarios_id, recetas_id, puntuacion) 
        VALUES (:usuarios_id, :recetas_id, :puntuacion)";
        $this->parametros['usuarios_id'] = $this->usuarios_id;
        $this->parametros['recetas_id'] = $this->recetas_id;
        $this->parametros['puntuacion'] = $this->puntuacion;
        $this->get_results_from_query();
    }
    public function getByUserRecipeIds(){
        $this->query = "SELECT * FROM r_usuarios_recetas_votacion 
        WHERE usuarios_id = :usuarios_id AND recetas_id = :recetas_id";
        $this->parametros['usuarios_id'] = $this->usuarios_id;
        $this->parametros['recetas_id'] = $this->recetas_id;
        $this->get_results_from_query();
        return $this->rows;
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
    public function getUsuarios_id()
    {
        return $this->usuarios_id;
    }
    public function setUsuarios_id($usuarios_id)
    {
        $this->usuarios_id = $usuarios_id;
    }
    public function getRecetas_id()
    {
        return $this->recetas_id;
    }
    public function setRecetas_id($recetas_id)
    {
        $this->recetas_id = $recetas_id;
    }
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;
    }
}