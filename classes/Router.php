<?php

namespace classes;

use controllers\ErrorController;

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

        $folder = $this->uri[0] ?? null;
        $controller = $this->uri[1] ?? $defaultController;

        if ($folder && $controller && is_dir(CONTROLLERS . $folder)) {
            unset($this->uri[0], $this->uri[1]);
            return 'controllers\\' . $folder . '\\' . ucfirst($controller) . 'Controller';
        }

        $controller = $folder ?? $defaultController;
        unset($this->uri[0]);
        return 'controllers\\' . ucfirst($controller) . 'Controller';
    }

    private function getMethod()
    {
        $defaultMethod = 'index';

        // Si hay 3 partes: auth/session/inisession
        // entonces [0]=auth, [1]=session, [2]=inisession
        $method = $this->uri[2] ?? $defaultMethod;
        unset($this->uri[2]);

        return $method;
    }

    private function getParams()
    {
        return array_values($this->uri);
    }
}
