<?php

namespace App\Models;


use CodeIgniter\Model;
class TaskModel extends Model
{
    public function getData()
    {
        return $this->db->table('personen')->get()->getResultArray();
    }

    public function getTasks()
    {
        return $this->db->table('tasks')->orderBy('task', 'ASC')->get()->getResultArray();
    }
}