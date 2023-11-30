<?php
class Model
{
    private $db;
    protected $table;

    public function __construct()
    {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        try {
            $this->db = new mysqli(
                $config["host"],
                $config["username"],
                $config["password"],
                $config["dbname"]
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Método para todos los registros de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all()
    {
        $res = $this->db->query("select * from {$this->table}");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getMaestrosConClases()
    {
        $query = "
        select
        u.id_usuario,
        u.nombre,
        u.correo,
        u.direccion,
        u.fecha_nacimiento,
        c.clase 
    from
        usuarios u
    join
        maestros_clases mc on
        u.id_usuario = mc.usuario_id
    join
        clases c on
        mc.clase_id = c.id
    where
        u.rol_id = 2;
    ";
        $res = $this->db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getClasesInscritos()
    {
        $query = "select
        c.clase as clase,
        concat(u_maestro.nombre, ' ', u_maestro.apellido) as maestro,
        count(ac.usuario_id) as alumnosinscritos
    from
        clases c
    left join
        maestros_clases mc on
        c.id = mc.clase_id
    left join
        usuarios u_maestro on
        mc.usuario_id = u_maestro.id_usuario
    left join
        alumnos_clases ac on
        c.id = ac.clase_id
    group by
        c.id";
        $res = $this->db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getRol()
    {
        $query = "select u.correo, r.nombre_rol from usuarios u join roles r on
        u.rol_id = r.id_rol";

        $res = $this->db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getCalificaion()
    {
        session_start();
        $user = $_SESSION["user"];
        $query = "select
        c.id,
        cl.clase,
        c.calificacion,
        mc.mensaje_maestro
    from
        calificaciones c
    join
        clases cl on
        c.clase_id = cl.id
    left join
        maestros_clases mc on
        c.clase_id = mc.clase_id
    where
        c.usuario_id = '" . $user["id_usuario"] . "'";

        $res = $this->db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }



    /**
     * Método para obtener un registro por su id.
     *
     * @param integer $id Id de la fila (recurso) a buscar.
     * @return array Arreglo con los datos de la fila o recurso encontrado.
     */
    public function find($id)
    {
        $res = $this->db->query("select * from {$this->table} where id_usuario = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

    /**
     * Método para crear un nuevo registro en la tabla.
     *
     * @param array $data Arreglo asociativo con los datos a ingresar.
     * @return array Arreglo con los datos de la fila ingresada.
     */
    // public function create($data)
    // {
    //     try {
    //         // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
    //         $keys = array_keys($data);
    //         $keysString = implode(", ", $keys);

    //         $values = array_values($data);
    //         $valuesString = implode("', '", $values);
    //         $query = "insert into {$this->table}($keysString) values ('$valuesString')";

    //         $res = $this->db->query($query);

    //         if ($res) {
    //             $ultimoId = $this->db->insert_id;
    //             $data = $this->find($ultimoId);

    //             return $data;
    //         } else {
    //             return "No se pudo crear el cliente";
    //         }
    //     } catch (mysqli_sql_exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    public function create($data)
    {
        $dni = $data["dni"];
        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];
        $res = $this->db->query("insert into usuarios(nombre, apellido, dni, fecha_nacimiento, direccion, correo, contrasena, rol_id) values ('$nombre', '$apellido', '$dni', '$fecha', '$direccion', '$correo', 'alumno', '3')");

        if ($res) {
            $ultimoId = $this->db->insert_id;
            $res = $this->db->query("select * from usuarios where id_usuario = $ultimoId");
            $data = $res->fetch_assoc();

            return $data;
        } else {
            return "No se pudo crear el cliente";
        }
    }

    /**
     * Método para actualizar un registro en la tabla.
     *
     * @param array $data Arreglo asociatvo con los datos a actualizar.
     */
    // public function update($data)
    // {
    //     $dni = $data["dni"];
    //     $correo = $data["email"];
    //     $nombre = $data["nombre"];
    //     $apellido = $data["apellido"];
    //     $direccion = $data["direccion"];
    //     $fecha = $data["fecha"];
    //     $res = $this->db->query("update usuarios set nombre = '$nombre', apellido = '$apellido', dni = '$dni', fecha_nacimiento = '$fecha', direccion = '$direccion', correo = '$correo' where id_usuario = {$data["id"]}");
    // }

    public function update($data)
    {
        session_start();

        // $res = $this->db->query("
        // update usuarios set 
        //     nombre = '{$data["nombre"]}',
        //     email = '{$data["email"]}',
        //     direccion = '{$data["direccion"]}',
        //     telefono = '{$data["telefono"]}'
        // where id = {$_SESSION["empleado_id"]}
        // ");

        // Verifica si los datos necesarios están presentes antes de intentar acceder a ellos
        var_dump($_SESSION["id_usuario"]);
        $dni = $data["dni"];
        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];
        // $id = $data["id"];

        $res = $this->db->query("UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', fecha_nacimiento = '$fecha', direccion = '$direccion', correo = '$correo' WHERE id_usuario = {$_SESSION["id_usuario"]}");
    }


    /**
     * Método para eliminar un registro en la tabla.
     *
     * @param integer $id
     */
    public function destroy($id)
    {
        $this->db->query("delete from {$this->table} where id_usuario = $id");
    }

    public function where($column, $operator, $value)
    {
        $res = $this->db->query("select * from {$this->table} where $column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}
