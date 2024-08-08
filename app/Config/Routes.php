<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (
        isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) &&
        $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET'
    ) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Role, Origin, Content-Type');
        exit;
    }
}


$routes->get('/', 'Home::index');


$routes->get('/api/detailmenu', 'DbTestController::index');
$routes->post('save-order', 'Home::saveOrder', ['filter' => 'cors']);
