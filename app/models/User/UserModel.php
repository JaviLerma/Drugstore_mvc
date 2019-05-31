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
            parent::__construct();

        }  

        public function setUser($parametros)
        {   
            $id_usuario = $parametros['nId_usuario'];
            $usuario = $parametros['nUsuario'];
            $nombre_apellido = $parametros['nNombre_apellido'];
            $contrasenia = $parametros['nContrasenia'];
            $permiso = $parametros['nPermiso'];
            //$id = $this->conexiondb->insert_id;
            $sql = "INSERT INTO usuarios (id_usuarios, usuario, nombre_apellido, contrasenia, permiso) VALUES (".$id_usuario.",$usuario, $nombre_apellido, $contrasenia, $permiso)";
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
            $sql = "INSERT INTO usuarios (nombre_apellido, usuario, contrasenia, permiso) VALUES ('".$params['nNom_Ape']."', '".$params['nUser']."', '".$params['nContrasenia']."', 1)";
            echo $sql;
            if ($OK = $this->conexiondb->query($sql))
            {    
                if ($this->conexiondb->commit())
                    echo "Datos grabados con éxito";
                else
				    echo "Error al grabar datos 1.";
            } else {
                $this->conexiondb->rollback();
                echo "Error al grabar datos 2.";
            }  
            $this->conexiondb->autocommit(true);
        }
    }     
?>