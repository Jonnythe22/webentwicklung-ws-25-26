<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): void
    {
        echo view('templates/header');
        echo view( 'templates/navigation');
        echo view('startseite');
        echo view('templates/footer');
    }

}
