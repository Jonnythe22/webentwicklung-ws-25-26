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
        $spaltenid = $this->request->getGet('spaltenid');
        $data = [];

        if (!empty($spaltenid)) {
            $spaltenModel = new \App\Models\SpaltenModel();
            $spalte = $spaltenModel->getSpalte($spaltenid);

            $data['task'] = ['spaltentid' => $spaltenid];
            $data['spalte'] = $spalte;
        } else {
            $data['task'] = null;
        }

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

    public function move()
    {
        $json = $this->request->getJSON(true);

        $taskId    = (int) ($json['taskId']    ?? 0);
        $spaltenId = (int) ($json['spaltenId'] ?? 0);
        $sortid    = (int) ($json['sortid']    ?? 0);

        if ($taskId === 0 || $spaltenId === 0) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON(['success' => false, 'message' => 'Ungültige Parameter']);
        }

        $mymodel = new TasksModel();
        $mymodel->moveTask($taskId, $spaltenId, $sortid);

        return $this->response->setJSON(['success' => true]);
    }
}
