<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    public function getTasks()
    {
        return $this->db->table('tasks')->orderBy('task', 'ASC')->get()->getResultArray();
    }

    public function getTask($id)
    {
        return $this->db->table('tasks')->where('id', $id)->get()->getRowArray();
    }

    public function createTask(array $data)
    {
        return $this->db->table('tasks')->insert($data);
    }

    public function updateTask($id, array $data)
    {
        return $this->db->table('tasks')->where('id', $id)->update($data);
    }

    public function deleteTask($id)
    {
        return $this->db->table('tasks')->where('id', $id)->delete();
    }
}