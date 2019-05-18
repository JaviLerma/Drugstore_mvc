<?php
	defined('BASEPATH') or exit('No se permite acceso directo');

	require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
	require_once PATH_LIBS .'Session.php';
	/**
	* Main controller
	*/
	class MainController extends Controller
	{
		private $session;
		private $newuser;
		 

	  	public function __construct()
	  	{
			$this->session = new Session();
	    	$this->session->init();
	   	 	if(!$this->session->getStatus() === 2 || empty($this->session->get('usuario')))
	      		exit('Acceso denegado');
	  	}

	  	public function exec()
	  	{
	    	$params = array('usuario' => $this->session->get('usuario'));
	    	$this->render(__CLASS__, $params);
	  	}

	  	public function newUser()
	  	{
			$params = array('usuario' => $this->session->get('usuario'));
	  		$this->newuser->newUser($params);
	  	}

	  	public function logout()
	  	{
	    	$this->session->close();
	    	header('location: /Drugstore_mvc/login');
		}
		
	}
?>