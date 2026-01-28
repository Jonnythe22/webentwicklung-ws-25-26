<?php

namespace App\Controllers;
use App\Models\SpaltenModel;
class Spalten extends BaseController
{
    public function index(): void
    {
        $mymodel = new SpaltenModel();
        $data['spalten'] = $mymodel->getSpalten();
        echo view('templates/header');
        echo view( 'templates/navigation');
        echo view('spalten',$data);
        echo view('templates/footer');
    }

    public function formular(): void
    {

        echo view('templates/header');
        echo view('templates/navigation');
        $data = ['spalte' => null];
        echo view('spalten_formular', $data);
        echo view('templates/footer');
    }

    public function edit($id = null)
    {

        $mymodel = new SpaltenModel();
        $data['spalte'] = $mymodel->getSpalte($id);
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('spalten_formular', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        // Validierung
        $rules = [
            'spalte' => 'required',
            'spaltenbeschreibung' => 'required',
            'sortid' => 'required|integer',
        ];

        $messages = [
            'spalte' => [ 'required' => 'Bitte eine Spaltenbezeichnung eingeben.' ],
            'spaltenbeschreibung' => [ 'required' => 'Bitte eine Spaltenbeschreibung eingeben.' ],
            'sortid' => [ 'required' => 'Bitte eine Sortid eingeben.', 'integer' => 'Die Sortid muss eine ganze Zahl sein.' ],
        ];

        if (! $this->validate($rules, $messages)) {

            $data = [
                'spalte' => $this->request->getPost(),
                'validation' => $this->validator,
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('spalten_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new SpaltenModel();
        $post = $this->request->getPost();


        $boardsid = 1;

        $data = [
            'spalte' => $post['spalte'] ?? '',
            'spaltenbeschreibung' => $post['spaltenbeschreibung'] ?? '',
            'sortid' => $post['sortid'] !== '' ? (int) $post['sortid'] : null,
            'boardsid' => $boardsid,
        ];

        $mymodel->createSpalte($data);
        return redirect()->to('/spalten');
    }

    public function update($id = null)
    {
        // Validierung
        $rules = [
            'spalte' => 'required',
            'spaltenbeschreibung' => 'required',
            'sortid' => 'required|integer',
        ];

        $messages = [
            'spalte' => [ 'required' => 'Bitte eine Spaltenbezeichnung eingeben.' ],
            'spaltenbeschreibung' => [ 'required' => 'Bitte eine Spaltenbeschreibung eingeben.' ],
            'sortid' => [ 'required' => 'Bitte eine Sortid eingeben.', 'integer' => 'Die Sortid muss eine ganze Zahl sein.' ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'spalte' => $this->request->getPost(),
                'validation' => $this->validator,
            ];
            echo view('templates/header');
            echo view('templates/navigation');
            echo view('spalten_formular', $data);
            echo view('templates/footer');
            return null;
        }

        $mymodel = new SpaltenModel();
        $post = $this->request->getPost();


        $boardsid = 1;

        $data = [
            'spalte' => $post['spalte'] ?? '',
            'spaltenbeschreibung' => $post['spaltenbeschreibung'] ?? '',
            'sortid' => $post['sortid'] !== '' ? (int) $post['sortid'] : null,
            'boardsid' => $boardsid,
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
