<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	  
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">	 
    <link rel="stylesheet" href="style.css">  
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
        <div class="bg-green-400 bg-opacity-100 text-gray-100 text-center"><p class="text-xl">Datatables - Tailwind CSS</p></div>			
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">			 				
				<table id="users" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
                        <tr class="bg-indigo-400 bg-opacity-100 text-white">
                            <th data-priority="1">#</th>
                            <th data-priority="2">DNI</th>
                            <th data-priority="3">Nombre</th>
                            <th data-priority="4">Correo</th>
                            <th data-priority="5">Direccion</th>
                            <th data-priority="6">Fec. de Nacimiento</th>
                        </tr>
					</thead>
					<tbody>
					</tbody>					
				</table>				
			</div>	
      </div>
    
    <!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>		
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function(){
            const url = 'http://localhost:3000/api/usuarios';
            $('#users').DataTable({
                ajax:{
                    url:url,
                    dataSrc:''
                },
                columns:[
                    {data: "counter++"},
                    {data: "dni"},
                    {data: "nombre"},
                    {data: "correo"},
                    {data: "direccion"},
                    {data: "fecha_nacimiento"},
                ],
                responsive: true
            }).columns.adjust()
            .responsive.recalc();
        })
    </script>
</body>
</html>