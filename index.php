<?php
    
    require 'system/config.php';
    require 'system/core/autoload.php';
    //require 'system/core/Router.php';
    //require 'system/core/Controller.php';

    $router = new Router();

    //echo '<pre>';
    //print_r($router->getUri());
    //echo '</pre>';

    $controlador = $router->getController();
    $metodo = $router->getMethod();
    $parametro = $router->getParam();

    echo 'Controlador: ' . $controlador . '</br>';
    echo 'Metodo: '. $metodo .'</br>';
    echo 'Parametro: '.$parametro.'</br>';

    require PATH_CONTROLLERS . "{$controlador}/{$controlador}Controller.php";

    $controlador.='Controller';

    $controller = new $controlador();

    $controller->$metodo($parametro);

?>