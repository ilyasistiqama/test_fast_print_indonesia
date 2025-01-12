<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->get('/create', 'Home::form', ['as' => 'create']);
$routes->get('/edit/(:num)', 'Home::form/$1', ['as' => 'edit']);

$routes->post('/store', 'Home::store');
$routes->put('/update/(:num)', 'Home::store/$1', ['as' => 'update']);

$routes->delete('/delete', 'Home::destroy', ['as' => 'delete']);
