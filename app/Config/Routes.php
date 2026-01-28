<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/spalten', 'Spalten::index');
$routes->get('/spalten/formular', 'Spalten::formular');
$routes->get('/personen', 'Personen::index');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/tasks/task_formular', 'Tasks::new');

// Neu hinzugefügte Routen für CRUD
$routes->post('/tasks/create', 'Tasks::create');
$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('/tasks/update/(:num)', 'Tasks::update/$1');
$routes->get('/tasks/delete/(:num)', 'Tasks::delete/$1');

$routes->post('/spalten/create', 'Spalten::create');
$routes->get('/spalten/edit/(:num)', 'Spalten::edit/$1');
$routes->post('/spalten/update/(:num)', 'Spalten::update/$1');
$routes->post('/spalten/delete/(:num)', 'Spalten::delete/$1');
