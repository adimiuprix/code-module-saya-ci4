<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('gawe', 'Gawe::index');
$routes->get('gawe/add', 'Gawe::create');
$routes->post('gawe', 'Gawe::store');
$routes->get('gawe/edit/(:num)', 'Gawe::edit/$1');
$routes->put('gawe/(:num)', 'Gawe::update/$1');
$routes->delete('gawe/delete/(:num)', 'Gawe::destroy/$1');

$routes->get('find', 'Find::index');

//  Membuat Pagination
$routes->get('finddata', 'Find::paging');

$routes->match(['get', 'post'], 'register', 'Auth::register');

// Route login dengan querybuilder lebih ringkas
$routes->match(['get', 'post'], 'loginquery', 'Auth::login_query');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');

$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');

$routes->get('home', 'Home::generate');

/** Membuat route untuk menerima data dari luar */
$routes->get('wibupage', 'Apidata::terimadata');
$routes->get('wibupage2', 'Apidata::getContents');

$routes->get('parshing', 'Dummydata::select');

/** Membuat route untuk melakukan curl */
$routes->get('saldo', 'Digiflazz::ceksaldo');
$routes->get('digi', 'Digiflazz::daftarlayanan');

/** Membuat route untuk melakukan join 2 table dan menampilkan ke layar */
$routes->get('joindata-all', 'Joindata::index');
$routes->get('joindata-select', 'Joindata::select');

/** Membuat route untuk Upload data, misalnya gambar */
$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::upload');
$routes->get('list-images', 'UploadController::ListImages');

$routes->get('profile', 'ProfileController::index');
$routes->post('profile-upload', 'ProfileController::profileUpload');

/** Membuat route untuk segmentasi blog */
$routes->get('blog', 'BlogController::index');
$routes->get('blog/(:segment)', 'BlogController::blogdetail/$1');

/** Membuat route untuk callback (Tripay), jangan lupa sesuaikan HTTP method nya */
$routes->post('callback', 'CallbackController::index');

/** Membuat route untuk lempar data antar function */
$routes->get('fungsi', 'LemparTangkap::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
