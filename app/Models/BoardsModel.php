<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model
{

    public function getBoards()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->select();
        $this->boards->orderBy('id', 'asc');
        $result = $this->boards->get();
        return $result->getResultArray();
    }

    public function getBoard($id = null)
    {
        $this->boards = $this->db->table('boards');
        $this->boards->select('*');

        if ($id != NULL) {
            $this->boards->where('id', $id);
        }

        $this->boards->orderBy('board');
        $result = $this->boards->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else return $result->getResultArray();
    }

    public function createBoard()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->insert(array(
            'board' => $_POST['Board'],));
    }

    public function updateBoard()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->where('id', $_POST['id']);
        $this->boards->update(array(
            'board' => $_POST['Board'],));
    }

    public function deleteBoard()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->where('id', $_POST['id']);
        $this->boards->delete();
    }

}