<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{

    // Tasks
    public function getTasks()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select();
        $this->tasks->orderBy('id', 'asc');
        $result = $this->tasks->get();
        return $result->getResultArray();
    }

    // Spalten
    public function getSpalten(){
        $this->spalten = $this->db->table('spalten');
        $this->spalten->select();
        $result = $this->spalten->get();
        return $result->getResultArray();
    }

    // Spalten by BoardId
    public function getSpaltenByBoardId($boardId){
        $this->spalten = $this->db->table('spalten');
        $this->spalten->select();
        $this->spalten->where('boardsid', $boardId);
        $result = $this->spalten->get();
        return $result->getResultArray();
    }

    // CRUD Funktionen:
    public function getTask($id = null)
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select('*');
        if ($id != NULL) {
            $this->tasks->where('id', $id);
        }
        $this->tasks->orderBy('tasks');
        $result = $this->tasks->get();
        if ($id != NULL) {
            return $result->getRowArray();
        } else return $result->getResultArray();
    }

    public function getBoards(){
        $this->boards = $this->db->table('boards');
        $this->boards->select();
        $result = $this->boards->get();
        return $result->getResultArray();
    }

    // CRUD Funktionen:
    public function createTask()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->insert(array(
            'personenid' => $_POST['Person'],
            'taskartenid' => 1,
            'spaltenid' => $_POST['Spalte'],
            'sortid' => 1,
            'tasks' => $_POST['Bezeichnung'],
            'erstelldatum' => date("Y-m-d"),
            'erinnerungsdatum' => $_POST['Erinnerungsdatum'],
            'erinnerung' => $_POST['Erinnerung'],
            'notizen' => $_POST['Notiz'],
            'erledigt' => '0',
            'geloescht' => '0',));
    }

    // CRUD Funktionen:
    public function updateTask()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->update(array(
            'personenid' => $_POST['Person'],
            'spaltenid' => $_POST['Spalte'],
            'tasks' => $_POST['Bezeichnung'],
            'erinnerungsdatum' => $_POST['Erinnerungsdatum'],
            'erinnerung' => $_POST['Erinnerung'],
            'notizen' => $_POST['Notiz'],));
    }

    // CRUD Funktionen:
    public function deleteTask()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->delete();
    }

    // CRUD Funktionen:
    public function getPersonen($person_id = NULL)
    {
        $this->personen = $this->db->table('personen');
        $this->personen->select('*');
        if ($person_id != NULL)
            $this->personen->where('id', $person_id);
        $result = $this->personen->get();
        if ($person_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }
}