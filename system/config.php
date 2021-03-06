<?php

//Define constaste para la URI
define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//Define constante de carpeta CORE
define('CORE', 'system/core/');

//Define ruta de controladores
define('PATH_CONTROLLERS', 'app/controllers/');

//Define ruta de Helpers
define('HELPER_PATH', 'system/helpers/');

define('PATH_LIBS', 'system/libs/');

define('FOLDER_PATH', '/Drugstore_mvc');

//Define ruta de vistas
define('PATH_VIEWS', 'app/views/');

//Define ruta de modelos
define('PATH_MODELS', 'app/models/');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);


//Define constantes para la DB
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'drugstore'); 



?>