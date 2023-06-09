<?php

    if (!isset($routes)){
        $routes = \Config\Services::routes(true);
    }

    $routes->group('module2', ['namespace' => 'App\Modules\Module2\Controllers'], function ($subroutes) {
        $subroutes->get('', 'Employee::index');
        $subroutes->post('create', 'Employee::create');
        $subroutes->get('store', 'Employee::store');
        $subroutes->get('edit/(:num)', 'Employee::edit/$1');
        $subroutes->post('update/(:num)', 'Employee::update/$1');
        $subroutes->post('pfp/(:num)', 'Employee::pfp/$1');
        $subroutes->get('delete/(:num)', 'Employee::delete/$1');
    });

?>