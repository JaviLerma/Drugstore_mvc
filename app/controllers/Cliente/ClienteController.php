<?php

require_once PATH_MODELS . 'Cliente/ClienteModel.php';
require_once PATH_LIBS . 'Session.php';

class ClienteController extends Controller
{
    private $usuario;
    private $session;
    private $model;
    private $params;

    public function __construct()
    {
        $this->model = new ClienteModel();
        $this->session = new Session();
        $this->session->init();
        if (!$this->session->getStatus() === 2 || empty($this->session->get('usuario')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->cargaArray();
        $this->render(__CLASS__, $this->params);
    }

    public function newCliente($request_params)
    {
        if (isset($_POST["anadir"])) {
            if ($this->verifyCliente($request_params)) {
                $this->renderErrorMessage('Cliente ya existente');
            } else {
                if ($this->model->addCliente($request_params)) {
                    $this->cargaArray();
                    $this->render(__CLASS__, $this->params);
                } else {
                    $this->renderErrorMessage('No se pudo agregar Cliente');
                }
            }
        } elseif (isset($_POST["actualizar"])) {
            if ($this->model->updateCliente($request_params)) {
                $this->cargaArray();
                $this->render(__CLASS__, $this->params);
            } else {
                $this->renderErrorMessage('No se pudo actualizar Cliente');
            }
        }
    }

    public function verifyCliente($request_params)
    {
        $result = $this->model->getCliente($request_params['dni']);
        if ($result->num_rows)
            return true;
        return false;
    }

    public function renderErrorMessage($message)
    {
        $this->cargaArray();
        $this->params["error_message"] = $message;
        $this->render(__CLASS__, $this->params);
    }

    public function deleteById($id)
    {
        if ($this->model->deleteById($id)) {
            $this->cargaArray();
            $this->render(__CLASS__, $this->params);
        } else {
            renderErrorMessage('No se pudo borrar al cliente'); //aca se puede agregar el nombre del cliente a borrar
        }
    }


    public function cargaArray()
    { //funcion echa para no añadir a cada rato el usuario activo y los usuarios en la lista

        $this->params = array('usuario' => $this->session->get('usuario')); //asigna usuario activo
        $allclientes = $this->model->getAll();
        $this->params["allclientes"] = $allclientes;
        return $this->params;
    }

    public function modCliente($id)
    {
        $cliente_mod = $this->model->getById($id);
        $this->cargaArray();
        $this->params["cliente_mod"] = $cliente_mod;
        $this->render(__CLASS__, $this->params);
        //var_dump($this->params);
        //echo $this->params["usuario_mod"]->nombre_apellido;
    }
}
