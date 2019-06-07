<?php

class ArticuloModel extends Model
{
    private $usuario;
    private $id_usuario;
    private $nombre_apellido;
    private $contrasenia;
    private $permiso;


    public function __construct()
    {
        parent::__construct("usuarios");
    }

    public function setId($id)
    {
        $this->id_usuario = $id;
    }
    public function getId()
    {
        return $this->id_usuario;
    }

    public function setUsuario($user)
    {
        $this->usuario = $user;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setNom($nombre)
    {
        $this->nombre_apellido = $nombre;
    }
    public function getNom()
    {
        return $this->nombre_apellido;
    }

    public function setUser($parametros)
    {
        $id_usuario = $parametros['nId_usuario'];
        $usuario = $parametros['nUsuario'];
        $nombre_apellido = $parametros['nNombre_apellido'];
        $contrasenia = $parametros['nContrasenia'];
        $permiso = $parametros['nPermiso'];
        //$id = $this->conexiondb->insert_id;
        $sql = "INSERT INTO usuarios (id_usuarios, usuario, nombre_apellido, contrasenia, permiso) VALUES (" . $id_usuario . ",$usuario, $nombre_apellido, $contrasenia, $permiso)";
    }

    public function getUser($nUsuario)
    {
        $user = $this->conexiondb->real_escape_string($nUsuario);
        $sql = "SELECT * FROM usuarios WHERE usuario = '{$nUsuario}'";
        return $this->conexiondb->query($sql);
        //echo $sql;
    }

    public function addUser($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "INSERT INTO usuarios (id_usuario, nombre_apellido, usuario, contrasenia, permiso) VALUES (" . $params['id_usuario'] . ", '" . $params['nombre_apellido'] . "', '" . $params['usuario'] . "', '" . $params['pass'] . "', 1)";
        //echo $sql;
        if ($this->conexiondb->query($sql)) {
            if ($this->conexiondb->commit())
                return true;
            else
                return false;
        } else {
            $this->conexiondb->rollback();
            return false;
        }
        $this->conexiondb->autocommit(true); //por mas q este despues de los return funciona
    }

    public function updateUser($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "UPDATE usuarios SET usuario='$params[usuario]', nombre_apellido='$params[nombre_apellido]' WHERE id_usuario=$params[id_usuario]";
        //echo $sql;
        if ($this->conexiondb->query($sql)) {
            if ($this->conexiondb->commit()) {
                $this->conexiondb->autocommit(true);
                return true;
            } else {
                $this->conexiondb->rollback();
                return false;
            }
        } else {
            $this->conexiondb->rollback();
            return false;
        }
        $this->conexiondb->autocommit(true);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM articulos";
        $query = $this->conexiondb->query($sql);
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
        $query = $this->conexiondb->query($sql);
        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }

        return $resultSet;
    }


    public function deleteById($id)
    {
        $sql = "DELETE FROM usuarios WHERE id_usuario=$id"; //aca uso $This->table para probar
        $query = $this->conexiondb->query($sql);
        return $query;
    }
}
