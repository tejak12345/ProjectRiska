<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Leaflet::index');  // Halaman utama



// app/Config/Routes.php


$routes->get('auth/login', 'Auth::login');  // Rute untuk menampilkan halaman login
$routes->post('auth/login', 'Auth::process');  // Rute untuk memproses login



$routes->get('auth/registrasi', 'Auth::register'); // Menampilkan form registrasi (GET)
$routes->post('auth/registrasi', 'Auth::registerProcess');

// app/Config/Routes.php

$routes->get('customer', 'CustomerController::index');  // Rute untuk menampilkan halaman dashboard customer
$routes->get('admin', 'AdminController::index');
$routes->get('/produk', 'CustomerController::produk');
$routes->get('customer/detail/(:num)', 'CustomerController::detail/$1');

// Add these new routes:
$routes->get('checkout/(:num)', 'CustomerController::checkout/$1');
$routes->post('process-checkout', 'CustomerController::processCheckout');