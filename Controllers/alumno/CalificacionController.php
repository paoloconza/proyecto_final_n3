<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";

class CalificacionController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        $calificaciones = $this->model->getCalificaion();

        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumno/readCalificacion.php";
    }

}
