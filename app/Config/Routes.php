<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('/dbtest', 'DbTestController::index');
$routes->get('/api/detailmenu', 'DbTestController::index');