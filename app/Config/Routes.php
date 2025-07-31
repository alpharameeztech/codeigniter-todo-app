<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/todo', 'Todo::index');
$routes->get('/todo/create', 'Todo::create');
$routes->post('/todo/store', 'Todo::store');
$routes->get('/todo/edit/(:num)', 'Todo::edit/$1');
$routes->post('/todo/update/(:num)', 'Todo::update/$1');
$routes->get('/todo/delete/(:num)', 'Todo::delete/$1');
