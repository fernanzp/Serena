<?php

namespace Serena;

use classes\Autoloader;
use classes\Router;
use controllers\auth\SessionController;

class App
{
    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->initConfig();
        $this->initFunctions();
        $this->initAutoloader();
        $this->initSession();
        $this->initRouter();
    }

    private function initConfig()
    {
        $configPath = __DIR__ . '/config.php';
        if (!file_exists($configPath)) {
            die('No se encontró el archivo de configuración');
        }
        require_once $configPath;
    }

    private function initFunctions()
    {
        $functionsPath = FUNCTIONS . 'main_functions.php';
        if (!file_exists($functionsPath)) {
            die('No se encontró el archivo de funciones de usuario');
        }
        require_once $functionsPath;
    }

    private function initAutoloader()
    {
        Autoloader::register();
    }

    private function initSession()
    {
        // Aquí podrías simplemente iniciar sesión si no necesitas validación aún
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // O si tienes lógica en un SessionController:
        // SessionController::sessionValidate();
    }

    private function initRouter()
    {
        $router = new Router();
        $router->route();
    }

    public static function run()
    {
        new self();
    }
}
