<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";

class AdmClaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        $admclase = $this->model->getClasesInscritos();

        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumno/readAdmClase.php";
    }

}
