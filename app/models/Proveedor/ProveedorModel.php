<?php

class ProveedorModel extends Model
{
    private $id_proveedor;
    private $nombre_proveedor;
    private $telefono;
    private $direccion;
    private $localidad;
    private $provincia;
    private $mail;

    public function __construct()
    {
        parent::__construct();
    }

    public function setId($id)
    {
        $this->id_proveedor = $id;
    }
    public function getId()
    {
        return $this->id_proveedor;
    }

    public function setNombre($proveedor)
    {
        $this->nombre_apellido = $proveedor;
    }

    public function getNombre()
    {
        return $this->nombre_apellido;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function setTel($tel)
    {
        $this->telefono = $tel;
    }
    public function getTel()
    {
        return $this->telefono;
    }

    public function getProveedor($nombre_proveedor)
    {
        $dni = $this->conexiondb->real_escape_string($nombre_proveedor);
        $sql = "SELECT * FROM proveedores WHERE nombre_proveedor = '{$nombre_proveedor}'";
        return $this->conexiondb->query($sql);
        //echo $sql;
    }

    public function addProveedor($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "INSERT INTO proveedores (nombre_proveedor, telefono, direccion, localidad, provincia, mail) VALUES ('" . $params['nombre_proveedor'] . "', '" . $params['telefono'] . "', '" . $params['direccion'] . "', '" . $params['localidad'] . "', '" . $params['provincia'] . "', '" . $params['mail'] . "')";
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
    }

    public function updateProveedor($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "UPDATE proveedores SET nombre_apellido='$params[nombre_apellido]', dni='$params[dni]', telefono='$params[telefono]' WHERE id_proveedor=$params[id_proveedor]";
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
    }

    public function getAll()
    {
        $sql = "SELECT * FROM proveedores";
        $query = $this->conexiondb->query($sql);
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM proveedores WHERE id_proveedor=$id";
        $query = $this->conexiondb->query($sql);
        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM proveedores WHERE id_proveedor=$id";
        $query = $this->conexiondb->query($sql);
        return $query;
    }
}
