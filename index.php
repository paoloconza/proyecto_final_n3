<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/LoginController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/AlumnoController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/MaestroController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/ClaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/PermisoController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/CalificacionController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/AdmClaseController.php");

// ENRUTADOR
$loginController = new LoginController();
$alumnoController = new AlumnoController();
$maestroController = new MaestroController();
$claseController = new ClaseController();
$permisoController = new PermisoController();
$calificacionController = new CalificacionController();
$admclaseController = new AdmClaseController();

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

        // case '/alumnos':
        //     $alumnoController->edit($_GET[$id]);
        //     break;

        case '/alumnos':
            $alumnoController->index();
            break;

        case '/maestros':
            $maestroController->index();
            break;

        case '/clases':
            $claseController->index();
            break;

        case '/permisos':
            $permisoController->index();
            break;

        case '/calificaciones':
            $calificacionController->index();
            break;

        case '/administrarClase':
            $admclaseController->index();
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
