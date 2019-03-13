<?php

namespace Core;

require_once('Core/Router.php');

Router::connect('/My_projets/My_cinema_by_PiePHP/',
['controller' => 'app', 'action' => 'index']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user',
['controller' => 'user', 'action' => 'index']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/',
['controller' => 'user', 'action' => 'index']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/index',
['controller' => 'film', 'action' => 'index']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/register',
['controller' => 'user', 'action' => 'register']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/login',
['controller' => 'user', 'action' => 'login']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/show',
['controller' => 'user', 'action' => 'read']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/membre',
['controller' => 'user', 'action' => 'membre']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/create',
['controller' => 'user', 'action' => 'create']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/update',
['controller' => 'user', 'action' => 'update']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/updateFilm',
['controller' => 'film', 'action' => 'update']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/delete',
['controller' => 'user', 'action' => 'delete']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/deleteFilm',
['controller' => 'film', 'action' => 'deleteFilm']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/read',
['controller' => 'user', 'action' => 'read']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/films',
['controller' => 'user', 'action' => 'read_all']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/film',
['controller' => 'film', 'action' => 'join']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/gestion',
['controller' => 'film', 'action' => 'add']);
Router::connect('/My_projets/My_cinema_by_PiePHP/user/dec',
['controller' => 'film', 'action' => 'dec']);
