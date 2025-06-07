<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Web::index');
$routes->get('Sejarah', 'Web::Sejarah');
$routes->get('Visi', 'Web::Visi');
$routes->setAutoRoute(true);