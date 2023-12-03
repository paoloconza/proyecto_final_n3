<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";

class MaestroController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        $maestros = $this->model->whereMaestro("rol_id", "=", 2);

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/readMaestro.php";
    }

    public function edit($id)
    {
        $maestro = $this->model->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/modalEditMaestro.php";
    }

    public function update($request)
    {
        $this->model->update($request);

        header("Location: /empleados");
    }

    public function delete($id)
    {

        $this->model->destroy($id);

        header("Location: /maestros");
    }

}
