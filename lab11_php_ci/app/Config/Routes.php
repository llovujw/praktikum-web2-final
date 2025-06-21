<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ───── AUTH ──────────────────────────────
$routes->match(['get', 'post'], 'user/login', 'User::login');
$routes->get('user/logout', 'User::logout');

// ───── ADMIN PANEL ───────────────────────
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});

// ───── HALAMAN UMUM ──────────────────────
$routes->get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

$routes->get('/about', function () {
    return view('about', ['title' => 'Tentang Kami']);
});

$routes->get('/contact', function () {
    return view('contact', ['title' => 'Kontak']);
});

$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');

// ───── ARTIKEL PENGUNJUNG ────────────────
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// ───── AJAX ───────────────────────────────
$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
$routes->delete('artikel/delete/(:num)', 'AjaxController::delete/$1');

// ───── API ───────────────────────────────
$routes->resource('post');
$routes->get('post', 'Post::getAllPosts');
$routes->post('post', 'Post::create');