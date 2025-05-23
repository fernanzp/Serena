<?php

namespace app\controllers;

class ErrorController
{
    public function __construct() {}

    public function error404()
    {
        http_response_code(404);
        echo $this->renderError("404 - Página no encontrada", "La página que buscas no existe.");
    }

    public function errorMNE()
    {
        http_response_code(500);
        echo $this->renderError("Error interno", "El método que estás intentando acceder no existe.");
    }

    private function renderError($title, $message)
    {
        return "
            <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <title>$title</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f8f8f8;
                            text-align: center;
                            padding: 50px;
                        }
                        h1 {
                            color: #cc0000;
                        }
                        p {
                            font-size: 1.2rem;
                        }
                    </style>
                </head>
                <body>
                    <h1>$title</h1>
                    <p>$message</p>
                </body>
            </html>
        ";
    }
}