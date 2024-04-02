<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');

$routes->group('dashboard', ['filter' => 'auth'], function($routes){
    $routes->get('/', 'Dashboard::index');
    $routes->post('entry', 'EntryController::store');
    $routes->get('entry/delete/(:num)', 'EntryController::delete/$1');
});
