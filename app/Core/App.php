<?php

namespace Core;

class App
{

    protected $controller = 'Controllers\HomeController';

    protected $method = 'indexAction';

    protected $params = [];

    public function __construct()
    {
        // Analizira URI i deli ga na: ime kontrolera, ime akcije, niz vrednosti params
        $uri = Helpers::parseURI();

        // Provera da li postoji datoteka sa prosleđenim imenom kontrolera
        $controllerName = isset($uri[0]) ? ucwords($uri[0]) . 'Controller' : '';
        if (isset($uri[0]) && !empty($uri[0]) && file_exists('./app/Controllers/' . $controllerName . '.php')) {
            $this->controller = 'Controllers\\' . $controllerName;
            unset($uri[0]);
        }


        $this->controller = new $this->controller();

        //  klasa kontrolera prošla metod akcije
        if (isset($uri[1])) {
            $actionName = $uri[1] . 'Action';
            if (method_exists($this->controller, $actionName)) {
                $this->method = $actionName;
                unset($uri[1]);
            }
        }

        // Ostali URI parametri
        if ($uri) {
            $this->params = array_values($uri);
        }


        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
