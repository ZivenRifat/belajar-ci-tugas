<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']); // Halaman utama
$routes->get('faq', 'Home::faq', ['filter' => 'auth']); // Halaman F.A.Q
$routes->get('contact', 'Home::contact', ['filter' => 'auth']); // Halaman Contact


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);

$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');

});

$routes->group('product-category', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProductCategoryController::index');
    $routes->post('', 'ProductCategoryController::create');
    $routes->post('edit/(:num)', 'ProductCategoryController::update/$1');
    $routes->get('delete/(:num)', 'ProductCategoryController::delete/$1');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});



$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);

$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

$routes->resource('api', ['controller' => 'apiController']);

$routes->get('/diskon', 'DiskonController::index');
$routes->get('/diskon/create', 'DiskonController::create');
$routes->post('/diskon/store', 'DiskonController::store');
$routes->get('/diskon/edit/(:num)', 'DiskonController::edit/$1');
$routes->post('/diskon/update/(:num)', 'DiskonController::update/$1');
$routes->get('/diskon/delete/(:num)', 'DiskonController::delete/$1');

$routes->get('/admin/pembelian', 'AdminController::pembelian');
$routes->get('/admin/pembelian/ubah-status/(:num)', 'AdminController::ubahStatus/$1');
