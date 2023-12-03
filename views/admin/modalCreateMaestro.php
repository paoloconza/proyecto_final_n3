<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative p-4 w-full max-w-sm max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow border border-gray-300">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Agregar Maestro
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-2.5">
                <form class="space-y-2.5" action="/maestros/create" method="post">

                    <div>
                        <label for="email" class="block mb-1.5 text-xs font-medium text-gray-900 ">Correo Electronico</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1" placeholder="Ingrese email" required>
                    </div>
                    <div>
                        <label for="nombre" class="block mb-1.5 text-xs font-medium text-gray-900 ">Nombre(s)</label>
                        <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1" placeholder="Ingrese el nombre" required>
                    </div>
                    <div>
                        <label for="apellido" class="block mb-1.5 text-xs font-medium text-gray-900 ">Apellido(s)</label>
                        <input type="apellido" name="apellido" id="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1" placeholder="Ingrese el apellido" required>
                    </div>
                    <div>
                        <label for="direccion" class="block mb-1.5 text-xs font-medium text-gray-900 ">dirección</label>
                        <input type="direccion" name="direccion" id="direccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1" placeholder="Ingrese la direccion">
                    </div>
                    <div>
                        <label for="fecha" class="block mb-1.5 text-xs font-medium text-gray-900 ">Fecha de nacimiento</label>
                        <input type="date" name="fecha" id="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1">
                    </div>
                    <div class="flex items-center">
                        <label for="dni" class="block mb-1 text-xs font-medium text-gray-900 mr-3">Clase Asignada</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500  w-3/6 px-2 py-1" id="opciones" name="opciones">
                            <option value="" disabled selected>Seleccione su clase</option>
                                <option value="<?= $maestro["clase"]?>" ><?= $maestro["clase"] ?></option>

                        </select>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded text-[13px] py-1.5 px-2.5 text-center">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="modal.js"></script>