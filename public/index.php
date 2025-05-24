<?php

// Cargar configuración
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config.php';

// Autoload
require_once CLASSES . 'Autoloader.php';
\classes\Autoloader::register();

// Enrutador
$uri = $_GET['uri'] ?? '';
$router = new \classes\Router();
$router->route();