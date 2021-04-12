<?php

namespace Controllers;

// use Controllers\Controller;


class HomeController extends Controller
{

    public function indexAction()
    {
        $this->view('home/index', []);
    }
}
