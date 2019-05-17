<?php 

	defined('BASEPATH') or exit('No se permite acceso directo');

	require_once PATH_MODELS . 'Login/LoginModel.php';

	class LoginController extends Controller
	{
		private $model;

		public function __construct()
		{
			$this->model = new LoginModel();
		}

		public function signin($request_params)
		{
			$result = $this->model->sigIn($request_params['nUser']);

			if(!$result->num_rows)
			{
				$this->renderErrorMessage('Usuario inexistente');
			}else{
			
				$result = $result->fetch_object();
				if($request_params['nPassword'] != $result->contrasenia) //tratar de usar password_verity con contreseña encriptada
				{
					$this->renderErrorMessage('Contraseña incorrecta');
				}else{
					echo "INICIANDO SESION....";
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