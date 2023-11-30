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
    <!-- <h1>bienvenido al dashboard</h1> -->
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

                if ($rol == 1) {
                    // var_dump($user);
                    echo '<p class="text-white">' . $user["nombre"] . " " . $user["apellido"] . '</p>
                    <p class="text-white text-sm">Administrador</p>
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
                      Maestros
                    </a>
                    <a href="/alumnos" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                      <i class="fa-solid fa-user-graduate mr-3"></i>
                      Alumnos
                    </a>
                    <a href="/clases" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                      <i class="fa-solid fa-chart-bar mr-3"></i>
                      Clases
                    </a>';
                }
                if ($rol == 2) {

                    echo '<p class="text-white">' . $user["nombre"] . " " . $user["apellido"] . '</p>
                    <p class="text-white text-sm">Maestro</p>
                  </div>
                  <hr class="mx-0.5">
            
                  <nav class="text-white text-sm pt-3">
                    <p class="text-center">MENU MAESTROs</p>
                    <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                      <i class="fa-solid fa-user-graduate mr-3"></i>
                      Alumnos
                    </a>
                    ';
                }
                if ($rol == 3) {

                    echo '<p class="text-white">' . $user["nombre"] . " " . $user["apellido"] . '</p>
                    <p class="text-white text-sm">Alumno</p>
                  </div>
                  <hr class="mx-0.5">
            
                  <nav class="text-white text-sm pt-3">
                    <p class="text-center">MENU ALUMNOS</p>
                    <a href="/calificaciones" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fa-solid fa-laptop-file mr-3"></i>
                      Ver Calificaciones
                    </a>
                    <a href="/administrarClase" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                      <i class="fa-solid fa-chalkboard-user mr-3"></i>
                      Administra tu clases
                    </a>';
                }
                ?>
                </nav>
        </aside>

        <div class="w-full flex flex-col h-screen">

            <nav class="bg-white">
                <div class="relative flex items-center justify-between h-10 m-2">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <button id="sidebarBtn" class="px-4 py-2 text-gray-700 text-sm rounded-lg hover:bg-gray-200">
                            <i class="fas fa-bars mr-6"></i> Home
                        </button>
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
                <!-- </div> -->
            </nav>

            <div class="w-full border-t flex flex-col">
                <h2 class="text-gray-700 m-3 font-semibold text-2xl">Dashboard</h2>
                <div class="w-4/6 flex-grow p-6 text-gray-700 bg-white ml-3">
                    <p>Bienvenido</p>
                    <p>Selecciona la opcion que quieras realizar en las pestañas del menu de la izquierda</p>
                </div>
            </div>
        </div>
    </main>

    <script src="/main.js"></script>
</body>

</html>