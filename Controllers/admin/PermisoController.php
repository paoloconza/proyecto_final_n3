<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Roll.php";

class PermisoController
{
    protected $model;
    protected $rollModel;

    public function __construct()
    {
        $this->model = new User();
        $this->rollModel = new Roll();
    }

    public function index()
    {

        $permisos = $this->model->getRol();

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/read.permiso.php";
    }

    public function edit($id)
    {
        $roll = $this->rollModel->all();
        // $permiso = $this->model->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/modalEditPermiso.php";
    }

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
