<?php

namespace app\classes;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    private static function autoload($class)
    {
        // Convertimos el namespace en ruta de archivo
        $classPath = str_replace('\\', DS, $class) . '.php';

        // Posibles ubicaciones
        $paths = [
            CLASSES . $classPath,
            CONTROLLERS . $classPath,
            MODELS . $classPath
        ];

        foreach ($paths as $file) {
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
        }

        return false;
    }
}