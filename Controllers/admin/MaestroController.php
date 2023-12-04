<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Clase.php";

class MaestroController
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

        $maestros = $this->model->whereMaestro("rol_id", "=", 2);
        $clases = $this->claseModel->all();

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/readMaestro.php";
    }

    public function edit($id)
    {
        $maestro = $this->model->find($id);
        $clases = $this->claseModel->all();

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/modalEditMaestro.php";
    }
    
    public function update($request)
    {
        $this->model->updateMaestro($request);
        
        header("Location: /maestros");
        
        // var_dump($request);
    }

    public function store($request)
    {
        $response = $this->model->createMaestro($request, 2);
        header("Location: /maestros");
    }

    public function delete($id)
    {

        $this->model->destroy($id);

        header("Location: /maestros");
    }

}
