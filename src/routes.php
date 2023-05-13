<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/feed/{id}', 'UserController@feed');

$router->post('/create', 'UserController@create');
$router->post('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');