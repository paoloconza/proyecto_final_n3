<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83c3cfe2d7.js" crossorigin="anonymous"></script>
    <link href="/public/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <main class="flex bg-gray-100">

        <aside class="bg-gray-800 relative h-screen w-72 md:w-64 hidden sm:block shadow-xl">
            <div class="p-3 flex items-center">
                <img class="h-8 w-8 rounded-full" src="/assets/logo.jpg" alt="">
                <p class="text-white text-sm font-light ml-3">Universidad</p>
            </div>
            <hr class="mx-0.5">
            <div class="p-3">
            <?php
                session_start();
                $user = $_SESSION["user"];
                $rol = $_SESSION["user"]["rol_id"];

                    echo '<p class="text-white">' . $user["nombre"] . '</p>';                
                ?>
                <p class="text-white text-sm">administrador</p>
            </div>
            <hr class="mx-0.5">

            <nav class="text-white text-sm pt-3">
                <p class="text-center">MENU ADMINISTRACION</p>
                <a href="/permisos" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fa-solid fa-user-gear mr-3"></i>
                    Permisos
                </a>
                <a href="/maestros" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fa-solid fa-chalkboard-user mr-3"></i>
                    Maestro
                </a>
                <a href="/alumnos" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fa-solid fa-user-graduate mr-3"></i>
                    Alumnos
                </a>
                <a href="/clases" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fa-solid fa-chart-bar mr-3"></i>
                    Clases
                </a>
            </nav>
        </aside>

        <div class="w-full flex flex-col h-screen">

            <nav class="bg-white">
                <div class="relative flex items-center justify-between h-10 m-2">
                    <div class="flex-1 flex items-center justify-center sm:justify-start">
                        <button id="sidebarBtn" class="px-4 py-2 text-gray-700 text-sm rounded-lg hover:bg-gray-200">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a class="ml-6" href="/dashboard">Home</a>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="flex text-sm rounded-full" id="profileBtn">
                                    <p>Bienvenido</p>
                                </button>
                            </div>

                            <div id="profileDiv" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">
                                    <i class="fas fa-user mr-2"></i>Your Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">
                                    <i class="fas fa-cog mr-2"></i>Settings
                                </a>
                                <a href="/index.php" class="block px-4 py-2 text-sm text-gray-700">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="w-full border-t flex flex-col">
                <h2 class="text-gray-700 m-3 font-semibold text-2xl">Lista de Permisos</h2>
                <div class="w-11/12 flex-grow p-6 text-gray-700 bg-white mx-3">
                    <p class="font-semibold">Información de Permisos</p>
                    <hr>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Email/usuario</th>
                                <th class="text-left">Permiso</th>
                                <th class="text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1; // Inicializa el contador
                            foreach ($permisos as $permiso) {
                            ?>
                                <tr class="border-y-2">
                                    <td><?= $counter++?></td>
                                    <td><?= $permiso["correo"] ?></td>
                                    <td><?= $permiso["nombre_rol"] ?></td>
                                    <td class="flex">
                                        <a class="mr-5" href="/permisos/edit?id=<?= $permiso["id_usuario"] ?>"><i class="fa-solid fa-pen-to-square" style="color: #5094a6;"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="main.js"></script>


</body>

</html>