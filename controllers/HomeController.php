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
        $session = SC::sessionValidate();

        // Si no hay sesión válida, redirigir al login
        if (!$session || !$session['sv']) {
            header("Location: /Serena/public/index.php?uri=auth/session/inisession");
            exit();
        }

        // Si hay sesión, cargar la vista home
        $response = [
            'ua'    => $session,
            'title' => 'Serena',
            'code'  => 200
        ];

        View::render('home', $response);
    }
}