<?php 	

require_once PATH_MODELS . 'Home/HomeModel.php';

class HomeController extends Controller{

	private $model;
	
	public function __construct(){
		$this->model = new HomeModel();
	}

	public function exec($parametro){
		
	}
	
	public function getUser($id)
	{
		$user = $this->model->getUser($id);
		$this->show($user);
	}
	
	public function show($user)
	{
		$parametros = array('usuario' => $user['usuario']);
		$this->render(__CLASS__, $parametros);
	}
  	
}

?>