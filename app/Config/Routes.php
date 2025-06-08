<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Web::index');
$routes->get('Sejarah', 'Web::Sejarah');
$routes->get('Visi', 'Web::Visi');
$routes->get('Berita', 'Web::Berita');
$routes->post('Berita', 'Web::Berita');
$routes->get('Berita/Detail/(:any)', 'Web::DetailBerita/$1');
$routes->setAutoRoute(true);