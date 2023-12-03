<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/user.php";

class LoginController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Muestra una vista con login
     */
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }

    public function login($email)
    {
        $usuario = $this->model->where("correo", "=", $email);

        if (count($usuario) === 1) {

            session_start();
            $_SESSION["user"] = $usuario[0];
            header("Location: /dashboard");
        } else {
            echo "incorrecto";
        }
    }

    public function dashboard()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/dashboard.php";
    }
}
