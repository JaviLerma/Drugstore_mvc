<?php
    
    require_once PATH_MODELS . 'User/UserModel.php';
    require_once PATH_LIBS .'Session.php';

    class UserController extends Controller
    {
        private $usuario;
        private $session;
        private $model;

        public function __construct()
	  	{   
            $this->model = new UserModel();
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
        
        public function newUser($request_params)
        {
            if($this->verifyUser($request_params))
            {
                $this->renderErrorMessage('Usuario en USO');
            }else{
                $this->addUser($request_params);
            }
        }

        public function verifyUser($request_params)
        {
            $result = $this->model->getUser($request_params['nUser']);
			if($result->num_rows)
                return true;
            return false;
        }

        public function renderErrorMessage($message)
		{
            $params = array('error_message' => $message, 'usuario' => $this->session->get('usuario'));
            //var_dump($params);
			$this->render(__CLASS__, $params);
        }
        
        public function addUser($request_params)
        {
            $this->model->addUser($request_params);
        }
    }  
?>