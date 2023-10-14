<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->add('login/authenticate', 'LoginController::authenticate', ['as' => 'login-authenticate']);

