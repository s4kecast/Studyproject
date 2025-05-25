<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class BoardsController extends BaseController
{
    public function __construct() {
        $this->boardsmodel = new BoardsModel();
    }

    public function index($title='')
    {
        $data['boards'] = $this->boardsmodel->getBoards();
        $data['title'] = 'Boards';
        echo view('Sites/Boards', $data);
    }


    //CRUD Funktionen:
    public function crudBoards($id = 0, $todo = 0)
    {
        $data['boards'] = $this->boardsmodel->getBoards();
        $data['todo'] = $todo;
        switch ($todo) {
            case 0:
                $data['title'] = 'Board erstellen';
                break;
            case 1:
                $data['title'] = 'Board bearbeiten';
                break;
            case 2:
                $data['title'] = 'Board löschen';
                break;
        }

        if($id > 0 && ($todo == 1 || $todo == 2)) {
            $data['update'] = $this->boardsmodel->getBoard($id);
        }

        echo view('Sites/BoardsCRUD', $data);
    }

    public function setBoardId($boardId)
    {
        $_SESSION['boardID'] = $boardId;
    }

    // Boards Bearbeiten
    public function submitBoards()
    {
        if(isset($_POST['submitBoards'])) {

            if ($this->validation->run($_POST,'boardsbearbeiten')) {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->boardsmodel->updateBoard();
                } else {
                    $this->boardsmodel->createBoard();
                }
                return redirect()->to(base_url('Boards'));

            } else {
                $data['boards'] = $this->boardsmodel->getBoards();
                $data['error'] = $this->validation->getErrors();

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $data['title'] = 'Board bearbeiten';
                    $data['todo'] = 1;
                    $data['update'] = $this->boardsmodel->getBoard($_POST['id']);
                } else {
                    $data['title'] = 'Board erstellen';
                    $data['todo'] = 0;
                }

                echo view('Sites/BoardsCRUD', $data);
            }
        }
        elseif (isset($_POST['deleteBoards'])){
            $this->boardsmodel->deleteBoard();
            return redirect()->to(base_url('Boards'));
        }
    }
}