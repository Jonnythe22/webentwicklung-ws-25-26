<?php

namespace App\Controllers;

use App\Models\BoardModel;

class Boards extends BaseController
{
    public function index(): void
    {
        $model = new BoardModel();
        $data['boards'] = $model->getBoards();

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('boards', $data);
        echo view('templates/footer');
    }

    public function formular(): void
    {
        $data['board'] = null;
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('boards_formular', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        // Validierung: Feld 'board' required (DB-Spalte heißt 'board')
        $rules = [
            'board' => 'required',
        ];

        $messages = [
            'board' => [ 'required' => 'Bitte eine Bezeichnung für das Board eingeben.' ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'board' => $this->request->getPost(),
                'validation' => $this->validator,
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('boards_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $model = new BoardModel();
        $post = $this->request->getPost();

        $data = [
            'board' => $post['board'] ?? '',
        ];

        $model->createBoard($data);
        return redirect()->to('/boards');
    }
}