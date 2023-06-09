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

// $routes->get('employees', 'Employee::index');
// $routes->post('employees/create', 'Employee::create');
// $routes->get('employees/store', 'Employee::store');
// $routes->get('employees/edit/(:num)', 'Employee::edit/$1');
// $routes->post('employees/update/(:num)', 'Employee::update/$1');
// $routes->post('employees/pfp/(:num)', 'Employee::pfp/$1');
// $routes->get('employees/delete/(:num)', 'Employee::delete/$1');

// $routes->group('module1', ['namespace' => 'Module1'], function ($routes) {
//     $routes->get('/', 'Module1Controller::index');
// });

// $routes->group('module2', ['namespace' => 'Module2'], function ($routes) {
//     $routes->get('/', 'Employee::index');
//     $routes->post('/create', 'Employee::create');
//     $routes->get('/store', 'Employee::store');
//     $routes->get('/edit/(:num)', 'Employee::edit/$1');
//     $routes->post('/update/(:num)', 'Employee::update/$1');
//     $routes->post('/pfp/(:num)', 'Employee::pfp/$1');
//     $routes->get('/delete/(:num)', 'Employee::delete/$1');
// });

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
// $routes->get('/', 'Employee::index');

foreach(glob(APPPATH . 'Modules/*', GLOB_ONLYDIR) as $item_dir)
{
	if (file_exists($item_dir . '/Config/Routes.php'))
	{
		require_once($item_dir . '/Config/Routes.php');
	}	
}

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
