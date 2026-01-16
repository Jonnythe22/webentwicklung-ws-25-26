<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{
    public function index()
    {
        $mymodel = new PersonenModel();

        $data['personen'] = $mymodel->getData();

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/personen', $data);
        echo view('templates/footer');

    }
}
