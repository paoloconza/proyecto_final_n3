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

<<<<<<< HEAD
=======
    public function whereMaestro($column, $operator, $value)
    {
        $res = $this->db->query("select u.id_usuario, u.nombre, u.apellido, u.fecha_nacimiento, u.direccion, u.correo, u.rol_id, c.clase
        from usuarios u
        join clases c on u.clase_id = c.id
        where u.$column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

>>>>>>> test
    public function getClasesInscritos()
    {
        $query = "SELECT
        c.id as clase_id,
        c.clase,
        u.id_usuario,
        CONCAT(u.nombre, ' ', u.apellido) as maestro,
        COUNT(ac.usuario_id) as alumnos_inscritos
    FROM
        clases c
    JOIN
        usuarios u ON u.clase_id = c.id
    LEFT JOIN
        alumnos_clases ac ON ac.clase_id = c.id
    WHERE
        u.rol_id = 2
    GROUP BY
        c.id, u.id_usuario
    ORDER BY
        c.clase";

        $res = $this->db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getRol()
    {
        $query = "select u.id_usuario, u.correo, r.nombre_rol from usuarios u join roles r on
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

    public function find($id)
    {
        $res = $this->db->query("select * from {$this->table} where id_usuario = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

<<<<<<< HEAD
    /**
     * Método para crear un nuevo registro en la tabla.
     *
     * @param array $data Arreglo asociativo con los datos a ingresar.
     * @return array Arreglo con los datos de la fila ingresada.
     */
=======
    public function findClase($id)
    {
        $res = $this->db->query("select * from {$this->table} where id = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

    public function createMaestro($data, $id)
    {
        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];
        $clase = $data["clase"];
        $res = $this->db->query("insert into {$this->table}(nombre, apellido, fecha_nacimiento, direccion, correo, contrasena,rol_id, clase_id) values ('$nombre', '$apellido', '$fecha', '$direccion', '$correo', 'maestro', '$id', '$clase')");

        if ($res) {
            $ultimoId = $this->db->insert_id;
            $res = $this->db->query("select * from usuarios where id_usuario = $ultimoId");
            $data = $res->fetch_assoc();

            return $data;
        } else {
            return "No se pudo crear el usuario";
        }
    }
>>>>>>> test

    public function create($data, $id)
    {
        $dni = $data["dni"];
        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];
        $res = $this->db->query("insert into usuarios(nombre, apellido, dni, fecha_nacimiento, direccion, correo, contrasena, rol_id) values ('$nombre', '$apellido', '$dni', '$fecha', '$direccion', '$correo', 'alumno', '$id')");

        if ($res) {
            $ultimoId = $this->db->insert_id;
            $res = $this->db->query("select * from usuarios where id_usuario = $ultimoId");
            $data = $res->fetch_assoc();

            return $data;
        } else {
            return "No se pudo crear el cliente";
        }
    }

<<<<<<< HEAD
    /**
     * Método para actualizar un registro en la tabla.
     *
     * @param array $data Arreglo asociatvo con los datos a actualizar.
     */
    public function update($data)
    {
        session_start();

        // Verifica si los datos necesarios están presentes antes de intentar acceder a ellos
=======
    public function createClase($data)
    {
        $materia = $data["clase"];
        $nombre = $data["nombre"];

        $resInsert = $this->db->query("INSERT INTO clases (clase) VALUES ('$materia')");

        if ($resInsert) {
            $ultimoId = $this->db->insert_id;

            $resUpdate = $this->db->query("UPDATE usuarios SET clase_id = '$ultimoId' WHERE id_usuario = '$nombre'");

            if ($resUpdate) {
                $resSelect = $this->db->query("SELECT * FROM clases WHERE id = $ultimoId");
                $data = $resSelect->fetch_assoc();

                return $data;
            } else {
                return "No se pudo actualizar el usuario con la nueva clase";
            }
        } else {
            return "No se pudo insertar la nueva clase";
        }
    }

    public function update($data)
    {
        session_start();
>>>>>>> test
        var_dump($_SESSION["id_usuario"]);
        $dni = $data["dni"];
        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];

        $res = $this->db->query("UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', fecha_nacimiento = '$fecha', direccion = '$direccion', correo = '$correo' WHERE id_usuario = {$_SESSION["id_usuario"]}");
    }

<<<<<<< HEAD
=======
    public function updateMaestro($data)
    {
        session_start();

        $correo = $data["email"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $direccion = $data["direccion"];
        $fecha = $data["fecha"];
        $clase = $data["clase"];
        $clase = isset($data["clase"]) ? $data["clase"] : "{$_SESSION["clase_id"]}";

        var_dump($clase);
        $res = $this->db->query("UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$fecha', direccion = '$direccion', correo = '$correo', clase_id = '$clase' WHERE id_usuario = {$_SESSION["id_usuario"]}");
    }

    public function updateClase($data)
    {
        session_start();

        $nombre = $data["maestro"];

        $res = $this->db->query("UPDATE usuarios SET clase_id = '{$_SESSION["cl_id"]}' WHERE id_usuario = '$nombre'");
    }

    public function updatePermiso($data)
    {
        session_start();

        $rol = $data["roll"];

        $res = $this->db->query("UPDATE usuarios SET rol_id = '$rol' WHERE correo = '{$_SESSION["email"]}'");
    }

>>>>>>> test
    public function destroy($id)
    {
        $this->db->query("delete from {$this->table} where id_usuario = $id");
    }

    public function destroyClase($id)
    {
        // $this->db->query("delete from {$this->table} where id = $id");

        // Actualizar la columna clase_id de los usuarios asociados a NULL
        $this->db->query("UPDATE usuarios SET clase_id = NULL WHERE clase_id = $id");

        // Eliminar la clase
        $this->db->query("DELETE FROM {$this->table} WHERE id = $id");
    }

    public function where($column, $operator, $value)
    {
        $res = $this->db->query("select * from {$this->table} where $column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function whereMaestroAdmin($column, $operator, $value)
    {

        $res = $this->db->query("select u.id_usuario, u.nombre, u.apellido, u.fecha_nacimiento, u.direccion, u.correo, u.rol_id, c.clase
        from usuarios u
        join clases c on u.clase_id = c.id
        where u.$column $operator '$value'");
        // $res = $this->db->query("select * from {$this->table} where $column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}
