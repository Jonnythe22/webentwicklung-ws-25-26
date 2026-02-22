<?php

namespace App\Models;

use CodeIgniter\Model;
class BoardModel  extends Model
{
    public function getBoards()
    {
        return $this->db->table('boards')->get()->getResultArray();
    }

    public function createBoard(array $data)
    {
        return $this->db->table('boards')->insert($data);
    }
}