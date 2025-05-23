<?php

namespace classes;

class View {
    public function __construct() {}

    public static function render($view, $data = []) {
        // Convertimos el arreglo en variables si es necesario
        extract($data);

        // Ruta a la vista
        $viewFile = dirname(__DIR__) . '/resources/views/' . $view . '.view.php';

        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "<h3>Error: La vista <code>$view</code> no fue encontrada.</h3>";
        }
    }
}
