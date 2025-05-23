<?php

// Separador de directorios del sistema operativo
define('DS', DIRECTORY_SEPARATOR);

// Ruta raíz del proyecto
define('ROOT', __DIR__ . DS);

// Detectar si estás trabajando en local (localhost)
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

// Puerto y URL base
define('PORT', IS_LOCAL ? '80' : 'PUERTO_EN_PRODUCCION');
define('URL', IS_LOCAL ? 'http://localhost/Serena/public/' : 'https://tu-dominio.com/');

// Configuración de la base de datos
define('DB_HOST', IS_LOCAL ? 'localhost' : 'DB_HOST_PRODUCCION');
define('DB_USER', IS_LOCAL ? 'root' : 'DB_USER_PRODUCCION');
define('DB_PASS', IS_LOCAL ? '' : 'DB_PASSWORD_PRODUCCION');
define('DB_NAME', IS_LOCAL ? 'consultorio_psicologico' : 'DB_NAME_PRODUCCION');

// Rutas internas del proyecto
define('CLASSES',     ROOT . 'classes' . DS);
define('CONTROLLERS', ROOT . 'controllers' . DS);
define('MODELS',      ROOT . 'models' . DS);
define('RESOURCES',   ROOT . 'resources' . DS);
define('VIEWS',       RESOURCES . 'views' . DS);
define('FUNCTIONS',   RESOURCES . 'functions' . DS);