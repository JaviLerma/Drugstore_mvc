<?php

class ClienteModel extends Model
{
    private $id_cliente;
    private $nombre_apellido;
    private $dni;
    private $telefono;


    public function __construct()
    {
        parent::__construct();
    }

    public function setId($id)
    {
        $this->id_cliente = $id;
    }
    public function getId()
    {
        return $this->id_cliente;
    }

    public function setNombre($cliente)
    {
        $this->nombre_apellido = $cliente;
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

    public function getCliente($dni)
    {
        $dni = $this->conexiondb->real_escape_string($dni);
        $sql = "SELECT * FROM clientes WHERE dni = '{$dni}'";
        return $this->conexiondb->query($sql);
        //echo $sql;
    }

    public function addCliente($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "INSERT INTO clientes (nombre_apellido, dni, telefono) VALUES ('" . $params['nombre_apellido'] . "', '" . $params['dni'] . "', '" . $params['telefono'] . "')";
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

    public function updateCliente($params)
    {
        $this->conexiondb->autocommit(false);
        $this->conexiondb->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        $sql = "UPDATE clientes SET nombre_apellido='$params[nombre_apellido]', dni='$params[dni]', telefono='$params[telefono]' WHERE id_cliente=$params[id_cliente]";
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
        $sql = "SELECT * FROM clientes";
        $query = $this->conexiondb->query($sql);
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM clientes WHERE id_cliente=$id";
        $query = $this->conexiondb->query($sql);
        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM clientes WHERE id_cliente=$id";
        $query = $this->conexiondb->query($sql);
        return $query;
    }
}
