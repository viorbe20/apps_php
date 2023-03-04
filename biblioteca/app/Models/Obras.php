<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Obras extends DBAbstractModel
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
    private $nombre_autor;
    private $apellidos_autor;
    private $editorial;

    //Get all books ordered by id from last to first
    public function getAll()
    {
        $this->query = "SELECT * FROM obras ORDER BY id DESC";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getIfPrestamo()
    {
        $this->query = "SELECT obras.id, prestamos.estado 
        FROM obras INNER JOIN prestamos 
        ON prestamos.id_obra = obras.id";
        $this->get_results_from_query();
        return $this->rows;
    }

public function getAllWithPrestamoStatus()
{
    $this->query = "SELECT obras.*, 
                    CASE WHEN prestamos.estado IS NULL THEN 'Disponible' ELSE prestamos.estado END AS estado_prestamo
                    FROM obras 
                    LEFT JOIN (
                        SELECT id_obra, estado 
                        FROM prestamos 
                        WHERE estado = 1
                        GROUP BY id_obra
                    ) prestamos 
                    ON prestamos.id_obra = obras.id
                    ORDER BY obras.id DESC";
    $this->get_results_from_query();
    return $this->rows;
}



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

    public function getNombre_autor()
    {
        return $this->nombre_autor;
    }

    public function setNombre_autor($nombre_autor)
    {
        $this->nombre_autor = $nombre_autor;
    }

    public function getApellidos_autor()
    {
        return $this->apellidos_autor;
    }

    public function setApellidos_autor($apellidos_autor)
    {
        $this->apellidos_autor = $apellidos_autor;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }
}
