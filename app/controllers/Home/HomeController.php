<?php 

/**
 * 
 */
class HomeController extends Controller{
	
	public function __construct(){
		$parametros = array('nombre' => 'Javier', 'apellido' => 'Lerma');
		$this->render(__CLASS__, $parametros);
	}

	public function exec(){
		echo '<h1>Hola mundo!</h1>';	
  	}
  	public function saludo(){
		echo '<h1>Hola GAYS!</h1>';	
  	}
}

?>