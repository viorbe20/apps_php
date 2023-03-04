<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Prestamos extends DBAbstractModel
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
    private $id_obra;
    private $id_usuario;
    private $fecha_prestamo;
    private $fecha_devolucion;
    private $estado;

    //Set
    public function set()
    {
        $this->query = "INSERT INTO prestamos (id_obra, id_usuario, fecha_prestamo, fecha_devolucion, estado) 
        VALUES (:id_obra, :id_usuario, CURRENT_TIMESTAMP, :fecha_devolucion, 0)";
        $this->parametros['id_obra'] = $this->id_obra;
        $this->parametros['id_usuario'] = $this->id_usuario;
        $this->parametros['fecha_prestamo'] = $this->fecha_prestamo;
        $this->parametros['fecha_devolucion'] = $this->fecha_devolucion;
        $this->parametros['estado'] = $this->estado;
        $this->get_results_from_query();
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdObra()
    {
        return $this->id_obra;
    }

    public function setIdObra($id_obra)
    {
        $this->id_obra = $id_obra;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getFechaPrestamo()
    {
        return $this->fecha_prestamo;
    }

    public function setFechaPrestamo($fecha_prestamo)
    {
        $this->fecha_prestamo = $fecha_prestamo;
    }

    public function getFechaDevolucion()
    {
        return $this->fecha_devolucion;
    }

    public function setFechaDevolucion($fecha_devolucion)
    {
        $this->fecha_devolucion = $fecha_devolucion;
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