<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/LoginController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/AlumnoController.php");
// ENRUTADOR
$loginController = new LoginController();
$alumnoController = new AlumnoController();

// Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
$route = explode("?", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];


if ($method === "POST") {
    switch ($route[0]) {
        case '/login':
            $loginController->login($_POST["email"]);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route[0]) {
        case '/index.php':
            $loginController->index();
            break;

        case '/dashboard':
            $loginController->dashboard();
            break;

        case '/alumnos':
            $alumnoController->index();
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
