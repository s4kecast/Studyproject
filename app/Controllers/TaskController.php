<?php

namespace App\Controllers;

use App\Models\SpaltenModel;
use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function __construct() {
        $this->taskmodel = new TaskModel();
    }

    public function index()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $boards = $this->taskmodel->getBoards();
        $boardID = isset($_SESSION['boardID']) ? $_SESSION['boardID'] : $boards[0]['id'];
        $data['spalten'] = $this->taskmodel->getSpaltenByBoardId($boardID);
        $data['tasks'] = $this->taskmodel->getTasks();
        $data['personen'] = $this->taskmodel->getPersonen();
        $data['boards'] = $this->taskmodel->getBoards();
        $data['boardID'] = $boardID;
        $data['title'] = 'Startseite';
        echo view('Sites/Startseite', $data);
    }

    public function viewGruppennummer()
    {
        $gruppennummer = 12;
        var_dump($gruppennummer);
    }

    /*
    Statische Seite - nicht mehr in Benutzung

    public function Spalten($title='')
    {
        $data['title'] = 'Spalten';
        return view('Sites/Spalten', $data);
    }

    public function SpalteErstellen()
    {
        $data['title'] = 'Spalte erstellen';
        return view('Sites/SpalteErstellen', $data);
    }
    */

//    public function test() {
//        $taskModel = new TaskModel();
//        $data['tasks'] = $taskModel->getAllData();
//        var_dump($data);
//    }



    // GRUD Funktionen:
    public function crudTasks($id = 0, $todo = 0)
    {
        $data['personen'] = $this->taskmodel->getPersonen();
        $data['spalten'] = $this->taskmodel->getSpalten();
        $data['tasks'] = $this->taskmodel->getTasks();
        $data['todo'] = $todo;
        switch ($todo) {
            case 0:
                $data['title'] = 'Task erstellen';
                break;
            case 1:
                $data['title'] = 'Task bearbeiten';
                break;
            case 2:
                $data['title'] = 'Task löschen';
                break;
        }

        if($id > 0 && ($todo == 1 || $todo == 2)) {
            $data['update'] = $this->taskmodel->getTask($id);
        }

        echo view('Sites/TaskCRUD', $data);
    }

//    Funktion zum Erstellen, Bearbeiten und Löschen von Tasks
    public function submitTasks()
    {
        if(isset($_POST['submitTasks'])) {

            if ($this->validation->run($_POST,'tasksbearbeiten')) {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->taskmodel->updateTask();
                } else {
                    $this->taskmodel->createTask();
                }
                return redirect()->to(base_url('Startseite'));
            } else {
                $data['personen'] = $this->taskmodel->getPersonen();
                $data['spalten'] = $this->taskmodel->getSpalten();
                $data['tasks'] = $this->taskmodel->getTasks();
                $data['error'] = $this->validation->getErrors();

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $data['title'] = 'Task bearbeiten';
                    $data['todo'] = 1;
                    $data['update'] = $this->taskmodel->getTask($_POST['id']);
                } else {
                    $data['title'] = 'Task erstellen';
                    $data['todo'] = 0;
                }

                echo view('Sites/TaskCRUD', $data);
            }

        }
        elseif (isset($_POST['deleteTasks'])){
            $this->taskmodel->deleteTask();
            return redirect()->to(base_url('Startseite'));
        }
    }
}