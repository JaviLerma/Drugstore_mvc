<?php

require_once PATH_MODELS . 'Venta/VentaModel.php';
require_once PATH_MODELS . 'Cliente/ClienteModel.php';
require_once PATH_MODELS . 'Articulo/ArticuloModel.php';
require_once PATH_LIBS . 'Session.php';

class VentaController extends Controller
{
    private $usuario;
    private $cliente;
    private $articulo;
    private $session;
    private $params;

    public function __construct()
    {
        $this->cliente = new ClienteModel();
        $this->session = new Session();
        $this->articulo = new ArticuloModel();
        $this->session->init();
        if (!$this->session->getStatus() === 2 || empty($this->session->get('usuario')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->cargaArray();
        $this->render(__CLASS__, $this->params);
    }

    public function Cliente($id){
        
    }

    public function newUser($request_params)
    {
        if (isset($_POST["anadir"])) {
            if ($this->verifyUser($request_params)) {
                $this->renderErrorMessage('Usuario en USO');
            } elseif ($request_params['pass'] == $request_params['pass2']) {
                $request_params['id_usuario'] = "NULL";
                if ($this->model->addUser($request_params)) {
                    $this->cargaArray();
                    $this->render(__CLASS__, $this->params);
                } else {
                    $this->renderErrorMessage('No se pudo agregar Usuario');
                }
            } else {
                $this->renderErrorMessage('Las contraseñas no coiciden');
            }
        } elseif (isset($_POST["actualizar"])) {
            if ($request_params['pass'] == $request_params['pass2']) {
                if ($this->model->updateUser($request_params)) {
                    $this->cargaArray();
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
            renderErrorMessage('Error no se pudo realizar la tarea');
        }
    }

    public function cargaArray()
    { //funcion echa para no añadir a cada rato el usuario activo y los usuarios en la lista

        $this->params = array('usuario' => $this->session->get('usuario'));
        $allarticulos = $this->articulo->getAll();
        $this->params["allarticulos"] = $allarticulos;
        $allclientes = $this->cliente->getAll();
        $this->params["allclientes"] = $allclientes;
        return $this->params;
    }


    public function modUser($id)
    {
        $usuario_mod = $this->model->getById($id);
        $this->cargaArray();
        $this->params["usuario_mod"] = $usuario_mod;
        $this->render(__CLASS__, $this->params);
        //var_dump($this->params);
        //echo $this->params["usuario_mod"]->nombre_apellido;
    }

    public function getCliente($id){
        $cliente = $this->cliente->getById($id);
        $this->cargaArray();
        $this->params["cliente"] = $cliente;
        $this->render(__CLASS__, $this->params);
    }

    public function getArticulo($id){
        
        $this->cargaArray();
        $result[] = $this->articulo->getById($id);
        $this->params["detalles"] = $result;
        var_dump($result);
        //var_dump($this->params);
        $this->render(__CLASS__, $this->params);
    }

    public function facturar(){

        

    }
}
