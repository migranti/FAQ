<?php

namespace Controllers;

class Controller
{

    public function __construct()
    {
        return $this;
    }


    protected function model($modelName)
    {
        $model = 'Models\\' . $modelName;

        return new $model();
    }


    protected function view($viewName, $data = [])
    {
        $viewFilePath = './app/Views/' . strtolower($viewName) . '.php';

        if (file_exists($viewFilePath)) {
            require_once($viewFilePath);
        }
    }
}
