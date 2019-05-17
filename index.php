<?php
    define('BASEPATH', true);
    
    require 'system/config.php';
    require 'system/core/autoload.php';

    $router = new Router();

    //echo '<pre>';
    //print_r($router->getUri());
    //echo '</pre>';

    $controlador = $router->getController();
    $metodo = $router->getMethod();
    $parametro = $router->getParam();

    //echo 'Controlador: ' . $controlador . '</br>';
    //echo 'Metodo: '. $metodo .'</br>';
    //echo 'Parametro: '.$parametro.'</br>';

    if(!CoreHelper::validateController($controlador))
        $controlador = 'ErrorPage';

    require PATH_CONTROLLERS . "{$controlador}/{$controlador}Controller.php";

    $controlador.='Controller';

    if(!CoreHelper::validateMethodController($controlador, $metodo))
        $metodo = 'exec'; //ejecuta el metodo exec de la clase correspondiente

    $controller = new $controlador();

    $controller->$metodo($parametro);
?>