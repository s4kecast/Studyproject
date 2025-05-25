<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TaskController::index');
$routes->get('(:any)/viewGruppennummer', 'Start::viewGruppennummer');
$routes->get('/test', 'TaskController::test');

//Tasks
$routes->get('/Startseite', 'TaskController::index');
$routes->get('/taskErstellen', 'TaskController::crudTasks/0/0');
$routes->get('/taskBearbeiten/(:num)/1', 'TaskController::crudTasks/$1/1');
$routes->get('/taskLoeschen/(:num)/2', 'TaskController::crudTasks/$1/2');
$routes->post('/submitTasks','TaskController::submitTasks');

//Spalten
$routes->get('/Spalten', 'SpaltenController::index');
$routes->get('/spalteErstellen', 'SpaltenController::crudSpalten/0/0');
$routes->get('/spalteBearbeiten/(:num)/1','SpaltenController::crudSpalten/$1/1');
$routes->get('/spalteLoeschen/(:num)/2','SpaltenController::crudSpalten/$1/2');
$routes->post('/submitSpalten','SpaltenController::submitSpalten');

//Boards
$routes->get('/Boards', 'BoardsController::index');
$routes->get('/boardErstellen', 'BoardsController::crudBoards/0/0');
$routes->get('/boardBearbeiten/(:num)/1','BoardsController::crudBoards/$1/1');
$routes->get('/boardLoeschen/(:num)/2','BoardsController::crudBoards/$1/2');
$routes->get('/setBoardId/(:num)', 'BoardsController::setBoardId/$1');
$routes->post('/submitBoards','BoardsController::submitBoards');
