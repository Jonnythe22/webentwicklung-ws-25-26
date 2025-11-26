<?php

namespace App\Controllers;

class Spalten extends BaseController
{
    public function index(): void
    {
        echo view('templates/header');
        echo view( 'templates/navigation');
        echo view('spalten');
        echo view('templates/footer');
    }

    public function formular(): void
    {
        echo view('templates/header');
        echo view( 'templates/navigation');
        echo view('formular');
        echo view('templates/footer');
    }

}