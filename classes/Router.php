<?php

namespace app\classes;

use app\controllers\ErrorController;

class Router
{
    private $uri = [];

    public function __construct() {}

    public function route()
    {
        $this->filterRequest();

        $controllerName = $this->getController();
        $methodName     = $this->getMethod();
        $params         = $this->getParams();

        if (class_exists($controllerName)) {
            $controller = new $controllerName();
        } else {
            $controller = new ErrorController();
            $methodName = 'error404';
        }

        if (!method_exists($controller, $methodName)) {
            $controller = new ErrorController();
            $methodName = 'errorMNE';
        }

        call_user_func_array([$controller, $methodName], $params);
    }

    private function filterRequest()
    {
        $petition = filter_input(INPUT_GET, 'uri', FILTER_SANITIZE_URL);
        if ($petition) {
            $petition = rtrim($petition, '/');
            $this->uri = explode('/', $petition);
        }
    }

    private function getController()
    {
        $defaultController = 'Home';
        $controller = $this->uri[0] ?? $defaultController;
        unset($this->uri[0]);

        $controller = ucfirst(strtolower($controller));
        return 'app\\controllers\\' . $controller . 'Controller';
    }

    private function getMethod()
    {
        $defaultMethod = 'index';
        $method = $this->uri[1] ?? $defaultMethod;
        unset($this->uri[1]);
        return $method;
    }

    private function getParams()
    {
        return array_values($this->uri);
    }
}
