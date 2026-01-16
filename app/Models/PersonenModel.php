<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{
    public function getData()
    {
        return $this->db->table('personen')->get()->getResultArray();
    }

}
