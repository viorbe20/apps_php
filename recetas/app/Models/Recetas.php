<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Recetas extends DBAbstractModel
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
    private $titulo;
    private $ingredientes;
    private $elaboracion;
    private $etiquetas;
    private $publica;
    private $imagen;
    private $idColaborador;

    //Get all the recepies with idColborador
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
    public function getAll()
    {
        $this->query = "SELECT recetas.*, colaboradores.cuenta FROM recetas INNER JOIN colaboradores
        ON recetas.idColaborador = colaboradores.idusuario";
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
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }
    public function getElaboracion()
    {
        return $this->elaboracion;
    }
    public function setElaboracion($elaboracion)
    {
        $this->elaboracion = $elaboracion;
    }
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }
    public function setEtiquetas($etiquetas)
    {
        $this->etiquetas = $etiquetas;
    }
    public function getPublica()
    {
        return $this->publica;
    }
    public function setPublica($publica)
    {
        $this->publica = $publica;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }


}