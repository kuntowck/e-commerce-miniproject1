<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Produk;
use App\Controllers\Pesanan;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->resource('Products');

$routes->group('/admin', function ($routes) {
    $routes->get('user', 'admin\user::index');
    $routes->get('user/profile/', 'admin\user::profile/', ['as' => 'profile']);
    $routes->addRedirect('user/about', 'profile');
    $routes->get('product', 'admin\product::index');
    $routes->get('order', 'admin\order::index');
});

$routes->get('/produk', [Produk::class, 'index/$1/$2']);
$routes->get('/produk/detail/(:num)', [Produk::class, 'detail/$1']);
$routes->get('/produk/create', [Produk::class, 'create']);
// $routes->match(['get', 'post'], '/produk', [Produk::class, 'features']);
$routes->post('/produk', [Produk::class, 'store']);
$routes->get('/produk/edit/(:num)', [Produk::class, 'edit']);
$routes->put('/produk/update', [Produk::class, 'update']);
$routes->delete('/produk/delete/(:num)', [Produk::class, 'delete/$1']);

$routes->get('/pesanan', [Pesanan::class, 'index']);
$routes->get('/pesanan/detail/(:num)', [Pesanan::class, 'detail/$1']);
$routes->get('/pesanan/create', [Pesanan::class, 'create']);
$routes->post('/pesanan/create', [Pesanan::class, 'store']);
$routes->get('/pesanan/update/(:num)', [Pesanan::class, 'editStatus/$1']);
$routes->post('/pesanan/update/', [Pesanan::class, 'updateStatus']);
$routes->get('/pesanan/delete/(:num)', [Pesanan::class, 'delete/$1']);
