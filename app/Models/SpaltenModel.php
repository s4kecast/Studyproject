<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{

    public function getSpalten()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->select();
        $this->spalten->orderBy('id', 'asc');
        $result = $this->spalten->get();
        return $result->getResultArray();
    }

    public function getSpalte($id = null)
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->select('*');

        if ($id != NULL) {
            $this->spalten->where('id', $id);
        }

        $this->spalten->orderBy('spalte');
        $result = $this->spalten->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else return $result->getResultArray();
    }

    public function getBoards($boards_id = NULL)
    {
        $this->boards = $this->db->table('boards');
        $this->boards->select('*');
        if ($boards_id != NULL)
            $this->boards->where('id', $boards_id);
        $result = $this->boards->get();
        if ($boards_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createSpalte()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->insert(array(
            'spaltenbeschreibung' => $_POST['Spaltenbeschreibung'],
            'spalte' => $_POST['Spalte'],
            'sortid' => $_POST['Sortid'],
            'boardsid' => $_POST['Board'],));
    }

    public function updateSpalte()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $_POST['id']);
        $this->spalten->update(array(
            'spaltenbeschreibung' => $_POST['Spaltenbeschreibung'],
            'spalte' => $_POST['Spalte'],
            'sortid' => $_POST['Sortid'],
            'boardsid' => $_POST['Board'],));
    }

    public function deleteSpalte()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $_POST['id']);
        $this->spalten->delete();
    }

}