<?php 

	/**
	 * 
	 */
	class Model
	{
        protected $conexiondb;
		function __construct()
		{
            $this->conexiondb=new mysqli(HOST, USER, PASSWORD, DB);
        	if($this->conexiondb->connect_error){
		        die("Ocurrió un error al intentar conectar la db");
	        }
		}
	}

?>