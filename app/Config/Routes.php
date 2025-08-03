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
$routes->get('Fasilitass/Detail/(:any)', 'Web::DetailFasilitass/$1');
$routes->get('Ekstrakurikuler', 'Web::Ekstrakurikuler');
$routes->get('Ekstrakurikuler/Detail/(:any)', 'Web::DetailEkstrakurikuler/$1');
$routes->get('Prestasis', 'Web::Prestasis');
$routes->get('PPDB', 'Web::PPDB');
$routes->get('History_siswa', 'Web::History_siswa');
$routes->get('Sambutan', 'Web::Sambutan');
$routes->get('Struktur', 'Web::Struktur');

$routes->setAutoRoute(true);