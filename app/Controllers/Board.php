<?php

namespace App\Controllers;

use App\Models\BoardModel;
use App\Models\SpaltenModel;
use App\Models\TasksModel;

class Board extends BaseController
{
    public function index(): void
    {
        $selectedBoardId = $this->request->getGet('boardid');
        $boardsModel = new BoardModel();
        $allBoards = $boardsModel->getBoards();

        $boardsid = !empty($selectedBoardId) ? (int)$selectedBoardId : (count($allBoards) > 0 ? (int)$allBoards[0]['id'] : 1);

        $spaltenModel = new SpaltenModel();
        $tasksModel = new TasksModel();

        $spalten = $spaltenModel->getSpalten();

        $board = [];
        foreach ($spalten as $s) {
            if (isset($s['boardsid']) && (int)$s['boardsid'] !== (int)$boardsid) {
                continue;
            }

            $tasks = $tasksModel->getTasksBySpalte($s['id']);

            $board[] = [
                'id' => $s['id'],
                'name' => $s['spalte'] ?? '',
                'tasks' => $tasks,
            ];
        }

        $data['board'] = $board;
        $data['boards'] = $allBoards;
        $data['selectedBoardId'] = $boardsid;

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('taskboard', $data);
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

        $save = [
            'board' => $post['board'] ?? '',
        ];

        $model->createBoard($save);
        return redirect()->to('/boards');
    }
}
