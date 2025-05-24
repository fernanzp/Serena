<?php

namespace classes;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    private static function autoload($class)
    {   
        // Convertimos el namespace en ruta de archivo
        $classPath = ROOT . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        if (file_exists($classPath)) {
            require_once $classPath;
            return true;
        }

        return false;
    }
}