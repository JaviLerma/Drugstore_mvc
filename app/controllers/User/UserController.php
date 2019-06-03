<?php

require_once PATH_MODELS . 'User/UserModel.php';
require_once PATH_LIBS . 'Session.php';

class UserController extends Controller
{
    private $usuario;
    private $session;
    private $model;
    private $params;
    private $render;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->session = new Session();
        $this->session->init();
        if (!$this->session->getStatus() === 2 || empty($this->session->get('usuario')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        //$params = array('usuario' => $this->session->get('usuario'));
        $this->params["usuario"] = $this->session->get('usuario');
        $allusers = $this->model->getAll();
        $this->params["allusers"] = $allusers;
        //var_dump($this->params);
        $this->render(__CLASS__, $this->params);
    }


    public function newUser($request_params)
    {
        if ($this->verifyUser($request_params)) {
            $this->renderErrorMessage('Usuario en USO');
        } else {
            if ($request_params['pass'] == $request_params['pass2']) {
                echo "entre";
                if ($this->model->addUser($request_params)) {
                    echo "entre2";
                    $this->params["usuario"] = $this->session->get('usuario');
                    $allusers = $this->model->getAll();
                    $this->params["allusers"] = $allusers;
                    $this->render(__CLASS__, $this->params);
                } else {
                    $this->renderErrorMessage('No se pudo agregar Usuario');
                }
            } else {
                $this->renderErrorMessage('Las contraseñas no coiciden');
            }
        }
    }

    public function verifyUser($request_params)
    {
        $result = $this->model->getUser($request_params['usuario']);
        if ($result->num_rows)
            return true;
        return false;
    }

    public function renderErrorMessage($message)
    {
        //$params = array('error_message' => $message, 'usuario' => $this->session->get('usuario'));
        $this->params["error_message"] = $message;
        $this->params["usuario"] = $this->session->get('usuario');
        $allusers = $this->model->getAll();
        $this->params["allusers"] = $allusers;
        $this->render(__CLASS__, $this->params);
        //var_dump($this->params);
    }

    public function deleteById($id)
    {
        if ($this->model->deleteById($id)) {
            $this->params["usuario"] = $this->session->get('usuario');
            $allusers = $this->model->getAll();
            $this->params["allusers"] = $allusers;
            $this->render(__CLASS__, $this->params);
        }
        //var_dump($resultado);
    }

    public function render(){ //function para pasar evitar tener q agregar los elementos del array todas las veces q se tiene q renderizar


    }
}
