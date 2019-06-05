<?php

require_once PATH_MODELS . 'Proveedor/ProveedorModel.php';
require_once PATH_LIBS . 'Session.php';

class ProveedorController extends Controller
{
    //atributos de la tabla Proveedor
    private $id_proveedor;
    private $nombre_proveedor;
    private $telefono;
    private $direccion;
    private $localidad;
    private $provincia;
    private $mail;

    private $model;

    public function __construct()
    {
        $this->model = new ProveedorModel();
        $this->session = new Session(); //verificar si es nesesario hacer esto en cada clase
        $this->session->init();
        if (!$this->session->getStatus() === 2 || empty($this->session->get('usuario')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->cargaArray();
        $this->render(__CLASS__, $this->params);
    }

    public function newProveedor($request_params)
    {
        if (isset($_POST["anadir"])) {
            if ($this->verifyProveedor($request_params)) {
                $this->renderErrorMessage('Proveedor ya existente');
            } else {
                if ($this->model->addProveedor($request_params)) {
                    $this->cargaArray();
                    $this->render(__CLASS__, $this->params);
                } else {
                    $this->renderErrorMessage('No se pudo agregar Proveedor');
                }
            }
        } elseif (isset($_POST["actualizar"])) {
            if ($this->model->updateProveedor($request_params)) {
                $this->cargaArray();
                $this->render(__CLASS__, $this->params);
            } else {
                $this->renderErrorMessage('No se pudo actualizar Proveedor');
            }
        }
    }

    public function verifyProveedor($request_params)
    {
        $result = $this->model->getProveedor($request_params['nombre_proveedor']);
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

    public function deleteById($id) //Tratar de realizar funciones "genericas" como ésta para todo.
    {
        if ($this->model->deleteById($id)) {
            $this->cargaArray();
            $this->render(__CLASS__, $this->params);
        } else {
            renderErrorMessage('No se pudo borrar al Proveedor'); //aca se puede agregar el nombre del Proveedor a borrar
        }
    }

    public function cargaArray()
    { //funcion echa para no añadir a cada rato el usuario activo y los usuarios en la lista

        $this->params = array('usuario' => $this->session->get('usuario')); //asigna usuario activo
        $allProveedores = $this->model->getAll();
        $this->params["allproveedores"] = $allProveedores;
        return $this->params;
    }

    public function modProveedor($id)
    {
        $proveedor_mod = $this->model->getById($id);
        $this->cargaArray();
        $this->params["proveedor_mod"] = $proveedor_mod;
        $this->render(__CLASS__, $this->params);
        //var_dump($this->params);
        //echo $this->params["usuario_mod"]->nombre_apellido;
    }
}
