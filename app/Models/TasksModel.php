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

    public function getTasksBySpalte($spaltenid)
    {
        $builder = $this->db->table('tasks as t')
            ->select('t.*, p.vorname, p.name')
            ->join('personen p', 'p.id = t.personenid', 'left')
            ->join('taskarten ta', 'ta.id = t.taskartenid', 'left')
            ->where('t.spaltenid', $spaltenid)
            ->orderBy('t.sortid', 'ASC')
            ->orderBy('t.id', 'ASC');

        return $builder->get()->getResultArray();
    }

    public function moveTask($id, $spaltenid, $sortid)
    {
        return $this->db->table('tasks')
            ->where('id', $id)
            ->update([
                'spaltenid' => $spaltenid,
                'sortid'    => $sortid,
            ]);
    }
}