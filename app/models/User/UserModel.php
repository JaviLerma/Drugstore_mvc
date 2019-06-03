<?php

class UserModel extends Model
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
        return $this - id_usuario;
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
        echo $sql;
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
        //$id = $this->conexiondb->insert_id;
        $sql = "INSERT INTO usuarios (nombre_apellido, usuario, contrasenia, permiso) VALUES ('" . $params['nombre_apellido'] . "', '" . $params['usuario'] . "', '" . $params['pass'] . "', 1)";
        if ($OK = $this->conexiondb->query($sql)) {
            if ($this->conexiondb->commit())
                return true;
            else
                return false;
        } else {
            $this->conexiondb->rollback();
            return false;
        }
        $this->conexiondb->autocommit(true);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM usuarios";
        $query = $this->conexiondb->query($sql);
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function deleteById($id){
        $sql = "DELETE FROM $this->table WHERE id_usuario=$id"; //aca uso $This->table para probar
        $query = $this->conexiondb->query($sql);
        return $query;
    }

}
