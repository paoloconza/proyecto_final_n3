<?php
!isset($permiso) && header("Location: /permisos");
session_start();
// $_SESSION["id_usuario"] = $clases["id_usuario"];
$_SESSION["email"] = $permiso["correo"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/output.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>

    <!-- Main modal -->
    <div class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-sm max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded shadow border border-gray-300">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Editar Clase
                        <?php
                        // var_dump($roll);
                        ?>

                    </h3>
                    <a class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" href="/permisos"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg></a>
                </div>
                <!-- Modal body -->
                <div class="p-2.5">
                    <form class="space-y-2.5" action="/permisos/update" method="post">

                        <div>
                            <label for="email" class="block mb-1.5 text-xs font-medium text-gray-900 ">Correo Electronico</label>
                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1"><?= $permiso["correo"] ?></p>
                        </div>

                        <div>
                            <label for="roll" class="block mb-1 text-xs font-medium text-gray-900 mr-3">Rol del usuario</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500  w-full px-2 py-1" id="roll" name="roll">
                                <option disabled selected>Seleccione rol</option>
                                <?php foreach ($roll as $rol) { ?>
                                    <option id="roll"><?= $rol["id_rol"] . " " . $rol["nombre_rol"] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded text-[13px] py-1.5 px-2.5 text-center">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>