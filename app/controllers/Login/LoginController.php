<?php 

	defined('BASEPATH') or exit('No se permite acceso directo');

	require_once PATH_MODELS . 'Login/LoginModel.php';
	require_once PATH_LIBS . 'Session.php';

	class LoginController extends Controller
	{
		private $model;
		private $session;

		public function __construct()
		{
			$this->model = new LoginModel();
			$this->session = new Session();
		}

		public function signin($request_params)
		{
			$result = $this->model->sigIn($request_params['nUser']);

			if(!$result->num_rows)
			{
				$this->renderErrorMessage('Usuario inexistente');
			}else{
			
				$client = $result->fetch_object();
				if($request_params['nPassword'] != $client->contrasenia) //tratar de usar password_verity con contreseña encriptada
				{
					$this->renderErrorMessage('Contraseña incorrecta');
				}else{

					$this->session->init();
					$this->session->add('usuario', $client->usuario);
					header('location: /Drugstore_mvc/main');
				}
			}	
		}


		//public function verify($request_params)
		//{
		//	return empty($request_params['nUser']) or empty($request_params['nPassword']);
		//}

		public function renderErrorMessage($message)
		{
			$parametros = array('error_message' => $message);
			$this->render(__CLASS__, $parametros);
		}

		public function exec()
		{
			$this->render(__CLASS__);
		}
	}
?>