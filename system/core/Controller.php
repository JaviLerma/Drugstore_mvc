<?php  

/**
 * 
 */
abstract class Controller{
	
	
	private $vista;

	public function __construct()
	{
		//echo __CLASS__ .' instanciada bebe';
	}

	protected function render($nombre_controlador = '', $parametros = array())
	{
		$this->vista = new View($nombre_controlador, $parametros);
	}

	abstract public function exec();
}

?>