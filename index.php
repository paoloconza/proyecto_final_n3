<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/LoginController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/admin/AlumnoController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/admin/MaestroController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/admin/ClaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/admin/PermisoController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/alumno/CalificacionController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/alumno/AdmClaseController.php");

// ENRUTADOR
$loginController = new LoginController();
$alumnoController = new AlumnoController();
$maestroController = new MaestroController();
$claseController = new ClaseController();
$permisoController = new PermisoController();
$calificacionController = new CalificacionController();
$admClaseController = new AdmClaseController();

// Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
$route = explode("?", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];

// var_dump($_POST);
if ($method === "POST") {
    switch ($route[0]) {
        case '/login':
            $loginController->login($_POST["email"]);
            break;

        case '/alumnos/delete':
            $alumnoController->delete($_POST["id"]);
            break;

        case '/maestros/delete':
            $maestroController->delete($_POST["id"]);
            break;

        case '/alumnos/create':
            $alumnoController->store($_POST);
            break;

        case '/maestros/create':
            $maestroController->store($_POST);
            break;

        case '/clases/create':
            $claseController->store($_POST);
            break;

        case '/alumnos/update':
            // var_dump($_POST);
            $alumnoController->update($_POST);
            break;

        case '/maestros/update':
            $maestroController->update($_POST);
            break;

        case '/clases/update':
            $claseController->update($_POST);
            break;

        case '/administrarClase/create':
            $inscripcionController->store($_POST["alumno_id"], $_POST["clase_id"]);
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

        case '/alumnos/edit':
            $alumnoController->edit($_GET["id"]);
            break;

        case '/maestros/edit':
            $maestroController->edit($_GET["id"]);
            break;

        case '/clases/edit':
            $claseController->edit($_GET["id"]);
            break;

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

        case '/delete':
            $inscripcionController->destroy($_GET["id"]);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
