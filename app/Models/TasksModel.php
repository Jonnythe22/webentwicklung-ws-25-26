<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
   
    public function getTasks()
    {
        return $this->db->table('tasks')->orderBy('task', 'ASC')->get()->getResultArray();
    }

	public function createTask(){
	//$this -> db->table('tasks')->
	}
	public function updateTask(){
	//$this -> db->table('tasks')->
	}
	public function deleteTask(){
	//$this -> db->table('tasks')->
	}


}