<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full mt-4 max-h-full hidden">
    <div class="relative p-4 w-full max-w-sm max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow border border-gray-300">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Agregar Clase
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
                <form class="space-y-2.5" action="/alumnos/create" method="post">

                    <div>
                        <label for="nombre" class="block mb-1.5 text-xs font-medium text-gray-900 ">Nombre de la Materia</label>
                        <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1" placeholder="Ingrese el nombre" required>
                    </div>

                    <div>
                        <label for="clase" class="block mb-1 text-xs font-medium text-gray-900 mr-3">Maestros disponibles para la clase</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-[11px] rounded focus:ring-blue-500 focus:border-blue-500  w-full px-2 py-1" id="clase" name="clase">
                            <option value="" disabled selected>Seleccione al maestro</option>
                            <?php foreach ($maestros as $maestro) { ?>
                                <option id="clase"><?= $maestro["nombre"] . " " . $maestro["apellido"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded text-[13px] py-1.5 px-2.5 text-center">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="modal.js"></script>