<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function index()
    {
        $mymodel = new TasksModel();

   
        // ÜBUNG 5 – Tasks anzeigen
        $data['tasks'] = $mymodel->getTasks();

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }

	public function new(){
	echo view('templates/header');
        echo view('templates/navigation');
	echo view('task_formular');
	echo view('templates/footer');
	}
}
