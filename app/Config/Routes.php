<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'KaredokController::index');
$routes->get('/karedok/detail/(:num)', 'KaredokController::detail/$1');
$routes->post('/checkout', 'KaredokController::checkout');

// Admin CRUD Routes
$routes->get('/admin', 'KaredokController::admin');
$routes->get('/admin/create', 'KaredokController::create');
$routes->post('/admin/store', 'KaredokController::store');
$routes->get('/admin/edit/(:num)', 'KaredokController::edit/$1');
$routes->post('/admin/update/(:num)', 'KaredokController::update/$1');
$routes->get('/admin/delete/(:num)', 'KaredokController::delete/$1');
