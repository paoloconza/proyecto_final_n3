<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";

class ClaseController
{
    protected $model;
    protected $claseModel;

    public function __construct()
    {
        $this->model = new User();
        $this->claseModel = new Clase();

    }

    public function index()
    {

        $clases = $this->model->getClasesInscritos();
        $maestros = $this->model->where("rol_id", "=", 2);

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/readClase.php";
    }

    public function edit($id)
    {
        $clase = $this->claseModel->findClase($id);
        $maestros = $this->model->where("rol_id", "=", 2);

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/modalEditClase.php";
    }

    public function store($request)
    {
        $response = $this->model->createClase($request);

        header("Location: /clases");
    }

    public function update($request)
    {
        $this->model->updateClase($request);

        header("Location: /clases");
    }

    public function delete($id)
    {

        $this->claseModel->destroyClase($id);

        header("Location: /clases");
    }

}
