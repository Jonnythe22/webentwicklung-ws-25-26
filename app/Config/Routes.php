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
