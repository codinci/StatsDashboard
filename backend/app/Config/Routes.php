<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/auth', 'LoginController::loginAuth', ['filter' => 'cors']);
$routes->get('/retrieve', 'LoginController::retrieve');

