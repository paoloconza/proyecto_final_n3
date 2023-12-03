<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";

class ClaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        $clases = $this->model->getClasesInscritos();
        $maestros = $this->model->where("rol_id", "=", 2);

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/readClase.php";
    }

    // public function edit($id)
    // {
    //     $alumnos = $this->model->find($id);
    //     include $_SERVER["DOCUMENT_ROOT"] . "/views/empleados/edit.php";
    // }

    // public function update($request)
    // {
    //     $this->model->update($request);

    //     header("Location: /empleados");
    // }

    // public function delete($id)
    // {

    //     $this->model->destroy($id);

    //     header("Location: /empleados");
    // }

}
