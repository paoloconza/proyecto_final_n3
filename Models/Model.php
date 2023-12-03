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

    public function whereMaestro($column, $operator, $value)
    {
        $res = $this->db->query("select u.id_usuario, u.nombre, u.apellido, u.fecha_nacimiento, u.direccion, u.correo, u.rol_id, c.clase
        from usuarios u
        join clases c on u.clase_id = c.id
        where u.$column $operator '$value'");
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

    public function find($id)
    {
        $res = $this->db->query("select * from {$this->table} where id_usuario = $id");
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

    public function update($data)
    {
        session_start();

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
