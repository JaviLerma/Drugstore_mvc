<?php 

	defined('BASEPATH') or exit('No se permite acceso directo');
	
	class Model
	{
        protected $conexiondb;

		public function __construct()
		{
            $this->conexiondb=new mysqli(HOST, USER, PASSWORD, DB);
        	if($this->conexiondb->connect_error){
		        die("Ocurrió un error al intentar conectar la db");
	        }
		}
	}

?>