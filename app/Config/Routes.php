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
// $routes->get('admin', 'AdminController::index');
// $routes->get('/produk', 'CustomerController::produk');
// $routes->get('customer/detail/(:num)', 'CustomerController::detail/$1');

// Add these new routes:
$routes->get('checkout/(:num)', 'CustomerController::checkout/$1');
$routes->post('process-checkout', 'CustomerController::processCheckout');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/products', 'AdminController::products');
$routes->get('/admin/products/create', 'AdminController::createProduct');
$routes->post('/admin/products/store', 'AdminController::storeProduct');
$routes->get('/admin/products/edit/(:num)', 'AdminController::editProduct/$1');
$routes->post('/admin/products/update/(:num)', 'AdminController::updateProduct/$1');
$routes->get('/admin/products/delete/(:num)', 'AdminController::deleteProduct/$1');

$routes->get('/admin/orders', 'AdminController::orders');
$routes->get('/admin/orders/view/(:num)', 'AdminController::viewOrder/$1');
$routes->post('/admin/orders/update/(:num)', 'AdminController::updateOrder/$1');

$routes->get('/admin/consultations', 'AdminController::consultations');
$routes->get('/admin/consultations/create', 'AdminController::createConsultation');
$routes->post('/admin/consultations/store', 'AdminController::storeConsultation');

$routes->get('/admin/projects', 'AdminController::projects');
$routes->get('/admin/projects/create', 'AdminController::createProject');
$routes->post('/admin/projects/store', 'AdminController::storeProject');

$routes->get('/admin/logout', 'AdminController::logout');

// Customer route
$routes->get('/produk', 'CustomerController::listProducts');
$routes->get('/dashboard', 'CustomerController::index');
$routes->get('/customer/logout', 'CustomerController::logout');
// $routes->get('/customer/profile', 'CustomerController::profile');
// $routes->get('/profile', 'CustomerController::profile', ['filter' => 'auth']);
$routes->get('/customer/profile', 'CustomerController::profile');
$routes->get('/profile', 'CustomerController::index'); // Menampilkan profil
$routes->post('/profile/update', 'CustomerController::updateProfile'); // Menangani pembaruan profil


// $routes->group('customer', ['filter' => 'auth'], function ($routes) {
//     $routes->get('profile', 'CustomerController::profile');
//     $routes->post('update-profile', 'CustomerController::updateProfile');
// });