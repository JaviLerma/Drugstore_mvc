<?php 

	/**
	 * 
	 */
	class HomeModel extends Model
	{
		
		public function __construct()
		{
            parent::__construct(); //ejecuta metodo constructor de clase madre
        }
        
        public function getUser($id)
        {
            $sql = "SELECT * FROM usuarios Where id_usuario = $id";
            return $this->conexiondb->query($sql)->fetch_array(MYSQLI_ASSOC);
        }
	}
?>