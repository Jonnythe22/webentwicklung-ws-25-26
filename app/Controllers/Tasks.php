<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function index()
    {
        $mymodel = new TasksModel();

        $data['tasks'] = $mymodel->getTasks();
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }


    public function new()
    {
        $data = [];
        $data['task'] = null;
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('task_formular', $data);
        echo view('templates/footer');
    }


    public function edit($id = null)
    {
        $mymodel = new TasksModel();
        $data['task'] = $mymodel->getTask($id);
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('task_formular', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        // Validierung: Taskbezeichnung muss vorhanden sein
        $rules = [
            'taskbezeichnung' => 'required',
        ];

        $messages = [
            'taskbezeichnung' => [ 'required' => 'Bitte eine Bezeichnung für die Task eingeben.' ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'task' => $this->request->getPost(),
                'validation' => $this->validator,
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('task_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new TasksModel();
        $post = $this->request->getPost();

        $today = date('Y-m-d');

        $data = [
            'task' => $post['taskbezeichnung'] ?? '',
            'taskartenid' => $post['taskartid'] ?? null,
            'personenid' => $post['personid'] ?? null,
            'spaltenid' => $post['spaltentid'] ?? null,
            'erinnerungsdatum' => $post['erinnerungsdatum'] ?? null,
            'erinnerung' => isset($post['erinnerung']) ? 1 : 0,
            'notizen' => $post['notizen'] ?? '',
            'erstelldatum' => $today,
            'kontaktdatum' => $today,
            'erledigt' => 0,
            'geloescht' => 0,
        ];

        $mymodel->createTask($data);
        return redirect()->to('/tasks');
    }

    public function update($id = null)
    {
        // Validierung: Taskbezeichnung muss vorhanden sein
        $rules = [
            'taskbezeichnung' => 'required',
        ];

        $messages = [
            'taskbezeichnung' => [ 'required' => 'Bitte eine Bezeichnung für die Task eingeben.' ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'task' => $this->request->getPost(),
                'validation' => $this->validator,
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('task_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new TasksModel();
        $post = $this->request->getPost();

        $data = [
            'task' => $post['taskbezeichnung'] ?? '',
            'taskartenid' => $post['taskartid'] ?? null,
            'personenid' => $post['personid'] ?? null,
            'spaltenid' => $post['spaltentid'] ?? null,
            'erinnerungsdatum' => $post['erinnerungsdatum'] ?? null,
            'erinnerung' => isset($post['erinnerung']) ? 1 : 0,
            'notizen' => $post['notizen'] ?? '',
            // Erledigt/Geloescht werden hier nicht verändert
        ];

        $mymodel->updateTask($id, $data);
        return redirect()->to('/tasks');
    }


    public function delete($id = null)
    {
        $mymodel = new TasksModel();
        $mymodel->deleteTask($id);
        return redirect()->to('/tasks');
    }
}
