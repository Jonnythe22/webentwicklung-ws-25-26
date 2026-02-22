<?php

namespace App\Controllers;

use App\Models\SpaltenModel;
use App\Models\BoardModel;

class Spalten extends BaseController
{
    public function index(): void
    {
        $mymodel = new SpaltenModel();
        $data['spalten'] = $mymodel->getSpalten();
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('spalten', $data);
        echo view('templates/footer');
    }

    public function formular(): void
    {
        $boardModel = new BoardModel();
        $data['spalte'] = null;
        $data['boards'] = $boardModel->getBoards();
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('spalten_formular', $data);
        echo view('templates/footer');
    }

    public function edit($id = null)
    {
        $mymodel = new SpaltenModel();
        $boardModel = new BoardModel();
        $data['spalte'] = $mymodel->getSpalte($id);
        $data['boards'] = $boardModel->getBoards();
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('spalten_formular', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        $rules = [
            'spalte'             => 'required',
            'spaltenbeschreibung' => 'required',
            'sortid'             => 'required|integer',
            'boardsid'           => 'required|integer',
        ];

        $messages = [
            'spalte'             => ['required' => 'Bitte eine Spaltenbezeichnung eingeben.'],
            'spaltenbeschreibung' => ['required' => 'Bitte eine Spaltenbeschreibung eingeben.'],
            'sortid'             => ['required' => 'Bitte eine Sortid eingeben.', 'integer' => 'Die Sortid muss eine ganze Zahl sein.'],
            'boardsid'           => ['required' => 'Bitte ein Board auswählen.', 'integer' => 'Ungültiges Board.'],
        ];

        if (!$this->validate($rules, $messages)) {
            $boardModel = new BoardModel();
            $data = [
                'spalte'     => $this->request->getPost(),
                'validation' => $this->validator,
                'boards'     => $boardModel->getBoards(),
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('spalten_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new SpaltenModel();
        $post = $this->request->getPost();

        $data = [
            'spalte'             => $post['spalte'] ?? '',
            'spaltenbeschreibung' => $post['spaltenbeschreibung'] ?? '',
            'sortid'             => $post['sortid'] !== '' ? (int)$post['sortid'] : null,
            'boardsid'           => (int)$post['boardsid'],
        ];

        $mymodel->createSpalte($data);
        return redirect()->to('/spalten');
    }

    public function update($id = null)
    {
        $rules = [
            'spalte'             => 'required',
            'spaltenbeschreibung' => 'required',
            'sortid'             => 'required|integer',
            'boardsid'           => 'required|integer',
        ];

        $messages = [
            'spalte'             => ['required' => 'Bitte eine Spaltenbezeichnung eingeben.'],
            'spaltenbeschreibung' => ['required' => 'Bitte eine Spaltenbeschreibung eingeben.'],
            'sortid'             => ['required' => 'Bitte eine Sortid eingeben.', 'integer' => 'Die Sortid muss eine ganze Zahl sein.'],
            'boardsid'           => ['required' => 'Bitte ein Board auswählen.', 'integer' => 'Ungültiges Board.'],
        ];

        if (!$this->validate($rules, $messages)) {
            $boardModel = new BoardModel();
            $data = [
                'spalte'     => $this->request->getPost(),
                'validation' => $this->validator,
                'boards'     => $boardModel->getBoards(),
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('spalten_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new SpaltenModel();
        $post = $this->request->getPost();

        $data = [
            'spalte'             => $post['spalte'] ?? '',
            'spaltenbeschreibung' => $post['spaltenbeschreibung'] ?? '',
            'sortid'             => $post['sortid'] !== '' ? (int)$post['sortid'] : null,
            'boardsid'           => (int)$post['boardsid'],
        ];

        $mymodel->updateSpalte($id, $data);
        return redirect()->to('/spalten');
    }

    public function delete($id = null)
    {
        $mymodel = new SpaltenModel();
        $mymodel->deleteSpalte($id);
        return redirect()->to('/spalten');
    }
}
