<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/hrd/akun_pengguna', 'Hrd::akun_pengguna', ['filter' => 'role:Admin,HRD']);
$routes->get('/hrd/detail/(:num)', 'Hrd::detail/$1', ['filter' => 'role:Admin,HRD']);
$routes->get('/nomor_surat/penggunaan_nomor(:any)', 'Nomor_surat::penggunaan_nomor', ['filter' => 'role:Admin,HRD']);

// Access Aplikasi
$routes->get('/nomor_surat', 'Nomor_surat::index', ['filter' => 'accessnosur']);
$routes->get('/nomor_surat/(:any)', 'Nomor_surat::$1', ['filter' => 'accessnosur']);
$routes->get('/inventaris', 'Inventaris::index', ['filter' => 'accessinventaris']);
$routes->get('/inventaris/(:any)', 'Inventaris::$1', ['filter' => 'accessinventaris']);
$routes->get('/cuti_online', 'Cuti_online::index', ['filter' => 'accesscutionline']);
$routes->get('/cuti_online/(:any)', 'Cuti_online::$1', ['filter' => 'accesscutionline']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
