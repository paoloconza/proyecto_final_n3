<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/Model.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/User.php";

class AlumnoController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        $alumnos = $this->model->where("rol_id", "=", 3);
        // var_dump($empleados);

        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/readAlumno.php";
    }

    public function edit($id)
    {
        $alumno = $this->model->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/modalEdit.php";
    }

    public function update($request)
    {
        $this->model->update($request);

        header("Location: /alumnos");
    }

    public function store($request)
    {
        $response = $this->model->create($request, 3);
        header("Location: /alumnos");
    }

    public function delete($id)
    {

        $this->model->destroy($id);

        header("Location: /alumnos");
    }
}
