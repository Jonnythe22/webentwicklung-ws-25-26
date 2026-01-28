<?php

namespace App\Models;

use CodeIgniter\Model;
class SpaltenModel extends Model
{
    public function getSpalten()
    {
        return $this->db->table('spalten')->orderBy('spalte', 'ASC')->get()->getResultArray();
    }

    public function getSpalte($id)
    {
        return $this->db->table('spalten')->where('id', $id)->get()->getRowArray();
    }

    public function createSpalte(array $data)
    {
        return $this->db->table('spalten')->insert($data);
    }

    public function updateSpalte($id, array $data)
    {
        return $this->db->table('spalten')->where('id', $id)->update($data);
    }

    public function deleteSpalte($id)
    {
        return $this->db->table('spalten')->where('id', $id)->delete();
    }

}