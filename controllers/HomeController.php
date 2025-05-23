<?php

namespace controllers;

use classes\View;
use controllers\auth\SessionController as SC;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'ua'    => SC::sessionValidate() ?? ['sv' => 0],
            'title' => 'Serena',
            'code'  => 200
        ];

        //View::render('home', $response); <- Comentada de mientras
    }
}