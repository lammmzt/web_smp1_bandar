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
$routes->post('Pengumumans', 'Web::Pengumumans');
$routes->get('Pengumumans', 'Web::Pengumumans');
$routes->get('Pengumumans/Detail/(:any)', 'Web::DetailPengumuman/$1');
$routes->get('Staffs', 'Web::Staffs');
$routes->get('Fasilitass', 'Web::Fasilitass');
$routes->get('Ekstrakurikuler', 'Web::Ekstrakurikuler');
$routes->get('Prestasis', 'Web::Prestasis');
$routes->get('PPDB', 'Web::PPDB');
$routes->get('Sambutan', 'Web::Sambutan');

$routes->setAutoRoute(true);