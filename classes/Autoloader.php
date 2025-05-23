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
        echo "Intentando cargar: $class<br>";
        
        // Convertimos el namespace en ruta de archivo
        $classPath = ROOT . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        echo "Buscando en: $classPath<br>";

        if (file_exists($classPath)) {
            require_once $classPath;
            return true;
        }

        return false;
    }
}